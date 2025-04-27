<template>
  <AdminTitleComponent :title="route.params.id ? 'Edit Statement' : 'Create Statement'"></AdminTitleComponent>

  <div class="mt-6 mx-6 md:mx-[48px] flex flex-col gap-4">
    <div class="flex flex-col gap-4 md:w-[80%]">
      <div class="border-l-2 border-secondary-red pl-2">
        <label for="title" class="text-sm font-semibold">Title:</label>
      </div>
      <input v-model="model.title" type="text"
        class="border border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7" id="title"
        placeholder="Enter title" />
    </div>

    <div class="flex flex-col items-end self-end gap-4 md:w-[60%]">
      <div class="border-r-2 border-secondary-red pr-2 text-right">
        <label for="date" class="text-sm font-semibold">Publish date:</label>
      </div>

      <input v-model="model.date" type="date" id="date"
        class="border self-end border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7 focus:outline-none focus:ring-2 focus:ring-light-blue focus:border-light-blue"
        placeholder="Select a date" />
    </div>

    <div class="flex flex-col gap-4 md:w-[60%]">
      <div class="border-l-2 border-secondary-red pl-2">
        <label for="committee" class="text-sm font-semibold">Committee:</label>
      </div>

      <input v-model="model.committee" type="text"
        class="border border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7" id="committee"
        placeholder="Enter committee name" />
    </div>

    <div class="flex flex-col self-end gap-4 md:w-[60%] text-right">
      <div class="border-r-2 border-secondary-red pr-2">
        <label for="StatementNo" class="text-sm font-semibold">Statement No:</label>
      </div>

      <input v-model="model.statement_no" type="text"
        class="border border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7" id="StatementNo"
        placeholder="Enter Statement No" />
    </div>

    <div class="flex flex-col gap-4 md:w-[80%]">
      <div class="border-l-2 border-secondary-red pl-2">
        <label for="body" class="text-sm font-semibold">Body:</label>
      </div>

      <textarea v-model="model.body"
        class="border border-black/40 leading-8 text-sm bg-white shadow-lg rounded-md px-4 py-2" id="body"
        placeholder="Enter title" rows="10"></textarea>
    </div>

    <div class="flex justify-between md:w-[80%]">
      <input @change="onFileSelected" ref="inputController" type="file" class="hidden" id="image" accept="image/*" />
      <div class="border-l-2 border-secondary-red pl-2">
        <label for="image" class="text-sm font-semibold">Upload images:</label>
      </div>
      <div @click.stop="openFileSelector"
        class="flex gap-2 items-center bg-secondary-red text-white border border-black/40 shadow-lg rounded-full px-2 py-1 cursor-pointer">
        <div class="w-4 h-4">
          <svg class="w-full h-full" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M19 2.375C14.6073 2.4283 10.4096 4.19697 7.30328 7.30328C4.19697 10.4096 2.4283 14.6073 2.375 19C2.4283 23.3927 4.19697 27.5904 7.30328 30.6967C10.4096 33.803 14.6073 35.5717 19 35.625C23.3927 35.5717 27.5904 33.803 30.6967 30.6967C33.803 27.5904 35.5717 23.3927 35.625 19C35.5717 14.6073 33.803 10.4096 30.6967 7.30328C27.5904 4.19697 23.3927 2.4283 19 2.375ZM28.5 20.1875H20.1875V28.5H17.8125V20.1875H9.5V17.8125H17.8125V9.5H20.1875V17.8125H28.5V20.1875Z"
              fill="#ffffff" />
          </svg>
        </div>
        <span class="text-sm">image</span>
      </div>
    </div>

    <div class="md:w-[80%] mt-4">
      <div v-if="model.images.length === 0" class="flex justify-center items-center">
        <span class="text-sm">No statement images added yet!</span>
      </div>

      <div v-else class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div v-for="(image, index) in model.images" :key="index"
          class="relative bg-white border border-black/40 shadow-lg rounded-md overflow-hidden">
          <img :src="image" alt="Image preview" class="w-full h-auto rounded-md" />
          <div @click.stop="onFileRemove(index)"
            class="absolute top-2 right-2 p-1 bg-black/80 rounded-full cursor-pointer w-6 h-6">
            <svg class="w-full h-full" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M17.6593 1.15895C17.8659 0.940458 18.1143 0.765619 18.3897 0.64476C18.6651 0.523902 18.9619 0.459478 19.2626 0.455296C19.5633 0.451114 19.8618 0.507259 20.1405 0.620413C20.4191 0.733567 20.6722 0.901432 20.8849 1.11409C21.0975 1.32674 21.2654 1.57987 21.3786 1.85851C21.4917 2.13716 21.5479 2.43565 21.5437 2.73637C21.5395 3.03708 21.4751 3.3339 21.3542 3.60929C21.2333 3.88467 21.0585 4.13304 20.84 4.3397L14.2475 10.9322C14.2388 10.9409 14.2319 10.9513 14.2271 10.9626C14.2224 10.974 14.22 10.9862 14.22 10.9986C14.22 11.0109 14.2224 11.0231 14.2271 11.0345C14.2319 11.0459 14.2388 11.0562 14.2475 11.0649L20.84 17.6574C21.0518 17.8657 21.2202 18.1139 21.3356 18.3876C21.4509 18.6613 21.511 18.9551 21.5122 19.2521C21.5135 19.5491 21.4559 19.8434 21.3428 20.1181C21.2297 20.3927 21.0634 20.6423 20.8534 20.8523C20.6434 21.0624 20.3939 21.2288 20.1193 21.3419C19.8447 21.455 19.5503 21.5127 19.2533 21.5115C18.9563 21.5103 18.6625 21.4504 18.3888 21.3351C18.115 21.2198 17.8669 21.0514 17.6585 20.8397L11.066 14.2472C11.0573 14.2385 11.047 14.2315 11.0356 14.2268C11.0242 14.2221 11.012 14.2197 10.9996 14.2197C10.9873 14.2197 10.9751 14.2221 10.9637 14.2268C10.9523 14.2315 10.942 14.2385 10.9333 14.2472L4.34077 20.8397C4.13249 21.0514 3.88435 21.2199 3.61066 21.3352C3.33696 21.4506 3.04313 21.5106 2.74612 21.5119C2.44911 21.5131 2.15479 21.4556 1.88014 21.3425C1.60548 21.2294 1.35594 21.0631 1.14589 20.8531C0.935845 20.6431 0.769454 20.3936 0.656318 20.119C0.543181 19.8443 0.485538 19.55 0.486712 19.253C0.487886 18.956 0.547855 18.6622 0.66316 18.3884C0.778464 18.1147 0.946822 17.8665 1.15852 17.6582L7.75102 11.0657C7.75975 11.057 7.76668 11.0466 7.77141 11.0353C7.77613 11.0239 7.77857 11.0117 7.77857 10.9993C7.77857 10.987 7.77613 10.9748 7.77141 10.9634C7.76668 10.952 7.75975 10.9417 7.75102 10.9329L1.15852 4.34045C0.742192 3.91738 0.5099 3.34694 0.512247 2.75338C0.514594 2.15982 0.751389 1.59123 1.17105 1.17147C1.59071 0.751709 2.15925 0.51478 2.7528 0.512294C3.34636 0.509807 3.91686 0.741964 4.34002 1.1582L10.9325 7.7507C10.9412 7.75943 10.9516 7.76635 10.963 7.77108C10.9744 7.77581 10.9866 7.77824 10.9989 7.77824C11.0112 7.77824 11.0234 7.77581 11.0348 7.77108C11.0462 7.76635 11.0566 7.75943 11.0653 7.7507L17.6593 1.15895Z"
                fill="white" />
            </svg>
          </div>
        </div>
      </div>
    </div>

    <div class="flex justify-end items-center gap-4 text-sm mx-4 my-4">
      <div @click="router.push({ name: 'adminStatements' })"
        class="bg-white border border-black/40 shadow-lg focus:shadow-none hover:shadow-none transition cursor-pointer rounded-full px-4 py-2 flex items-center gap-1">
        <h3>Cancel</h3>
      </div>
      <div @click="saveOrUpdateStatement"
        class="bg-light-blue text-white font-semibold border border-light-blue focus:shadow-none hover:shadow-none transition cursor-pointer shadow-lg rounded-full px-4 py-2 flex items-center gap-1">
        <h3>Save</h3>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRoute, useRouter } from 'vue-router'
import { useNewsStore } from '@/stores/newsStore'
import { ref, onMounted, watch } from 'vue'
import AdminTitleComponent from '@/components/admin/adminTitleComponent.vue'
import { useUserStore } from '@/stores/userStore'

const route = useRoute()
const router = useRouter()
const inputController = ref(null)
const newsStore = useNewsStore()
const userStore = useUserStore()

const model = ref({
  title: '',
  date: new Date().toISOString().split('T')[0], // Set to current date in YYYY-MM-DD format
  committee: '',
  statement_no: '',
  body: '',
  images: [],
  imageFiles: []
})

onMounted(() => {
  fetchStatements()
})

watch(() => route.params.id, (newId) => {
  if (newId) {
    model.value = newsStore.getStatementById(parseInt(newId))
  }
})

function fetchStatements() {
  const postId = route.params.id
  if (postId) {
    if (newsStore.statements?.data?.length) {
      model.value = newsStore.getStatementById(parseInt(postId))
      return;
    } else {
      newsStore.fetchStatements().then(() => {
        model.value = newsStore.getStatementById(parseInt(postId))
      });
    }
  }

}

function openFileSelector() {
  inputController.value.click()
}

function onFileSelected(event) {

  const file = event.target.files[0]
  if (file) {
    model.value.imageFiles.push(file);
    const reader = new FileReader()
    reader.onload = (e) => {
      model.value.images.push(e.target.result)
    }
    reader.readAsDataURL(file)
  }
  event.target.value = '';
}

function onFileRemove(index) {
  model.value.images.splice(index, 1)
  model.value.imageFiles.splice(index, 1)
}

function saveOrUpdateStatement() {
  if (route.params.id) {


    newsStore.updateStatement(route.params.id, model.value).then((response) => {
      if (response.status === 200) {
        userStore.setNotification({
          show: true,
          type: 'success',
          message: 'Statement updated successfully!',
        })
      } else {
        userStore.setNotification({
          show: true,
          type: 'error',
          message: 'Failed to update statement.',
        })
      }
      router.push({ name: 'adminStatements' })
    })
  } else {
    newsStore.createStatement(model.value).then((response) => {
      if (response.status === 201) {
        userStore.setNotification({
          show: true,
          type: 'success',
          message: 'New statement created successfully!',
        })
      } else {
        userStore.setNotification({
          show: true,
          type: 'error',
          message: 'Failed to create statement.',
        })
      }
      router.push({ name: 'adminStatements' })
    })
  }
}
</script>
