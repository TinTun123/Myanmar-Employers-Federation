import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useSurveyStore = defineStore('survey', {
  state: () => ({
    questionTypes: ['text', 'textarea', 'radio', 'checkbox', 'select'],
    surveys: [
      {
        id: 1,
        title: 'Survey 1',
        version: 1,
        responses: 0,
        status: 1,
        description: 'Description of Survey 1',
        created_at: '2023-10-01',
        questions: [
          {
            id: 1,
            question: 'Question 1',
            type: 'text',
            options: [],
          },
          {
            id: 2,
            question: 'Question 2',
            type: 'multiple choice',
            options: ['Option 1', 'Option 2', 'Option 3'],
          },
        ],
      },
      {
        id: 2,
        title: 'Survey 2',
        version: 1,
        status: 1,
        responses: 0,
        description: 'Description of Survey 2',
        created_at: '2023-10-01',
        questions: [
          {
            id: 1,
            question: 'Question 1',
            type: 'text',
            options: [],
          },
          {
            id: 2,
            question: 'Question 2',
            type: 'multiple choice',
            options: ['Option A', 'Option B', 'Option C'],
          },
        ],
      },
      {
        id: 3,
        title: 'Survey 3',
        version: 1,
        status: 1,
        responses: 0,
        description: 'Description of Survey 3',
        created_at: '2023-10-01',
        questions: [
          {
            id: 1,
            question: 'Question 1',
            type: 'text',
            options: [],
          },
          {
            id: 2,
            question: 'Question 2',
            type: 'multiple choice',
            options: ['Option X', 'Option Y', 'Option Z'],
          },
        ],
      },
    ],
  }),
})
