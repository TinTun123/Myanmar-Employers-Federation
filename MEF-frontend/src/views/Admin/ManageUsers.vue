<template>
  <LoadingComponent v-if="userStore.loading.show"></LoadingComponent>

  <div v-else>
    <AdminTitleComponent :title="'Manage Editors'"></AdminTitleComponent>
    <div class="mr-4">
      <button @click="goTo('adminEditEditors')"
        class="ml-auto bg-light-blue border border-light-blue shadow-lg rounded-full px-4 py-2 flex items-center gap-1 text-sm text-white">
        <span>New</span>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M7.922 2.00467L8 2C8.16329 2.00002 8.32089 2.05997 8.44291 2.16848C8.56494 2.27698 8.6429 2.4265 8.662 2.58867L8.66667 2.66667V7.33333H13.3333C13.4966 7.33335 13.6542 7.3933 13.7762 7.50181C13.8983 7.61032 13.9762 7.75983 13.9953 7.922L14 8C14 8.16329 13.94 8.32089 13.8315 8.44291C13.723 8.56494 13.5735 8.6429 13.4113 8.662L13.3333 8.66667H8.66667V13.3333C8.66665 13.4966 8.6067 13.6542 8.49819 13.7762C8.38968 13.8983 8.24017 13.9762 8.078 13.9953L8 14C7.83671 14 7.67911 13.94 7.55709 13.8315C7.43506 13.723 7.3571 13.5735 7.338 13.4113L7.33333 13.3333V8.66667H2.66667C2.50338 8.66665 2.34578 8.6067 2.22375 8.49819C2.10173 8.38968 2.02377 8.24017 2.00467 8.078L2 8C2.00002 7.83671 2.05997 7.67911 2.16848 7.55709C2.27698 7.43506 2.4265 7.3571 2.58867 7.338L2.66667 7.33333H7.33333V2.66667C7.33335 2.50338 7.3933 2.34578 7.50181 2.22375C7.61032 2.10173 7.75983 2.02377 7.922 2.00467Z"
            fill="white" />
        </svg>
      </button>
    </div>


    <div class="flex flex-col md:grid md:grid-cols-12 gap-4 my-4 mx-4">
      <UserCard v-for="(editor, index) in editors" :key="index" :editor="editor" @deleteUser="deleteUser"></UserCard>
      <div v-if="editors.length === 0">
        <p class="text-center text-sm text-black/60 font-semibold">No editors found</p>
      </div>
    </div>
    <PopupConfirmationBox></PopupConfirmationBox>
  </div>


</template>

<script setup>
import AdminTitleComponent from '@/components/admin/adminTitleComponent.vue'
import UserCard from '@/components/UserCard.vue'
import { useRouter } from 'vue-router'
import { useUserStore } from '@/stores/userStore.js'
import { computed, onMounted } from 'vue'
import LoadingComponent from '@/components/LoadingComponent.vue'
import PopupConfirmationBox from '@/components/PopupConfirmationBox.vue'

const userStore = useUserStore()
const router = useRouter()
const editors = computed(() => {

  return userStore.editors
})

onMounted(() => {
  userStore.loading.show = true;
  userStore.getUsers().then(() => {
    userStore.loading.show = false
  }).catch((error) => {
    console.error('Error fetching users:', error)
    userStore.loading.show = false
  })
})

async function deleteUser(userId) {
  const confirm = await userStore.showPopup({
    title: 'Delete User',
    message: 'Are you sure you want to delete this user?',
  })

  if (confirm) {
    userStore.loading.show = true
    userStore.deleteUser(userId).then(() => {
      userStore.loading.show = false
    }).catch((error) => {
      console.error('Error deleting user:', error)
      userStore.loading.show = false
    })
  }

}


function goTo(route) {
  router.push({ name: route })
}
</script>
