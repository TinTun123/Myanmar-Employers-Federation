<template>
  <div class="flex flex-col gap-4 md:w-[80%] border-b-2 border-light-green pb-4">
    <!-- Number and Delete icon -->
    <div class="flex justify-between items-center">
      <div class="flex items-center gap-2">
        <span class="text-sm font-bold">Q{{ props.index + 1 }}.</span>
        <h1 class="text-sm font-semibold line-clamp-1 leading-6">{{ model.question_text }}</h1>
      </div>

      <button @click.stop="deleteQuestion"
        class="flex items-center transition gap-2 px-2 py-1 rounded-full group cursor-pointer hover:bg-[#F3462B] border border-[#F3462B] text-xs text-[#F3462B]">
        <span class="text-[#F3462B] group-hover:text-white text-xs">Delete</span>
        <svg class="fill-[#F3462B] opacity-60 group-hover:fill-white group-hover:opacity-100" width="12" height="12"
          viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M12 0.666667H9L8.14286 0H3.85714L3 0.666667H0V2H12M0.857143 10.6667C0.857143 11.0203 1.03775 11.3594 1.35925 11.6095C1.68074 11.8595 2.11677 12 2.57143 12H9.42857C9.88323 12 10.3193 11.8595 10.6408 11.6095C10.9622 11.3594 11.1429 11.0203 11.1429 10.6667V2.66667H0.857143V10.6667Z" />
        </svg>
      </button>
    </div>

    <!-- type select -->
    <div>
      <div class="flex justify-between items-center gap-2 md:w-[45%]">
        <label :for="'type_' + model.id" name="type" class="text-xs md:text-sm font-semibold">Select Question
          Type:</label>

        <div class="flex items-center gap-1 px-2 py-1 rounded-full border border-gray-600">
          <input type="checkbox" :id="'isRequired_' + model.id" name="isRequired" v-model="model.is_required"
            @change="dataChange"
            class="appearance-none w-3 h-3 text-light-blue border border-gray-600 rounded-full focus:outline-none checked:bg-light-blue checked:border-light-blue cursor-pointer" />
          <label :for="'isRequired_' + model.id" class="text-xs md:text-xs font-semibold text-gray-600">Required</label>
        </div>
      </div>
      <div class="mt-2 md:w-[45%] relative">
        <select :id="'type_' + model.id" name="type" autocomplete="Question type" v-model="model.type"
          @change="typeChange"
          class="appearance-none w-full focus:outline-none rounded-md bg-white text-sm text-gray-900 sm:text-sm/6 text-xs md:text-sm border border-gray-600 shadow-sm px-2 leading-7">
          <option v-for="(type, index) in surveyStore.questionTypes" :key="index" :value="type">
            {{ upperCaseFirst(type) }}
          </option>
        </select>

        <div class="w-4 h-4 absolute top-1/2 right-3 -translate-y-1/2 pointer-events-none">
          <svg class="text-gray-500 sm:size-4 w-full h-full" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"
            data-slot="icon">
            <path fill-rule="evenodd"
              d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
              clip-rule="evenodd" />
          </svg>
        </div>
      </div>
    </div>

    <!-- Question text input -->
    <div class="flex flex-col gap-2 md:gap-4 md:w-[60%]">
      <label :for="'question_text_' + model.id" class="text-xs md:text-sm font-semibold">Question Text:</label>

      <input v-model="model.question_text" @change="dataChange" type="text"
        class="border border-black/40 text-sm bg-white shadow-lg rounded-md px-2 py-1 focus:outline-none leading-7"
        :id="'question_text_' + model.id" placeholder="Enter title" />
    </div>

    <!-- Description -->
    <div class="flex flex-col gap-2 md:gap-4 md:w-[80%]">
      <div>
        <label :for="'question_desc_' + model.id" class="text-xs md:text-sm font-semibold">Description:</label>
      </div>

      <textarea v-model="model.description" @change="dataChange"
        class="border border-black/40 leading-8 text-sm bg-white shadow-lg rounded-md px-4 py-2"
        :id="'question_desc_' + model.id" placeholder="Enter title" rows="2"></textarea>
    </div>

    <!-- Option session -->
    <div v-if="shouldHaveOption()" class="flex flex-col gap-4 md:w-[80%]">
      <!-- If option type (add option button) -->
      <div class="flex items-center justify-between">
        <span class="text-xs md:text-sm font-semibold">Options</span>
        <div class="flex items-center gap-2">
          <div @click.stop="addOtherOption"
            class="flex items-center gap-2 px-2 py-1 rounded-full border border-gray-600 shadow-lg cursor-pointer hover:bg-gray-100 transition active:bg-gray-200 active:shadow-none">
            <span class="text-xs text-gray-500 font-semibold">Add other</span>
          </div>
          <div @click="addOption"
            class="bg-white border border-black/40 shadow-lg rounded-full px-3 py-1 cursor-pointer flex items-center">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M7.922 2.00467L8 2C8.16329 2.00002 8.32089 2.05997 8.44291 2.16848C8.56494 2.27698 8.6429 2.4265 8.662 2.58867L8.66667 2.66667V7.33333H13.3333C13.4966 7.33335 13.6542 7.3933 13.7762 7.50181C13.8983 7.61032 13.9762 7.75983 13.9953 7.922L14 8C14 8.16329 13.94 8.32089 13.8315 8.44291C13.723 8.56494 13.5735 8.6429 13.4113 8.662L13.3333 8.66667H8.66667V13.3333C8.66665 13.4966 8.6067 13.6542 8.49819 13.7762C8.38968 13.8983 8.24017 13.9762 8.078 13.9953L8 14C7.83671 14 7.67911 13.94 7.55709 13.8315C7.43506 13.723 7.3571 13.5735 7.338 13.4113L7.33333 13.3333V8.66667H2.66667C2.50338 8.66665 2.34578 8.6067 2.22375 8.49819C2.10173 8.38968 2.02377 8.24017 2.00467 8.078L2 8C2.00002 7.83671 2.05997 7.67911 2.16848 7.55709C2.27698 7.43506 2.4265 7.3571 2.58867 7.338L2.66667 7.33333H7.33333V2.66667C7.33335 2.50338 7.3933 2.34578 7.50181 2.22375C7.61032 2.10173 7.75983 2.02377 7.922 2.00467Z"
                fill="black" opacity="0.5" />
            </svg>
          </div>
        </div>

      </div>

      <div v-if="model.data.options.length === 0"
        class="text-xs md:text-sm font-semibold text-black/40 text-center py-4">
        <span>No option created yet!</span>
      </div>

      <div v-else>
        <div class="flex flex-col gap-4 md:w-[80%]">
          <div v-for="(option, index) in model.data.options" :key="index" class="flex items-center gap-4">
            <span class="text-xs md:text-sm font-semibold">{{ index + 1 }}.</span>
            <input type="text" v-model="option.text" @change="dataChange"
              class="border border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-1 w-full" />
            <svg @click="removeOption(option)" width="16" height="16" viewBox="0 0 12 12" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M12 0.666667H9L8.14286 0H3.85714L3 0.666667H0V2H12M0.857143 10.6667C0.857143 11.0203 1.03775 11.3594 1.35925 11.6095C1.68074 11.8595 2.11677 12 2.57143 12H9.42857C9.88323 12 10.3193 11.8595 10.6408 11.6095C10.9622 11.3594 11.1429 11.0203 11.1429 10.6667V2.66667H0.857143V10.6667Z"
                fill="#F3462B" fill-opacity="0.6" />
            </svg>
          </div>
          <transition name="fade" appear>
            <div v-if="model.data.other_option" class="flex items-center gap-4">
              <span class="text-xs md:text-sm font-semibold">{{ model.data.options.length + 1 }}.</span>
              <input type="text" v-model="model.data.other_text" @change="dataChange" disabled
                placeholder="Other option"
                class="border border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-1 w-full" />
            </div>
          </transition>

        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useSurveyStore } from '@/stores/surveyStore'
import { ref } from 'vue'
import { v4 as uuidv4 } from 'uuid'

const props = defineProps({
  question: {
    type: Object,
    required: false,
  },
  index: {
    type: Number,
    required: false,
  },
})

const surveyStore = useSurveyStore()

const emits = defineEmits(['change', 'addQuestion', 'deleteQuestion'])

const model = ref({
  ...JSON.parse(JSON.stringify(props.question)),
  is_required: props.question.is_required === 1, // Convert '1' to true
  data:
    typeof props.question.data === 'string' ? JSON.parse(props.question.data) : props.question.data,
})

function dataChange() {
  const data = JSON.parse(JSON.stringify(model.value))

  if (!shouldHaveOption()) {
    data.data.options = []
  }

  emits('change', data)
}

function deleteQuestion() {
  emits('deleteQuestion', props.question);
}

function shouldHaveOption() {
  return ['select', 'radio', 'checkbox'].includes(model.value.type) ? true : false
}

function upperCaseFirst(str) {
  return str.charAt(0).toUpperCase() + str.slice(1)
}

function typeChange() {
  if (shouldHaveOption()) {
    setOptions(getOptions() || [])
  }

  dataChange()
}

function getOptions() {
  return model.value.data.options
}

function setOptions(options) {
  model.value.data.options = options
}

function addOption() {
  setOptions([...getOptions(), { text: '', uuid: uuidv4() }])
  dataChange()
  console.log(model.value.data.options)
}

function removeOption(option) {
  setOptions(
    getOptions().filter((opt) => {
      return opt.uuid !== option.uuid
    }),
  )

  dataChange()
}

function addOtherOption() {
  if (model.value.data.other_option) {
    model.value.data.other_option = false
  } else {
    model.value.data.other_option = true
  }
  dataChange()
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active,
.fade-appear-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-appear-from {
  opacity: 0;
}

.fade-leave-to {
  opacity: 0;
}
</style>