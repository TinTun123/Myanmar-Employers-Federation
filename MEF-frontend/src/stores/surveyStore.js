import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { axiosClient } from '@/axios'
import { useUserStore } from './userStore'

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
    async submitAnswer(surveyId, answers) {
      const formData = new FormData()

      formData.append('survey_id', answers.survey_id)
      formData.append('version', answers.version)
      formData.append('form_version_id', answers.form_version_id)
      // Answers need special handling
      for (const [questionId, answer] of Object.entries(answers.answers)) {
        formData.append(`answers[${questionId}][type]`, answer.type)
        formData.append(`answers[${questionId}][is_prefixed]`, answer.is_prefixed)

        if (answer.type === 'file') {
          // Append multiple files
          for (let i = 0; i < answer.content.length; i++) {
            console.log(answer.content[i])

            formData.append(`answers[${questionId}][content][${i}]`, answer.content[i])
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

      return axiosClient.post(`/forms/${surveyId}/answers`, formData).then((response) => {
        console.log(response.data)
        this.answerRecord.push(response.data)
        localStorage.setItem('answerRecord', JSON.stringify(this.answerRecord))
        return response
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
