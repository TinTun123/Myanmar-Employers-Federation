<template>
    <div>
        <!-- See more banner -->
        <div class="flex justify-between items-center mx-6">
            <svg class="flex-1 w-full" height="3" viewBox="0 0 159 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.5" width="159" height="2" fill="#00E0E9" fill-opacity="0.6" />
            </svg>
            <h1 class="text-xs flex-1 text-center whitespace-nowrap md:text-base font-bold text-[#A7A7A7]">See more</h1>
            <svg class="flex-1 w-full" height="3" viewBox="0 0 159 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.5" width="159" height="2" fill="#00E0E9" fill-opacity="0.6" />
            </svg>

        </div>

        <div class="px-4 md:px-0 lg:px-0 py-4 grid grid-cols-12 gap-4 md:gap-8">
            <NewsCard class="col-span-12 md:col-span-6 lg:col-span-12" v-for="(post, index) in news" :key="index"
                :post="post" :index="index" @click="goTo(post.id)">
            </NewsCard>
        </div>
    </div>
</template>

<script setup>

import { useNewsStore } from '@/stores/newsStore';
import { useRouter } from 'vue-router';
import { computed } from 'vue';
import NewsCard from './NewsCard.vue';


const newsStore = useNewsStore();
const router = useRouter();

const news = computed(() => {
    return newsStore.activities.data;
})

function goTo(id) {
    router.push({ name: 'activitiesDetail', params: { id } });
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>