<template>
  <div class="bg-secondary-red">
    <div
      class="flex justify-between items-start bg-secondary-red pt-4 px-4 md:px-12 lg:w-[800px] lg:mx-auto lg:pt-8 lg:pb-4 lg:px-0 lg:flex-row lg:flex-col lg:gap-4">
      <div class="flex flex-col self-center gap-4">
        <!-- Logo -->
        <span class="text-white text-center text-xs md:text-base font-semibold">Myanmar Employers Federation</span>
        <div class="flex justify-center items-center">
          <img class="w-[80px] h-[80px] rounded-full" src="../assets/mef logo.jpeg" alt="" />
        </div>
      </div>

      <div class="flex flex-col gap-4 text-xs md:text-sm text-white lg:grid lg:grid-cols-3 lg:gap-8 self-center">
        <!-- Action button -->
        <!-- <RouterLink class="border-r-2 border-white pr-2" :to="{ name: 'home' }">Home</RouterLink> -->
        <RouterLink class="border-r-2 border-white pr-2" :to="{ name: 'activities' }">Activities & News
        </RouterLink>
        <RouterLink class="border-r-2 border-white pr-2" :to="{ name: 'activities' }">About MEF</RouterLink>
        <RouterLink class="border-r-2 border-white pr-2" :to="{ name: 'activities' }">Statements</RouterLink>
        <RouterLink class="border-r-2 border-white pr-2" :to="{ name: 'activities' }">Violation reports
        </RouterLink>
        <RouterLink v-if="!isLogin" class="border-r-2 border-white pr-2" :to="{ name: 'login' }">
          Admin login
        </RouterLink>
        <h3 v-else @click.stop="logout" class="border-r-2 border-white pr-2">Logout</h3>
      </div>
    </div>
    <div class="text-center text-[10px] text-white py-2">
      <span>Copyright © 2025 Myanmar Employers Federation. All rights reserved.</span>
    </div>
  </div>
</template>

<script setup>
import { useUserStore } from '@/stores/userStore';
import { computed } from 'vue';
import { useRouter } from 'vue-router';


const userStore = useUserStore();
const router = useRouter();

const isLogin = computed(() => {
  return userStore.isUserLoginIn();
})

function logout() {
  userStore.logout().then((response) => {
    // Pop up success message
    router.push({ name: 'login' });
  });


}
</script>
