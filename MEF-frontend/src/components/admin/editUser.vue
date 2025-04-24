<template>
  <AdminTitleComponent :title="'Manage Editor'"></AdminTitleComponent>
  <div class="flex flex-col gap-4 md:grid md:grid-cols-12 lg:items-start md:gap-6 my-4 mx-6">
    <div class="flex flex-col gap-4 md:col-span-5 md:col-start-2">
      <div class="border-l-4 border-secondary-red pl-2">
        <label for="name" class="text-sm font-semibold">Username:</label>
      </div>

      <input v-model="model.name" type="text"
        class="border border-black/40 focus:outline-none focus:shadow-none transition text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7"
        id="name" placeholder="Enter username" />
    </div>

    <div class="flex flex-col gap-4 md:col-span-5">
      <div class="border-r-4 border-secondary-red pr-2 text-right">
        <label for="email" class="text-sm font-semibold">Email:</label>
      </div>

      <input v-model="model.email" type="mail"
        class="border border-black/40 focus:outline-none focus:shadow-none transition text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7"
        id="email" placeholder="Enter email" />
    </div>

    <div class="flex flex-col gap-4 md:col-span-5 md:col-start-2">
      <div class="border-l-4 border-secondary-red pl-2">
        <label for="password" class="text-sm font-semibold">Password:</label>
      </div>

      <input v-model="model.password" type="password"
        class="border border-black/40 focus:outline-none focus:shadow-none transition text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7"
        id="password" placeholder="Enter password" />
    </div>

    <div class="flex flex-col gap-4 md:col-span-5">
      <div class="border-r-4 border-secondary-red pr-2 text-right">
        <label for="password_confirmation" class="text-sm font-semibold">Confirm Password:</label>
      </div>

      <input v-model="model.password_confirmation" type="password"
        class="border border-black/40 focus:outline-none focus:shadow-none transition text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7"
        id="password_confirmation" placeholder="Enter password again" />
    </div>

    <fieldset class="flex flex-col gap-4 md:col-span-5 md:col-start-2">
      <div class="border-l-4 border-secondary-red pl-2">
        <label for="body" class="text-sm font-semibold">Form Status:</label>
      </div>
      <div>
        <div class="flex items-center gap-x-3">
          <input id="admin" name="role" type="radio" v-model="model.role" value="admin"
            class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden" />
          <label for="admin" class="block text-sm/6 font-semibold text-gray-500">Admin</label>
        </div>
        <div class="flex items-center gap-x-3">
          <input id="editor" value="editor" name="role" type="radio" v-model="model.role"
            class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden" />
          <label for="editor" class="block text-sm/6 font-semibold text-gray-500">Editor</label>
        </div>
      </div>
    </fieldset>

    <div class="flex gap-1 md:col-span-5 md:col-start-7 my-4">
      <div @click.stop="router.push({ name: 'adminEditors' })"
        class="bg-white cursor-pointer border border-black/40 shadow-lg active:shadow-none rounded-full px-4 py-1 w-full flex justify-center items-center gap-1">
        <button>Cancel</button>
      </div>
      <div @click.stop="createOrUpdateUser"
        class="bg-light-blue cursor-pointer text-white font-semibold border border-light-blue active:shadow-none w-full shadow-lg rounded-full px-4 py-1 flex justify-center items-center gap-1">
        <button>Save</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRoute, useRouter } from 'vue-router'
import { useUserStore } from '@/stores/userStore.js'
import { ref, onMounted } from 'vue'
import AdminTitleComponent from '@/components/admin/adminTitleComponent.vue'

const model = ref({
  id: 0,
  name: '',
  email: '',
  role: 'admin',
  password: '',
  password_confirmation: '',
})

const userStore = useUserStore()
const route = useRoute()
const router = useRouter();

onMounted(() => {
  const userId = route.params.id || null

  if (userId) {
    userStore.getUsers().then(() => {
      model.value = userStore.getUserById(parseInt(userId))
    })

  } else {
    return null
  }
})

function createOrUpdateUser() {
  if (!validateInputs()) {
    return
  }

  const userId = route.params.id || null;

  if (userId) {
    userStore.updateUser(model.value).then((response) => {

      if (response.status === 200) {
        // Pop up success message
        userStore.setNotification({
          show: true,
          type: 'success',
          message: 'User updated'
        }, 3000)

        router.push({ name: 'adminEditors' })
      }
    })
  } else {
    userStore.createUser(model.value).then((response) => {

      if (response.status === 201) {
        // Pop up success message
        userStore.setNotification({
          show: true,
          type: 'success',
          message: 'User created'
        }, 3000)

        router.push({ name: 'adminEditors' })
      }
    })
  }

}


function validateInputs() {
  // Check if name is empty
  if (!model.value.name.trim()) {
    userStore.setNotification({
      show: true,
      type: 'error',
      message: 'Name is required',
    })
    return false
  }

  // Check if email is valid
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  if (!emailRegex.test(model.value.email)) {
    userStore.setNotification({
      show: true,
      type: 'error',
      message: 'Invalid email format',
    })
    return false
  }

  // Check password field exist
  if (!model.value.password) {
    userStore.setNotification({
      show: true,
      type: 'error',
      message: 'Password is required',
    })
    return false
  }

  // Check if password is strong
  const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/
  if (model.value.password && !passwordRegex.test(model.value.password)) {
    userStore.setNotification({
      show: true,
      type: 'error',
      message: 'Password must be at least 8 characters long and include letters and numbers',
    })
    return false
  }

  // Check if passwords match
  if (model.value.password !== model.value.password_confirmation) {
    userStore.setNotification({
      show: true,
      type: 'error',
      message: 'Passwords do not match',
    })
    return false
  }

  // Check if role is valid
  if (!['admin', 'editor'].includes(model.value.role)) {
    userStore.setNotification({
      show: true,
      type: 'error',
      message: 'Invalid role selected',
    })
    return false
  }

  return true
}

</script>
