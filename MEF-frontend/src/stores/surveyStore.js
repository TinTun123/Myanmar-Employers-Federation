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
    async findSurveyById(surveyId) {
      if (!this.surveys.data.length) {
        await this.fetchSurveys()
      }
      let model = this.surveys.data.find((survey) => {
        return survey.id === surveyId
      })
      return model
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
