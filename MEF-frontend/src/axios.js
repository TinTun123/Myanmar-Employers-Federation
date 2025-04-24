import axios from 'axios'
import { useUserStore } from './stores/userStore'

export const axiosClient = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL,
})

axiosClient.interceptors.request.use((config) => {
  const userStore = useUserStore()
  config.headers.Authorization = `Bearer ${userStore.user?.token}`

  return config
})
