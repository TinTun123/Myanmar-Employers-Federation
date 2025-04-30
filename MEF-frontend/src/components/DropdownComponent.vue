<template>

    <div class="relative inline-block text-left mx-4">
        <div>
            <button type="button" @click.stop="isDrop = !isDrop"
                class="inline-flex w-full justify-center gap-x-1.5 rounded-full bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                id="menu-button" aria-expanded="true" aria-haspopup="true">
                Version {{ modelValue }}
                <svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                    data-slot="icon">
                    <path fill-rule="evenodd"
                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <transition name="dropdown" enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95">
            <div v-if="isDrop"
                class="absolute left-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div @click.stop="emit('update:modelValue', version); isDrop = !isDrop" class="py-1" role="none"
                    v-for="(version, index) in versions" :key="index">
                    <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                    <h3 href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="menu-item-0">Version {{ version }}</h3>
                </div>

            </div>
        </transition>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const props = defineProps({
    modelValue: {
        type: String,
        required: true
    },
    versions: {
        type: Array,
        required: true
    }
})

const emit = defineEmits(['update:modelValue'])
const isDrop = ref(false)
</script>