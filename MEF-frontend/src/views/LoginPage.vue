<template>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 h-screen relative bg-black">
        <div
            class="absolute top-0 left-0 right-0 bottom-0 z-0 mask-[url(../assets/Brush-stroke-2.svg)] bg-black mask-no-repeat mask-cover mask-center mask-alpha">
            <img src="../assets/ILO-Article-Now.png" alt="Background Image"
                class="w-full h-full object-cover brightness-40">
        </div>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm z-100">
            <img class="mx-auto h-[86px] w-auto rounded-lg" src="../assets/mef logo.jpeg" alt="Your Company">
            <h2 class="mt-10 text-center text-xl/9 md:text-2xl/9 text-white font-bold tracking-tight text-gray-900">
                Myanmar Employers
                Federation
            </h2>
            <h3 class="text-center text-sm text-white font-semibold">Admin Login</h3>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm z-100">
            <div class="space-y-6">
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-white">Email address</label>
                    <div class="mt-2">
                        <input v-model="model.email" type="email" name="email" id="email" autocomplete="email" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-white">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input v-model="model.password" type="password" name="password" id="password"
                            autocomplete="current-password" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                </div>

                <div>
                    <button @click="login" type="submit"
                        class="flex w-full justify-center rounded-md bg-[#A087F4] px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Sign in</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { useRouter } from 'vue-router';
import { ref } from 'vue';
import { useUserStore } from '../stores/userStore.js';

const userStore = useUserStore();
const router = useRouter();
const model = ref({
    email: '',
    password: ''
});

function login() {
    if (model.value.email === '' || model.value.password === '') {
        userStore.setNotification({
            show: true,
            type: 'error',
            message: 'Please fill in all fields.',
        });
        return;
    } else {
        userStore.login(model.value)
            .then((response) => {
                if (response.status === 200) {
                    router.push({ name: 'adminNews' });
                }

            }).catch((error) => {
                console.error('Login error:', error);
            });
    }

}

</script>