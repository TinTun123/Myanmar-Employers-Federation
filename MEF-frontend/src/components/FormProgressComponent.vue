<template>
    <div class="mx-4 mt-8 space-y-2">
        <h1 class="text-xs text-white font-medium italic text-right">3/15 questions remained!</h1>
        <div class="w-full bg-gray-300 rounded-full h-2">
            <div class="bg-[#A087F4] h-2 rounded-full transition-all" :style="{ width: progressPercentage + '%' }">
            </div>
        </div>
        <h1 class="text-xs text-white font-medium italic text-left">Complete 78 %</h1>
    </div>
</template>

<script setup>
import { ref } from 'vue'
const progressPercentage = ref(70)
</script>