<template>
    <div @click.stop="likeNews" class="flex items-center gap-1 cursor-pointer">
        <svg :class="[newsStore.isPostLiked(news.id) ? 'fill-primary-red' : 'fill-[#A7A7A7]']" width="16" height="16"
            viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M1.26967 1.47326C2.08154 0.529931 3.18253 0 4.33051 0C5.4785 0 6.57949 0.529931 7.39136 1.47326C7.5501 1.65709 7.75444 1.88587 8.00439 2.1596C8.25376 1.88587 8.45782 1.65709 8.61656 1.47326C9.42503 0.538009 10.5184 0.0113884 11.6591 0.0078378C12.7997 0.00428717 13.8955 0.524094 14.7083 1.4543C15.521 2.3845 15.9851 3.64992 15.9996 4.97558C16.0142 6.30123 15.578 7.57999 14.7859 8.53395L8.61569 15.7053C8.45332 15.894 8.23312 16 8.00353 16C7.77393 16 7.55373 15.894 7.39136 15.7053L1.22118 8.53496C0.429811 7.58636 -0.0087772 6.31403 0.000133157 4.99277C0.00904351 3.6715 0.465603 2.40733 1.26967 1.47326Z" />
        </svg>

        <span class="text-sm md:text-base text-black font-timenew">{{ news.likes }}</span>

    </div>
</template>

<script setup>
import { useNewsStore } from '@/stores/newsStore';


const props = defineProps({
    news: {
        type: Object,
        required: true
    }
});

const newsStore = useNewsStore();
const emit = defineEmits(['likeNews']);

function likeNews() {
    emit('likeNews', props.news.id);
}

// function isAlreadyLiked() {

// }
</script>