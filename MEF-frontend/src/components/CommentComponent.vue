<template>

    <!-- Comments session -->
    <div class="mx-4 mt-6 md:mx-[90px] lg:mx-0">
        <div class="flex justify-between items-center">

            <h1 class="text-xs text-center whitespace-nowrap md:text-base font-bold text-[#A7A7A7]">
                Comments
            </h1>
            <hr class="border border-black/20 w-full md:w-[90%] lg:w-[80%]">

        </div>
    </div>

    <div class="mx-4 my-6 md:mx-[90px] lg:mx-0">
        <!-- Textarea comment -->
        <div>
            <textarea v-model="localComment" name="comment" id="comment" placeholder="Comment!"
                class="border border-black/40 text-xs p-2 rounded-t-lg rounded-bl-lg w-full" rows="4"></textarea>
        </div>
        <!-- Button comment -->
        <div class="flex justify-end mt-4">
            <button @click="addComment" type="button"
                class="flex items-center cursor-pointer hover:shadow-none active:shadow-none transition justify-between gap-2 text-xs font-semibold text-black/70 rounded-full px-4 py-2 bg-white shadow-lg border border-black/20">
                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M9 0.5009C4.0293 0.5009 1.49016e-06 4.53015 1.49016e-06 9.50078C-0.00076153 10.8268 0.291506 12.1366 0.855901 13.3365L0.0189014 17.4198C-0.0108985 17.5656 -0.00408263 17.7165 0.0387388 17.859C0.0815602 18.0015 0.159051 18.1312 0.264275 18.2364C0.369498 18.3416 0.499171 18.4191 0.641685 18.4619C0.784199 18.5048 0.935107 18.5116 1.0809 18.4818L5.1642 17.6448C6.3288 18.1938 7.6302 18.4998 9 18.4998C13.9707 18.4998 18 14.4714 18 9.49988C18 4.53015 13.9707 0.5 9 0.5"
                        fill="#A7A7A7" />
                </svg>

                <span>Comment</span>
            </button>
        </div>
    </div>

    <div class="flex flex-col gap-6 mx-4 my-6 md:mx-[90px] lg:mx-0">
        <MessageComponent v-for="(commt, index) in post.comments" :key="commt.id" :comment="commt">
        </MessageComponent>
    </div>

    <Teleport to="body">
        <transition name="fade">
            <div v-if="showModal" class="bg-black/80 fixed inset-0 z-90">
                <div @click.self="showModal = !showModal" class="h-full flex items-center justify-center">
                    <div class="bg-white relative rounded-lg p-4 w-full mx-6 md:w-[400px] lg:w-[500px]">
                        <h1 class="text-center text-base font-medium text-black/70">Tell us your nickname!</h1>
                        <div class="relative mt-4">
                            <input type="text" v-model="nickname" placeholder="Nickname"
                                class="border border-black/40 text-sm rounded-lg w-full px-4 py-2" />
                            <button @click="saveNickName" type="button"
                                class="absolute right-0 text-sm border border-secondary-red rounded-lg bg-secondary-red px-4 text-white py-2 shadow-lg">Done</button>

                        </div>

                        <div @click="showModal = false"
                            class="absolute right-2 top-2 cursor-pointer w-4 h-4 flex items-center justify-center">
                            <svg class="w-full h-full" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.6593 1.15895C17.8659 0.940458 18.1143 0.765619 18.3897 0.64476C18.6651 0.523902 18.9619 0.459478 19.2626 0.455296C19.5633 0.451114 19.8618 0.507259 20.1405 0.620413C20.4191 0.733567 20.6722 0.901432 20.8849 1.11409C21.0975 1.32674 21.2654 1.57987 21.3786 1.85851C21.4917 2.13716 21.5479 2.43565 21.5437 2.73637C21.5395 3.03708 21.4751 3.3339 21.3542 3.60929C21.2333 3.88467 21.0585 4.13304 20.84 4.3397L14.2475 10.9322C14.2388 10.9409 14.2319 10.9513 14.2271 10.9626C14.2224 10.974 14.22 10.9862 14.22 10.9986C14.22 11.0109 14.2224 11.0231 14.2271 11.0345C14.2319 11.0459 14.2388 11.0562 14.2475 11.0649L20.84 17.6574C21.0518 17.8657 21.2202 18.1139 21.3356 18.3876C21.4509 18.6613 21.511 18.9551 21.5122 19.2521C21.5135 19.5491 21.4559 19.8434 21.3428 20.1181C21.2297 20.3927 21.0634 20.6423 20.8534 20.8523C20.6434 21.0624 20.3939 21.2288 20.1193 21.3419C19.8447 21.455 19.5503 21.5127 19.2533 21.5115C18.9563 21.5103 18.6625 21.4504 18.3888 21.3351C18.115 21.2198 17.8669 21.0514 17.6585 20.8397L11.066 14.2472C11.0573 14.2385 11.047 14.2315 11.0356 14.2268C11.0242 14.2221 11.012 14.2197 10.9996 14.2197C10.9873 14.2197 10.9751 14.2221 10.9637 14.2268C10.9523 14.2315 10.942 14.2385 10.9333 14.2472L4.34077 20.8397C4.13249 21.0514 3.88435 21.2199 3.61066 21.3352C3.33696 21.4506 3.04313 21.5106 2.74612 21.5119C2.44911 21.5131 2.15479 21.4556 1.88014 21.3425C1.60548 21.2294 1.35594 21.0631 1.14589 20.8531C0.935845 20.6431 0.769454 20.3936 0.656318 20.119C0.543181 19.8443 0.485538 19.55 0.486712 19.253C0.487886 18.956 0.547855 18.6622 0.66316 18.3884C0.778464 18.1147 0.946822 17.8665 1.15852 17.6582L7.75102 11.0657C7.75975 11.057 7.76668 11.0466 7.77141 11.0353C7.77613 11.0239 7.77857 11.0117 7.77857 10.9993C7.77857 10.987 7.77613 10.9748 7.77141 10.9634C7.76668 10.952 7.75975 10.9417 7.75102 10.9329L1.15852 4.34045C0.742192 3.91738 0.5099 3.34694 0.512247 2.75338C0.514594 2.15982 0.751389 1.59123 1.17105 1.17147C1.59071 0.751709 2.15925 0.51478 2.7528 0.512294C3.34636 0.509807 3.91686 0.741964 4.34002 1.1582L10.9325 7.7507C10.9412 7.75943 10.9516 7.76635 10.963 7.77108C10.9744 7.77581 10.9866 7.77824 10.9989 7.77824C11.0112 7.77824 11.0234 7.77581 11.0348 7.77108C11.0462 7.76635 11.0566 7.75943 11.0653 7.7507L17.6593 1.15895Z"
                                    fill="black" />
                            </svg>

                        </div>
                    </div>
                </div>

            </div>
        </transition>

    </Teleport>
</template>

<script setup>
import MessageComponent from '@/components/MessageComponent.vue';
import { useNewsStore } from '@/stores/newsStore';
import { useUserStore } from '@/stores/userStore';
import { onMounted, ref } from 'vue';
import { useRoute } from 'vue-router';
const props = defineProps({
    post: {
        type: Object,
        required: true
    }
});

const localComment = ref('');
const nickname = ref('');
const showModal = ref(false);
const userStore = useUserStore();
const newsStore = useNewsStore();
const route = useRoute();

function saveNickName() {
    if (nickname.value) {
        userStore.username = nickname.value;
        localStorage.setItem('username', nickname.value);
        showModal.value = false;
        addComment();
    } else {
        userStore.setNotification({
            type: 'error',
            message: 'Please enter your nickname to comment!',
            duration: 3000 // Duration in milliseconds
        });;
    }
}

function addComment() {


    if (!userStore.username) {
        showModal.value = true;
        return;
    }

    if (!localComment.value) {
        userStore.setNotification({
            type: 'error',
            message: 'Please enter your comment!',
            duration: 3000 // Duration in milliseconds
        });
        return;
    }
    if (route.name === 'statements') {
        newsStore.addComment('statements', props.post.id, localComment.value, userStore.username).then((response) => {
            if (response.status === 201) {
                localComment.value = '';
                userStore.setNotification({
                    type: 'success',
                    message: 'Comment added!',
                    duration: 3000 // Duration in milliseconds
                });
            }
        }).catch((error) => {
            userStore.setNotification({
                type: 'error',
                message: 'Error adding comment!',
                duration: 3000 // Duration in milliseconds
            });
        })
    } else {

        newsStore.addComment('news', props.post.id, localComment.value, userStore.username).then((response) => {
            if (response.status === 201) {
                localComment.value = '';
                userStore.setNotification({
                    type: 'success',
                    message: 'Comment added!',
                    duration: 3000 // Duration in milliseconds
                });
            }
        }).catch((error) => {
            userStore.setNotification({
                type: 'error',
                message: 'Error adding comment!',
                duration: 3000 // Duration in milliseconds
            });
        })
    }


    // Sent comment to backend
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease-in-out;
    /* Adjust duration and easing */
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>