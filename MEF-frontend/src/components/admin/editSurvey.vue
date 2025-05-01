<template>
  <AdminTitleComponent :title="route.params.id ? 'Edit Form' : 'Create New Form'"></AdminTitleComponent>

  <div class="mt-6 mx-6 md:mx-[48px] flex flex-col gap-4">
    <div class="flex flex-col gap-4 md:w-[80%]">
      <div class="border-l-4 border-secondary-red pl-2">
        <label for="survey_title" class="text-sm font-semibold">Title:</label>
      </div>
      <input v-model="model.title" type="text"
        class="border border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7" id="survey_title"
        placeholder="Enter title" />
    </div>

    <div class="flex flex-col gap-4 md:w-[80%]">
      <div class="border-l-4 border-secondary-red pl-2">
        <label for="body" class="text-sm font-semibold">Form description:</label>
      </div>

      <textarea v-model="model.description"
        class="border border-black/40 leading-8 text-sm bg-white shadow-lg rounded-md px-4 py-2" id="body"
        placeholder="Enter description" rows="2"></textarea>
    </div>

    <prefixQuestionEditor v-model="model.id_prefix_question"></prefixQuestionEditor>

    <!-- Question sesstion -->
    <div class="flex justify-between md:w-[80%]">
      <div class="border-l-4 border-secondary-red pl-2 text-right">
        <label for="body" class="text-sm font-semibold">Questions:</label>
      </div>

      <div @click.stop="addQuestion"
        class="flex items-center cursor-pointer bg-white border border-black/40 shadow-lg rounded-full px-2 py-1">
        <span class="text-sm font-semibold text-black/60">Add question:</span>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M7.922 2.00467L8 2C8.16329 2.00002 8.32089 2.05997 8.44291 2.16848C8.56494 2.27698 8.6429 2.4265 8.662 2.58867L8.66667 2.66667V7.33333H13.3333C13.4966 7.33335 13.6542 7.3933 13.7762 7.50181C13.8983 7.61032 13.9762 7.75983 13.9953 7.922L14 8C14 8.16329 13.94 8.32089 13.8315 8.44291C13.723 8.56494 13.5735 8.6429 13.4113 8.662L13.3333 8.66667H8.66667V13.3333C8.66665 13.4966 8.6067 13.6542 8.49819 13.7762C8.38968 13.8983 8.24017 13.9762 8.078 13.9953L8 14C7.83671 14 7.67911 13.94 7.55709 13.8315C7.43506 13.723 7.3571 13.5735 7.338 13.4113L7.33333 13.3333V8.66667H2.66667C2.50338 8.66665 2.34578 8.6067 2.22375 8.49819C2.10173 8.38968 2.02377 8.24017 2.00467 8.078L2 8C2.00002 7.83671 2.05997 7.67911 2.16848 7.55709C2.27698 7.43506 2.4265 7.3571 2.58867 7.338L2.66667 7.33333H7.33333V2.66667C7.33335 2.50338 7.3933 2.34578 7.50181 2.22375C7.61032 2.10173 7.75983 2.02377 7.922 2.00467Z"
            fill="black" opacity="0.5" />
        </svg>
      </div>
    </div>

    <QuestionEditor v-for="(question, index) in model.questions" @deleteQuestion="deleteQuestion"
      @change="questionChange" :key="index" :question="question" :index="index">
    </QuestionEditor>

    <div class="flex justify-end items-center gap-4 text-sm mx-4 my-4">
      <div @click="router.push({ name: 'adminForms' })"
        class="bg-white border border-black/40 shadow-lg focus:shadow-none hover:shadow-none transition cursor-pointer rounded-full px-4 py-2 flex items-center gap-1">
        <h3>Cancel</h3>
      </div>
      <div @click="saveOrUpdateSurvey"
        class="bg-light-blue text-white font-semibold border border-light-blue focus:shadow-none hover:shadow-none transition cursor-pointer shadow-lg rounded-full px-4 py-2 flex items-center gap-1">
        <h3>Save</h3>
      </div>
    </div>
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
import { useUserStore } from '@/stores/userStore'
import { useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()
const userStore = useUserStore()
const surveyStore = useSurveyStore()
const model = ref({
  title: '',
  id: '',
  version: 1,
  description: '',
  created_at: '',
  status: 0,
  id_prefix_question: {
    question_text: '',
    description: '',
    type: 'radio',
    data: {
      options: []
    },
  },
  questions: [

  ],
})

onMounted(async () => {

  if (route.params.id) {
    model.value = await surveyStore.findSurveyById(parseInt(route.params.id));


    model.value.questions = model.value.questions.map((question) => {
      if (question.data) {
        question.data = JSON.parse(question.data)
      }
      return {
        ...question,
        id: uuidv4(), // Generate a new ID for each question
      }
    })

    if (model.value.id_prefix_question.data) {
      model.value.id_prefix_question.data = JSON.parse(model.value.id_prefix_question.data)
    }

  } else {
    model.value.questions = [

    ]
  }
})

function addQuestion(index) {
  const newQuestion = {
    id: uuidv4(),
    question_text: '',
    type: 'text',
    description: '',
    isOther: false,
    data: {
      options: [],
    },
  }

  model.value.questions.push(newQuestion)
}

function questionChange(data) {

  model.value.questions = model.value.questions.map((q) => {
    if (q.id === data.id) {
      return data;
    }
    return q;
  });
}

function deleteQuestion(question) {
  model.value.questions = model.value.questions.filter((q) => {
    return q.id !== question.id;
  });
}


function saveOrUpdateSurvey() {
  if (!validate()) {
    return;
  }

  if (route.params.id) {
    surveyStore.updateSurvey(model.value).then((response) => {
      // Handle success
      if (response.status === 200) {
        router.push({ name: 'adminForms' })
        userStore.setNotification({
          type: 'success',
          message: 'Survey updated successfully',
        })
      }
    })
  } else {

    surveyStore.createSurvey(model.value).then((response) => {
      // Handle success
      if (response.status === 201) {
        router.push({ name: 'adminForms' })
        userStore.setNotification({
          type: 'success',
          message: 'Survey created successfully',
        })
      }
    })
  }
}

function validate() {
  const errors = [];

  // Validate title
  if (!model.value.title || model.value.title.trim() === '') {
    userStore.setNotification({
      type: 'error',
      message: 'Survey title is required',
    })
    return false;
  }

  // Validate description
  if (!model.value.description || model.value.description.trim() === '') {

    userStore.setNotification({
      type: 'error',
      message: 'Survey description is required',
    })
    return false;
  }

  // Validate status
  if (model.value.status === null || model.value.status === undefined) {
    userStore.setNotification({
      type: 'error',
      message: 'Survey status is required',
    })
    return false;
  }

  // Validate id_prefix_question
  if (!model.value.id_prefix_question || !model.value.id_prefix_question.question_text.trim()) {

    userStore.setNotification({
      type: 'error',
      message: 'Prefix question is required',
    })
    return false;
  }

  // Validate questions
  if (!model.value.questions || model.value.questions.length === 0) {

    userStore.setNotification({
      type: 'error',
      message: 'At least one question is required',
    })
    return false;

  } else {
    model.value.questions.forEach((question, index) => {
      if (!question.question_text || question.question_text.trim() === '') {

        userStore.setNotification({
          type: 'error',
          message: `Question ${index + 1} text is required.`,
        })
        return false;
      }
    });
  }


  return true;
}
</script>
