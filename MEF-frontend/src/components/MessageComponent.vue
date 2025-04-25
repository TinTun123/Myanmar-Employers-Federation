<template>
    <div class="flex gap-4">
        <!-- Profile icon / left block -->
        <div
            class="bg-white flex items-center justify-center flex-shrink-0 rounded-full shadow-lg border border-black/20 w-10 h-10">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M6.66667 5.33333C6.66667 3.91885 7.22857 2.56229 8.22876 1.5621C9.22896 0.561903 10.5855 0 12 0C13.4145 0 14.771 0.561903 15.7712 1.5621C16.7714 2.56229 17.3333 3.91885 17.3333 5.33333C17.3333 6.74782 16.7714 8.10438 15.7712 9.10457C14.771 10.1048 13.4145 10.6667 12 10.6667C10.5855 10.6667 9.22896 10.1048 8.22876 9.10457C7.22857 8.10438 6.66667 6.74782 6.66667 5.33333ZM6.66667 13.3333C4.89856 13.3333 3.20286 14.0357 1.95262 15.286C0.702379 16.5362 0 18.2319 0 20C0 21.0609 0.421427 22.0783 1.17157 22.8284C1.92172 23.5786 2.93913 24 4 24H20C21.0609 24 22.0783 23.5786 22.8284 22.8284C23.5786 22.0783 24 21.0609 24 20C24 18.2319 23.2976 16.5362 22.0474 15.286C20.7971 14.0357 19.1014 13.3333 17.3333 13.3333H6.66667Z"
                    fill="#808080" />
            </svg>


        </div>
        <!-- Right block -->
        <div class="flex flex-col gap-2 border-b border-[#808080]/40 pb-4 w-full">
            <!-- Name & time -->
            <div class="flex gap-2 items-center">
                <h1 class="text-sm">{{ comment.name }}</h1>
                <div class="rounded-full h-2 w-2 bg-[#808080]">

                </div>
                <h1 class="text-xs font-semibold">{{ comment.created_at }}</h1>
            </div>
            <!-- Comment text -->
            <div>
                <p class="text-sm leading-7">
                    {{ comment.body }}
                </p>
            </div>
        </div>

    </div>

</template>

<script setup>
import { formatDistanceToNow } from 'date-fns';

const props = defineProps({
    comment: {
        type: Object,
        required: true
    }
})

</script>