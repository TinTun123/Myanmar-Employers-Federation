import { useRoute } from 'vue-router'

export function useGetCurrentPageName() {
  const route = useRoute()

  const currentPage = route.name

  if (currentPage === 'activities') {
    return 'Activities & News'
  } else if (currentPage === 'statements') {
    return 'Statements'
  } else if (currentPage === 'reports') {
    return 'Violations'
  }
}
