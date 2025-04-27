import EditNews from '@/components/admin/editNews.vue'
import EditStatement from '@/components/admin/editStatement.vue'
import EditSurvey from '@/components/admin/editSurvey.vue'
import EditUser from '@/components/admin/editUser.vue'
import Dashboard from '@/components/Dashboard.vue'
import DefaultLayout from '@/layouts/defaultLayout.vue'
import { useUserStore } from '@/stores/userStore'
import ManageBoard from '@/views/Admin/ManageBoard.vue'
import ManageForms from '@/views/Admin/ManageForms.vue'
import ManageNews from '@/views/Admin/ManageNews.vue'
import ManageStatements from '@/views/Admin/ManageStatements.vue'
import ManageUsers from '@/views/Admin/ManageUsers.vue'
import Response from '@/views/Admin/Response.vue'
import ComplainPage from '@/views/ComplainPage.vue'
import FormAnswerPage from '@/views/FormAnswerPage.vue'
import HomePage from '@/views/HomePage.vue'
import LoginPage from '@/views/LoginPage.vue'
import NewsDeatilView from '@/views/NewsDeatilView.vue'
import NewsListPage from '@/views/NewsListPage.vue'
import NewsViewPage from '@/views/NewsViewPage.vue'
import StatementsPage from '@/views/StatementsPage.vue'
import StatementView from '@/views/StatementView.vue'
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      redirect: '/home',
      component: DefaultLayout,
      children: [
        {
          path: '/home',
          name: 'home',
          component: HomePage,
        },
        {
          path: '/activities',
          name: 'activities',
          component: NewsListPage,
        },
        {
          path: '/activities/:id',
          name: 'activitiesDetail',
          component: NewsDeatilView,
        },
        {
          path: '/statements/:id?',
          name: 'statements',
          component: StatementsPage,
        },
        {
          path: '/reports/',
          name: 'reports',
          component: ComplainPage,
        },
        {
          path: '/reports/:id',
          name: 'formAnswer',
          component: FormAnswerPage,
        },
      ],
    },
    {
      path: '/login/',
      name: 'login',
      component: LoginPage,
    },
    {
      path: '/admin/',
      name: 'dashboard',
      component: Dashboard,
      meta: {
        requiresAuth: true,
      },
      children: [
        {
          path: '/admin/statements/',
          name: 'adminStatements',
          component: ManageStatements,
        },
        {
          path: '/admin/statements/:id?',
          name: 'adminEditStatements',
          component: EditStatement,
        },
        {
          path: '/admin/forms/',
          name: 'adminForms',
          component: ManageForms,
        },
        {
          path: '/admin/forms/:id?',
          name: 'adminEditForms',
          component: EditSurvey,
        },
        {
          path: '/admin/news/',
          name: 'adminNews',
          component: ManageNews,
        },
        {
          path: '/admin/news/:id?',
          name: 'adminEditNews',
          component: EditNews,
        },
        {
          path: '/admin/dynamicboard/',
          name: 'adminDynamicBoard',
          component: ManageBoard,
        },
        {
          path: '/admin/responses/',
          name: 'adminResponses',
          component: Response,
        },
        {
          path: '/admin/editors/',
          name: 'adminEditors',
          component: ManageUsers,
        },
        {
          path: '/admin/editors/:id?',
          name: 'adminEditEditors',
          component: EditUser,
        },
      ],
    },
  ],
})

router.beforeEach((to, from, next) => {
  const userStore = useUserStore()

  if (to.meta.requiresAuth && !userStore.isUserLoginIn()) {
    next({ name: 'login' })
  } else {
    next()
  }
})

export default router
