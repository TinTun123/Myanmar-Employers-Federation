<template>
  <div class="flex flex-col gap-4 md:w-[80%]">
    <div class="border-r-4 text-right border-secondary-red pr-2">
      <label for="body" class="text-sm font-semibold">ID Code Prefixs:</label>
    </div>

    <div class="flex flex-col gap-4 md:w-[80%]">
      <label for="title" class="text-sm text-black/60 font-semibold">Question:</label>

      <input v-model="modelValue.question_text" @input="updateModel" type="text"
        class="border border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-2 leading-7" id="title"
        placeholder="Enter prefix question" />

      <div class="flex items-center justify-between">
        <span class="text-sm text-black/40 font-bold">Short form</span>
        <span class="text-sm text-black/40 font-bold">Options</span>
      </div>

      <div v-if="!modelValue.data.options.length" class="text-center py-4">
        <span>No options added yet!</span>
      </div>

      <div v-for="(option, index) in modelValue.data.options" :key="index" class="flex items-center gap-4">
        <div class="flex-1">
          <input v-model="option.short_form" @input="updateModel" type="text" :id="'short_form_' + option.id"
            class="border border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-2 w-full" />
        </div>
        <div class="flex-2">
          <input v-model="option.text" @input="updateModel" type="text" :id="'option_' + option.id"
            class="border border-black/40 text-sm bg-white shadow-lg rounded-md px-4 py-2 w-full" />
        </div>
        <div @click.stop="removeOption(index)" class="cursor-pointer">
          <svg width="16" height="16" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M12 0.666667H9L8.14286 0H3.85714L3 0.666667H0V2H12M0.857143 10.6667C0.857143 11.0203 1.03775 11.3594 1.35925 11.6095C1.68074 11.8595 2.11677 12 2.57143 12H9.42857C9.88323 12 10.3193 11.8595 10.6408 11.6095C10.9622 11.3594 11.1429 11.0203 11.1429 10.6667V2.66667H0.857143V10.6667Z"
              fill="#F3462B" fill-opacity="0.6" />
          </svg>
        </div>
      </div>

      <!-- Add button -->
      <div @click.stop="addPrefixOption"
        class="bg-white border border-gray-300 cursor-pointer lg:hover:bg-gray-300 transition rounded-lg shadow-lg flex items-center justify-center px-4 py-2">
        <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M7.922 2.00467L8 2C8.16329 2.00002 8.32089 2.05997 8.44291 2.16848C8.56494 2.27698 8.6429 2.4265 8.662 2.58867L8.66667 2.66667V7.33333H13.3333C13.4966 7.33335 13.6542 7.3933 13.7762 7.50181C13.8983 7.61032 13.9762 7.75983 13.9953 7.922L14 8C14 8.16329 13.94 8.32089 13.8315 8.44291C13.723 8.56494 13.5735 8.6429 13.4113 8.662L13.3333 8.66667H8.66667V13.3333C8.66665 13.4966 8.6067 13.6542 8.49819 13.7762C8.38968 13.8983 8.24017 13.9762 8.078 13.9953L8 14C7.83671 14 7.67911 13.94 7.55709 13.8315C7.43506 13.723 7.3571 13.5735 7.338 13.4113L7.33333 13.3333V8.66667H2.66667C2.50338 8.66665 2.34578 8.6067 2.22375 8.49819C2.10173 8.38968 2.02377 8.24017 2.00467 8.078L2 8C2.00002 7.83671 2.05997 7.67911 2.16848 7.55709C2.27698 7.43506 2.4265 7.3571 2.58867 7.338L2.66667 7.33333H7.33333V2.66667C7.33335 2.50338 7.3933 2.34578 7.50181 2.22375C7.61032 2.10173 7.75983 2.02377 7.922 2.00467Z"
            fill="black" opacity="0.5" />
        </svg>
      </div>
    </div>
  </div>
</template>

<script setup>
import { v4 as uuidv4 } from 'uuid'
const props = defineProps({
  modelValue: {
    type: Object,
    required: true,
  },
})

const emit = defineEmits(['update:modelValue'])

function updateModel() {

  // Trim trailing whitespace for short_form and text
  props.modelValue.data.options.forEach(option => {
    if (typeof option.short_form === 'string') {
      option.short_form = option.short_form.trimEnd();
    }
    if (typeof option.text === 'string') {
      option.text = option.text.trimEnd();
    }
  });

  emit('update:modelValue', props.modelValue)
}

function addPrefixOption() {
  props.modelValue.data.options.push({
    id: uuidv4(),
    short_form: '',
    text: '',
  })
  updateModel()
}

function removeOption(index) {
  props.modelValue.data.options.splice(index, 1)
  updateModel()
}
</script>
