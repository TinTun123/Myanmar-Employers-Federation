<template>
  <!-- User card -->
  <div class="bg-white shadow-lg rounded-lg border border-black/20 p-4 md:col-span-4">
    <!-- Icon + Username -->
    <div class="flex justify-between items-center gap-4">
      <div class="flex items-center gap-2">
        <div>
          <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M14.0001 0.667969C15.751 0.667961 17.4848 1.01283 19.1025 1.68289C20.7202 2.35295 22.1901 3.33507 23.4282 4.57318C24.6663 5.8113 25.6484 7.28115 26.3185 8.89883C26.9886 10.5165 27.3334 12.2503 27.3334 14.0013C27.3334 21.3651 21.3639 27.3347 14.0001 27.3347C6.63631 27.3347 0.666748 21.3651 0.666748 14.0013C0.666748 6.63753 6.63631 0.667969 14.0001 0.667969ZM15.3334 15.3347H12.6667C9.36581 15.3347 6.53187 17.3338 5.30956 20.1877C7.24356 22.8996 10.4153 24.668 14.0001 24.668C17.5848 24.668 20.7566 22.8996 22.6906 20.1875C21.4683 17.3338 18.6344 15.3347 15.3334 15.3347ZM14.0001 4.66797C11.7909 4.66797 10.0001 6.45884 10.0001 8.66797C10.0001 10.8771 11.7909 12.668 14.0001 12.668C16.2092 12.668 18.0001 10.8771 18.0001 8.66797C18.0001 6.45884 16.2092 4.66797 14.0001 4.66797Z"
              fill="black" fill-opacity="0.6" />
          </svg>
        </div>
        <h1 class="text-sm text-black/60 font-semibold">{{ editor.name }}</h1>
      </div>

      <div v-if="userStore.user.role === 'admin' && userStore.user.id !== editor.id">
        <button @click.stop="deleteUser(editor.id)"
          class="flex items-center gap-2 px-2 py-1 rounded-full border hover:bg-[#F3462B] group transition cursor-pointer border-[#F3462B] text-xs text-[#F3462B]">
          <span class="text-[#F3462B] text-xs group-hover:text-white">Delete</span>
          <svg class="fill-[#F3462B] opacity-60 group-hover:fill-white group-hover:opacity-100" width="12" height="12"
            viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M12 0.666667H9L8.14286 0H3.85714L3 0.666667H0V2H12M0.857143 10.6667C0.857143 11.0203 1.03775 11.3594 1.35925 11.6095C1.68074 11.8595 2.11677 12 2.57143 12H9.42857C9.88323 12 10.3193 11.8595 10.6408 11.6095C10.9622 11.3594 11.1429 11.0203 11.1429 10.6667V2.66667H0.857143V10.6667Z" />
          </svg>
        </button>
      </div>
    </div>

    <div class="flex flex-col gap-2 mt-4">
      <div class="flex items-center gap-2 text-sm text-black/60">
        <span class="font-semibold">Role</span>
        <div class="rounded-full bg-light-green w-1 h-1"></div>
        <span>{{ editor.role }}</span>
      </div>
      <div class="flex items-center gap-2 text-sm text-black/60">
        <span class="font-semibold">Email</span>
        <div class="rounded-full bg-light-green w-1 h-1"></div>
        <span>{{ editor.email }}</span>
      </div>
    </div>
    <div v-if="userStore.user.role === 'admin'" class="mt-4 flex justify-end items-center">
      <button @click.stop="goTo('adminEditEditors')"
        class="flex gap-2 px-2 py-1 rounded-full border border-black/70 text-xs cursor-pointer group hover:bg-black transition duration-200 ease-in-out">
        <span class="text-black/70 text-xs group-hover:text-white">Edit</span>
        <svg class="fill-black group-hover:fill-white opacity-60 group-hover:opacity-100" width="16" height="16"
          viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M11.1319 14.6632H3.39861C3.12554 14.6643 2.85501 14.6106 2.60307 14.5053C2.35114 14.3999 2.12292 14.2451 1.93194 14.0499C1.73956 13.8561 1.58749 13.6261 1.4845 13.3732C1.38152 13.1204 1.32967 12.8496 1.33194 12.5765V4.84987C1.32854 4.57806 1.38058 4.30841 1.48489 4.05738C1.58919 3.80635 1.74358 3.57923 1.93861 3.38987C2.12837 3.19747 2.35516 3.04553 2.60528 2.9432C2.85866 2.83724 3.13063 2.78285 3.40528 2.7832H6.36528C6.49789 2.7832 6.62506 2.83588 6.71883 2.92965C6.8126 3.02342 6.86528 3.1506 6.86528 3.2832C6.86528 3.41581 6.8126 3.54299 6.71883 3.63676C6.62506 3.73053 6.49789 3.7832 6.36528 3.7832H3.40528C3.26189 3.78711 3.12006 3.81412 2.98528 3.8632C2.78884 3.94612 2.62134 4.08533 2.50389 4.26329C2.38644 4.44124 2.32429 4.64999 2.32528 4.8632V12.5899C2.32361 12.7331 2.35045 12.8753 2.40424 13.008C2.45804 13.1408 2.53771 13.2615 2.63861 13.3632C2.7395 13.4633 2.85915 13.5425 2.99071 13.5963C3.12228 13.6501 3.26316 13.6773 3.40528 13.6765H11.1386C11.2806 13.6765 11.4206 13.6499 11.5519 13.5965C11.6826 13.544 11.8008 13.4645 11.8986 13.3632C11.9999 13.2654 12.0794 13.1472 12.1319 13.0165C12.1909 12.8845 12.2204 12.7412 12.2186 12.5965V9.63654C12.2186 9.50393 12.2713 9.37675 12.3651 9.28298C12.4588 9.18922 12.586 9.13654 12.7186 9.13654C12.8512 9.13654 12.9784 9.18922 13.0722 9.28298C13.1659 9.37675 13.2186 9.50393 13.2186 9.63654V12.6165C13.2197 12.8896 13.166 13.1601 13.0607 13.4121C12.9553 13.664 12.8005 13.8922 12.6053 14.0832C12.4139 14.2753 12.1876 14.4292 11.9386 14.5365C11.6806 14.6299 11.4066 14.6732 11.1319 14.6632Z" />
          <path
            d="M14.5386 3.63717C14.4707 3.46552 14.366 3.3108 14.232 3.18384L12.7986 1.75051C12.6717 1.61647 12.517 1.5118 12.3453 1.44384C12.0874 1.33515 11.8028 1.30628 11.5283 1.36094C11.2537 1.41561 11.0019 1.5513 10.8053 1.75051L9.6653 2.89051V2.92384L4.5053 8.07717C4.24479 8.33947 4.0986 8.69416 4.09863 9.06384V10.5105C4.10039 10.883 4.24915 11.2398 4.51257 11.5032C4.776 11.7667 5.13277 11.9154 5.5053 11.9172H6.95197C7.13566 11.9174 7.31755 11.881 7.48698 11.81C7.65641 11.739 7.80996 11.6349 7.93863 11.5038L13.0986 6.34384L14.2453 5.19717C14.38 5.07051 14.4853 4.91584 14.552 4.74384C14.6283 4.57286 14.6677 4.38773 14.6677 4.20051C14.6677 4.01328 14.6283 3.82815 14.552 3.65717L14.5386 3.63717ZM13.6186 4.33717C13.597 4.38754 13.5652 4.43293 13.5253 4.47051L12.712 5.28384L10.712 3.28384L11.532 2.46384C11.6107 2.38766 11.7157 2.34469 11.8253 2.34384C11.8781 2.34472 11.9302 2.35605 11.9786 2.37717C12.0302 2.39895 12.0746 2.43006 12.112 2.47051L13.552 3.90384C13.5883 3.943 13.6176 3.9881 13.6386 4.03717C13.6485 4.08781 13.6485 4.13987 13.6386 4.19051C13.6411 4.24021 13.6344 4.28995 13.6186 4.33717Z" />
        </svg>
      </button>
    </div>
  </div>
</template>

<script setup>
import { useUserStore } from '@/stores/userStore'
import { useRouter } from 'vue-router'
const props = defineProps({
  editor: {
    type: Object,
    required: true,
  },
})

const emit = defineEmits(['deleteUser'])
const router = useRouter()
const userStore = useUserStore();
function deleteUser(id) {
  emit('deleteUser', id)
}

function goTo(route) {
  router.push({ name: route, params: { id: props.editor.id } })
}
</script>
