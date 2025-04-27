<template>
    <!-- Text type -->
    <div v-if="question.type === 'text'" class="space-y-2">
        <!-- Uppder flex -->
        <div class="flex justify-between items-center">

            <div class="flex items-center gap-1">
                <!-- No and Question text -->
                <span class="text-sm text-white font-semibold">{{ index + 1 }}.</span>
                <h1 class="text-sm text-white font-semibold">{{ question.question_text }} <span
                        class="text-base text-[#FF0000]">*</span>
                </h1>
            </div>

            <div>
                <!-- Pop description icon -->
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 1.5C9.85652 1.5 11.637 2.2375 12.9497 3.55025C14.2625 4.86301 15 6.64348 15 8.5C15 10.3565 14.2625 12.137 12.9497 13.4497C11.637 14.7625 9.85652 15.5 8 15.5C6.14348 15.5 4.36301 14.7625 3.05025 13.4497C1.7375 12.137 1 10.3565 1 8.5C1 6.64348 1.7375 4.86301 3.05025 3.55025C4.36301 2.2375 6.14348 1.5 8 1.5ZM8.371 4.492C7.557 4.492 6.919 4.723 6.446 5.185C5.962 5.647 5.731 6.285 5.731 7.099H6.985C6.985 6.637 7.073 6.274 7.26 6.021C7.469 5.713 7.81 5.57 8.294 5.57C8.668 5.57 8.965 5.669 9.174 5.878C9.372 6.087 9.482 6.373 9.482 6.736C9.482 7.011 9.383 7.275 9.185 7.517L9.053 7.671C8.338 8.309 7.909 8.771 7.766 9.068C7.612 9.365 7.546 9.728 7.546 10.146V10.3H8.811V10.146C8.811 9.882 8.866 9.651 8.976 9.431C9.075 9.233 9.218 9.046 9.416 8.881C9.944 8.419 10.263 8.122 10.362 8.012C10.626 7.66 10.769 7.209 10.769 6.659C10.769 5.988 10.549 5.46 10.109 5.075C9.669 4.679 9.086 4.492 8.371 4.492ZM8.173 10.839C7.94871 10.8329 7.73116 10.916 7.568 11.07C7.48744 11.1459 7.42413 11.2382 7.38238 11.3407C7.34063 11.4432 7.3214 11.5534 7.326 11.664C7.326 11.906 7.403 12.104 7.568 12.258C7.72994 12.4152 7.94734 12.5021 8.173 12.5C8.415 12.5 8.613 12.423 8.778 12.269C8.86027 12.1916 8.92531 12.0977 8.9689 11.9934C9.01249 11.8892 9.03365 11.777 9.031 11.664C9.03311 11.5537 9.01274 11.4442 8.97113 11.3421C8.92953 11.24 8.86756 11.1474 8.789 11.07C8.62159 10.9157 8.40058 10.8328 8.173 10.839Z"
                        fill="#00E0E9" />
                </svg>
            </div>
        </div>

        <div>
            <input type="text" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"
                class="w-full h-10 px-4 rounded-lg bg-[#EFF1F5] text-sm text-[#696969] border border-[#E5E7EB] focus:outline-none focus:border-[#00E0E9]"
                placeholder="Enter text" />
        </div>
    </div>


    <!-- Radio type -->
    <div v-if="question.type === 'radio'" class="space-y-2">
        <!-- Uppder flex -->
        <div class="flex justify-between items-end">

            <span class="text-sm text-white font-semibold">{{ index + 1 }}.</span>
            <h1 class="text-sm text-white font-semibold">{{ question.question_text }} <span
                    class="text-base text-[#FF0000]">*</span>
            </h1>

            <div>
                <!-- Pop description icon -->
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 1.5C9.85652 1.5 11.637 2.2375 12.9497 3.55025C14.2625 4.86301 15 6.64348 15 8.5C15 10.3565 14.2625 12.137 12.9497 13.4497C11.637 14.7625 9.85652 15.5 8 15.5C6.14348 15.5 4.36301 14.7625 3.05025 13.4497C1.7375 12.137 1 10.3565 1 8.5C1 6.64348 1.7375 4.86301 3.05025 3.55025C4.36301 2.2375 6.14348 1.5 8 1.5ZM8.371 4.492C7.557 4.492 6.919 4.723 6.446 5.185C5.962 5.647 5.731 6.285 5.731 7.099H6.985C6.985 6.637 7.073 6.274 7.26 6.021C7.469 5.713 7.81 5.57 8.294 5.57C8.668 5.57 8.965 5.669 9.174 5.878C9.372 6.087 9.482 6.373 9.482 6.736C9.482 7.011 9.383 7.275 9.185 7.517L9.053 7.671C8.338 8.309 7.909 8.771 7.766 9.068C7.612 9.365 7.546 9.728 7.546 10.146V10.3H8.811V10.146C8.811 9.882 8.866 9.651 8.976 9.431C9.075 9.233 9.218 9.046 9.416 8.881C9.944 8.419 10.263 8.122 10.362 8.012C10.626 7.66 10.769 7.209 10.769 6.659C10.769 5.988 10.549 5.46 10.109 5.075C9.669 4.679 9.086 4.492 8.371 4.492ZM8.173 10.839C7.94871 10.8329 7.73116 10.916 7.568 11.07C7.48744 11.1459 7.42413 11.2382 7.38238 11.3407C7.34063 11.4432 7.3214 11.5534 7.326 11.664C7.326 11.906 7.403 12.104 7.568 12.258C7.72994 12.4152 7.94734 12.5021 8.173 12.5C8.415 12.5 8.613 12.423 8.778 12.269C8.86027 12.1916 8.92531 12.0977 8.9689 11.9934C9.01249 11.8892 9.03365 11.777 9.031 11.664C9.03311 11.5537 9.01274 11.4442 8.97113 11.3421C8.92953 11.24 8.86756 11.1474 8.789 11.07C8.62159 10.9157 8.40058 10.8328 8.173 10.839Z"
                        fill="#00E0E9" />
                </svg>
            </div>
        </div>

        <div>
            <fieldset class="space-y-2">


                <div v-for="(option, i) in JSON.parse(question.data).options" :key="i" class="flex items-center gap-2">
                    <input type="radio" :id="option.uuid" :name="'question_' + question.id" :value="option.text"
                        @change="emits('update:modelValue', $event.target.value)"
                        class="w-4 h-4 text-secondary-red border-gray-300 focus:ring-secondary-red" />
                    <label :for="option.uuid" class="text-sm text-white">{{ option.text
                    }}</label>

                    <!-- Other option -->
                    <input type="radio" :id="'other_' + option.uuid" :name="'question_' + question.id" value="other"
                        class="w-4 h-4 text-secondary-red border-gray-300 focus:ring-secondary-red" />
                    <label :for="'other_' + option.uuid" class="text-sm text-white">အခြား</label>

                    <div v-if="option.text === 'အခြား'" class="mt-2">
                        <input type="text" v-model="option.text" placeholder="အသေးစိတ်ဖော်ပြပါ"
                            @change="emits('update:modelValue', $event.target.value)"
                            class="w-full h-10 px-4 rounded-lg bg-[#EFF1F5] text-sm text-[#696969] border border-[#E5E7EB] focus:outline-none focus:border-[#00E0E9]" />
                    </div>
                </div>



            </fieldset>
        </div>
    </div>


    <!-- File input -->
    <div v-if="question.type === 'file'" class="space-y-2">
        <!-- Uppder flex -->
        <div class="flex justify-between items-end">

            <span class="text-sm text-white font-semibold">{{ index + 1 }}.</span>
            <h1 class="text-sm text-white font-semibold">{{ question.question_text }} <span
                    class="text-base text-[#FF0000]">*</span>
            </h1>

            <div>
                <!-- Pop description icon -->
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 1.5C9.85652 1.5 11.637 2.2375 12.9497 3.55025C14.2625 4.86301 15 6.64348 15 8.5C15 10.3565 14.2625 12.137 12.9497 13.4497C11.637 14.7625 9.85652 15.5 8 15.5C6.14348 15.5 4.36301 14.7625 3.05025 13.4497C1.7375 12.137 1 10.3565 1 8.5C1 6.64348 1.7375 4.86301 3.05025 3.55025C4.36301 2.2375 6.14348 1.5 8 1.5ZM8.371 4.492C7.557 4.492 6.919 4.723 6.446 5.185C5.962 5.647 5.731 6.285 5.731 7.099H6.985C6.985 6.637 7.073 6.274 7.26 6.021C7.469 5.713 7.81 5.57 8.294 5.57C8.668 5.57 8.965 5.669 9.174 5.878C9.372 6.087 9.482 6.373 9.482 6.736C9.482 7.011 9.383 7.275 9.185 7.517L9.053 7.671C8.338 8.309 7.909 8.771 7.766 9.068C7.612 9.365 7.546 9.728 7.546 10.146V10.3H8.811V10.146C8.811 9.882 8.866 9.651 8.976 9.431C9.075 9.233 9.218 9.046 9.416 8.881C9.944 8.419 10.263 8.122 10.362 8.012C10.626 7.66 10.769 7.209 10.769 6.659C10.769 5.988 10.549 5.46 10.109 5.075C9.669 4.679 9.086 4.492 8.371 4.492ZM8.173 10.839C7.94871 10.8329 7.73116 10.916 7.568 11.07C7.48744 11.1459 7.42413 11.2382 7.38238 11.3407C7.34063 11.4432 7.3214 11.5534 7.326 11.664C7.326 11.906 7.403 12.104 7.568 12.258C7.72994 12.4152 7.94734 12.5021 8.173 12.5C8.415 12.5 8.613 12.423 8.778 12.269C8.86027 12.1916 8.92531 12.0977 8.9689 11.9934C9.01249 11.8892 9.03365 11.777 9.031 11.664C9.03311 11.5537 9.01274 11.4442 8.97113 11.3421C8.92953 11.24 8.86756 11.1474 8.789 11.07C8.62159 10.9157 8.40058 10.8328 8.173 10.839Z"
                        fill="#00E0E9" />
                </svg>
            </div>
        </div>

        <div>
            <div @click="openFileSelector"
                class="flex items-center gap-4 bg-white rounded-lg p-2 border border-[#E5E7EB]/60 inline-flex">
                <span class="text-xs text-gray-600 font-semibold">Select file to upload</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 3C12.1498 3.00009 12.2977 3.03384 12.4327 3.09875C12.5677 3.16365 12.6864 3.25806 12.78 3.375L16.78 8.375C16.867 8.47687 16.9326 8.59517 16.973 8.72289C17.0134 8.8506 17.0277 8.98513 17.0151 9.11849C17.0025 9.25184 16.9632 9.38131 16.8996 9.49919C16.836 9.61708 16.7494 9.72099 16.6448 9.80475C16.5403 9.88851 16.42 9.95041 16.2911 9.98679C16.1622 10.0232 16.0273 10.0333 15.8944 10.0165C15.7615 9.99974 15.6333 9.95644 15.5174 9.88919C15.4016 9.82194 15.3005 9.7321 15.22 9.625L13 6.85V14C13 14.2652 12.8946 14.5196 12.7071 14.7071C12.5196 14.8946 12.2652 15 12 15C11.7348 15 11.4804 14.8946 11.2929 14.7071C11.1054 14.5196 11 14.2652 11 14V6.85L8.78 9.626C8.69954 9.7331 8.59839 9.82294 8.48255 9.89019C8.36671 9.95744 8.23853 10.0007 8.10564 10.0175C7.97274 10.0343 7.83783 10.0242 7.70891 9.98779C7.58 9.95141 7.4597 9.88951 7.35517 9.80575C7.25064 9.72199 7.164 9.61808 7.1004 9.50019C7.03679 9.38231 6.99752 9.25284 6.98491 9.11949C6.97231 8.98613 6.98662 8.8516 7.027 8.72389C7.06739 8.59617 7.13302 8.47787 7.22 8.376L11.22 3.376C11.3135 3.25888 11.4322 3.16428 11.5672 3.0992C11.7022 3.03412 11.8501 3.00021 12 3ZM9 14V13H5C4.46957 13 3.96086 13.2107 3.58579 13.5858C3.21071 13.9609 3 14.4696 3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15C21 14.4696 20.7893 13.9609 20.4142 13.5858C20.0391 13.2107 19.5304 13 19 13H15V14C15 14.7956 14.6839 15.5587 14.1213 16.1213C13.5587 16.6839 12.7956 17 12 17C11.2044 17 10.4413 16.6839 9.87868 16.1213C9.31607 15.5587 9 14.7956 9 14ZM17 16C16.7348 16 16.4804 16.1054 16.2929 16.2929C16.1054 16.4804 16 16.7348 16 17C16 17.2652 16.1054 17.5196 16.2929 17.7071C16.4804 17.8946 16.7348 18 17 18H17.01C17.2752 18 17.5296 17.8946 17.7171 17.7071C17.9046 17.5196 18.01 17.2652 18.01 17C18.01 16.7348 17.9046 16.4804 17.7171 16.2929C17.5296 16.1054 17.2752 16 17.01 16H17Z"
                        fill="#694C55" />
                </svg>
            </div>
            <input @change="handleFileUpload" ref="file" type="file" id="file-upload" name="file-upload"
                class="sr-only" />
        </div>
    </div>

    <!-- Checkbox type -->
    <div v-if="question.type === 'checkbox'" class="space-y-2">
        <!-- Question text -->
        <div class="flex justify-between items-end">

            <span class="text-sm text-white font-semibold">{{ index + 1 }}.</span>
            <h1 class="text-sm text-white font-semibold">{{ question.question_text }} <span
                    class="text-base text-[#FF0000]">*</span>
            </h1>

            <div>
                <!-- Pop description icon -->
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 1.5C9.85652 1.5 11.637 2.2375 12.9497 3.55025C14.2625 4.86301 15 6.64348 15 8.5C15 10.3565 14.2625 12.137 12.9497 13.4497C11.637 14.7625 9.85652 15.5 8 15.5C6.14348 15.5 4.36301 14.7625 3.05025 13.4497C1.7375 12.137 1 10.3565 1 8.5C1 6.64348 1.7375 4.86301 3.05025 3.55025C4.36301 2.2375 6.14348 1.5 8 1.5ZM8.371 4.492C7.557 4.492 6.919 4.723 6.446 5.185C5.962 5.647 5.731 6.285 5.731 7.099H6.985C6.985 6.637 7.073 6.274 7.26 6.021C7.469 5.713 7.81 5.57 8.294 5.57C8.668 5.57 8.965 5.669 9.174 5.878C9.372 6.087 9.482 6.373 9.482 6.736C9.482 7.011 9.383 7.275 9.185 7.517L9.053 7.671C8.338 8.309 7.909 8.771 7.766 9.068C7.612 9.365 7.546 9.728 7.546 10.146V10.3H8.811V10.146C8.811 9.882 8.866 9.651 8.976 9.431C9.075 9.233 9.218 9.046 9.416 8.881C9.944 8.419 10.263 8.122 10.362 8.012C10.626 7.66 10.769 7.209 10.769 6.659C10.769 5.988 10.549 5.46 10.109 5.075C9.669 4.679 9.086 4.492 8.371 4.492ZM8.173 10.839C7.94871 10.8329 7.73116 10.916 7.568 11.07C7.48744 11.1459 7.42413 11.2382 7.38238 11.3407C7.34063 11.4432 7.3214 11.5534 7.326 11.664C7.326 11.906 7.403 12.104 7.568 12.258C7.72994 12.4152 7.94734 12.5021 8.173 12.5C8.415 12.5 8.613 12.423 8.778 12.269C8.86027 12.1916 8.92531 12.0977 8.9689 11.9934C9.01249 11.8892 9.03365 11.777 9.031 11.664C9.03311 11.5537 9.01274 11.4442 8.97113 11.3421C8.92953 11.24 8.86756 11.1474 8.789 11.07C8.62159 10.9157 8.40058 10.8328 8.173 10.839Z"
                        fill="#00E0E9" />
                </svg>
            </div>
        </div>

        <!-- Checkbox options -->
        <fieldset>
            <div class="space-y-2">
                <div v-for="(option, i) in JSON.parse(question.data).options" :key="i" class="flex items-center gap-2">
                    <input :name="'question' + question.id" v-model="model[option.text]" type="checkbox" id="checkbox1"
                        :id="option.uuid" @change="onCheckBoxChange"
                        class="w-4 h-4 text-secondary-red border-gray-300 focus:ring-secondary-red" />
                    <label :for="option.uuid" class="text-sm text-white">{{ option.text }}</label>
                </div>

                <div v-if="selectedCheckboxes === 'အခြား'" class="mt-2">
                    <input type="text" v-model="otherDetailsQ2" placeholder="အသေးစိတ်ဖော်ပြပါ"
                        class="w-full h-10 px-4 rounded-lg bg-[#EFF1F5] text-sm text-[#696969] border border-[#E5E7EB] focus:outline-none focus:border-[#00E0E9]" />
                </div>
            </div>
        </fieldset>
    </div>

    <!-- Textarea type -->
    <div v-if="question.type === 'textarea'" class="space-y-2">
        <!-- Uppder flex -->
        <div class="flex justify-between items-end">

            <span class="text-sm text-white font-semibold">{{ index + 1 }}.</span>
            <h1 class="text-sm text-white font-semibold">{{ question.question_text }} <span
                    class="text-base text-[#FF0000]">*</span>
            </h1>

            <div>
                <!-- Pop description icon -->
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 1.5C9.85652 1.5 11.637 2.2375 12.9497 3.55025C14.2625 4.86301 15 6.64348 15 8.5C15 10.3565 14.2625 12.137 12.9497 13.4497C11.637 14.7625 9.85652 15.5 8 15.5C6.14348 15.5 4.36301 14.7625 3.05025 13.4497C1.7375 12.137 1 10.3565 1 8.5C1 6.64348 1.7375 4.86301 3.05025 3.55025C4.36301 2.2375 6.14348 1.5 8 1.5ZM8.371 4.492C7.557 4.492 6.919 4.723 6.446 5.185C5.962 5.647 5.731 6.285 5.731 7.099H6.985C6.985 6.637 7.073 6.274 7.26 6.021C7.469 5.713 7.81 5.57 8.294 5.57C8.668 5.57 8.965 5.669 9.174 5.878C9.372 6.087 9.482 6.373 9.482 6.736C9.482 7.011 9.383 7.275 9.185 7.517L9.053 7.671C8.338 8.309 7.909 8.771 7.766 9.068C7.612 9.365 7.546 9.728 7.546 10.146V10.3H8.811V10.146C8.811 9.882 8.866 9.651 8.976 9.431C9.075 9.233 9.218 9.046 9.416 8.881C9.944 8.419 10.263 8.122 10.362 8.012C10.626 7.66 10.769 7.209 10.769 6.659C10.769 5.988 10.549 5.46 10.109 5.075C9.669 4.679 9.086 4.492 8.371 4.492ZM8.173 10.839C7.94871 10.8329 7.73116 10.916 7.568 11.07C7.48744 11.1459 7.42413 11.2382 7.38238 11.3407C7.34063 11.4432 7.3214 11.5534 7.326 11.664C7.326 11.906 7.403 12.104 7.568 12.258C7.72994 12.4152 7.94734 12.5021 8.173 12.5C8.415 12.5 8.613 12.423 8.778 12.269C8.86027 12.1916 8.92531 12.0977 8.9689 11.9934C9.01249 11.8892 9.03365 11.777 9.031 11.664C9.03311 11.5537 9.01274 11.4442 8.97113 11.3421C8.92953 11.24 8.86756 11.1474 8.789 11.07C8.62159 10.9157 8.40058 10.8328 8.173 10.839Z"
                        fill="#00E0E9" />
                </svg>
            </div>
        </div>

        <div>
            <textarea type="text" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"
                class="w-full p-4 rounded-lg bg-[#EFF1F5] text-sm text-[#696969] border border-[#E5E7EB] focus:outline-none focus:border-[#00E0E9]"
                placeholder="Enter text"></textarea>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const selectedOptionQ1 = ref('')
const otherDetailsQ1 = ref('')
const selectedCheckboxes = ref([])

const selectedOptionQ2 = ref('')
const otherDetailsQ2 = ref('')
const file = ref(null);


function openFileSelector() {
    file.value.click()
}

function handleFileUpload(event) {
    const selectedFile = event.target.files[0];
    if (selectedFile) {
        console.log('Selected file:', selectedFile.name);
        // Handle the file upload logic here
    }
}
const { question, index, modelValue } = defineProps({
    question: Object,
    index: Number,
    modelValue: [String, Array]
})

const emits = defineEmits(['update:modelValue'])

let model = ref({

});

function onCheckBoxChange() {
    const selectedOptions = [];

    for (let test in model.value) {
        if (model.value[test]) {
            selectedOptions.push(test);
        }
    }

    emits('update:modelValue', selectedOptions);
}
</script>