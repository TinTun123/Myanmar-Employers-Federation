<template>
    <teleport to="body">
        <div v-if="userStore.popUp.show" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-96 mx-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">{{ userStore.popUp.title }}</h2>
                <p class="text-sm text-gray-600 mb-6">{{ userStore.popUp.message }}</p>
                <div class="flex justify-end gap-4">
                    <button @click="userStore.popUp.onCancel"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                        Cancel
                    </button>
                    <button @click="userStore.popUp.onConfirm"
                        class="px-4 py-2 bg-light-blue text-white rounded hover:bg-blue-600">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </teleport>
</template>

<script setup>
import { useUserStore } from '@/stores/userStore'
import { computed, onMounted } from 'vue';

const userStore = useUserStore();

// function handleConfirm() {
//     if (popup.onConfirm) popup.onConfirm()
//     closePopup()
// }

// function handleCancel() {
//     if (popup.onCancel) popup.onCancel()
//     closePopup()
// }

</script>

<style scoped>
/* Add any additional styles if needed */
</style>