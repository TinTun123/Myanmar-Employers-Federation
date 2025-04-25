<template>

    <div>
        <ConeBgCover>
            <!-- <TopNews v-if="deviceType !== 'desktop'">
            </TopNews> -->
        </ConeBgCover>
        <div class="grid grid-cols-12 gap-4 my-6 z-99 relative">
            <!-- Navi Text -->
            <div
                class="col-start-2 col-span-9 flex gap-4 text-black/70 text-xs font-semibold md:text-sm items-center justify-start">
                <RouterLink :to="{ name: 'home' }">
                    Home
                </RouterLink>
                <span>/</span>
                <span>{{ currentPageName }}</span>
            </div>
            <!-- Navi text end -->
        </div>
        <LoadingComponent v-if="userStore.loading.state"></LoadingComponent>
        <div v-else class="grid grid-cols-12 gap-4 mt-4 mx-4 lg:mx-[90px]">
            <NewsCard v-for="(post, index) in news" @click="goTo(post.id)" :key="index"
                class="col-span-12 md:col-span-4" :class="colSpans[index]" :post="post" :index="index">
            </NewsCard>
        </div>
    </div>
</template>

<script setup>
import ConeBgCover from '@/components/ConeBgCover.vue';
import LoadingComponent from '@/components/LoadingComponent.vue';
import NewsCard from '@/components/NewsCard.vue';
import TopNews from '@/components/TopNews.vue';
import { useDeviceType } from '@/composables/useDeviceType';
import { useGetCurrentPageName } from '@/composables/useGetCurrentPage';
import { useNewsStore } from '@/stores/newsStore';
import { useUserStore } from '@/stores/userStore';
import { computed } from 'vue';
import { useRouter } from 'vue-router';

const currentPageName = useGetCurrentPageName();
const { deviceType } = useDeviceType();

const newsStore = useNewsStore();
const userStore = useUserStore();
const router = useRouter();

const news = computed(() => {

    if (newsStore.activities.data.length > 0) {
        return newsStore.activities.data;
    } else {
        userStore.loading.state = true;
        newsStore.fetchPosts().then(() => {
            userStore.loading.state = false;
            return newsStore.activities.data;
        })
    }

});

const colSpans = computed(() => {
    const spanPatterns = [
        [3, 4, 5],
        [3, 5, 4],
        [4, 3, 5],
        [4, 4, 4],
        [4, 5, 3],
        [5, 3, 4],
        [5, 4, 3]
    ];

    return news.value.map((_, index) => {
        const row = Math.floor(index / 3); // Each row has 3 cards
        const col = index % 3;
        const pattern = spanPatterns[row % spanPatterns.length];
        const span = pattern[col];

        return `lg:col-span-${span}`;
    });
})

function goTo(id) {
    router.push({ name: 'activitiesDetail', params: { id: id } });
}
</script>