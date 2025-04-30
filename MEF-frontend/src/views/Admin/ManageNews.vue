<template>
  <LoadingComponent v-if="userStore.loading.show"></LoadingComponent>
  <div v-else>
    <AdminTitleComponent :title="'Manage Activities & News'"></AdminTitleComponent>

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

    <div class="my-4 md:my-8 flex items-center justify-start">
      <div
        class="px-4 py-2 bg-white shadow-lg rounded-full mx-6 group cursor-pointer hover:shadow-none transition hover:border border-black/40">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M16.5 13.9538C16.5 14.1029 16.4407 14.246 16.3352 14.3515C16.2298 14.457 16.0867 14.5163 15.9375 14.5163H12.1125C11.9872 14.9834 11.7113 15.3962 11.3276 15.6906C10.9438 15.985 10.4737 16.1445 9.99 16.1445C9.50634 16.1445 9.03618 15.985 8.65243 15.6906C8.26869 15.3962 7.99278 14.9834 7.8675 14.5163H2.0625C1.91332 14.5163 1.77024 14.457 1.66475 14.3515C1.55926 14.246 1.5 14.1029 1.5 13.9538C1.5 13.8046 1.55926 13.6615 1.66475 13.556C1.77024 13.4505 1.91332 13.3913 2.0625 13.3913H7.8675C7.99278 12.9241 8.26869 12.5113 8.65243 12.2169C9.03618 11.9225 9.50634 11.763 9.99 11.763C10.4737 11.763 10.9438 11.9225 11.3276 12.2169C11.7113 12.5113 11.9872 12.9241 12.1125 13.3913H15.9375C16.0867 13.3913 16.2298 13.4505 16.3352 13.556C16.4407 13.6615 16.5 13.8046 16.5 13.9538ZM16.5 4.04626C16.5 4.19544 16.4407 4.33852 16.3352 4.44401C16.2298 4.5495 16.0867 4.60876 15.9375 4.60876H14.1C13.9747 5.07592 13.6988 5.48869 13.3151 5.78309C12.9313 6.07748 12.4612 6.23705 11.9775 6.23705C11.4938 6.23705 11.0237 6.07748 10.6399 5.78309C10.2562 5.48869 9.98028 5.07592 9.855 4.60876H2.0625C1.98863 4.60876 1.91549 4.59421 1.84724 4.56594C1.77899 4.53767 1.71699 4.49624 1.66475 4.44401C1.61252 4.39177 1.57109 4.32976 1.54282 4.26152C1.51455 4.19327 1.5 4.12013 1.5 4.04626C1.5 3.97239 1.51455 3.89925 1.54282 3.831C1.57109 3.76275 1.61252 3.70074 1.66475 3.64851C1.71699 3.59628 1.77899 3.55484 1.84724 3.52658C1.91549 3.49831 1.98863 3.48376 2.0625 3.48376H9.855C9.98028 3.0166 10.2562 2.60383 10.6399 2.30943C11.0237 2.01504 11.4938 1.85547 11.9775 1.85547C12.4612 1.85547 12.9313 2.01504 13.3151 2.30943C13.6988 2.60383 13.9747 3.0166 14.1 3.48376H15.9375C16.0116 3.48275 16.0852 3.49661 16.1539 3.52452C16.2226 3.55243 16.2851 3.59383 16.3375 3.64626C16.3899 3.6987 16.4313 3.76111 16.4592 3.82981C16.4871 3.89851 16.501 3.97211 16.5 4.04626ZM16.5 8.99626C16.501 9.07041 16.4871 9.14401 16.4592 9.21271C16.4313 9.28141 16.3899 9.34382 16.3375 9.39625C16.2851 9.44869 16.2226 9.49009 16.1539 9.518C16.0852 9.54591 16.0116 9.55977 15.9375 9.55876H7.1625C7.03722 10.0259 6.76131 10.4387 6.37757 10.7331C5.99382 11.0275 5.52366 11.187 5.04 11.187C4.55634 11.187 4.08618 11.0275 3.70243 10.7331C3.31869 10.4387 3.04278 10.0259 2.9175 9.55876H2.0625C1.91332 9.55876 1.77024 9.4995 1.66475 9.39401C1.55926 9.28852 1.5 9.14544 1.5 8.99626C1.5 8.84707 1.55926 8.704 1.66475 8.59851C1.77024 8.49302 1.91332 8.43376 2.0625 8.43376H2.9175C3.04278 7.9666 3.31869 7.55383 3.70243 7.25943C4.08618 6.96504 4.55634 6.80547 5.04 6.80547C5.52366 6.80547 5.99382 6.96504 6.37757 7.25943C6.76131 7.55383 7.03722 7.9666 7.1625 8.43376H15.9375C16.0867 8.43376 16.2298 8.49302 16.3352 8.59851C16.4407 8.704 16.5 8.84707 16.5 8.99626Z"
            fill="black" fill-opacity="0.6" />
        </svg>
      </div>
    </div>


    <div class="mr-4">
      <button @click="goTo('adminEditNews')"
        class="ml-auto cursor-pointer group hover:bg-light-blue/90 focus:bg-light-blue/70 bg-light-blue border border-light-blue shadow-lg rounded-full px-4 py-2 flex items-center gap-1 text-sm text-white">
        <span>New</span>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M7.922 2.00467L8 2C8.16329 2.00002 8.32089 2.05997 8.44291 2.16848C8.56494 2.27698 8.6429 2.4265 8.662 2.58867L8.66667 2.66667V7.33333H13.3333C13.4966 7.33335 13.6542 7.3933 13.7762 7.50181C13.8983 7.61032 13.9762 7.75983 13.9953 7.922L14 8C14 8.16329 13.94 8.32089 13.8315 8.44291C13.723 8.56494 13.5735 8.6429 13.4113 8.662L13.3333 8.66667H8.66667V13.3333C8.66665 13.4966 8.6067 13.6542 8.49819 13.7762C8.38968 13.8983 8.24017 13.9762 8.078 13.9953L8 14C7.83671 14 7.67911 13.94 7.55709 13.8315C7.43506 13.723 7.3571 13.5735 7.338 13.4113L7.33333 13.3333V8.66667H2.66667C2.50338 8.66665 2.34578 8.6067 2.22375 8.49819C2.10173 8.38968 2.02377 8.24017 2.00467 8.078L2 8C2.00002 7.83671 2.05997 7.67911 2.16848 7.55709C2.27698 7.43506 2.4265 7.3571 2.58867 7.338L2.66667 7.33333H7.33333V2.66667C7.33335 2.50338 7.3933 2.34578 7.50181 2.22375C7.61032 2.10173 7.75983 2.02377 7.922 2.00467Z"
            fill="white" />
        </svg>
      </button>
    </div>

    <div class="flex items-center justify-start gap-2 mt-4 mx-6">
      <span class="text-sm text-black/70">Total</span>
      <div class="w-[8px] h-[8px] bg-black/40 rounded-full"></div>
      <span class="text-sm text-black/70">{{ activities.length || 0 }}</span>
    </div>

    <div class="mx-6 flex flex-col items-center gap-4 my-4 md:my-6 md:mx-6 md:grid md:grid-cols-12">
      <NewsCard v-for="(post, index) in activities" @delete-post="deletePost" :key="post.id" :post="post"
        class="md:col-span-5 lg:col-span-4" :class="[index % 2 === 0 || index === 0 ? 'md:col-start-2' : '']">
      </NewsCard>
    </div>
    <pre>

</pre>
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
    </div>
    <PopupConfirmationBox></PopupConfirmationBox>
  </div>

</template>
<script setup>
import { useNewsStore } from '@/stores/newsStore'
import NewsCard from '@/components/NewsCard.vue'
import { computed, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import AdminTitleComponent from '@/components/admin/adminTitleComponent.vue'
import { useUserStore } from '@/stores/userStore.js'
import LoadingComponent from '@/components/LoadingComponent.vue'
import PopupConfirmationBox from '@/components/PopupConfirmationBox.vue'

const newsStore = useNewsStore()
const userStore = useUserStore()
const router = useRouter()
const activities = computed(() => {
  return newsStore.activities.data
})

function goTo(name) {
  router.push({ name: name })
}

onMounted(() => {
  if (newsStore.activities.data?.length) {
    return;
  }
  userStore.loading.show = true;
  newsStore.fetchPosts().then(() => {
    userStore.loading.show = false
    userStore.loading.message = 'Loading News...'
  }).catch((error) => {
    console.error('Error fetching posts:', error)
    userStore.loading.show = false
  });
})

async function deletePost(id) {


  const confirm = await userStore.showPopup({
    title: 'Delete Post',
    message: 'Are you sure you want to delete this post?',
  })

  if (confirm) {

    newsStore.deletePost(id).then((response) => {
      if (response.status === 200) {
        userStore.setNotification({
          show: true,
          message: 'Post deleted successfully',
          type: 'success'
        })
      }

    }).catch((error) => {
      console.error('Error deleting post:', error)
      userStore.setNotification({
        show: true,
        message: 'Error deleting post',
        type: 'error'
      })
    })
  }
}
</script>
