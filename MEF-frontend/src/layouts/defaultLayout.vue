<template>
    <div class="">
        <NavigationBar />
        <RouterView />
    </div>

</template>

<script setup>
import NavigationBar from '@/components/NavigationBar.vue'
import { useDeviceType } from '@/composables/useDeviceType';
import { computed } from 'vue';
import { RouterView, useRoute } from 'vue-router'

const { deviceType } = useDeviceType();
const route = useRoute();
</script>