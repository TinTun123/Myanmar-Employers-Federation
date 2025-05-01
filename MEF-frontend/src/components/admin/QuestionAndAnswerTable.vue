<template>
    <div class="flex gap-x-4 items-center justify-center p-2">
        <div class="flex-1 gap-2">
            <h3 class="">Question No.</h3>
        </div>

        <div class="flex-3 border-l border-white/40">
            <h3 class="text-right">Answers</h3>
        </div>
    </div>
    <!-- Loading icon -->
    <div v-if="loading" class="flex justify-center items-center bg-[#E7E7E7] p-8">
        <div class="flex flex-col items-center gap-4 bg-white px-2 py-2 rounded-lg shadow-lg">
            <div class="spinner"></div>
            <p class="text-sm font-medium text-gray-700">Loading anawers...</p>
        </div>
    </div>
    <div v-else-if="model.questions.length === 0 && !loading" class="flex justify-center items-center bg-[#E7E7E7] p-8">
        <p class="text-sm font-medium text-gray-700">No answers available.</p>
    </div>
    <div v-else>
        <div v-for="(question, index) in model.questions" :key="index" @click.stop="setQandA(question, index)"
            class="bg-[#E7E7E7] flex gap-x-4 items-center justify-center p-2 text-black/70 cursor-pointer hover:bg-[#E7E7E7]/60 transition hover:text-white">
            <div class="flex-1 shrink-0 gap-2">
                <h3 class="">Q{{ index + 1 }}.</h3>
            </div>

            <div v-if="question.question_type !== 'file'" class="flex-3 border-l border-gray/40">
                <h3 class="text-right line-clamp-2">{{ question.answer }}</h3>
            </div>

            <div v-else class="flex-3  border-l border-gray/40">
                <div class="flex justify-end items-center gap-2">
                    <div v-for="(filePath, index) in question.answer" :key="index"
                        class="bg-white rounded-lg p-2 border border-[#E5E7EB]/60">
                        <a @click.prevent="downloadFile(filePath)" rel="noopener noreferrer"
                            class="text-xs text-gray-600 font-semibold hover:underline">
                            {{ getFileName(filePath) }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <transition name="fade">
        <teleport to="body">
            <div v-if="questionAnswer.question" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg w-96 mx-4 relative">
                    <div @click.stop="unsetQuestionAnswer" class="absolute top-2 right-2 w-4 h-4 cursor-pointer">
                        <svg class="w-full h-full" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.6593 1.15895C17.8659 0.940458 18.1143 0.765619 18.3897 0.64476C18.6651 0.523902 18.9619 0.459478 19.2626 0.455296C19.5633 0.451114 19.8618 0.507259 20.1405 0.620413C20.4191 0.733567 20.6722 0.901432 20.8849 1.11409C21.0975 1.32674 21.2654 1.57987 21.3786 1.85851C21.4917 2.13716 21.5479 2.43565 21.5437 2.73637C21.5395 3.03708 21.4751 3.3339 21.3542 3.60929C21.2333 3.88467 21.0585 4.13304 20.84 4.3397L14.2475 10.9322C14.2388 10.9409 14.2319 10.9513 14.2271 10.9626C14.2224 10.974 14.22 10.9862 14.22 10.9986C14.22 11.0109 14.2224 11.0231 14.2271 11.0345C14.2319 11.0459 14.2388 11.0562 14.2475 11.0649L20.84 17.6574C21.0518 17.8657 21.2202 18.1139 21.3356 18.3876C21.4509 18.6613 21.511 18.9551 21.5122 19.2521C21.5135 19.5491 21.4559 19.8434 21.3428 20.1181C21.2297 20.3927 21.0634 20.6423 20.8534 20.8523C20.6434 21.0624 20.3939 21.2288 20.1193 21.3419C19.8447 21.455 19.5503 21.5127 19.2533 21.5115C18.9563 21.5103 18.6625 21.4504 18.3888 21.3351C18.115 21.2198 17.8669 21.0514 17.6585 20.8397L11.066 14.2472C11.0573 14.2385 11.047 14.2315 11.0356 14.2268C11.0242 14.2221 11.012 14.2197 10.9996 14.2197C10.9873 14.2197 10.9751 14.2221 10.9637 14.2268C10.9523 14.2315 10.942 14.2385 10.9333 14.2472L4.34077 20.8397C4.13249 21.0514 3.88435 21.2199 3.61066 21.3352C3.33696 21.4506 3.04313 21.5106 2.74612 21.5119C2.44911 21.5131 2.15479 21.4556 1.88014 21.3425C1.60548 21.2294 1.35594 21.0631 1.14589 20.8531C0.935845 20.6431 0.769454 20.3936 0.656318 20.119C0.543181 19.8443 0.485538 19.55 0.486712 19.253C0.487886 18.956 0.547855 18.6622 0.66316 18.3884C0.778464 18.1147 0.946822 17.8665 1.15852 17.6582L7.75102 11.0657C7.75975 11.057 7.76668 11.0466 7.77141 11.0353C7.77613 11.0239 7.77857 11.0117 7.77857 10.9993C7.77857 10.987 7.77613 10.9748 7.77141 10.9634C7.76668 10.952 7.75975 10.9417 7.75102 10.9329L1.15852 4.34045C0.742192 3.91738 0.5099 3.34694 0.512247 2.75338C0.514594 2.15982 0.751389 1.59123 1.17105 1.17147C1.59071 0.751709 2.15925 0.51478 2.7528 0.512294C3.34636 0.509807 3.91686 0.741964 4.34002 1.1582L10.9325 7.7507C10.9412 7.75943 10.9516 7.76635 10.963 7.77108C10.9744 7.77581 10.9866 7.77824 10.9989 7.77824C11.0112 7.77824 11.0234 7.77581 11.0348 7.77108C11.0462 7.76635 11.0566 7.75943 11.0653 7.7507L17.6593 1.15895Z"
                                fill="black" />
                        </svg>

                    </div>
                    <div
                        class="bg-primary-red/80 text-sm text-white text-center p-2 rounded-br-lg inline-flex items-center gap-2">
                        Question 0{{ questionAnswer.index + 1 }}.
                    </div>
                    <h2 class="text-sm font-semibold text-gray-700 mb-4 leading-7 m-4">{{ questionAnswer.question }}
                    </h2>
                    <p class="text-sm text-gray-600 m-4 overflow-y-scroll max-h-[40vh]"><span
                            class="text-gray-800 font-medium">Answer:</span>{{ questionAnswer.answer }}</p>

                </div>
            </div>
        </teleport>
    </transition>
</template>

<script setup>

import { ref, onMounted, watch } from 'vue'
import { useSurveyStore } from '@/stores/surveyStore.js'
import LoadingComponent from '@/components/LoadingComponent.vue'
import { useUserStore } from '@/stores/userStore.js'
import { axiosClient } from '@/axios'

const surveyStore = useSurveyStore()
const userStore = useUserStore()
const props = defineProps({
    responseId: {
        type: Number,
        required: true
    },
})

const questionAnswer = ref({
    question: null,
    answer: null,
    index: null
})

const model = ref({
    questions: []
})

const loading = ref(false)

// Watch for changes to responseId and fetch data when it changes
watch(
    () => props.responseId,
    (newResponseId) => {
        if (model.value.questions.length > 0) {
            return // Prevent redundant API calls if data is already loaded
        }
        loading.value = true // Set loading to true when fetching data
        surveyStore.getResponse(newResponseId).then((response) => {
            loading.value = false // Set loading to false when data is fetched
            model.value = response.data
        })
    },
    { immediate: true } // Run the watcher immediately when the component is mounted
)

function setQandA(question, index) {
    questionAnswer.value.question = question.question
    questionAnswer.value.answer = question.answer
    questionAnswer.value.index = index
}

function unsetQuestionAnswer() {
    questionAnswer.value = {}
}

function getFileName(url) {
    // Use JavaScript's split() method to extract the last part of the URL
    return url.split('/').pop();
}

function downloadFile(filePath) {
    // Encrypt the file path and send a request to the backend
    axiosClient.get('/download-file', {
        params: {
            path: filePath, // Pass the encrypted file path
        },
        responseType: 'blob', // Ensure the response is treated as a file
    })
        .then((response) => {
            // Create a temporary link to download the file
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement('a');
            link.href = url;

            // Extract the file name from the path
            link.download = getFileName(filePath);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        })
        .catch((error) => {
            console.error('Error downloading the file:', error);
            alert('Failed to download the file.');
        });
}


</script>

<style>
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