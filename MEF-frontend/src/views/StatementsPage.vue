<template>
    <ConeBgCover :image="'/assets/space-bg-img.jpg'" :-page-name="'Statements'"></ConeBgCover>

    <div class="grid grid-cols-12 gap-4 my-6 z-50 relative">
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

    <div class="md:grid md:grid-cols-12 gap-4 items-start">
        <!-- Statement body Card -->
        <div
            class="px-2 py-3 mx-6 rounded-lg bg-white shadow-lg border border-black/20 md:px-4 md:py-4 md:mx-0 md:col-start-2 md:col-span-7">
            <h1 class="text-sm font-semibold text-center mx-4">
                {{ model.title }}
            </h1>

            <div class="flex justify-between items-center my-4">
                <span class="text-black text-[10px] font-semibold">{{ model.date }}</span>
                <span class="text-black/70 text-[10px]">{{ model.statement_no }}</span>
            </div>

            <p class="text-xs text-black text-justify leading-6">
                {{ model.body }}
            </p>

            <div class="text-right mt-4">
                <span class="text-[10px] text-black font-medium">{{ model.committee }}</span>
            </div>
        </div>

        <!-- Statement images -->
        <div
            class="px-6 py-2 flex gap-4 overflow-y-auto mt-4 md:grid md:grid-cols-4 md:mt-0 md:p-0 md:col-start-9 md:col-span-3">
            <div @click="showImageModal(image)" v-for="(image, index) in model.images" :key="index"
                class="flex-shrink-0 cursor-pointer col-span-2">
                <img :src="image" class="w-[124px] hover:shadow-lg transition" alt="">
            </div>
        </div>
    </div>


    <div class="lg:grid lg:grid-cols-12 lg:mx-[90px]">
        <div class="lg:col-span-10 lg:col-start-2">
            <CommentComponent :post="model"></CommentComponent>
        </div>

    </div>


    <!-- More Statememt card -->
    <div class="mt-6 mx-4 flex flex-col gap-4 mb-4 md:mx-[90px] md:grid md:grid-cols-12">
        <StatementCard v-for="(statement, index) in Morestatements" :key="statement.id" :statement="statement"
            class="md:col-span-6">
        </StatementCard>

    </div>

    <Teleport to="body">
        <transition name="fade">
            <div v-if="showImage.open" @click="closeImageModal" class="bg-black/80 fixed inset-0 z-90">
                <div class="h-full flex items-center justify-center">
                    <div class="h-[70%] mx-6">
                        <img :src="showImage.image" class="w-full h-full" alt="">
                    </div>
                </div>
            </div>
        </transition>

    </Teleport>

</template>

<script setup>
import ConeBgCover from '@/components/ConeBgCover.vue';
import StatementCard from '@/components/StatementCard.vue';
import { useGetCurrentPageName } from '@/composables/useGetCurrentPage';
import { useRoute, useRouter } from 'vue-router';
import { computed, ref, onMounted, onBeforeMount } from 'vue';
import { useNewsStore } from '@/stores/newsStore';
import CommentComponent from '@/components/CommentComponent.vue';

const currentPageName = useGetCurrentPageName();
const route = useRoute();
const newsStore = useNewsStore();

const model = ref({
    "id": '',
    "title": "",
    "date": null,
    "committee": null,
    "statement_no": null,
    "body": null,
    "images": [

    ],
    "created_at": "2025-04-25T02:42:30.000000Z",
    "updated_at": "2025-04-26T10:30:45.000000Z",
    "imageFiles": [],
    "comments": [],
})

const showImage = ref({
    open: false,
    image: ''
})

function showImageModal(image) {
    document.body.style.overflow = 'hidden'; // Disable scrolling
    showImage.value.open = true;
    showImage.value.image = image;
}

function closeImageModal() {
    document.body.style.overflow = '';
    showImage.value.open = false;
    showImage.value.image = '';
}


const Morestatements = ref([])


onMounted(() => {

    if (newsStore.statements?.data?.length) {
        if (route.params.id) {
            model.value = newsStore.getStatementById(parseInt(route.params.id));
        } else {
            model.value = newsStore.statements.data[0];
        }

        Morestatements.value = newsStore.statements.data;
    } else {
        newsStore.fetchStatements().then(() => {

            if (route.params.id) {
                model.value = newsStore.getStatementById(parseInt(route.params.id));
            } else {
                model.value = newsStore.statements.data[0];
            }

            Morestatements.value = newsStore.statements.data;
            console.log(newsStore.statements.data);

            console.log(newsStore.getStatementById(parseInt(route.params.id)));

        });

    }
})
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>