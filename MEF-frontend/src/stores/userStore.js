import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { axiosClient } from '@/axios'

export const useUserStore = defineStore('users', {
  state: () => ({
    notification: {
      show: false,
      message: '',
      type: null,
    },
    loading: {
      state: true,
      message: 'Loading...',
    },
    popUp: {
      show: false,
      title: '',
      message: '',
      onConfirm: null,
      onCancel: null,
    },
    user: JSON.parse(localStorage.getItem('user')) || null,
    username: localStorage.getItem('username') || null,
    token: null,
    editors: [],
  }),
  actions: {
    getUserById(id) {
      return this.editors.find((editor) => editor.id === id)
    },
    isUserLoginIn() {
      if (this.user?.token) {
        return true
      } else {
        return false
      }
    },
    async createUser(data) {
      return axiosClient.post('/register/', data).then((response) => {
        return response
      })
    },
    async updateUser(data) {
      return axiosClient
        .put(`/users/${data.id}/`, data)
        .then((response) => {
          if (response.status === 200) {
            const index = this.editors.findIndex((editor) => editor.id === data.id)
            this.editors[index] = response.data
            return response
          }
        })
        .catch((error) => {
          // Handle server error and display it using Notification
          const errorMessage = error.response?.data?.message || 'Failed to update user'
          this.setNotification({
            show: true,
            type: 'error',
            message: errorMessage,
          })
        })
    },
    async login(data) {
      return axiosClient
        .post('/login/', data)
        .then((response) => {
          if (response.status === 200) {
            this.user = response.data.user

            localStorage.setItem('user', JSON.stringify(response.data.user))
            return response
          }
        })
        .catch((error) => {
          // Handle server error and display it using Notification
          console.log(error)

          const errorMessage = error.response?.data?.message || 'Failed to login'
          this.setNotification({
            show: true,
            type: 'error',
            message: errorMessage,
          })
        })
    },
    async logout() {
      return axiosClient.post('/logout/').then((response) => {
        console.log('Logout response:', response)
        if (response.status === 200) {
          this.user.token = null
          localStorage.removeItem('token')
          localStorage.removeItem('username')
          this.username = null
        }
        return response
      })
    },
    async getUsers() {
      return axiosClient.get('/users/').then((response) => {
        if (response.status === 200) {
          this.editors = response.data
          return response
        }
      })
    },
    async deleteUser(id) {
      return axiosClient.delete(`/users/${id}/`).then((response) => {
        if (response.status === 200) {
          this.editors = this.editors.filter((editor) => editor.id !== id)
          this.setNotification({
            show: true,
            type: 'success',
            message: 'Editor deleted successfully',
          })
          return response
        }
      })
    },
    setNotification(data, time = 6000) {
      this.notification.show = true
      this.notification.message = data.message
      this.notification.type = data.type

      setTimeout(() => {
        this.notification.show = false
        this.notification.message = ''
        this.notification.type = null
      }, time)
    },
    setLoading(state, message = 'Loading...') {
      this.loading.state = state
      this.loading.message = message
    },
    async showPopup({ title, message }) {
      return new Promise((resolve) => {
        this.popUp.show = true
        this.popUp.title = title
        this.popUp.message = message

        this.popUp.onConfirm = () => {
          resolve(true) // Resolve the promise with `true` when the user confirms
          this.closePopup()
        }

        this.popUp.onCancel = () => {
          resolve(false) // Resolve the promise with `false` when the user cancels
          this.closePopup()
        }
      })
    },
    closePopup() {
      this.popUp.show = false
      this.popUp.title = ''
      this.popUp.message = ''
      this.popUp.onConfirm = null
      this.popUp.onCancel = null
    },
  },
})
