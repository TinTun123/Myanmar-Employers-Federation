<template>
    <div class="flex justify-center items-center h-screen">
        <div class="flex flex-col items-center gap-4 bg-white px-6 py-4 rounded-lg shadow-lg">
            <svg class="animate-spin h-8 w-8 text-light-blue" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
            </svg>
            <p class="text-sm font-medium text-gray-700">{{ loading.message }}</p>
        </div>
    </div>
</template>

<script setup>
import { useUserStore } from '@/stores/userStore';
import { reactive } from 'vue'

const userStore = useUserStore();
const loading = reactive(userStore.loading)

</script>

<style scoped>
/* Add any additional styles if needed */
</style>