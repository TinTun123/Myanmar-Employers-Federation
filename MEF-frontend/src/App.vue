<script setup>
import HomePage from '@/views/HomePage.vue'
import { RouterView } from 'vue-router'
import { useRoute } from 'vue-router';
import FooterComponent from '@/components/FooterComponent.vue'
import { computed } from 'vue';
import Notification from './components/Notification.vue';

const route = useRoute();

const isLoginPage = computed(() => {
  return route.name === 'login';
})
</script>

<template>
  <RouterView />
  <FooterComponent v-if="!isLoginPage"></FooterComponent>
  <Notification />
</template>

<style scoped></style>
