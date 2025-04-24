<template>
    <div class="my-6 md:my-8 flex px-4 py-2 flex items-center gap-4">
        <hr class="w-[30%] text-light-green">
        <span class="text-base text-black/80 md:text-lg font-semibold">{{ props.title }}</span>
    </div>
</template>

<script setup>

const props = defineProps({
    title: {
        type: String,
        required: true
    },
})
</script>