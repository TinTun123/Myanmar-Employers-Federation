<template>

    <LoadingComponent v-if="userStore.loading.state"></LoadingComponent>

    <div v-else class="lg:grid lg:grid-cols-12 lg:gap-8 lg:mt-20 lg:mx-[90px] md:mt-[48px]">
        <!-- Article session -->
        <div class="lg:col-span-8">
            <div>
                <!-- Post Title -->
                <div v-if="deviceType === 'desktop'"
                    class="border-l-4 border-light-green mt-4 mb-6 mx-4 lg:mx-auto px-3">
                    <h1 class="text-sm md:text-xl font-bold text-black">{{ news.title }}</h1>
                </div>
                <div v-if="deviceType === 'desktop'" class="flex justify-between mt-4 px-4 lg:px-0 lg:mb-6">
                    <!-- Icons buttons -->
                    <div class="flex gap-4">
                        <div class="flex items-center gap-1">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 0.000800027C3.5816 0.000800027 1.32459e-06 3.58235 1.32459e-06 8.0007C-0.000676915 9.17938 0.259117 10.3437 0.760801 11.4103L0.0168013 15.0398C-0.00968752 15.1694 -0.003629 15.3035 0.0344345 15.4302C0.072498 15.5569 0.141379 15.6722 0.234911 15.7657C0.328443 15.8592 0.443707 15.9281 0.570386 15.9662C0.697066 16.0042 0.831206 16.0103 0.960801 15.9838L4.5904 15.2398C5.6256 15.7278 6.7824 15.9998 8 15.9998C12.4184 15.9998 16 12.419 16 7.9999C16 3.58235 12.4184 0 8 0"
                                    fill="#A7A7A7" />
                            </svg>

                            <span class="text-sm md:text-base text-black font-timenew"> {{ news.comments?.length || 0
                                }}</span>

                        </div>

                        <LikeComponent :news="news" @like-news="likeNews"></LikeComponent>
                    </div>

                    <div class="flex gap-1 items-center">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="path-1-inside-1_17_325" fill="white">
                                <path
                                    d="M5.00004 4.00008V0.666748V4.00008ZM11.6667 4.00008V0.666748V4.00008ZM14.3334 11.3334V14.3334H2.33337V12.3334M14.242 5.66675H2.23471H14.242ZM0.333374 12.1667V12.3334H12.2667L12.3667 12.1667L12.5227 11.8394C13.7148 9.33388 14.3334 6.5941 14.3334 3.81941V2.33341H2.33337V3.75208C2.3334 6.5482 1.70527 9.30861 0.495374 11.8294L0.333374 12.1667Z" />
                            </mask>
                            <path
                                d="M14.3334 14.3334V15.3334H15.3334V14.3334H14.3334ZM2.33337 14.3334H1.33337V15.3334H2.33337V14.3334ZM0.333374 12.1667L-0.568066 11.7338L-0.666626 11.9391V12.1667H0.333374ZM0.333374 12.3334H-0.666626V13.3334H0.333374V12.3334ZM12.2667 12.3334V13.3334H12.8329L13.1242 12.8479L12.2667 12.3334ZM12.3667 12.1667L13.2242 12.6812L13.2488 12.6402L13.2694 12.597L12.3667 12.1667ZM12.5227 11.8394L13.4254 12.2696L13.4257 12.2691L12.5227 11.8394ZM14.3334 3.81941H13.3334V3.81942L14.3334 3.81941ZM14.3334 2.33341H15.3334V1.33341H14.3334V2.33341ZM2.33337 2.33341V1.33341H1.33337V2.33341H2.33337ZM2.33337 3.75208H1.33337L1.33337 3.75209L2.33337 3.75208ZM0.495374 11.8294L1.39681 12.2623L1.39691 12.2621L0.495374 11.8294ZM6.00004 4.00008V0.666748H4.00004V4.00008H6.00004ZM12.6667 4.00008V0.666748H10.6667V4.00008H12.6667ZM13.3334 11.3334V14.3334H15.3334V11.3334H13.3334ZM14.3334 13.3334H2.33337V15.3334H14.3334V13.3334ZM3.33337 14.3334V12.3334H1.33337V14.3334H3.33337ZM14.242 4.66675H2.23471V6.66675H14.242V4.66675ZM-0.666626 12.1667V12.3334H1.33337V12.1667H-0.666626ZM0.333374 13.3334H12.2667V11.3334H0.333374V13.3334ZM13.1242 12.8479L13.2242 12.6812L11.5092 11.6523L11.4092 11.8189L13.1242 12.8479ZM13.2694 12.597L13.4254 12.2696L11.62 11.4092L11.464 11.7365L13.2694 12.597ZM13.4257 12.2691C14.6817 9.62929 15.3334 6.74274 15.3334 3.81941L13.3334 3.81942C13.3334 6.44545 12.748 9.03846 11.6197 11.4098L13.4257 12.2691ZM15.3334 3.81941V2.33341H13.3334V3.81941H15.3334ZM14.3334 1.33341H2.33337V3.33341H14.3334V1.33341ZM1.33337 2.33341V3.75208H3.33337V2.33341H1.33337ZM1.33337 3.75209C1.3334 6.39842 0.738917 9.01095 -0.406162 11.3967L1.39691 12.2621C2.67162 9.60627 3.3334 6.69799 3.33337 3.75207L1.33337 3.75209ZM-0.406066 11.3965L-0.568066 11.7338L1.23481 12.5997L1.39681 12.2623L-0.406066 11.3965Z"
                                fill="black" mask="url(#path-1-inside-1_17_325)" />
                        </svg>
                        <span class="text-xs md:text-base text-black font-medium">14 Feb 2025</span>
                    </div>
                </div>
            </div>
            <!-- Main story -->
            <div class="relative bg-black lg:w-[40vw] lg:mx-auto lg:rounded-lg lg:overflow-hidden">
                <!-- Cover image -->
                <div class="md:mx-[90px] lg:mx-0 flex justify-center items-center">
                    <img :src="news.image" class="w-full md:w-full h-full" alt="">
                </div>

                <div class="w-full h-[48px] absolute bottom-0 left-0 right-0"
                    style="background: linear-gradient(180deg,rgba(0, 0, 0, 0) 70%, rgba(0, 0, 0, 1) 100%);">

                </div>
                <div class="w-full h-[48px] absolute bottom-[-48px] left-0 right-0"
                    style="background: linear-gradient(0deg,rgba(0, 0, 0, 0) 70%, rgba(0, 0, 0, 1) 100%)">
                </div>
            </div>

            <div class="md:mx-[90px] lg:mx-auto lg:mt-6">
                <div v-if="deviceType !== 'desktop'" class="flex justify-between mt-4 md:mt-6 px-4">
                    <!-- Icons buttons -->
                    <div class="flex gap-4">


                        <div class="flex items-center gap-1">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 0.000800027C3.5816 0.000800027 1.32459e-06 3.58235 1.32459e-06 8.0007C-0.000676915 9.17938 0.259117 10.3437 0.760801 11.4103L0.0168013 15.0398C-0.00968752 15.1694 -0.003629 15.3035 0.0344345 15.4302C0.072498 15.5569 0.141379 15.6722 0.234911 15.7657C0.328443 15.8592 0.443707 15.9281 0.570386 15.9662C0.697066 16.0042 0.831206 16.0103 0.960801 15.9838L4.5904 15.2398C5.6256 15.7278 6.7824 15.9998 8 15.9998C12.4184 15.9998 16 12.419 16 7.9999C16 3.58235 12.4184 0 8 0"
                                    fill="#A7A7A7" />
                            </svg>

                            <span class="text-sm md:text-base text-black">{{ news.comments?.length || 0 }}</span>
                        </div>

                        <LikeComponent :news="news" @like-news="likeNews"></LikeComponent>
                    </div>

                    <div class="flex gap-1 items-center">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="path-1-inside-1_17_325" fill="white">
                                <path
                                    d="M5.00004 4.00008V0.666748V4.00008ZM11.6667 4.00008V0.666748V4.00008ZM14.3334 11.3334V14.3334H2.33337V12.3334M14.242 5.66675H2.23471H14.242ZM0.333374 12.1667V12.3334H12.2667L12.3667 12.1667L12.5227 11.8394C13.7148 9.33388 14.3334 6.5941 14.3334 3.81941V2.33341H2.33337V3.75208C2.3334 6.5482 1.70527 9.30861 0.495374 11.8294L0.333374 12.1667Z" />
                            </mask>
                            <path
                                d="M14.3334 14.3334V15.3334H15.3334V14.3334H14.3334ZM2.33337 14.3334H1.33337V15.3334H2.33337V14.3334ZM0.333374 12.1667L-0.568066 11.7338L-0.666626 11.9391V12.1667H0.333374ZM0.333374 12.3334H-0.666626V13.3334H0.333374V12.3334ZM12.2667 12.3334V13.3334H12.8329L13.1242 12.8479L12.2667 12.3334ZM12.3667 12.1667L13.2242 12.6812L13.2488 12.6402L13.2694 12.597L12.3667 12.1667ZM12.5227 11.8394L13.4254 12.2696L13.4257 12.2691L12.5227 11.8394ZM14.3334 3.81941H13.3334V3.81942L14.3334 3.81941ZM14.3334 2.33341H15.3334V1.33341H14.3334V2.33341ZM2.33337 2.33341V1.33341H1.33337V2.33341H2.33337ZM2.33337 3.75208H1.33337L1.33337 3.75209L2.33337 3.75208ZM0.495374 11.8294L1.39681 12.2623L1.39691 12.2621L0.495374 11.8294ZM6.00004 4.00008V0.666748H4.00004V4.00008H6.00004ZM12.6667 4.00008V0.666748H10.6667V4.00008H12.6667ZM13.3334 11.3334V14.3334H15.3334V11.3334H13.3334ZM14.3334 13.3334H2.33337V15.3334H14.3334V13.3334ZM3.33337 14.3334V12.3334H1.33337V14.3334H3.33337ZM14.242 4.66675H2.23471V6.66675H14.242V4.66675ZM-0.666626 12.1667V12.3334H1.33337V12.1667H-0.666626ZM0.333374 13.3334H12.2667V11.3334H0.333374V13.3334ZM13.1242 12.8479L13.2242 12.6812L11.5092 11.6523L11.4092 11.8189L13.1242 12.8479ZM13.2694 12.597L13.4254 12.2696L11.62 11.4092L11.464 11.7365L13.2694 12.597ZM13.4257 12.2691C14.6817 9.62929 15.3334 6.74274 15.3334 3.81941L13.3334 3.81942C13.3334 6.44545 12.748 9.03846 11.6197 11.4098L13.4257 12.2691ZM15.3334 3.81941V2.33341H13.3334V3.81941H15.3334ZM14.3334 1.33341H2.33337V3.33341H14.3334V1.33341ZM1.33337 2.33341V3.75208H3.33337V2.33341H1.33337ZM1.33337 3.75209C1.3334 6.39842 0.738917 9.01095 -0.406162 11.3967L1.39691 12.2621C2.67162 9.60627 3.3334 6.69799 3.33337 3.75207L1.33337 3.75209ZM-0.406066 11.3965L-0.568066 11.7338L1.23481 12.5997L1.39681 12.2623L-0.406066 11.3965Z"
                                fill="black" mask="url(#path-1-inside-1_17_325)" />
                        </svg>
                        <span class="text-xs md:text-base text-black font-medium">14 Feb 2025</span>
                    </div>
                </div>

                <!-- Post Title -->

                <div v-if="deviceType !== 'desktop'" class="border-l-4 border-light-green mt-4 md:mt-6 mb-6 mx-4 px-3">
                    <h1 class="text-sm md:text-xl font-bold text-black">{{ news.title }}</h1>
                </div>

                <!-- Body text -->
                <p class="text-black text-sm leading-8 mx-4 lg:mx-auto indent-16">
                    {{ news.body }}
                </p>
            </div>
            <CommentComponent :post="news"></CommentComponent>
        </div>
        <div class="my-4 lg:col-span-4 md:mx-[90px] lg:mx-0">
            <!-- Read more session -->
            <SeeMoreNews></SeeMoreNews>
        </div>
    </div>

</template>

<script setup>
import { useRoute } from 'vue-router';
import { useNewsStore } from '@/stores/newsStore';
import { computed, onMounted, onBeforeMount, ref, watch } from 'vue';
import SeeMoreNews from '@/components/SeeMoreNews.vue';
import { useDeviceType } from '@/composables/useDeviceType';
import CommentComponent from '@/components/CommentComponent.vue';
import { useUserStore } from '@/stores/userStore';
import LikeComponent from '@/components/LikeComponent.vue';
import LoadingComponent from '@/components/LoadingComponent.vue';

const route = useRoute();
const newsStore = useNewsStore();
const userStore = useUserStore();
const { deviceType } = useDeviceType();

const news = ref({});

function fetchNewsById() {
    const newsId = route.params.id;

    if (!newsStore.activities.data?.length) {
        // Fetch posts if the store is empty
        userStore.loading.state = true;
        newsStore.fetchPosts().then(() => {
            news.value = newsStore.activities.data.find((post) => post.id === parseInt(newsId));
            userStore.loading.state = false;
        });
    } else {
        // Find the news directly if the store already has data
        news.value = newsStore.activities.data.find((post) => post.id === parseInt(newsId));
    }
}

onMounted(() => {

    fetchNewsById();
})

watch(() => route.params.id, (newId) => {
    fetchNewsById();
})

function likeNews() {
    newsStore.likeNews(news.value.id).then((response) => {
        if (response.status === 200) {
            userStore.setNotification({
                type: 'success',
                message: 'Like succeed!',
            })
        }

    })
}
</script>