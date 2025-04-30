<template>
    <div class="flex justify-center items-center h-screen">
        <div class="flex flex-col items-center gap-4 bg-white px-6 py-4 rounded-lg shadow-lg">
            <div class="spinner"></div>
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

.spinner {
    width: 32px;
    height: 32px;
    border: 4px solid rgba(0, 0, 0, 0.1);
    /* Light gray background */
    border-top-color: #3b82f6;
    /* Blue color for the spinner */
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>