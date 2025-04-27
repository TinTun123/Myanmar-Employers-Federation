<template>
  <LoadingComponent v-if="userStore.loading.state"></LoadingComponent>

  <div v-else>

    <AdminTitleComponent :title="'Manage Forms'"></AdminTitleComponent>

    <div class="mx-6 flex items-center justify-between md:justify-start gap-1 md:gap-4">
      <input type="text" placeholder="Search..."
        class="px-4 py-1 flex-2 md:flex-none md:w-[50%] border border-black/60 rounded-full shadow-sm focus:outline-none text-sm text-black/70" />
      <button
        class="px-3 py-1 flex items-center gap-1 bg-white border border-black/60 rounded-full shadow-sm group hover:bg-secondary-red cursor-pointer transition duration-200 ease-in-out">
        <span class="text-xs text-black/70 font-semibold group-hover:text-white">Search</span>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
          class="fill-black/70 group-hover:fill-white">
          <path
            d="M19.6 21L13.3 14.7C12.8 15.1 12.225 15.4167 11.575 15.65C10.925 15.8833 10.2333 16 9.5 16C7.68333 16 6.146 15.3707 4.888 14.112C3.63 12.8533 3.00067 11.316 3 9.5C2.99933 7.684 3.62867 6.14667 4.888 4.888C6.14733 3.62933 7.68467 3 9.5 3C11.3153 3 12.853 3.62933 14.113 4.888C15.373 6.14667 16.002 7.684 16 9.5C16 10.2333 15.8833 10.925 15.65 11.575C15.4167 12.225 15.1 12.8 14.7 13.3L21 19.6L19.6 21ZM9.5 14C10.75 14 11.8127 13.5627 12.688 12.688C13.5633 11.8133 14.0007 10.7507 14 9.5C13.9993 8.24933 13.562 7.187 12.688 6.313C11.814 5.439 10.7513 5.00133 9.5 5C8.24867 4.99867 7.18633 5.43633 6.313 6.313C5.43967 7.18967 5.002 8.252 5 9.5C4.998 10.748 5.43567 11.8107 6.313 12.688C7.19033 13.5653 8.25267 14.0027 9.5 14Z" />
        </svg>
      </button>
    </div>

    <div class="mr-6 my-4">
      <button @click="goTo('adminEditForms')"
        class="ml-auto bg-light-blue border border-light-blue shadow-lg rounded-full px-4 py-2 flex items-center gap-1 text-sm text-white">
        <span>New</span>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M7.922 2.00467L8 2C8.16329 2.00002 8.32089 2.05997 8.44291 2.16848C8.56494 2.27698 8.6429 2.4265 8.662 2.58867L8.66667 2.66667V7.33333H13.3333C13.4966 7.33335 13.6542 7.3933 13.7762 7.50181C13.8983 7.61032 13.9762 7.75983 13.9953 7.922L14 8C14 8.16329 13.94 8.32089 13.8315 8.44291C13.723 8.56494 13.5735 8.6429 13.4113 8.662L13.3333 8.66667H8.66667V13.3333C8.66665 13.4966 8.6067 13.6542 8.49819 13.7762C8.38968 13.8983 8.24017 13.9762 8.078 13.9953L8 14C7.83671 14 7.67911 13.94 7.55709 13.8315C7.43506 13.723 7.3571 13.5735 7.338 13.4113L7.33333 13.3333V8.66667H2.66667C2.50338 8.66665 2.34578 8.6067 2.22375 8.49819C2.10173 8.38968 2.02377 8.24017 2.00467 8.078L2 8C2.00002 7.83671 2.05997 7.67911 2.16848 7.55709C2.27698 7.43506 2.4265 7.3571 2.58867 7.338L2.66667 7.33333H7.33333V2.66667C7.33335 2.50338 7.3933 2.34578 7.50181 2.22375C7.61032 2.10173 7.75983 2.02377 7.922 2.00467Z"
            fill="white" />
        </svg>
      </button>
    </div>

    <div v-if="surveys.length === 0"
      class="flex justify-center items-center h-[100%] text-sm md:text-sm font-semibold text-black/60 text-center py-4">
      <span>No Form created yet!</span>

    </div>
    <div v-else class="mx-6 flex flex-col md:grid md:grid-cols-12 gap-4">
      <surveyCard v-for="(survey, index) in surveys" :key="index" :survey="survey" @deleteSurvey="deleteSurvey"
        class="md:col-span-6 lg:col-span-4">
      </surveyCard>
    </div>

    <div class="flex justify-end items-center gap-4 text-sm my-4 mx-4">
      <button
        class="flex items-center gap-4 px-4 py-2 bg-white border border-black/70 shadow-lg rounded-full cursor-pointer hover:shadow-none">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M10.707 14.3635C10.8945 14.1759 10.9998 13.9216 10.9998 13.6565C10.9998 13.3913 10.8945 13.137 10.707 12.9495L5.75705 7.99946L10.707 3.04946C10.8892 2.86086 10.99 2.60826 10.9877 2.34606C10.9854 2.08387 10.8803 1.83305 10.6949 1.64764C10.5095 1.46224 10.2586 1.35707 9.99645 1.35479C9.73425 1.35251 9.48165 1.45331 9.29305 1.63546L3.63605 7.29246C3.44858 7.47999 3.34326 7.7343 3.34326 7.99946C3.34326 8.26463 3.44858 8.51894 3.63605 8.70646L9.29305 14.3635C9.48058 14.5509 9.73488 14.6562 10 14.6562C10.2652 14.6562 10.5195 14.5509 10.707 14.3635Z"
            fill="black" />
        </svg>

        <span>Previous</span>
      </button>
      <button
        class="flex items-center gap-4 px-4 py-2 bg-white border border-black/70 shadow-lg rounded-full cursor-pointer hover:shadow-none">
        <span>Next</span>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M5.29295 1.63654C5.10548 1.82406 5.00017 2.07837 5.00017 2.34354C5.00017 2.6087 5.10548 2.86301 5.29295 3.05054L10.243 8.00054L5.29295 12.9505C5.11079 13.1391 5.01 13.3917 5.01228 13.6539C5.01456 13.9161 5.11973 14.1669 5.30513 14.3524C5.49054 14.5378 5.74135 14.6429 6.00355 14.6452C6.26575 14.6475 6.51835 14.5467 6.70695 14.3645L12.364 8.70754C12.5514 8.52001 12.6567 8.2657 12.6567 8.00054C12.6567 7.73537 12.5514 7.48106 12.364 7.29354L6.70695 1.63654C6.51942 1.44907 6.26512 1.34375 5.99995 1.34375C5.73479 1.34375 5.48048 1.44907 5.29295 1.63654Z"
            fill="black" />
        </svg>
      </button>
      <PopupConfirmationBox></PopupConfirmationBox>
    </div>
  </div>
</template>

<script setup>
import AdminTitleComponent from '@/components/admin/adminTitleComponent.vue'
import surveyCard from '@/components/admin/surveyCard.vue'
import { useRouter } from 'vue-router'
import { useSurveyStore } from '@/stores/surveyStore.js'
import { computed, onMounted } from 'vue'
import PopupConfirmationBox from '@/components/PopupConfirmationBox.vue';
import { useUserStore } from '@/stores/userStore'
import LoadingComponent from '@/components/LoadingComponent.vue'

const surveyStore = useSurveyStore()
const userStore = useUserStore()
const router = useRouter()

const surveys = computed(() => {
  return surveyStore.surveys.data
})

onMounted(() => {
  if (surveyStore.surveys.data.length === 0) {
    surveyStore.fetchSurveys()
  }
})

async function deleteSurvey(id) {
  const confirm = await userStore.showPopup({
    title: 'Delete Post',
    message: 'Are you sure you want to delete this post?',
  })

  if (confirm) {
    surveyStore.deleteSurvey(id).then((response) => {
      if (response.status === 200) {
        userStore.setNotification({
          type: 'success',
          message: 'Survey deleted successfully!',
        })
      }
    }).catch((error) => {
      console.error(error)
    })
  }
}

function goTo(route) {
  router.push({ name: route })
}
</script>
