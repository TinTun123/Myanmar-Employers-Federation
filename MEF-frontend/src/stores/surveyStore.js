import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { axiosClient } from '@/axios'
import { useUserStore } from './userStore'

const LARGE_FILE_THRESHOLD = 20 * 1024 * 1024 // 20MB
const CHUNK_SIZE = 10 * 1024 * 1024 // 10MB

export const useSurveyStore = defineStore('survey', {
  state: () => ({
    questionTypes: ['text', 'textarea', 'radio', 'checkbox', 'select', 'file'],
    surveys: {
      data: [],
    },
    answerRecord: localStorage.getItem('answerRecord')
      ? JSON.parse(localStorage.getItem('answerRecord'))
      : [],
    selectedresponseId: null,
    dynamicBoard: {
      data: [],
    },
  }),
  actions: {
    async fetchSurveys() {
      const userStore = useUserStore()
      userStore.loading.state = true
      userStore.loading.message = 'Loading surveys...'
      return axiosClient.get('/forms').then((response) => {
        userStore.loading.state = false
        userStore.loading.message = ''
        this.surveys = response.data
        return response
      })
    },
    async storeDyncmicContent(dynamicContent) {
      return axiosClient.post('/dynamic-content', dynamicContent).then((response) => {
        this.dynamicBoard.data.push(response.data.data)

        return response
      })
    },
    async updateDyncmicContent(dynamicContent, id) {
      return axiosClient.post(`/dynamic-content/${id}`, dynamicContent).then((response) => {
        const index = this.dynamicBoard.data.findIndex((d) => d.id === response.data.data.id)
        if (index !== -1) {
          this.dynamicBoard.data[index] = response.data.data
        }
        return response
      })
    },
    async deleteDyncmicContent(id) {
      return axiosClient.delete(`/dynamic-content/${id}`).then((response) => {
        if (response.status === 200) {
          this.dynamicBoard.data = this.dynamicBoard.data.filter((d) => d.id !== id)
        }
        return response
      })
    },
    async fetchDynamicContent() {
      console.log('fetchDynamicContent')

      return axiosClient.get('/dynamic-content').then((response) => {
        this.dynamicBoard = response.data
        return response
      })
    },
    async getSurveyById(surveyId) {
      const userStore = useUserStore()
      userStore.loading.state = true
      userStore.loading.message = 'Loading survey...'
      return axiosClient.get(`/forms/${surveyId}`).then((response) => {
        userStore.loading.state = false
        userStore.loading.message = ''
        return response.data.data
      })
    },
    async findSurveyById(surveyId) {
      if (!this.surveys.data.length) {
        await this.fetchSurveys()
      }
      let model = this.surveys.data.find((survey) => {
        return survey.id === surveyId
      })
      return model
    },
    async deleteFormVersion(formVersionId) {
      return axiosClient.delete(`/form-versions/${formVersionId}`).then((response) => {
        return response
      })
    },
    async getFormResponses(form_version_id) {
      return axiosClient.get(`/forms/${form_version_id}/responses`).then((response) => {
        return response
      })
    },
    async getResponse(responseId) {
      return axiosClient.get(`/responses/${responseId}/answers`).then((response) => {
        return response
      })
    },
    async submitAnswer(surveyId, answers, onProgress) {
      const formData = new FormData()

      formData.append('survey_id', answers.survey_id)
      formData.append('version', answers.version)
      formData.append('form_version_id', answers.form_version_id)
      // Answers need special handling
      for (const [questionId, answer] of Object.entries(answers.answers)) {
        formData.append(`answers[${questionId}][type]`, answer.type)
        formData.append(`answers[${questionId}][is_prefixed]`, answer.is_prefixed)

        if (answer.type === 'file') {
          // Check if any file exceeds the LARGE_FILE_THRESHOLD
          const hasLargeFile = answer.content.some((file) => file.size > LARGE_FILE_THRESHOLD)

          if (hasLargeFile) {
            // Upload all files via uploadLargeFileInChunks
            for (let i = 0; i < answer.content.length; i++) {
              const file = answer.content[i]
              const filePath = await this.uploadLargeFileInChunks(file, questionId, onProgress)
              formData.append(`answers[${questionId}][content][${i}]`, filePath)
            }
          } else {
            // Conventional approach for all files
            for (let i = 0; i < answer.content.length; i++) {
              const file = answer.content[i]
              formData.append(`answers[${questionId}][content][${i}]`, file)
            }
          }
        } else if (answer.type === 'checkbox') {
          // Append multiple checkboxes
          for (let i = 0; i < answer.content.length; i++) {
            formData.append(`answers[${questionId}][content][${i}]`, answer.content[i])
          }
        } else {
          formData.append(`answers[${questionId}][content]`, answer.content)
        }
      }

      return axiosClient
        .post(`/forms/${surveyId}/answers`, formData, {
          onUploadProgress: (progressEvent) => {
            if (onProgress) {
              const percentCompleted = Math.round(
                (progressEvent.loaded * 100) / progressEvent.total,
              )
              onProgress(percentCompleted) // Call the callback with the progress percentage
            }
          },
        })
        .then((response) => {
          console.log(response.data)
          this.answerRecord.push(response.data)
          localStorage.setItem('answerRecord', JSON.stringify(this.answerRecord))
          return response
        })
    },
    async uploadLargeFileInChunks(file, questionId, onProgress = null) {
      const totalChunks = Math.ceil(file.size / CHUNK_SIZE)
      const fileId = `${questionId}_${Date.now()}_${file.name.replace(/\W/g, '')}`

      for (let i = 0; i < totalChunks; i++) {
        const start = i * CHUNK_SIZE
        const end = Math.min(start + CHUNK_SIZE, file.size)
        const chunk = file.slice(start, end)

        const chunkForm = new FormData()
        chunkForm.append('file', chunk)
        chunkForm.append('file_id', fileId)
        chunkForm.append('chunk_index', i)
        chunkForm.append('total_chunks', totalChunks)
        chunkForm.append('file_name', file.name)

        await axiosClient.post('/upload-chunk', chunkForm)

        if (onProgress) {
          const percent = Math.round(((i + 1) / totalChunks) * 100)
          onProgress(percent)
        }
      }

      // After uploading all chunks, notify server to assemble
      const res = await axiosClient.post('/merge-chunks', {
        file_id: fileId,
        file_name: file.name,
      })

      return res.data.chunk_ref // relative path to saved file
    },
    async downloadResponse(formVersionId) {
      return axiosClient.get(`/forms/${formVersionId}/responses/download`, {
        responseType: 'blob',
      })
    },
    async createSurvey(survey) {
      const formData = new FormData()

      Object.keys(survey).forEach((key) => {
        const value = survey[key]

        // If the value is an object or array, stringify it
        if (typeof value === 'object' && value !== null) {
          formData.append(key, JSON.stringify(value))
        } else {
          formData.append(key, value)
        }
      })

      return axiosClient.post('/forms', formData).then((response) => {
        this.surveys.data.push(response.data.data)
        return response
      })
    },
    async updateSurvey(survey) {
      const formData = new FormData()
      formData.append('_method', 'PUT')
      Object.keys(survey).forEach((key) => {
        const value = survey[key]

        // If the value is an object or array, stringify it
        if (typeof value === 'object' && value !== null) {
          formData.append(key, JSON.stringify(value))
        } else {
          formData.append(key, value)
        }
      })

      return axiosClient.post(`/forms/${survey.id}`, formData).then((response) => {
        const index = this.surveys.data.findIndex((s) => s.id === survey.id)
        if (index !== -1) {
          this.surveys.data[index] = response.data.data
        }
        return response
      })
    },
    async deleteSurvey(surveyId) {
      return axiosClient.delete(`/forms/${surveyId}`).then((response) => {
        if (response.status === 200) {
          this.surveys.data = this.surveys.data.filter((survey) => survey.id !== surveyId)
        }
        return response
      })
    },
  },
})
