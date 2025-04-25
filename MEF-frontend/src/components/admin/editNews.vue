<template>

  <!-- <LoadingComponent v-if="userStore.loading.show"></LoadingComponent> -->
  <div>
    <AdminTitleComponent :title="route.params.id ? 'Edit post' : 'Create post'"></AdminTitleComponent>

    <div class="mt-6 mx-6 md:mx-[48px] flex flex-col gap-4">
      <div class="flex flex-col gap-4 md:w-[60%]">
        <div class="border-l-4 border-secondary-red pl-2">
          <label for="title" class="text-sm font-semibold">Title:</label>
        </div>

        <input v-model="model.title" type="text"
          class="border border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7" id="title"
          placeholder="Enter title" />
      </div>

      <div class="flex flex-col gap-4 md:w-[60%]">
        <div class="border-r-4 border-secondary-red pr-2 text-right">
          <label for="date" class="text-sm font-semibold">Publish date:</label>
        </div>

        <input v-model="model.publish_date" type="date" id="date"
          class="border self-end border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7 focus:outline-none focus:ring-2 focus:ring-light-blue focus:border-light-blue"
          placeholder="Select a date" />
      </div>

      <div class="flex flex-col gap-4 md:w-[60%]">
        <div class="border-l-4 border-secondary-red pl-2">
          <label for="body" class="text-sm font-semibold">Body:</label>
        </div>
        <textarea v-model="model.body"
          class="border border-black/40 leading-8 text-sm bg-white shadow-lg rounded-md px-4 py-2" id="body"
          placeholder="Enter title" rows="10"></textarea>
      </div>

      <div class="flex flex-col gap-4 md:w-[40%]">
        <div class="border-l-4 border-secondary-red pl-2">
          <label for="image" class="text-sm font-semibold">Cover image</label>
        </div>

        <div @click.stop="openFileSelector"
          class="bg-white p-4 border border-black/20 rounded-lg w-[70%] shadow-lg overflow-hidden h-[200px] flex justify-center items-center cursor-pointer">
          <svg v-if="!model.image" class="w-full h-full m-12" viewBox="0 0 94 94" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M80.2143 0.5H13.7857C10.2633 0.504487 6.88626 2.13896 4.39554 5.0448C1.90482 7.95064 0.503846 11.8905 0.5 16V78C0.503846 82.1095 1.90482 86.0494 4.39554 88.9552C6.88626 91.861 10.2633 93.4955 13.7857 93.5H80.2143C83.7367 93.4955 87.1137 91.861 89.6045 88.9552C92.0952 86.0494 93.4962 82.1095 93.5 78V16C93.4962 11.8905 92.0952 7.95064 89.6045 5.0448C87.1137 2.13896 83.7367 0.504487 80.2143 0.5ZM63.6071 16C65.5779 16 67.5044 16.6818 69.143 17.9592C70.7816 19.2365 72.0588 21.0521 72.8129 23.1763C73.5671 25.3005 73.7644 27.6379 73.38 29.8929C72.9955 32.148 72.0465 34.2193 70.653 35.8451C69.2594 37.4709 67.484 38.5781 65.5511 39.0266C63.6182 39.4752 61.6147 39.245 59.794 38.3651C57.9732 37.4852 56.417 35.9952 55.3221 34.0835C54.2272 32.1718 53.6429 29.9242 53.6429 27.625C53.6456 24.5428 54.6963 21.5878 56.5644 19.4084C58.4324 17.229 60.9653 16.0032 63.6071 16ZM13.7857 85.75C12.0239 85.75 10.3343 84.9335 9.0885 83.4801C7.84273 82.0267 7.14286 80.0554 7.14286 78V61.6209L26.8306 41.2045C28.7302 39.239 31.2005 38.1924 33.7384 38.2779C36.2764 38.3634 38.6908 39.5746 40.49 41.6646L53.9729 57.3608L29.6393 85.75H13.7857ZM86.8571 78C86.8571 80.0554 86.1573 82.0267 84.9115 83.4801C83.6657 84.9335 81.9761 85.75 80.2143 85.75H39.0348L64.2403 56.3436C66.0248 54.573 68.2895 53.5976 70.6321 53.5905C72.9747 53.5834 75.2437 54.5451 77.0361 56.3048L86.8571 65.8519V78Z"
              fill="black" fill-opacity="0.4" />
          </svg>
          <img v-else :src="model.image" class="w-full h-full" alt="" />
        </div>
        <input @change="onFileSelected" ref="inputController" type="file" class="hidden" id="image" accept="image/*" />
      </div>

      <div class="flex justify-end items-center gap-4 text-sm mx-4 my-4">
        <div @click="router.push({ name: 'adminNews' })"
          class="bg-white border border-black/40 shadow-lg focus:shadow-none hover:shadow-none transition cursor-pointer rounded-full px-4 py-2 flex items-center gap-1">
          <h1>Cancel</h1>
        </div>
        <div @click="saveOrUpdatePost"
          class="bg-light-blue text-white font-semibold border border-light-blue focus:shadow-none hover:shadow-none transition cursor-pointer shadow-lg rounded-full px-4 py-2 flex items-center gap-1">
          <h1>Save</h1>
        </div>
      </div>
    </div>


  </div>

</template>

<script setup>
import AdminTitleComponent from '@/components/admin/adminTitleComponent.vue'
import { useRoute, useRouter } from 'vue-router'
import { useNewsStore } from '@/stores/newsStore'
import { ref, onMounted } from 'vue'
import { useUserStore } from '@/stores/userStore'
import LoadingComponent from '@/components/LoadingComponent.vue'
const inputController = ref(null)

const route = useRoute()
const router = useRouter()
const newsStore = useNewsStore()
const userStore = useUserStore()
const model = ref({
  id: null,
  title: '',
  body: '',
  publish_date: new Date().toISOString().split('T')[0],
  image: null,
  imgFile: null
})

onMounted(() => {
  if (route.params.id) {
    const postId = route.params.id

    if (!newsStore.activities?.data?.length) {
      newsStore.fetchPosts().then(() => {
        model.value = newsStore.getPostById(parseInt(postId))
      })

      return;
    }

    model.value = newsStore.getPostById(parseInt(postId))
  }
})

function saveOrUpdatePost() {

  if (route.params.id) {
    newsStore.updatePost(route.params.id, model.value).then((response) => {
      if (response.status === 200) {
        userStore.setNotification({
          show: true,
          type: 'success',
          message: 'Post updated!'
        })
        router.push({ name: 'adminNews' })
      } else {
        console.error('Error updating post:', response.statusText)
      }
    })
  } else {
    newsStore.createPost(model.value).then((response) => {

      if (response.status === 201) {
        userStore.setNotification({
          show: true,
          type: 'success',
          message: 'New post created!'
        })

        router.push({ name: 'adminNews' })
      }
    })
  }
}

function openFileSelector() {
  inputController.value.click()
}

function onFileSelected(event) {
  const file = event.target.files[0]

  if (file) {
    const reader = new FileReader()
    reader.onload = (e) => {
      model.value.image = e.target.result
    }

    model.value.imgFile = file;
    reader.readAsDataURL(file)

  }
}


</script>
