// composables/useDeviceType.js
import { ref, onMounted, onUnmounted } from 'vue'

export function useDeviceType() {
  const deviceType = ref('desktop')

  const updateDeviceType = () => {
    const width = window.innerWidth

    if (width < 768) {
      deviceType.value = 'mobile'
    } else if (width >= 768 && width < 1024) {
      deviceType.value = 'tablet'
    } else {
      deviceType.value = 'desktop'
    }
  }

  onMounted(() => {
    updateDeviceType()
    window.addEventListener('resize', updateDeviceType)
  })

  onUnmounted(() => {
    window.removeEventListener('resize', updateDeviceType)
  })

  return {
    deviceType,
  }
}
