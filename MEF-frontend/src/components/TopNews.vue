<template>
    <!-- TopNew -->
    <div class="sm:flex sm:items-center sm:justify-center  bg-black relative">
        <div class="lg:w-[70%] relative h-[40vh] md:h-auto">
            <img :src="topNews.image" class="w-full h-full brightness-50" alt="">

            <div
                class="p-2 flex flex-col items-start gap-2 absolute bottom-0 left-0 z-10 w-[80%] lg:w-[40%] bg-black/80 rounded-tr-xl">
                <div class="flex justify-between items-center gap-4">

                    <!-- like, comment, date icons -->

                    <div class="flex justify-betweem gap-4">
                        <!-- Comment icon -->
                        <div class="flex gap-1">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 0.000800027C3.5816 0.000800027 1.32459e-06 3.58235 1.32459e-06 8.0007C-0.000676915 9.17938 0.259117 10.3437 0.760801 11.4103L0.0168013 15.0398C-0.00968752 15.1694 -0.003629 15.3035 0.0344345 15.4302C0.072498 15.5569 0.141379 15.6722 0.234911 15.7657C0.328443 15.8592 0.443707 15.9281 0.570386 15.9662C0.697066 16.0042 0.831206 16.0103 0.960801 15.9838L4.5904 15.2398C5.6256 15.7278 6.7824 15.9998 8 15.9998C12.4184 15.9998 16 12.419 16 7.9999C16 3.58235 12.4184 0 8 0"
                                    fill="#A7A7A7" />
                            </svg>

                            <span class="text-xs text-white font-timenew">{{ topNews.comments?.length }}</span>

                        </div>

                        <!-- Like icon -->
                        <div class="flex gap-1">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.26967 1.47326C2.08154 0.529931 3.18253 0 4.33051 0C5.4785 0 6.57949 0.529931 7.39136 1.47326C7.5501 1.65709 7.75444 1.88587 8.00439 2.1596C8.25376 1.88587 8.45782 1.65709 8.61656 1.47326C9.42503 0.538009 10.5184 0.0113884 11.6591 0.0078378C12.7997 0.00428717 13.8955 0.524094 14.7083 1.4543C15.521 2.3845 15.9851 3.64992 15.9996 4.97558C16.0142 6.30123 15.578 7.57999 14.7859 8.53395L8.61569 15.7053C8.45332 15.894 8.23312 16 8.00353 16C7.77393 16 7.55373 15.894 7.39136 15.7053L1.22118 8.53496C0.429811 7.58636 -0.0087772 6.31403 0.000133157 4.99277C0.00904351 3.6715 0.465603 2.40733 1.26967 1.47326Z"
                                    fill="#A7A7A7" />
                            </svg>

                            <span class="text-xs text-white">{{ topNews.likes }}</span>
                        </div>

                        <!-- Date icon -->

                        <div class="flex gap-1 ">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <mask id="path-1-inside-1_17_325" fill="white">
                                    <path
                                        d="M5.00004 4.00008V0.666748V4.00008ZM11.6667 4.00008V0.666748V4.00008ZM14.3334 11.3334V14.3334H2.33337V12.3334M14.242 5.66675H2.23471H14.242ZM0.333374 12.1667V12.3334H12.2667L12.3667 12.1667L12.5227 11.8394C13.7148 9.33388 14.3334 6.5941 14.3334 3.81941V2.33341H2.33337V3.75208C2.3334 6.5482 1.70527 9.30861 0.495374 11.8294L0.333374 12.1667Z" />
                                </mask>
                                <path
                                    d="M14.3334 14.3334V15.3334H15.3334V14.3334H14.3334ZM2.33337 14.3334H1.33337V15.3334H2.33337V14.3334ZM0.333374 12.1667L-0.568066 11.7338L-0.666626 11.9391V12.1667H0.333374ZM0.333374 12.3334H-0.666626V13.3334H0.333374V12.3334ZM12.2667 12.3334V13.3334H12.8329L13.1242 12.8479L12.2667 12.3334ZM12.3667 12.1667L13.2242 12.6812L13.2488 12.6402L13.2694 12.597L12.3667 12.1667ZM12.5227 11.8394L13.4254 12.2696L13.4257 12.2691L12.5227 11.8394ZM14.3334 3.81941H13.3334V3.81942L14.3334 3.81941ZM14.3334 2.33341H15.3334V1.33341H14.3334V2.33341ZM2.33337 2.33341V1.33341H1.33337V2.33341H2.33337ZM2.33337 3.75208H1.33337L1.33337 3.75209L2.33337 3.75208ZM0.495374 11.8294L1.39681 12.2623L1.39691 12.2621L0.495374 11.8294ZM6.00004 4.00008V0.666748H4.00004V4.00008H6.00004ZM12.6667 4.00008V0.666748H10.6667V4.00008H12.6667ZM13.3334 11.3334V14.3334H15.3334V11.3334H13.3334ZM14.3334 13.3334H2.33337V15.3334H14.3334V13.3334ZM3.33337 14.3334V12.3334H1.33337V14.3334H3.33337ZM14.242 4.66675H2.23471V6.66675H14.242V4.66675ZM-0.666626 12.1667V12.3334H1.33337V12.1667H-0.666626ZM0.333374 13.3334H12.2667V11.3334H0.333374V13.3334ZM13.1242 12.8479L13.2242 12.6812L11.5092 11.6523L11.4092 11.8189L13.1242 12.8479ZM13.2694 12.597L13.4254 12.2696L11.62 11.4092L11.464 11.7365L13.2694 12.597ZM13.4257 12.2691C14.6817 9.62929 15.3334 6.74274 15.3334 3.81941L13.3334 3.81942C13.3334 6.44545 12.748 9.03846 11.6197 11.4098L13.4257 12.2691ZM15.3334 3.81941V2.33341H13.3334V3.81941H15.3334ZM14.3334 1.33341H2.33337V3.33341H14.3334V1.33341ZM1.33337 2.33341V3.75208H3.33337V2.33341H1.33337ZM1.33337 3.75209C1.3334 6.39842 0.738917 9.01095 -0.406162 11.3967L1.39691 12.2621C2.67162 9.60627 3.3334 6.69799 3.33337 3.75207L1.33337 3.75209ZM-0.406066 11.3965L-0.568066 11.7338L1.23481 12.5997L1.39681 12.2623L-0.406066 11.3965Z"
                                    fill="white" mask="url(#path-1-inside-1_17_325)" />
                            </svg>
                            <span class="text-xs text-white font-medium">{{ topNews.date }}</span>
                        </div>

                    </div>

                </div>

                <!-- body text short -->

                <div>
                    <p class="text-white text-xs leading-6 line-clamp-2">
                        {{ topNews.title }}
                        {{ topNews.body }}
                    </p>
                </div>
                <!-- See more button -->
                <div class="px-2 rounded-full border border-[#00E0E9] self-end">
                    <span class="text-xs text-white">Read more</span>
                </div>
            </div>
        </div>
        <div class="w-full h-[48px] absolute bottom-0 left-0 right-0"
            style="background: linear-gradient(180deg,rgba(0, 0, 0, 0) 70%, rgba(0, 0, 0, 1) 100%);">

        </div>
        <div class="w-full h-[48px] absolute bottom-[-48px] left-0 right-0"
            style="background: linear-gradient(0deg,rgba(0, 0, 0, 0) 70%, rgba(0, 0, 0, 1) 100%)">
        </div>
    </div>
</template>

<script setup>
import { useNewsStore } from '@/stores/newsStore';
import { ref, onMounted } from 'vue';
import { computed } from 'vue';

const newsStore = useNewsStore();

const topNews = computed(() => {

    if (newsStore.activities.data?.length > 0) {
        return newsStore.activities.data[0];
    } else {
        newsStore.fetchPosts().then(() => {
            return newsStore.activities.data[0];
        })
    }
});

onMounted(() => {
    console.log(topNews.value);

})
</script>