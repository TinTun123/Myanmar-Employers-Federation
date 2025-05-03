<template>

    <!-- Mobile nav bar -->
    <div v-if="deviceType === 'mobile' || deviceType === 'tablet'"
        class="flex justify-between bg-black/70 items-center px-4 py-2 absolute top-0 left-0 right-0 z-999">
        <div class="h-8 w-8 flex items-center justify-center rounded-full">
            <img src="../assets/mef logo.jpeg" class="w-full h-full rounded-full" alt="">
        </div>

        <div @click="isMenuOpen = !isMenuOpen" class="">
            <svg width="24" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 13H31M1 24.54H31M1 1.46H31" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                    stroke-linecap="round" />
            </svg>

        </div>
    </div>

    <div v-else :class="[deviceType === 'desktop' && isDashboard ? 'relative' : 'absolute']"
        class="flex justify-between bg-black/70 items-center px-4 py-2 absolute top-0 left-0 right-0 z-50">
        <div class="h-12 w-12 flex items-center justify-center rounded-full">
            <img src="../assets/mef logo.jpeg" class="w-full h-full rounded-full" alt="">
        </div>

        <div class="flex gap-8">
            <RouterLink :to="{ name: 'home' }" class="stroke-1 font-medium text-base text-white py-3 ">
                Home
            </RouterLink>

            <RouterLink :to="{ name: 'reports' }" class="stroke-1 font-medium text-base text-white py-3 ">
                Violation reports
            </RouterLink>

            <RouterLink :to="{ name: 'activities' }" class="stroke-1 font-medium text-base text-white py-3">
                Activities & News
            </RouterLink>

            <RouterLink :to="{ name: 'aboutUs' }" class="stroke-1 font-medium text-base text-white py-3 ">
                About us
            </RouterLink>

            <RouterLink :to="{ name: 'statements' }" class="stroke-1 font-medium text-base text-white py-3">
                Statements
            </RouterLink>

            <RouterLink :to="{ name: 'statements' }" class="stroke-1 font-medium text-base text-white py-3">
                Contact us
            </RouterLink>
        </div>

    </div>

    <transition name="dropdown" appear>
        <div @click="isMenuOpen = !isMenuOpen" v-if="isMenuOpen"
            class="flex flex-col justify-center items-stratch absolute top-[48px] left-0 right-0 z-50"
            style="background: linear-gradient(45deg,rgba(46, 46, 46, 1) 0%, rgba(49, 66, 89, 1) 100%)">
            <RouterLink :to="{ name: 'home' }"
                class="stroke-1 font-medium text-xs text-center text-white py-3 border-b-2 border-white/20">
                Home
            </RouterLink>

            <RouterLink :to="{ name: 'reports' }"
                class="stroke-1 font-medium text-xs text-center text-white py-3 border-b-2 border-white/20">
                Violation reports
            </RouterLink>

            <RouterLink :to="{ name: 'activities' }"
                class="stroke-1 font-medium text-xs text-center text-white py-3 border-b-2 border-white/20">
                Activities & News
            </RouterLink>

            <RouterLink :to="{ name: 'aboutUs' }"
                class="stroke-1 font-medium text-xs text-center text-white py-3 border-b-2 border-white/20">
                About us
            </RouterLink>

            <RouterLink :to="{ name: 'statements' }"
                class="stroke-1 font-medium text-xs text-center text-white py-3 border-b-2 border-white/20">
                Statements
            </RouterLink>

            <RouterLink :to="{ name: 'home' }"
                class="stroke-1 font-medium text-xs text-center text-white py-3 border-b-2 border-white/20">
                Contact us
            </RouterLink>
        </div>
    </transition>
    <!-- Mobile nav bar end -->
</template>

<script setup>
import { useDeviceType } from '@/composables/useDeviceType.js';
import { ref } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import { onMounted, computed } from 'vue';

const router = useRouter();
const route = useRoute();

const isMenuOpen = ref(false);
const { deviceType } = useDeviceType();

const isDashboard = computed(() => {
    return route.path.includes('admin');
})

</script>

<style>
/* Transition for dropdown */
.dropdown-enter-active,
.dropdown-leave-active {
    transition: max-height 0.2s ease-out;
}

.dropdown-enter-from,
.dropdown-leave-to {
    max-height: 0;
    overflow: hidden;
}

.dropdown-enter-to,
.dropdown-leave-from {
    max-height: 500px;
    /* Adjust based on your content height */
    overflow: hidden;
}
</style>