<template>
    <div
        class="bg-black min-h-screen pt-12 relative overflow-x-hidden bg-no-repeat bg-center bg-[url(../assets/bg-illustration.svg)] bg-cover">
        <LoadingComponent v-if="userStore.loading.state"></LoadingComponent>

        <div class="z-100 md:grid md:grid-cols-12 md:gap-4 md:space-y-8">
            <div
                class="flex md:col-start-2 md:col-span-6 lg:col-start-2 lg:col-span-3 gap-4 items-center rounded-r-lg bg-secondary-red px-4 py-2 w-[90%] md:w-auto">
                <div
                    class="w-[64px] h-[64px] flex-none p-1 bg-secondary-red overflow-hidden rounded-lg bg-white flex items-center justify-center">
                    <img src="../assets/mef logo.jpeg" class="w-full h-full" alt="">
                </div>
                <h1 class="text-sm text-white font-semibold leading-8">MYANMAR EMPLOYERS FEDERATION</h1>
                <div>
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.525 4.46606C17.4736 4.65834 17.5006 4.86319 17.6002 5.03554C17.6998 5.20788 17.8637 5.33361 18.056 5.38506C18.1512 5.41054 18.2505 5.41701 18.3482 5.40412C18.4459 5.39122 18.5401 5.3592 18.6255 5.30989C18.7978 5.21031 18.9236 5.04634 18.975 4.85406L19.621 2.43906C19.6505 2.34277 19.6602 2.24152 19.6497 2.14138C19.6392 2.04123 19.6086 1.94422 19.5598 1.85615C19.511 1.76807 19.4449 1.69073 19.3656 1.62873C19.2862 1.56673 19.1952 1.52135 19.0979 1.49528C19.0006 1.46922 18.8991 1.46301 18.7994 1.47703C18.6997 1.49104 18.6038 1.525 18.5175 1.57686C18.4312 1.62873 18.3562 1.69745 18.297 1.77892C18.2378 1.86039 18.1957 1.95294 18.173 2.05106L17.525 4.46606ZM24.78 3.22006C24.9205 3.36069 24.9993 3.55131 24.9993 3.75006C24.9993 3.94881 24.9205 4.13944 24.78 4.28006L22.28 6.78006C22.1378 6.91254 21.9498 6.98467 21.7555 6.98124C21.5612 6.97781 21.3758 6.8991 21.2384 6.76168C21.101 6.62427 21.0223 6.43889 21.0188 6.24459C21.0154 6.05028 21.0875 5.86224 21.22 5.72006L23.72 3.22006C23.8606 3.07961 24.0513 3.00072 24.25 3.00072C24.4488 3.00072 24.6394 3.07961 24.78 3.22006ZM22.5 9.75206C22.5 9.55315 22.579 9.36238 22.7197 9.22173C22.8603 9.08108 23.0511 9.00206 23.25 9.00206H25.75C25.9489 9.00206 26.1397 9.08108 26.2803 9.22173C26.421 9.36238 26.5 9.55315 26.5 9.75206C26.5 9.95098 26.421 10.1417 26.2803 10.2824C26.1397 10.423 25.9489 10.5021 25.75 10.5021H23.25C23.0511 10.5021 22.8603 10.423 22.7197 10.2824C22.579 10.1417 22.5 9.95098 22.5 9.75206ZM14.249 26.0001C13.4306 26.0002 12.626 25.7889 11.9133 25.3867C11.2005 24.9844 10.6038 24.4048 10.181 23.7041L8.17101 24.7101C7.65472 24.968 7.07038 25.0569 6.50073 24.9643C5.93108 24.8717 5.40501 24.6022 4.99701 24.1941L3.80701 23.0041C3.39882 22.5961 3.12935 22.07 3.03674 21.5003C2.94413 20.9307 3.03309 20.3463 3.29101 19.8301L10.446 5.52006C10.641 5.13041 10.9257 4.79266 11.2768 4.53463C11.6278 4.27661 12.0352 4.10569 12.4653 4.03596C12.8954 3.96623 13.3359 3.99969 13.7505 4.13358C14.1651 4.26748 14.5419 4.49797 14.85 4.80606L23.195 13.1511C23.5031 13.4592 23.7335 13.8361 23.8673 14.2508C24.0011 14.6655 24.0345 15.106 23.9647 15.5361C23.8949 15.9661 23.7238 16.3735 23.4657 16.7245C23.2076 17.0755 22.8697 17.3602 22.48 17.5551L18.653 19.4681C18.9448 20.1891 19.0551 20.9708 18.9741 21.7444C18.8932 22.5181 18.6235 23.26 18.1887 23.905C17.7539 24.55 17.1674 25.0784 16.4806 25.4437C15.7938 25.809 15.0279 26.0001 14.25 26.0001M17.306 20.1431L11.53 23.0301C11.9657 23.6985 12.6322 24.1832 13.4023 24.392C14.1724 24.6008 14.9924 24.5189 15.706 24.1621C16.4197 23.8053 16.9772 23.1984 17.2722 22.457C17.5673 21.7157 17.5793 20.8927 17.306 20.1431Z"
                            fill="white" />
                    </svg>
                </div>
            </div>

            <div
                class="py-4 mt-8 md:col-start-3 md:col-span-8 flex items-center justify-center relative border-x-4 border-secondary-red">
                <div class="absolute -left-4 -top-4 bg-secondary-red rounded-full p-2">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.496 26.5586C26.072 26.5586 28.1616 24.4098 28.1616 21.7586C28.1616 19.109 26.072 16.9586 23.496 16.9586C18.832 16.9586 21.9408 7.68019 28.1616 7.68019V5.44019C17.0592 5.43859 12.7088 26.5586 23.496 26.5586ZM10.056 26.5586C12.6304 26.5586 14.72 24.4098 14.72 21.7586C14.72 19.109 12.6304 16.9586 10.056 16.9586C5.39042 16.9586 8.49922 7.68019 14.72 7.68019V5.44019C3.61922 5.43859 -0.731177 26.5586 10.056 26.5586Z"
                            fill="#F7FF00" />
                    </svg>
                </div>
                <h1 class="text-white text-base text-semibold text-center w-[70%] leading-8">
                    {{ model.title }}
                </h1>

                <div class="absolute -right-4 -bottom-4 bg-secondary-red rounded-full p-2">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.50398 5.44141C5.92798 5.44141 3.83838 7.59021 3.83838 10.2414C3.83838 12.891 5.92798 15.0414 8.50398 15.0414C13.168 15.0414 10.0592 24.3198 3.83838 24.3198V26.5598C14.9408 26.5614 19.2912 5.44141 8.50398 5.44141ZM21.944 5.44141C19.3696 5.44141 17.28 7.59021 17.28 10.2414C17.28 12.891 19.3696 15.0414 21.944 15.0414C26.6096 15.0414 23.5008 24.3198 17.28 24.3198V26.5598C28.3808 26.5614 32.7312 5.44141 21.944 5.44141Z"
                            fill="#F7FF00" />
                    </svg>

                </div>
            </div>

            <div
                class="p-4 mx-4 mt-8 md:col-start-3 md:col-span-8 rounded-lg shadow-lg relative flex items-start justify-between bg-white">
                <h1 class="leading-8 text-[#694C55] text-sm font-semibold">{{ model.description }}</h1>

                <div class="absolute bottom-0 right-4">
                    <svg width="45" height="80" viewBox="0 0 45 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M44.5914 42.421C44.3757 42.2616 44.1415 42.0328 43.9014 41.8941C43.6201 41.7318 43.3027 41.8043 43.0016 41.7099C42.5165 41.5581 42.2262 41.231 41.7139 41.527C41.2444 41.7982 41.1124 42.3648 40.9611 42.8466C40.9534 42.8707 40.9431 42.9013 40.931 42.9358C40.8536 43.0688 40.7897 43.2178 40.7447 43.3869C40.721 43.4763 40.7 43.5746 40.681 43.676C40.4838 44.3352 40.3423 45.1306 40.8421 45.2322C40.8932 45.2968 40.9523 45.3542 41.0135 45.4098C40.7535 45.6798 40.6206 45.5034 40.382 45.7595C40.0994 46.063 40.0337 46.3952 39.9278 46.7962C39.5704 48.1486 39.4552 49.5202 38.8583 50.796C38.3357 51.9128 38.128 53.0685 37.9472 54.2811C37.7498 55.6051 37.4977 56.8368 36.8181 58.0072C36.3738 58.7723 35.9153 59.4859 35.6894 60.321C35.6392 60.3976 35.586 60.4726 35.5339 60.5482C34.3986 60.433 33.2424 60.2838 32.125 60.0382C32.0441 59.9851 31.9993 59.9562 31.9993 59.9562C31.9993 59.9562 31.782 59.0286 31.5376 58.6195C31.2932 58.2104 31.3746 57.7194 31.3746 57.7194C31.3746 57.7194 32.1895 57.3102 32.1895 56.4918C32.1895 55.6734 31.6192 55.428 31.6192 55.428C31.6192 55.428 31.9451 53.1366 31.5376 52.3184C31.1302 51.5 29.1746 50.4362 27.9524 50.8454C26.7301 51.2546 26.2413 51.3365 25.8338 52.1547C25.4264 52.9731 25.2634 53.8733 25.2634 53.8733C25.2634 53.8733 25.5078 54.6917 25.5894 55.1008C25.671 55.5099 25.508 56.6555 25.5894 57.0648C25.671 57.4739 26.2413 58.7014 26.2413 58.7014L26.0783 59.4379C26.0783 59.4379 21.5968 58.0467 20.8635 57.0648C20.1188 56.0677 17.6856 51.1728 17.4412 50.8456C17.1968 50.5182 16.2189 48.8816 16.2189 48.8816H15.404C15.404 48.8816 15.6484 47.8997 15.2411 46.9995C14.8337 46.0994 13.7744 45.4446 13.7744 45.4446L11.2485 31.6968C11.2485 31.6968 18.0116 30.3875 22.2486 31.8605C26.4855 33.3334 27.9524 34.7246 28.1153 37.2614C28.2783 39.7982 37.1598 42.1714 38.2191 41.9259C38.3821 41.8442 40.0117 18.6854 40.0117 18.6854C40.0117 18.6854 31.6362 17.0222 27.7252 13.749C23.9972 10.629 24.8642 4.49088 17.0249 0H3.19571C4.45063 8.17584 9.45585 32.024 9.45585 32.024L10.3794 31.8058L12.9869 45.881C12.9869 45.881 12.4436 47.2994 12.5523 48.1723C12.661 49.0453 13.2042 50.4637 13.2042 50.4637L13.5302 51.3366L16.2463 64.9754L14.834 64.5389C14.834 64.5389 14.1821 62.4658 14.0734 61.593C13.9648 60.72 14.1821 60.1746 13.313 59.5198C12.4438 58.8651 11.5747 58.647 11.5747 58.647L10.0538 58.2106L8.53277 58.647L7.98951 59.4109L7.44624 60.7202V62.3568L7.55489 63.4478L6.79448 63.9934L5.81676 63.557L4.40443 62.7933L2.9921 61.3749C2.9921 61.3749 2.9921 56.0285 2.9921 55.7011C2.9921 55.3738 5.59946 49.4819 5.59946 49.4819C5.59946 49.4819 6.25138 49.3728 6.79448 48.3909C7.33775 47.4088 7.66371 46.8634 7.55505 46.536C7.4464 46.2086 7.22909 46.2086 6.79448 45.8813C6.35987 45.5539 5.59946 45.3357 5.59946 45.3357L4.29578 45.7722C4.29578 45.7722 3.3179 47.1906 3.42655 47.5179C3.53521 47.8453 3.75251 48.8272 3.75251 48.8272L0.492762 54.2826L0 57.2968V62.5232L4.40395 68.3576L4.94419 75.2555L3.87073 80H37.5408C37.5486 79.455 37.5162 72.4989 37.4732 68.1261C40.3949 60.743 42.1071 54.3798 43.675 46.6091C43.7434 46.2706 43.5587 45.9909 43.2466 45.9152C43.2761 45.8624 43.3099 45.812 43.3459 45.7629C44.2835 45.7781 44.5815 44.7443 44.8025 43.8944C44.8055 43.8829 44.8087 43.8714 44.8116 43.8597C44.8549 43.6926 44.8956 43.5333 44.9379 43.3915C45.0856 42.8966 44.9696 42.7003 44.5914 42.421ZM21.5152 74.0859L20.5375 70.1579L19.3968 68.0302L18.7449 66.721L18.3375 65.9026C18.3375 65.9026 18.6635 65.0842 18.6635 64.757C18.6635 64.4296 18.6635 63.9386 18.3375 63.284C18.0116 62.6293 17.2782 62.4656 17.2782 62.4656L15.2412 54.2005L15.8116 55.1006L17.1153 58.5376L18.2559 60.9926L21.6782 64.757L21.8412 68.8486L21.5152 74.0859ZM40.0987 47.8776C40.1424 47.6077 40.1956 47.3366 40.2686 47.0824C40.2122 47.3475 40.1556 47.6126 40.0987 47.8776Z"
                            fill="#363263" fill-opacity="0.2" />
                    </svg>

                </div>

                <div class="absolute -top-6 -left-4 w-12 h-12">
                    <svg class="fill-secondary-red w-full h-full" viewBox="0 0 28 28" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.525 4.46606C17.4736 4.65834 17.5006 4.86319 17.6002 5.03554C17.6998 5.20788 17.8637 5.33361 18.056 5.38506C18.1512 5.41054 18.2505 5.41701 18.3482 5.40412C18.4459 5.39122 18.5401 5.3592 18.6255 5.30989C18.7978 5.21031 18.9236 5.04634 18.975 4.85406L19.621 2.43906C19.6505 2.34277 19.6602 2.24152 19.6497 2.14138C19.6392 2.04123 19.6086 1.94422 19.5598 1.85615C19.511 1.76807 19.4449 1.69073 19.3656 1.62873C19.2862 1.56673 19.1952 1.52135 19.0979 1.49528C19.0006 1.46922 18.8991 1.46301 18.7994 1.47703C18.6997 1.49104 18.6038 1.525 18.5175 1.57686C18.4312 1.62873 18.3562 1.69745 18.297 1.77892C18.2378 1.86039 18.1957 1.95294 18.173 2.05106L17.525 4.46606ZM24.78 3.22006C24.9205 3.36069 24.9993 3.55131 24.9993 3.75006C24.9993 3.94881 24.9205 4.13944 24.78 4.28006L22.28 6.78006C22.1378 6.91254 21.9498 6.98467 21.7555 6.98124C21.5612 6.97781 21.3758 6.8991 21.2384 6.76168C21.101 6.62427 21.0223 6.43889 21.0188 6.24459C21.0154 6.05028 21.0875 5.86224 21.22 5.72006L23.72 3.22006C23.8606 3.07961 24.0513 3.00072 24.25 3.00072C24.4488 3.00072 24.6394 3.07961 24.78 3.22006ZM22.5 9.75206C22.5 9.55315 22.579 9.36238 22.7197 9.22173C22.8603 9.08108 23.0511 9.00206 23.25 9.00206H25.75C25.9489 9.00206 26.1397 9.08108 26.2803 9.22173C26.421 9.36238 26.5 9.55315 26.5 9.75206C26.5 9.95098 26.421 10.1417 26.2803 10.2824C26.1397 10.423 25.9489 10.5021 25.75 10.5021H23.25C23.0511 10.5021 22.8603 10.423 22.7197 10.2824C22.579 10.1417 22.5 9.95098 22.5 9.75206ZM14.249 26.0001C13.4306 26.0002 12.626 25.7889 11.9133 25.3867C11.2005 24.9844 10.6038 24.4048 10.181 23.7041L8.17101 24.7101C7.65472 24.968 7.07038 25.0569 6.50073 24.9643C5.93108 24.8717 5.40501 24.6022 4.99701 24.1941L3.80701 23.0041C3.39882 22.5961 3.12935 22.07 3.03674 21.5003C2.94413 20.9307 3.03309 20.3463 3.29101 19.8301L10.446 5.52006C10.641 5.13041 10.9257 4.79266 11.2768 4.53463C11.6278 4.27661 12.0352 4.10569 12.4653 4.03596C12.8954 3.96623 13.3359 3.99969 13.7505 4.13358C14.1651 4.26748 14.5419 4.49797 14.85 4.80606L23.195 13.1511C23.5031 13.4592 23.7335 13.8361 23.8673 14.2508C24.0011 14.6655 24.0345 15.106 23.9647 15.5361C23.8949 15.9661 23.7238 16.3735 23.4657 16.7245C23.2076 17.0755 22.8697 17.3602 22.48 17.5551L18.653 19.4681C18.9448 20.1891 19.0551 20.9708 18.9741 21.7444C18.8932 22.5181 18.6235 23.26 18.1887 23.905C17.7539 24.55 17.1674 25.0784 16.4806 25.4437C15.7938 25.809 15.0279 26.0001 14.25 26.0001M17.306 20.1431L11.53 23.0301C11.9657 23.6985 12.6322 24.1832 13.4023 24.392C14.1724 24.6008 14.9924 24.5189 15.706 24.1621C16.4197 23.8053 16.9772 23.1984 17.2722 22.457C17.5673 21.7157 17.5793 20.8927 17.306 20.1431Z" />
                    </svg>
                </div>
            </div>

            <FormProgressComponent v-if="!caseId" class="md:col-start-3 md:col-span-5"
                :progressData="{ 'total': totalQuestions, 'answered': answeredQuestions, 'percentage': progress }">
            </FormProgressComponent>

            <div v-if="caseId"
                class="mx-4 my-8 p-4 md:col-start-5 md:col-span-4 bg-white flex flex-col items-center justify-center gap-4 rounded-lg shadow-lg">
                <div class="w-8 h-8">
                    <svg class="w-full h-full" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M24 48C30.6274 48 36.6274 45.3137 40.9705 40.9705C45.3137 36.6274 48 30.6274 48 24C48 17.3726 45.3137 11.3726 40.9705 7.02943C36.6274 2.6863 30.6274 0 24 0C17.3726 0 11.3726 2.6863 7.02943 7.02943C2.6863 11.3726 0 17.3726 0 24C0 30.6274 2.6863 36.6274 7.02943 40.9705C11.3726 45.3137 17.3726 48 24 48Z"
                            fill="#A087F4" />
                        <path d="M14.3999 24.0008L21.5999 31.2008L35.9999 16.8008" stroke="white" stroke-width="4"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </div>
                <h2 class="text-sm text-gray-500 font-semibold">ANSWER SUBMITTED!</h2>
                <h1 class="text-sm font-semibold text-gray-600 font-medium">Case: {{ caseId }}</h1>
            </div>

            <!-- Input session -->
            <div v-else class="mx-4 my-8 space-y-8 md:space-y-12 md:col-start-3 md:col-span-8 min-h-[70vh]">
                <TransitionGroup name="fade-horizontal">
                    <div v-for="(question, index) in paginatedQuestions" :key="question.id">
                        <AnswerComponent :index="index + currentPage * questionsPerPage" :question="question"
                            v-model="answer[question.id]">
                        </AnswerComponent>
                    </div>
                </TransitionGroup>
            </div>

            <div class="md:col-start-1 md:col-span-6 mb-6">
                <div class="flex justify-center items-center gap-4 text-sm">
                    <div @click="prevPage"
                        class="bg-white border border-black/40 shadow-lg focus:shadow-none hover:shadow-none transition cursor-pointer rounded-lg px-8 py-2 flex items-center gap-1">
                        <h3>Cancel</h3>
                    </div>
                    <div v-if="!caseId" @click="(currentPage < totalPages - 1) ? nextPage() : submitAnswer()"
                        class="bg-light-blue text-white font-semibold border border-light-blue focus:shadow-none hover:shadow-none transition cursor-pointer shadow-lg rounded-lg px-8 py-2 flex items-center gap-1">
                        <h3>Next</h3>
                    </div>
                </div>
            </div>
        </div>
        <transition name="fade-horizontal" mode="out-in">
            <div v-if="notification.visible" :class="[notification.type === 'success' ? 'bg-green-500' : 'bg-red-500']"
                class="fixed top-4 right-4 text-white px-4 py-2 rounded shadow-lg z-50 rounded-lg">
                {{ notification.message }}
            </div>
        </transition>
    </div>

</template>

<script setup>
import { ref } from 'vue'
import FormProgressComponent from '../components/FormProgressComponent.vue'
import { useSurveyStore } from '../stores/surveyStore.js'
import { useUserStore } from '../stores/userStore.js'
import { useRoute } from 'vue-router'
import { onMounted } from 'vue'
import AnswerComponent from '../components/AnswerComponent.vue'
import { computed } from 'vue'
import { toValue } from 'vue'
import { useRouter } from 'vue-router'
import LoadingComponent from '../components/LoadingComponent.vue'

const model = ref({
    title: '',
    id: '',
    version: 1,
    description: '',
    created_at: '',
    status: 0,
    id_prefix_question: {
        question_text: '',
        description: '',
        type: 'radio',
        data: {
            options: []
        },
    },
    form_version_id: '',
    questions: [

    ],
})

const router = useRouter();
const questionsPerPage = 3 // Number of questions per page
const currentPage = ref(0) // Track the current page
const totalPages = computed(() => Math.ceil(model.value.questions.length / questionsPerPage))

// Paginated questions for the current page
const paginatedQuestions = computed(() => {
    const start = currentPage.value * questionsPerPage
    const end = start + questionsPerPage
    return model.value.questions.slice(start, end)
})

const answeredQuestions = computed(() => {
    return Object.keys(answer.value).filter((key) => {
        const value = answer.value[key];
        if (typeof value === 'string') {
            return value.trim() !== ''; // Check if the string is not empty
        } else if (Array.isArray(value)) {
            return value.length > 0; // Check if the array is not empty
        }
        return false; // Default case, not answered
    }).length;
});

const totalQuestions = computed(() => {
    return model.value.questions.length;
});

const progress = computed(() => {
    let percent = Math.round((answeredQuestions.value / totalQuestions.value) * 100);
    return percent > 100 ? 100 : percent;
});

// Navigation functions
const nextPage = () => {
    if (!validateRequiredFields()) {
        showNotification('Please fill in all required fields before proceeding.');
        return;
    }

    if (currentPage.value < totalPages.value - 1) {
        currentPage.value++
    }
}

const prevPage = () => {
    if (caseId.value) {
        router.push({ name: 'home' })
        return;
    }

    if (currentPage.value > 0) {
        currentPage.value--
    }
}

const answer = ref({
})

const surveyStore = useSurveyStore();
const userStore = useUserStore();
const route = useRoute()
const my_error = ref('')

onMounted(() => {
    let id = route.params.id;
    userStore.loading.message = 'Loading form...'
    userStore.loading.state = true;
    surveyStore.getSurveyById(id).then((response) => {
        model.value = response;
        model.value.questions.unshift(model.value.id_prefix_question)

        if (response.id) {
            userStore.loading.state = false;
        }

    }).catch((error) => {

        my_error.value = error.response.data.message;
    })

})

const selectedOptionQ1 = ref('')
const otherDetailsQ1 = ref('')
const selectedCheckboxes = ref([])

const selectedOptionQ2 = ref('')
const otherDetailsQ2 = ref('')


function submitAnswer() {
    let pre_answer = {};
    pre_answer = JSON.parse(JSON.stringify(answer.value));

    Object.keys(pre_answer).forEach((key) => {
        const index = model.value.questions.findIndex((q) => {
            return q.id === parseInt(key);
        });
        if (index !== -1) {
            pre_answer[key] = {
                'type': model.value.questions[index].type,
                'content': answer.value[key],
                'is_prefixed': model.value.questions[index].is_prefixed,
                'form_version_id': model.value.form_version_id
            }
        }
    })

    const payload = {
        'survey_id': model.value.id,
        'version': model.value.version,
        'answers': pre_answer,
        'form_version_id': model.value.form_version_id,
    }

    surveyStore.submitAnswer(payload.survey_id, payload).then((response) => {
        showNotification('Answer submitted successfully!', 'success');
    }).catch((error) => {

        showNotification('Failed to submit answer. Please try again.', 'error');
    })

}

const notification = ref({
    visible: false,
    message: '',
});

const caseId = computed(() => {
    let canseId = '';

    if (model.value.form_version_id && surveyStore.answerRecord.length > 0) {
        const answerIndex = surveyStore.answerRecord.findIndex((record) => {

            console.log('Answer record.form_version', parseInt(record.form_version_id));
            console.log('model.value.form_version', model.value.form_version_id);

            return parseInt(record.form_version_id) === model.value.form_version_id;
        });
        console.log('Answer index', answerIndex);


        if (answerIndex === -1) {
            return false; // Not submitted
        } else {

            return surveyStore.answerRecord[answerIndex].case_id; // Submitted
        }
    } else {
        return false; // Submitted
    };

})

const showNotification = (message, type) => {
    notification.value.message = message;
    notification.value.visible = true;
    notification.value.type = type || 'success'; // Default to 'success' if no type is provided
    // Hide the notification after 3 seconds
    setTimeout(() => {
        notification.value.visible = false;
    }, 3000);
};

const validateRequiredFields = () => {
    const currentQuestions = paginatedQuestions.value;


    for (const question of currentQuestions) {
        const value = answer.value[question.id];
        if (question.is_required) {
            if (typeof value === 'string') {
                // Check if the string is empty
                if (value.trim() === '') {
                    return false;
                }
            } else if (Array.isArray(value)) {
                // Check if the array is empty
                if (value.length === 0) {
                    return false;
                }
            } else {
                // Handle other types (e.g., undefined, null)
                return false;
            }
        }
    }

    return true; // All required fields are filled
};

</script>

<style scoped>
.fade-horizontal-enter-active {
    transition: transform 0.5s ease, opacity 0.5s ease;
}

.fade-horizontal-leave-active {
    opacity: 0;
}

.fade-horizontal-enter-from {
    transform: translateX(100%);
    opacity: 0;
}

.fade-horizontal-leave-to {
    opacity: 0;
}
</style>