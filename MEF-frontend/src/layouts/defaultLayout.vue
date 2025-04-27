<template>
    <div class="">
        <NavigationBar v-if="route.name !== 'formAnswer'" />
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