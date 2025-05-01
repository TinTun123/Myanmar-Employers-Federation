<template>
    <div
        class="flex items-center justify-between text-sm text-black/70 px-4 py-3 border-t mb-0 border-[#505050]/40 cursor-pointer hover:bg-[#505050]/60 transition hover:text-white">
        <h3 class="text-xs font-semibold">{{ props.response.case_id }}</h3>
        <h3 class="text-xs font-semibold">{{ props.response.created_at }}</h3>
    </div>
    <transition name="dropdown" enter-active-class="transition-all ease-out duration-900"
        leave-active-class="transition-all ease-in duration-800">
        <div v-if="props.response.id === surveyStore.selectedresponseId" class="text-sm text-white bg-[#505050]">
            <QuestionAndAnswerTable :responseId="props.response.id"></QuestionAndAnswerTable>
        </div>
    </transition>


</template>

<script setup>
import QuestionAndAnswerTable from '@/components/admin/QuestionAndAnswerTable.vue'
import { ref } from 'vue'
import { useSurveyStore } from '@/stores/surveyStore.js'
const surveyStore = useSurveyStore()
const props = defineProps({
    response: {
        type: Object,
        required: true
    }
})

</script>

<style>
.dropdown-enter-from,
.dropdown-leave-to {
    height: 0;
}

.dropdown-enter-to,
.dropdown-leave-from {
    height: auto;
}
</style>