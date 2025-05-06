<template>

    <!-- Cover images slider -->
    <div class="lg:flex lg:justify-center lg:items-center bg-black">
        <div class="w-full h-[280px] md:h-[30vh] lg:w-full lg:h-[400px] relative">

            <div class="lg:text-center lg:flex lg:justify-center">
                <transition name="fade">
                    <img v-if="imgs[currentIndex]" :src="imgs[currentIndex].image" :key="currentIndex" alt=""
                        class="w-full h-full lg:w-[70%] absolute transition-opacity duration-500" />
                </transition>
            </div>


            <div class="w-full h-[48px] absolute bottom-0 left-0 right-0"
                style="background: linear-gradient(180deg,rgba(0, 0, 0, 0) 70%, rgba(0, 0, 0, 1) 100%);">
            </div>

            <div class="w-full h-full custom-home-bg  absolute top-0 left-0 z-10">

            </div>

            <div class="w-full h-[48px] absolute bottom-[-48px] left-0 right-0"
                style="background: linear-gradient(0deg,rgba(0, 0, 0, 0) 70%, rgba(0, 0, 0, 1) 100%)">

            </div>

            <transition name="fade">
                <!-- Dynamic Text -->
                <p v-if="imgs[currentIndex]"
                    class="text-white tracking-wider leading-7 text-base md:text-base absolute z-50 bottom-4 left-4 md:top-[55%] md:left-8 lg:left-[10%] md:w-[35%] w-[60%] text-justify">
                    "{{ imgs[currentIndex].text }}"
                </p>
            </transition>

        </div>
    </div>

    <!-- Marketing paragraph -->
    <div class="md:grid md:grid-cols-12 items-center mx-4 gap-4 mt-8 lg:mt-12">
        <p
            class="text-justify text-sm font-medium md:col-span-5 md:col-start-2 lg:col-start-2 lg:col-span-6 leading-6 tracking-wider">
            <span class="text-secondary-red font-semibold text-base lg:text-xl">“The Myanmar Employers
                Federation”</span> is an
            independent body of the International Labour Organization (ILO)
            that is an independent organization in accordance with Article 87 of the Constitution on the Right to
            Organize and Organize, an organization that values democracy and human rights for the purpose of profit, and
            will respect the existing laws of Myanmar and cooperate with the relevant ministries of the Government of
            National Unity and labor organizations as necessary.
        </p>

        <div class="md:col-span-5 lg:col-start-8 lg:col-span-4 mt-4 lg:mt-0">
            <img src="../assets/mef logo.jpeg" class="w-full h-full" alt="">
        </div>
    </div>

    <div class="lg:grid lg:grid-cols-12">
        <div class="relative h-[232px] md:h-[25vh] lg:h-[480px] mt-8 lg:col-start-2 lg:col-span-10">
            <img src="../assets/ILO-Protest03.jpg" class="w-full h-full brightness-15 saturate-10" alt="">

            <p
                class="text-sm italic absolute top-8 left-4 md:top-[30%] md:left-12 md:text-base text-white font-medium tracking-wider leading-7 w-[60%] lg:w-[30%]">
                Public reports are essential
                For holding Myanmar Military <span
                    class="text-base md:text-xl text-[#5F2021] font-semibold">“ACCOUNTABLE!”</span>
            </p>

            <div class="flex flex-col gap-4 absolute bottom-8 right-4 md:right-12 lg:right-16 items-center">
                <div>
                    <button @click.stop="reportNow"
                        class="flex gap-2 px-4 py-2 bg-[#5F2021] rounded-full hover:bg-secondary-red/80 transition duration-300 ease-in-out">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.0142 3.05197C9.98482 3.16185 10.0003 3.2789 10.0572 3.37739C10.1141 3.47587 10.2078 3.54772 10.3176 3.57712C10.3721 3.59168 10.4288 3.59537 10.4846 3.588C10.5405 3.58063 10.5943 3.56234 10.6431 3.53416C10.7415 3.47726 10.8134 3.38356 10.8428 3.27369L11.2119 1.89369C11.2288 1.83866 11.2343 1.78081 11.2283 1.72358C11.2223 1.66635 11.2048 1.61092 11.1769 1.56059C11.1491 1.51027 11.1113 1.46607 11.066 1.43064C11.0206 1.39521 10.9686 1.36928 10.913 1.35439C10.8574 1.33949 10.7994 1.33595 10.7425 1.34395C10.6855 1.35196 10.6307 1.37137 10.5814 1.401C10.532 1.43064 10.4892 1.46991 10.4554 1.51646C10.4215 1.56302 10.3974 1.61591 10.3845 1.67197L10.0142 3.05197ZM14.1599 2.33997C14.2402 2.42033 14.2853 2.52926 14.2853 2.64283C14.2853 2.7564 14.2402 2.86533 14.1599 2.94569L12.7314 4.37426C12.6501 4.44996 12.5427 4.49118 12.4316 4.48922C12.3206 4.48726 12.2147 4.44228 12.1362 4.36376C12.0576 4.28524 12.0127 4.1793 12.0107 4.06827C12.0087 3.95724 12.0499 3.84979 12.1256 3.76855L13.5542 2.33997C13.6346 2.25972 13.7435 2.21464 13.8571 2.21464C13.9706 2.21464 14.0796 2.25972 14.1599 2.33997ZM12.8571 6.07255C12.8571 5.95888 12.9022 5.84987 12.9826 5.7695C13.063 5.68913 13.172 5.64397 13.2856 5.64397H14.7142C14.8279 5.64397 14.9369 5.68913 15.0173 5.7695C15.0976 5.84987 15.1428 5.95888 15.1428 6.07255C15.1428 6.18621 15.0976 6.29522 15.0173 6.37559C14.9369 6.45596 14.8279 6.50112 14.7142 6.50112H13.2856C13.172 6.50112 13.063 6.45596 12.9826 6.37559C12.9022 6.29522 12.8571 6.18621 12.8571 6.07255ZM8.14222 15.3571C7.67455 15.3572 7.21479 15.2365 6.80751 15.0066C6.40024 14.7767 6.05926 14.4455 5.81765 14.0451L4.66908 14.62C4.37406 14.7674 4.04015 14.8182 3.71463 14.7653C3.38912 14.7124 3.0885 14.5584 2.85536 14.3251L2.17536 13.6451C1.94212 13.412 1.78813 13.1114 1.73521 12.7858C1.68229 12.4603 1.73312 12.1264 1.88051 11.8314L5.96908 3.65426C6.08048 3.4316 6.24318 3.2386 6.4438 3.09116C6.64441 2.94371 6.87719 2.84605 7.12295 2.8062C7.36871 2.76636 7.62042 2.78548 7.85734 2.86199C8.09426 2.9385 8.30961 3.0702 8.48565 3.24626L13.2542 8.01483C13.4303 8.19091 13.5619 8.4063 13.6384 8.64325C13.7149 8.8802 13.7339 9.13192 13.694 9.37769C13.6541 9.62345 13.5564 9.85622 13.4089 10.0568C13.2614 10.2574 13.0683 10.4201 12.8456 10.5314L10.6588 11.6245C10.8255 12.0366 10.8886 12.4833 10.8423 12.9253C10.796 13.3674 10.6419 13.7914 10.3935 14.16C10.145 14.5285 9.80985 14.8305 9.41742 15.0392C9.02498 15.2479 8.58729 15.3571 8.14279 15.3571M9.88908 12.0103L6.58851 13.66C6.8375 14.0419 7.2183 14.3189 7.65837 14.4382C8.09843 14.5575 8.567 14.5108 8.97481 14.3069C9.38262 14.103 9.70117 13.7562 9.86977 13.3325C10.0384 12.9089 10.0452 12.4386 9.88908 12.0103Z"
                                fill="white" />
                        </svg>
                        <span class="text-sm tracking-wider text-white">Report Now</span>
                    </button>
                </div>

                <div>
                    <button @click="router.push({ name: 'reports' })"
                        class="flex gap-2 px-4 py-1 border border-white rounded-full hover:bg-secondary-red/80 transition duration-300 ease-in-out">
                        <span class="text-sm tracking-wider text-white">Browse</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div v-if="news.length !== 0" class="md:grid md:grid-cols-12 bg-[#F0F4F5] md:pb-[120px]">
        <div class="mt-8 mx-4 md:col-start-3 md:col-span-8 md:mb-16 md:mx-0">
            <h3
                class="text-[#5F2021] text-center md:font-semibold md:text-2xl underline underline-offset-8 text-xl tracking-widest">
                “NEWS &
                ACTIVITIES”
            </h3>
        </div>

        <div
            class="bg-white md:bg-transparent md:shadow-none md:rounded-none md:flex shadow-lg rounded-lg mx-4 h-[280px] md:h-auto relative overflow-visible mt-8 md:mt-16 md:mx-0 md:col-start-2 md:col-span-10 lg:col-span-8 lg:col-start-3">

            <div v-if="deviceType === 'mobile'"
                style="background: linear-gradient(45deg,rgba(0, 0, 0, 1) 29%, rgba(0, 0, 0, 0) 100%)"
                class="absolute top-0 bottom-0 left-0 right-0 z-5">
            </div>

            <div class="md:flex-1 md:-top-6 md:relative">
                <div v-if="deviceType !== 'mobile'" class="relative md:h-[260px] w-full overflow-hidden">
                    <div v-for="(newsObj, index) in news" :key="index" class="absolute top-0 left-0 w-full h-full"
                        :ref="el => (newsImages[index] = el)">
                        <img :src="newsObj.image" class="w-full h-full object-cover md:brightness-55" alt="" />
                    </div>
                </div>

                <div v-if="deviceType === 'mobile'" class="absolute top-0 left-0 w-full h-full">
                    <img :src="news[0].image" class="w-full h-full object-cover md:brightness-55" alt="" />
                </div>
                <div class="flex gap-2 cursor-pointer">
                    <div @click.stop="rollbackNewsIndex" class="p-2 bg-[#5F2021] group flex item-center justify-center">
                        <svg class="group-hover:-translate-x-1 group-active:translate-x-0 transition" width="24"
                            height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.4141 28.728C21.789 28.353 21.9997 27.8444 21.9997 27.314C21.9997 26.7837 21.789 26.2751 21.4141 25.9L11.5141 16L21.4141 6.10003C21.7784 5.72282 21.98 5.21762 21.9754 4.69322C21.9709 4.16883 21.7605 3.6672 21.3897 3.29639C21.0189 2.92557 20.5173 2.71523 19.9929 2.71068C19.4685 2.70612 18.9633 2.90771 18.5861 3.27203L7.2721 14.586C6.89715 14.9611 6.68652 15.4697 6.68652 16C6.68652 16.5304 6.89715 17.039 7.2721 17.414L18.5861 28.728C18.9612 29.103 19.4698 29.3136 20.0001 29.3136C20.5304 29.3136 21.039 29.103 21.4141 28.728Z"
                                fill="white" />
                        </svg>
                    </div>
                    <div @click.stop="updateNewsIndex" class="p-2 bg-[#5F2021] group flex item-center justify-center ">
                        <svg class="group-hover:translate-x-1 group-active:translate-x-0 transition" width="24"
                            height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.5859 3.27197C10.211 3.64703 10.0003 4.15565 10.0003 4.68597C10.0003 5.2163 10.211 5.72492 10.5859 6.09997L20.4859 16L10.5859 25.9C10.2216 26.2772 10.02 26.7824 10.0246 27.3068C10.0291 27.8312 10.2395 28.3328 10.6103 28.7036C10.9811 29.0744 11.4827 29.2848 12.0071 29.2893C12.5315 29.2939 13.0367 29.0923 13.4139 28.728L24.7279 17.414C25.1028 17.0389 25.3135 16.5303 25.3135 16C25.3135 15.4696 25.1028 14.961 24.7279 14.586L13.4139 3.27197C13.0388 2.89703 12.5302 2.6864 11.9999 2.6864C11.4696 2.6864 10.961 2.89703 10.5859 3.27197Z"
                                fill="white" />
                        </svg>

                    </div>

                    <div class="flex gap-2 items-center justify-center">
                        <h3 class="text-sm text-gray-400 font-semibold">0{{ currentNewsIndex + 1 }} of 0{{ news.length
                            }}
                        </h3>
                    </div>
                </div>
            </div>
            <div
                class="absolute bottom-4 left-4 right-4 flex-1 z-20 md:py-4 md:px-4 md:relative md:left-0 md:right-0 md:-bottom-6 md:bg-white md:border md:border-black/20 md:rounded-lg">

                <div class="md:flex md:flex-col md:gap-2 md:justify-between md:h-full">
                    <p class="text-white md:text-black text-sm lg:text-sm font-medium tracking-wider leading-6 mt-2">
                        {{ news[currentNewsIndex].title }}
                    </p>

                    <div class="flex items-center justify-between">
                        <!-- Msg / Likes / date -->
                        <div class="flex justify-betweem items-center gap-4">
                            <!-- Date icon -->
                            <div class="flex gap-1 items-center">
                                <svg v-if="deviceType === 'mobile'" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="path-1-inside-1_17_325" fill="white">
                                        <path
                                            d="M5.00004 4.00008V0.666748V4.00008ZM11.6667 4.00008V0.666748V4.00008ZM14.3334 11.3334V14.3334H2.33337V12.3334M14.242 5.66675H2.23471H14.242ZM0.333374 12.1667V12.3334H12.2667L12.3667 12.1667L12.5227 11.8394C13.7148 9.33388 14.3334 6.5941 14.3334 3.81941V2.33341H2.33337V3.75208C2.3334 6.5482 1.70527 9.30861 0.495374 11.8294L0.333374 12.1667Z" />
                                    </mask>
                                    <path
                                        d="M14.3334 14.3334V15.3334H15.3334V14.3334H14.3334ZM2.33337 14.3334H1.33337V15.3334H2.33337V14.3334ZM0.333374 12.1667L-0.568066 11.7338L-0.666626 11.9391V12.1667H0.333374ZM0.333374 12.3334H-0.666626V13.3334H0.333374V12.3334ZM12.2667 12.3334V13.3334H12.8329L13.1242 12.8479L12.2667 12.3334ZM12.3667 12.1667L13.2242 12.6812L13.2488 12.6402L13.2694 12.597L12.3667 12.1667ZM12.5227 11.8394L13.4254 12.2696L13.4257 12.2691L12.5227 11.8394ZM14.3334 3.81941H13.3334V3.81942L14.3334 3.81941ZM14.3334 2.33341H15.3334V1.33341H14.3334V2.33341ZM2.33337 2.33341V1.33341H1.33337V2.33341H2.33337ZM2.33337 3.75208H1.33337L1.33337 3.75209L2.33337 3.75208ZM0.495374 11.8294L1.39681 12.2623L1.39691 12.2621L0.495374 11.8294ZM6.00004 4.00008V0.666748H4.00004V4.00008H6.00004ZM12.6667 4.00008V0.666748H10.6667V4.00008H12.6667ZM13.3334 11.3334V14.3334H15.3334V11.3334H13.3334ZM14.3334 13.3334H2.33337V15.3334H14.3334V13.3334ZM3.33337 14.3334V12.3334H1.33337V14.3334H3.33337ZM14.242 4.66675H2.23471V6.66675H14.242V4.66675ZM-0.666626 12.1667V12.3334H1.33337V12.1667H-0.666626ZM0.333374 13.3334H12.2667V11.3334H0.333374V13.3334ZM13.1242 12.8479L13.2242 12.6812L11.5092 11.6523L11.4092 11.8189L13.1242 12.8479ZM13.2694 12.597L13.4254 12.2696L11.62 11.4092L11.464 11.7365L13.2694 12.597ZM13.4257 12.2691C14.6817 9.62929 15.3334 6.74274 15.3334 3.81941L13.3334 3.81942C13.3334 6.44545 12.748 9.03846 11.6197 11.4098L13.4257 12.2691ZM15.3334 3.81941V2.33341H13.3334V3.81941H15.3334ZM14.3334 1.33341H2.33337V3.33341H14.3334V1.33341ZM1.33337 2.33341V3.75208H3.33337V2.33341H1.33337ZM1.33337 3.75209C1.3334 6.39842 0.738917 9.01095 -0.406162 11.3967L1.39691 12.2621C2.67162 9.60627 3.3334 6.69799 3.33337 3.75207L1.33337 3.75209ZM-0.406066 11.3965L-0.568066 11.7338L1.23481 12.5997L1.39681 12.2623L-0.406066 11.3965Z"
                                        fill="white" mask="url(#path-1-inside-1_17_325)" />
                                </svg>

                                <svg v-if="deviceType !== 'mobile'" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="path-1-inside-1_329_363" fill="white">
                                        <path
                                            d="M4.99992 3.99996V0.666626ZM11.6666 3.99996V0.666626ZM14.3333 11.3333V14.3333H2.33325V12.3333M14.2419 5.66663H2.23459ZM0.333252 12.1666V12.3333H12.2666L12.3666 12.1666L12.5226 11.8393C13.7147 9.33376 14.3333 6.59397 14.3333 3.81929V2.33329H2.33325V3.75196C2.33328 6.54808 1.70515 9.30849 0.495252 11.8293L0.333252 12.1666Z" />
                                    </mask>
                                    <path
                                        d="M14.3333 14.3333V15.3333H15.3333V14.3333H14.3333ZM2.33325 14.3333H1.33325V15.3333H2.33325V14.3333ZM0.333252 12.1666L-0.568188 11.7337L-0.666748 11.939V12.1666H0.333252ZM0.333252 12.3333H-0.666748V13.3333H0.333252V12.3333ZM12.2666 12.3333V13.3333H12.8328L13.1241 12.8478L12.2666 12.3333ZM12.3666 12.1666L13.2241 12.6811L13.2487 12.6401L13.2693 12.5968L12.3666 12.1666ZM12.5226 11.8393L13.4253 12.2695L13.4256 12.2689L12.5226 11.8393ZM14.3333 3.81929L13.3333 3.81929L13.3333 3.8193L14.3333 3.81929ZM14.3333 2.33329H15.3333V1.33329H14.3333V2.33329ZM2.33325 2.33329V1.33329H1.33325V2.33329H2.33325ZM2.33325 3.75196L1.33325 3.75196L1.33325 3.75197L2.33325 3.75196ZM0.495252 11.8293L1.39669 12.2622L1.39679 12.262L0.495252 11.8293ZM4.99992 3.99996H5.99992V0.666626H4.99992H3.99992V3.99996H4.99992ZM11.6666 3.99996H12.6666V0.666626H11.6666H10.6666V3.99996H11.6666ZM14.3333 11.3333H13.3333V14.3333H14.3333H15.3333V11.3333H14.3333ZM14.3333 14.3333V13.3333H2.33325V14.3333V15.3333H14.3333V14.3333ZM2.33325 14.3333H3.33325V12.3333H2.33325H1.33325V14.3333H2.33325ZM14.2419 5.66663V4.66663H2.23459V5.66663V6.66663H14.2419V5.66663ZM0.333252 12.1666H-0.666748V12.3333H0.333252H1.33325V12.1666H0.333252ZM0.333252 12.3333V13.3333H12.2666V12.3333V11.3333H0.333252V12.3333ZM12.2666 12.3333L13.1241 12.8478L13.2241 12.6811L12.3666 12.1666L11.5091 11.6521L11.4091 11.8188L12.2666 12.3333ZM12.3666 12.1666L13.2693 12.5968L13.4253 12.2695L12.5226 11.8393L11.6199 11.4091L11.4639 11.7364L12.3666 12.1666ZM12.5226 11.8393L13.4256 12.2689C14.6816 9.62917 15.3333 6.74261 15.3333 3.81929L14.3333 3.81929L13.3333 3.8193C13.3333 6.44533 12.7478 9.03834 11.6196 11.4097L12.5226 11.8393ZM14.3333 3.81929H15.3333V2.33329H14.3333H13.3333V3.81929H14.3333ZM14.3333 2.33329V1.33329H2.33325V2.33329V3.33329H14.3333V2.33329ZM2.33325 2.33329H1.33325V3.75196H2.33325H3.33325V2.33329H2.33325ZM2.33325 3.75196L1.33325 3.75197C1.33328 6.3983 0.738795 9.01083 -0.406284 11.3966L0.495252 11.8293L1.39679 12.262C2.6715 9.60615 3.33328 6.69786 3.33325 3.75195L2.33325 3.75196ZM0.495252 11.8293L-0.406188 11.3964L-0.568188 11.7337L0.333252 12.1666L1.23469 12.5995L1.39669 12.2622L0.495252 11.8293Z"
                                        fill="black" mask="url(#path-1-inside-1_329_363)" />
                                </svg>

                                <span class="text-xs text-white md:text-black font-semibold">{{ news.publish_date
                                    }}</span>
                            </div>
                        </div>

                        <div class="flex gap-4 items-center">
                            <!-- Comment icon -->
                            <div class="flex items-center gap-1">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 0.000800027C3.5816 0.000800027 1.32459e-06 3.58235 1.32459e-06 8.0007C-0.000676915 9.17938 0.259117 10.3437 0.760801 11.4103L0.0168013 15.0398C-0.00968752 15.1694 -0.003629 15.3035 0.0344345 15.4302C0.072498 15.5569 0.141379 15.6722 0.234911 15.7657C0.328443 15.8592 0.443707 15.9281 0.570386 15.9662C0.697066 16.0042 0.831206 16.0103 0.960801 15.9838L4.5904 15.2398C5.6256 15.7278 6.7824 15.9998 8 15.9998C12.4184 15.9998 16 12.419 16 7.9999C16 3.58235 12.4184 0 8 0"
                                        fill="#A7A7A7" />
                                </svg>
                                <span class="text-sm text-white md:text-black font-timenew">{{ news.comments?.length ||
                                    0
                                    }}</span>
                            </div>

                            <!-- Like icon -->
                            <div class="flex items-center gap-1">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.26967 1.47326C2.08154 0.529931 3.18253 0 4.33051 0C5.4785 0 6.57949 0.529931 7.39136 1.47326C7.5501 1.65709 7.75444 1.88587 8.00439 2.1596C8.25376 1.88587 8.45782 1.65709 8.61656 1.47326C9.42503 0.538009 10.5184 0.0113884 11.6591 0.0078378C12.7997 0.00428717 13.8955 0.524094 14.7083 1.4543C15.521 2.3845 15.9851 3.64992 15.9996 4.97558C16.0142 6.30123 15.578 7.57999 14.7859 8.53395L8.61569 15.7053C8.45332 15.894 8.23312 16 8.00353 16C7.77393 16 7.55373 15.894 7.39136 15.7053L1.22118 8.53496C0.429811 7.58636 -0.0087772 6.31403 0.000133157 4.99277C0.00904351 3.6715 0.465603 2.40733 1.26967 1.47326Z"
                                        fill="#A7A7A7" />
                                </svg>

                                <span class="text-sm text-white md:text-black">{{ news.likes }}</span>
                            </div>
                        </div>

                    </div>

                    <p v-if="deviceType !== 'mobile'"
                        class="text-white md:text-black text-xs font-medium tracking-wider leading-6 mt-2 md:line-clamp-4">
                        {{ news[currentNewsIndex].body }}
                    </p>

                    <div v-if="deviceType !== 'mobile'" class="flex justify-end items-center">
                        <button @click.stop="goTo('activities')"
                            class="px-2 py-1 rounded-full border border-[#00E0E9] text-xs text-[#00E0E9] font-semibold cursor-pointer hover:bg-[#00E0E9]/30 hover:text-white transition duration-300 ease-in-out">
                            See more
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="md:grid md:grid-cols-12">
        <div class="mt-8 mx-4 md:col-start-10 md:col-span-2 md:mx-0 md:mt-16 mb-8 lg:col-start-10 lg:col-span-2">
            <h3 class="text-[#5F2021] text-right underline underline-offset-8 text-xl tracking-widest">“Statements"
            </h3>
        </div>

        <div class="md:col-start-2 md:col-span-10 lg:col-span-5 lg:col-start-7">
            <!-- Statement body Card -->
            <div
                class="px-2 py-3 mx-6 rounded-lg bg-white shadow-lg border border-black/20 md:px-4 md:py-4 md:mx-0 md:col-start-2 md:col-span-7">
                <h1 class="text-sm font-semibold text-center mx-4">
                    {{ statement.title }}
                </h1>

                <div class="flex justify-between items-center my-4">
                    <span class="text-black text-[10px] font-semibold">{{ statement.date }}</span>
                    <span class="text-black/70 text-[10px]">{{ statement.statement_no }}</span>
                </div>

                <p class="text-xs text-black text-justify leading-6">
                    {{ statement.body }}
                </p>

                <div class="text-right mt-4">
                    <span class="text-[10px] text-black font-medium">{{ statement.committee }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="md:grid md:grid-cols-12 my-8">
        <div class="mr-4 rounded-r-lg bg-[#5F2021] p-4 my-8 md:m-0 md:col-start-4 md:col-span-6 md:rounded-r-none">
            <div class="mx-4">
                <h3 class="text-white text-left underline underline-offset-8 text-xl tracking-widest">"Newsletters"</h3>
            </div>

            <div class="mx-6 relative my-8">
                <input type="text"
                    class="rounded-full p-2 text-sm w-full bg-transparent border border-white/60 text-white placeholder:text-white focus:outline-none focus:border-white/80"
                    placeholder="Enter your email address" />
                <button
                    class="text-xs bg-white/90 p-2 rounded-full absolute right-0 h-full cursor-pointer hover:bg-white/70 active:bg-white/90">Subscribe</button>
            </div>

            <div class="text-center">
                <h3 class="text-base text-white italic">THANKS</h3>
                <h2 class="text-base text-white italic">We wil keep you posted!!</h2>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, onBeforeMount, watch } from 'vue';
import SeeMoreNews from '@/components/SeeMoreNews.vue';
import { useNewsStore } from '@/stores/newsStore';
import { useDeviceType } from '@/composables/useDeviceType';
import { useRouter } from 'vue-router';
import gsap from 'gsap';
import { useSurveyStore } from '@/stores/surveyStore';

const newsStore = useNewsStore();
// Current index for the carousel
const currentIndex = ref(0);
const currentNewsIndex = ref(0);
const newsImages = ref([]);
const surveyStore = useSurveyStore();
const router = useRouter();

const imgs = ref([
])

const { deviceType } = useDeviceType();
const news = ref([{
    id: 0,
    image: '',
    title: '',
    body: '',
    likes: 0,
    comments: [],
    created_at: '',
}]);

const statement = ref({
    id: 0,
    date: '',
    title: '',
    committee: '',
    likes: 0,
    statement_no: 0,
    created_at: '',
    body: '',
    images: '',
});

onMounted(async () => {
    if (newsStore.activities.data.length === 0) {
        await newsStore.fetchPosts();
        news.value = newsStore.activities.data;
    } else {
        news.value = newsStore.activities.data;
    }

    if (newsStore.statements.data.length === 0) {
        await newsStore.fetchStatements();
        statement.value = newsStore.statements.data[0];
    } else {
        statement.value = newsStore.statements.data[0];
    }

    if (surveyStore.dynamicBoard.data.length === 0) {
        await surveyStore.fetchDynamicContent();
        imgs.value = surveyStore.dynamicBoard.data;
    } else {
        imgs.value = surveyStore.dynamicBoard.data;
    }
})


watch(currentNewsIndex, (newIndex, oldIndex) => {
    if (newIndex === oldIndex) return;

    const direction = newIndex > oldIndex ||
        (newIndex === 0 && oldIndex === news.value.length - 1)
        ? 1
        : -1;

    const currentImage = newsImages.value[oldIndex];
    const nextImage = newsImages.value[newIndex];

    if (!currentImage || !nextImage) return;

    // Prepare next image offscreen in the correct direction
    gsap.set(nextImage, {
        x: `${100 * direction}%`,
        zIndex: 10,
    });

    gsap.set(currentImage, {
        zIndex: 9,
    });

    // Animate both current and next
    const tl = gsap.timeline();

    tl.to(currentImage, {
        x: `${-100 * direction}%`,
        duration: 1,
        ease: "power2.inOut",
    });

    tl.to(
        nextImage,
        {
            x: "0%",
            duration: 1,
            ease: "power2.inOut",
        },
        "<" // run simultaneously
    );
});

function goTo(id) {
    router.push({ name: 'activities' });
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

const rollbackNewsIndex = () => {
    currentNewsIndex.value =
        (currentNewsIndex.value - 1 + news.value.length) % news.value.length;
};

const updateNewsIndex = () => {
    currentNewsIndex.value = (currentNewsIndex.value + 1) % news.value.length;
};

// Function to update the current index
const updateIndex = () => {
    currentIndex.value = (currentIndex.value + 1) % imgs.value.length;
};

function reportNow() {
    router.push({ name: 'formAnswer', params: { id: 1 } });
}

// Set up interval for periodic sliding
let interval;
onMounted(() => {
    interval = setInterval(updateIndex, 7000); // Change slide every 3 seconds
});

// Clear interval when component is unmounted
onBeforeUnmount(() => {
    clearInterval(interval);
});

</script>

<style>
.custom-home-bg {
    background: #000000;
    background: linear-gradient(90deg, rgba(0, 0, 0, 1) 15%, rgba(0, 0, 0, 0) 100%);
}

/* Fade transition */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>