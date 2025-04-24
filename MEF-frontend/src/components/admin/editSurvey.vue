<template>
  <AdminTitleComponent
    :title="route.params.id ? 'Edit Form' : 'Create New Form'"
  ></AdminTitleComponent>

  <div class="mt-6 mx-6 md:mx-[48px] flex flex-col gap-4">
    <div class="flex flex-col gap-4 md:w-[80%]">
      <div class="border-l-4 border-secondary-red pl-2">
        <label for="survey_title" class="text-sm font-semibold">Title:</label>
      </div>
      <input
        v-model="model.title"
        type="text"
        class="border border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7"
        id="survey_title"
        placeholder="Enter title"
      />
    </div>

    <div class="flex flex-col gap-4 md:w-[80%]">
      <div class="border-l-4 border-secondary-red pl-2">
        <label for="body" class="text-sm font-semibold">Form description:</label>
      </div>

      <textarea
        v-model="model.body"
        class="border border-black/40 leading-8 text-sm bg-white shadow-lg rounded-md px-4 py-2"
        id="body"
        placeholder="Enter description"
        rows="2"
      ></textarea>
    </div>

    <fieldset class="flex flex-col gap-4 md:w-[80%]">
      <div class="border-l-4 border-secondary-red pl-2">
        <label for="body" class="text-sm font-semibold">Form Status:</label>
      </div>
      <div>
        <div class="flex items-center gap-x-3">
          <input
            id="active"
            name="status"
            type="radio"
            class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden"
          />
          <label for="active" class="block text-sm/6 font-medium text-gray-900">Active</label>
        </div>
        <div class="flex items-center gap-x-3">
          <input
            id="suspened"
            name="status"
            type="radio"
            class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden"
          />
          <label for="suspened" class="block text-sm/6 font-medium text-gray-900">Suspened</label>
        </div>
      </div>
    </fieldset>

    <prefixQuestionEditor
      v-model="model.id_prefix_question"
      :model="model.id_prefix_question"
    ></prefixQuestionEditor>

    <!-- Question sesstion -->
    <div class="flex justify-between md:w-[80%]">
      <div class="border-l-4 border-secondary-red pl-2 text-right">
        <label for="body" class="text-sm font-semibold">Questions:</label>
      </div>

      <div
        @click.stop="addQuestion"
        class="flex items-center cursor-pointer bg-white border border-black/40 shadow-lg rounded-full px-2 py-1"
      >
        <span class="text-sm font-semibold text-black/60">Add question:</span>
        <svg
          width="16"
          height="16"
          viewBox="0 0 16 16"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M7.922 2.00467L8 2C8.16329 2.00002 8.32089 2.05997 8.44291 2.16848C8.56494 2.27698 8.6429 2.4265 8.662 2.58867L8.66667 2.66667V7.33333H13.3333C13.4966 7.33335 13.6542 7.3933 13.7762 7.50181C13.8983 7.61032 13.9762 7.75983 13.9953 7.922L14 8C14 8.16329 13.94 8.32089 13.8315 8.44291C13.723 8.56494 13.5735 8.6429 13.4113 8.662L13.3333 8.66667H8.66667V13.3333C8.66665 13.4966 8.6067 13.6542 8.49819 13.7762C8.38968 13.8983 8.24017 13.9762 8.078 13.9953L8 14C7.83671 14 7.67911 13.94 7.55709 13.8315C7.43506 13.723 7.3571 13.5735 7.338 13.4113L7.33333 13.3333V8.66667H2.66667C2.50338 8.66665 2.34578 8.6067 2.22375 8.49819C2.10173 8.38968 2.02377 8.24017 2.00467 8.078L2 8C2.00002 7.83671 2.05997 7.67911 2.16848 7.55709C2.27698 7.43506 2.4265 7.3571 2.58867 7.338L2.66667 7.33333H7.33333V2.66667C7.33335 2.50338 7.3933 2.34578 7.50181 2.22375C7.61032 2.10173 7.75983 2.02377 7.922 2.00467Z"
            fill="black"
            opacity="0.5"
          />
        </svg>
      </div>
    </div>

    <QuestionEditor
      v-for="(question, index) in model.questions"
      :key="index"
      :question="question"
      :index="index"
    ></QuestionEditor>
  </div>
</template>

<script setup>
import { useSurveyStore } from '@/stores/surveyStore'
import { useRoute } from 'vue-router'
import { computed, onMounted } from 'vue'
import AdminTitleComponent from '@/components/admin/adminTitleComponent.vue'
import { ref } from 'vue'
import PrefixQuestionEditor from '@/components/prefixQuestionEditor.vue'
import QuestionEditor from './questionEditor.vue'
import { v4 as uuidv4 } from 'uuid'
const route = useRoute()

const model = ref({
  title: '',
  id: '',
  version: 1,
  description: '',
  created_at: '',
  committee: '',
  statementNo: '',
  status: 0,
  id_prefix_question: {
    question: '',
    description: '',
    type: 'radio',
    options: [],
  },
  questions: [
    {
      id: '',
      question: '',
      type: 'text',
      description: '',
      data: {
        options: [],
      },
    },
  ],
})

function addQuestion(index) {
  const newQuestion = {
    id: uuidv4(),
    question: null,
    type: 'text',
    description: null,
    data: {
      options: [],
    },
  }
  model.value.questions.splice(index, 0, newQuestion)
}
</script>
