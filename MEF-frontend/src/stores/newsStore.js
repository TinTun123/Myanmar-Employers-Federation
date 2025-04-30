import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { axiosClient } from '@/axios'
import { useUserStore } from './userStore'

export const useNewsStore = defineStore('news', {
  state: () => ({
    activities: {
      data: [],
    },
    statements: {
      data: [],
    },
    likeRecord: localStorage.getItem('likeRecord')
      ? JSON.parse(localStorage.getItem('likeRecord'))
      : {},
  }),
  actions: {
    async fetchPosts() {
      return axiosClient.get('/news').then((response) => {
        this.activities = response.data
        return response
      })
    },
    async fetchStatements() {
      const userStore = useUserStore()

      userStore.loading.state = true
      userStore.loading.message = 'Loading statements...'
      return axiosClient.get('/statements').then((response) => {
        userStore.loading.state = false

        this.statements = response.data

        return response
      })
    },

    getPostById(postId) {
      return this.activities.data.find((post) => post.id === postId)
    },
    getStatementById(statementId) {
      let statemet = this.statements.data.find((statement) => statement.id === statementId)

      console.log(statemet)
      return statemet
    },
    async updatePost(postId, updatedPost) {
      const formData = new FormData()
      formData.append('_method', 'PUT')
      Object.keys(updatedPost).forEach((key) => {
        if (key === 'imgFile' && updatedPost[key] instanceof File) {
          // Append the file directly
          formData.append(key, updatedPost[key])
        } else if (key !== 'image') {
          // Append other fields
          formData.append(key, updatedPost[key])
        }
      })

      return axiosClient.post(`/news/${postId}`, formData).then((response) => {
        if (response.status === 200) {
          const index = this.activities.data.findIndex((post) => post.id === postId)
          if (index !== -1) {
            this.activities.data[index] = { ...response.data }
          }
        }

        return response
      })
    },
    async createPost(newPost) {
      const formData = new FormData()

      Object.keys(newPost).forEach((key) => {
        if (key === 'imgFile' && newPost[key] instanceof File) {
          // Append the file directly
          formData.append(key, newPost[key])
        } else if (key !== 'image') {
          // Append other fields
          formData.append(key, newPost[key])
        }
      })

      return axiosClient.post('/news', formData).then((response) => {
        console.log('response from newsStore', response)

        if (response.status === 201) {
          this.activities.data.push(response.data.data)
        }

        return response
      })
    },
    async deletePost(postId) {
      return axiosClient.delete(`/news/${postId}`).then((response) => {
        if (response.status === 200) {
          this.activities.data = this.activities.data.filter((post) => post.id !== postId)
        }

        return response
      })
    },
    async addComment(type, postId, comment, name) {
      const formData = new FormData()
      formData.append('comment', comment)
      formData.append('name', name)
      console.log(type)

      return axiosClient.post(`/${type}/${postId}/comments`, formData).then((response) => {
        if (response.status === 201 && type === 'news') {
          const post = this.activities.data.find((post) => post.id === postId)
          if (post) {
            post.comments.push(response.data.data)
          }
        } else if (response.status === 201 && type === 'statements') {
          const statement = this.statements.data.find((statement) => statement.id === postId)
          if (statement) {
            statement.comments.push(response.data.data)
          }
        }

        return response
      })
    },
    addLikeRecord(postId, type) {
      if (type === 'news') {
        if (!this.likeRecord.news) {
          this.likeRecord.news = []
          this.likeRecord.news.push(postId)
        } else {
          this.likeRecord.news.push(postId)
        }
      } else {
        if (!this.likeRecord.statement) {
          this.likeRecord.statement = []
          this.likeRecord.statement.push(postId)
        } else {
          this.likeRecord.statement.push(postId)
        }
      }

      localStorage.setItem('likeRecord', JSON.stringify(this.likeRecord))
    },
    async likeNews(postId) {
      return axiosClient.post(`/news/${postId}/like`).then((response) => {
        if (response.status === 200) {
          const post = this.activities.data.find((post) => post.id === postId)
          if (post) {
            post.likes += 1
          }

          this.addLikeRecord(postId, 'news')

          return response
        }
      })
    },
    isPostLiked(postId) {
      return this.likeRecord.news && this.likeRecord.news.includes(postId)
    },
    async updateStatement(statementId, updatedStatement) {
      const formData = new FormData()
      formData.append('_method', 'PUT')
      Object.keys(updatedStatement).forEach((key) => {
        if (
          key === 'imageFiles' &&
          Array.isArray(updatedStatement[key]) &&
          updatedStatement[key][0] instanceof File
        ) {
          // Append the file directly
          for (let i = 0; i < updatedStatement.imageFiles.length; i++) {
            formData.append('images[]', updatedStatement.imageFiles[i])
          }
        } else if (key === 'images') {
          // Append images fields
          updatedStatement[key].forEach((image) => {
            if (image.startsWith('http')) {
              formData.append('imagesURL[]', image)
            }
          })
        } else {
          formData.append(key, updatedStatement[key])
        }
      })

      return axiosClient.post(`/statements/${statementId}`, formData).then((response) => {
        if (response.status === 200) {
          const index = this.statements.data.findIndex((statement) => statement.id === statementId)
          if (index !== -1) {
            this.statements.data[index] = { ...response.data }
          }
        }

        return response
      })
    },
    async createStatement(statement) {
      const formData = new FormData()
      formData.append('title', statement.title)
      formData.append('date', statement.date)
      formData.append('committee', statement.committee)
      formData.append('statement_no', statement.statementNo)
      formData.append('body', statement.body)

      // Append image files
      for (let i = 0; i < statement.imageFiles.length; i++) {
        formData.append('images[]', statement.imageFiles[i])
      }

      return axiosClient.post('/statements', formData).then((response) => {
        if (response.status === 201) {
          this.statements.data.push(response.data)
        }

        return response
      })
    },
    async deleteStatement(statementId) {
      return axiosClient.delete(`/statements/${statementId}`).then((response) => {
        if (response.status === 200) {
          this.statements.data = this.statements.data.filter(
            (statement) => statement.id !== statementId,
          )
        }
        return response
      })
    },
  },
})
