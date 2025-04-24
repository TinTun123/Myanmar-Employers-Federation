<template>
  <div class="scrollbar-hidden">
    <NavigationBar></NavigationBar>

    <div v-if="deviceType !== 'desktop'"
      class="mt-15 px-4 py-2 bg-secondary-red rounded-r-lg shadow-lg flex items-center justify-between w-[40%] md:w-[20%]">
      <h1 class="text-sm font-semibold text-white">Admin tool</h1>
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_50_3557)">
          <path
            d="M15.6595 12.3656L12.0001 8.70625C11.2782 7.98438 10.2001 7.84375 9.33135 8.27188L6.0001 4.94063V3L2.0001 0L9.76324e-05 2L3.0001 6H4.94072L8.27197 9.33125C7.84697 10.2 7.98447 11.2781 8.70635 12L12.3657 15.6594C12.822 16.1156 13.5595 16.1156 14.0126 15.6594L15.6595 14.0125C16.1126 13.5562 16.1126 12.8188 15.6595 12.3656ZM10.3657 7.03125C11.2501 7.03125 12.0813 7.375 12.7063 8L13.3126 8.60625C13.8063 8.39062 14.2751 8.09062 14.6813 7.68437C15.8407 6.525 16.2345 4.89375 15.8657 3.4125C15.797 3.13125 15.4438 3.03437 15.2376 3.24062L12.9126 5.56563L10.7907 5.2125L10.4376 3.09063L12.7626 0.765625C12.9688 0.559375 12.8688 0.20625 12.5845 0.134375C11.1032 -0.23125 9.47197 0.1625 8.31572 1.31875C7.4251 2.20937 7.00635 3.38438 7.02822 4.55625L9.59385 7.12187C9.84697 7.0625 10.1095 7.03125 10.3657 7.03125ZM7.11885 9.59375L5.34697 7.82188L0.584473 12.5875C-0.196777 13.3687 -0.196777 14.6344 0.584473 15.4156C1.36572 16.1969 2.63135 16.1969 3.4126 15.4156L7.2751 11.5531C7.0376 10.9313 6.96572 10.2531 7.11885 9.59375ZM2.0001 14.75C1.5876 14.75 1.2501 14.4125 1.2501 14C1.2501 13.5844 1.58447 13.25 2.0001 13.25C2.41572 13.25 2.7501 13.5844 2.7501 14C2.7501 14.4125 2.41572 14.75 2.0001 14.75Z"
            fill="white" />
        </g>
        <defs>
          <clipPath id="clip0_50_3557">
            <rect width="16" height="16" fill="white" />
          </clipPath>
        </defs>
      </svg>
    </div>

    <div v-if="deviceType !== 'desktop'">
      <div class="mx-6 flex items-center justify-start gap-4 mt-4 md:mt-6 flex-wrap">
        <div @click="goTo('adminNews')" :class="[
          route.name === 'adminNews' ? 'bg-secondary-red text-white' : 'bg-white text-black/60',
        ]" class="rounded-full shadow-lg border border-secondary-red px-3 py-1 transition">
          <span class="font-semibold text-xs">Articles & activities</span>
        </div>

        <div @click="goTo('adminForms')" :class="[
          route.name === 'adminForms' ? 'bg-secondary-red text-white' : 'bg-white text-black/60',
        ]" class="rounded-full shadow-lg border border-secondary-red px-3 py-1">
          <span class="font-semibold text-xs">Manage Forms</span>
        </div>

        <div @click="goTo('adminResponses')" :class="[
          route.name === 'adminResponses'
            ? 'bg-secondary-red text-white'
            : 'bg-white text-black/60',
        ]" class="rounded-full shadow-lg border border-secondary-red px-3 py-1">
          <span class="font-semibold text-xs">Results</span>
        </div>

        <div @click="goTo('adminStatements')" :class="[
          route.name === 'adminStatements'
            ? 'bg-secondary-red text-white'
            : 'bg-white text-black/60',
        ]" class="rounded-full shadow-lg border border-secondary-red px-3 py-1">
          <span class="font-semibold text-xs">Statements</span>
        </div>

        <div @click="goTo('adminDynamicBoard')" :class="[
          route.name === 'adminDynamicBoard'
            ? 'bg-secondary-red text-white'
            : 'bg-white text-black/60',
        ]" class="rounded-full shadow-lg border border-secondary-red px-3 py-1">
          <span class="font-semibold text-xs">Dynamic board</span>
        </div>
        <div @click="goTo('adminEditors')" :class="[
          route.name === 'adminEditors'
            ? 'bg-secondary-red text-white'
            : 'bg-white text-black/60',
        ]" class="rounded-full shadow-lg border border-secondary-red px-3 py-1">
          <span class="font-semibold text-xs">Editors</span>
        </div>
      </div>

      <div class="min-h-screen">
        <RouterView></RouterView>
      </div>
    </div>

    <div v-else class="mt-16 flex gap-0 lg:mt-0 lg:min-h-screen">
      <div class="px-6 py-6 flex-none bg-[#DDE9E9] flex flex-col gap-4">
        <div class="px-4 py-2 bg-secondary-red rounded-r-lg shadow-lg flex items-center justify-between">
          <h1 class="text-sm font-semibold text-white">Admin tool</h1>
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_50_3557)">
              <path
                d="M15.6595 12.3656L12.0001 8.70625C11.2782 7.98438 10.2001 7.84375 9.33135 8.27188L6.0001 4.94063V3L2.0001 0L9.76324e-05 2L3.0001 6H4.94072L8.27197 9.33125C7.84697 10.2 7.98447 11.2781 8.70635 12L12.3657 15.6594C12.822 16.1156 13.5595 16.1156 14.0126 15.6594L15.6595 14.0125C16.1126 13.5562 16.1126 12.8188 15.6595 12.3656ZM10.3657 7.03125C11.2501 7.03125 12.0813 7.375 12.7063 8L13.3126 8.60625C13.8063 8.39062 14.2751 8.09062 14.6813 7.68437C15.8407 6.525 16.2345 4.89375 15.8657 3.4125C15.797 3.13125 15.4438 3.03437 15.2376 3.24062L12.9126 5.56563L10.7907 5.2125L10.4376 3.09063L12.7626 0.765625C12.9688 0.559375 12.8688 0.20625 12.5845 0.134375C11.1032 -0.23125 9.47197 0.1625 8.31572 1.31875C7.4251 2.20937 7.00635 3.38438 7.02822 4.55625L9.59385 7.12187C9.84697 7.0625 10.1095 7.03125 10.3657 7.03125ZM7.11885 9.59375L5.34697 7.82188L0.584473 12.5875C-0.196777 13.3687 -0.196777 14.6344 0.584473 15.4156C1.36572 16.1969 2.63135 16.1969 3.4126 15.4156L7.2751 11.5531C7.0376 10.9313 6.96572 10.2531 7.11885 9.59375ZM2.0001 14.75C1.5876 14.75 1.2501 14.4125 1.2501 14C1.2501 13.5844 1.58447 13.25 2.0001 13.25C2.41572 13.25 2.7501 13.5844 2.7501 14C2.7501 14.4125 2.41572 14.75 2.0001 14.75Z"
                fill="white" />
            </g>
            <defs>
              <clipPath id="clip0_50_3557">
                <rect width="16" height="16" fill="white" />
              </clipPath>
            </defs>
          </svg>
        </div>

        <div @click="goTo('adminNews')" :class="[
          route.name === 'adminNews' ? 'bg-secondary-red text-white' : 'bg-white text-black/60',
        ]"
          class="rounded-full lg:hover:shadow-none transition cursor-pointer shadow-lg border border-secondary-red px-3 py-1 transition text-center">
          <span class="font-semibold text-xs">Articles & activities</span>
        </div>

        <div @click="goTo('adminForms')" :class="[
          route.name === 'adminForms' ? 'bg-secondary-red text-white' : 'bg-white text-black/60',
        ]"
          class="rounded-full lg:hover:shadow-none transition cursor-pointer shadow-lg border border-secondary-red px-3 py-1 text-center">
          <span class="font-semibold text-xs">Manage Forms</span>
        </div>

        <div @click="goTo('adminResponses')" :class="[
          route.name === 'adminResponses'
            ? 'bg-secondary-red text-white'
            : 'bg-white text-black/60',
        ]"
          class="rounded-full lg:hover:shadow-none transition cursor-pointer shadow-lg border border-secondary-red px-3 py-1 text-center">
          <span class="font-semibold text-xs">Results</span>
        </div>

        <div @click="goTo('adminStatements')" :class="[
          route.name === 'adminStatements'
            ? 'bg-secondary-red text-white'
            : 'bg-white text-black/60',
        ]"
          class="rounded-full lg:hover:shadow-none transition cursor-pointer shadow-lg border border-secondary-red px-3 py-1 text-center">
          <span class="font-semibold text-xs">Statements</span>
        </div>

        <div @click="goTo('adminDynamicBoard')" :class="[
          route.name === 'adminDynamicBoard'
            ? 'bg-secondary-red text-white'
            : 'bg-white text-black/60',
        ]"
          class="rounded-full lg:hover:shadow-none transition cursor-pointer shadow-lg border border-secondary-red px-3 py-1 text-center">
          <span class="font-semibold text-xs">Dynamic board</span>
        </div>
        <div @click="goTo('adminEditors')" :class="[
          route.name === 'adminEditors'
            ? 'bg-secondary-red text-white'
            : 'bg-white text-black/60',
        ]"
          class="rounded-full lg:hover:shadow-none transition cursor-pointer text-center shadow-lg border border-secondary-red px-3 py-1">
          <span class="font-semibold text-xs">Editors</span>
        </div>
      </div>
      <div class="flex-auto bg-white flex flex-col">

        <RouterView></RouterView>
      </div>
    </div>
  </div>
</template>

<script setup>
import NavigationBar from '@/components/NavigationBar.vue'
import { useRoute } from 'vue-router'
import { useDeviceType } from '@/composables/useDeviceType'
import { useRouter } from 'vue-router'
import { useUserStore } from '@/stores/userStore.js'
import LoadingComponent from '@/components/LoadingComponent.vue'

const router = useRouter()
const userStore = useUserStore()
const route = useRoute()
const { deviceType } = useDeviceType()

function goTo(path) {
  router.push({ name: path })
}
</script>
