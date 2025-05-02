<template>
    <div v-if="notification.show"
        class="fixed animate-fade-in-down rounded-full w-auto left-4 bottom-4 py-2 px-4 text-white"
        :class="[notification.type === 'success' ? 'bg-emerald-500' : 'bg-red-500']">
        <div v-if="notification.isUpload" class="spinner"></div>
        {{ notification.message }}
    </div>
</template>

<script setup>
import { useUserStore } from '@/stores/userStore';
import { computed } from 'vue';


const userStore = useUserStore();

const notification = computed(() => {
    return userStore.notification;
})
</script>


<style>
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
