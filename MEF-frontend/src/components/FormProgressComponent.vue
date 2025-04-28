<template>
    <div class="mx-4 mt-8 space-y-2">

        <h1 class="text-xs text-white font-medium italic text-right">{{ props.progressData.answered }}/{{
            props.progressData.total
            }}
            questions remained!</h1>
        <div class="w-full bg-gray-300 rounded-full h-2">
            <div class="bg-[#A087F4] h-2 rounded-full transition-all"
                :style="{ width: props.progressData.percentage + '%' }">
            </div>
        </div>
        <h1 class="text-xs text-white font-medium italic text-left">Complete {{ props.progressData.percentage }} %</h1>
    </div>
</template>

<script setup>
import { ref } from 'vue'


const props = defineProps({
    progressData: {
        type: Object,
        required: true
    }
})
</script>