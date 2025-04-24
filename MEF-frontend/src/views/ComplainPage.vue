<template>
    <ConeBgCover :image="'/assets/ILO-Article-Now.png'" :-page-name="'Violation reports'"></ConeBgCover>

    <div class="grid grid-cols-12 gap-4 my-6 z-50 relative">
        <!-- Navi Text -->
        <div
            class="col-start-2 col-span-9 flex gap-4 text-black/70 text-xs font-semibold md:text-sm items-center justify-start">
            <RouterLink :to="{ name: 'home' }">
                Home
            </RouterLink>
            <span>/</span>
            <span>{{ currentPageName }}</span>
        </div>
        <!-- Navi text end -->
    </div>

    <div class="mx-6 my-8 md:my-12 lg:my-16">
        <div class="grid grid-cols-12 relative">
            <div class="flex flex-col gap-6 justify-center col-start-5 col-span-7">
                <span class="text-lg font-semibold italic self-end md:self-center">A total of</span>
                <span class="text-xl font-bold text-primary-red self-end md:self-center">845,293+</span>
                <span class="text-lg font-semibold italic text-center md:self-center">violation reports have been
                    received so
                    far!</span>

                <div class="text-center ">
                    <button
                        class="px-4 py-2 text-sm text-white bg-[#A087F4] rounded-full shadow-lg border border-[#A087F4] font-semibold">Report
                        violation</button>
                </div>
            </div>
            <div class="absolute -top-25 md:-top-55 -left-10 lg:left-35 -z-10">
                <img src="../assets/girl-fist.svg" class="w-full h-full md:w-[45vw] lg:w-[30vw]" alt="">
            </div>
        </div>
    </div>



    <div class="grid grid-cols-12 gap-6 mx-4 mb-8">
        <div
            class="p-2 flex flex-col items-center col-span-6 md:col-start-3 md:col-span-4 lg:col-start-5 lg:col-span-2 rounded-lg bg-white shadow-lg border border-[#A087F4]">
            <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_43_10)">
                    <rect x="4.5" width="40" height="40" rx="20" fill="white" />
                    <rect x="5" y="0.5" width="39" height="39" rx="19.5" stroke="#C5C5C5" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.5 11.007C12.5 9.34715 13.844 8 15.5 8H33.5C35.156 8 36.5 9.34544 36.5 11.007V16.6036C36.499 20.0233 35.4048 23.3527 33.3778 26.1035C31.3508 28.8542 28.4978 30.8815 25.2371 31.8879C24.757 32.0374 24.243 32.0374 23.7629 31.8879C20.5022 30.8815 17.6492 28.8542 15.6222 26.1035C13.5952 23.3527 12.501 20.0233 12.5 16.6036V11.007ZM24.5 19.169C25.523 19.169 26.5041 18.7617 27.2274 18.0366C27.9508 17.3116 28.3571 16.3282 28.3571 15.3028C28.3571 14.2774 27.9508 13.2941 27.2274 12.569C26.5041 11.8439 25.523 11.4366 24.5 11.4366C23.477 11.4366 22.4959 11.8439 21.7726 12.569C21.0492 13.2941 20.6429 14.2774 20.6429 15.3028C20.6429 16.3282 21.0492 17.3116 21.7726 18.0366C22.4959 18.7617 23.477 19.169 24.5 19.169ZM31.6177 24.1401C30.7327 23.1189 29.6392 22.3 28.4113 21.7389C27.1833 21.1777 25.8495 20.8873 24.5 20.8873C23.1505 20.8873 21.8167 21.1777 20.5887 21.7389C19.3608 22.3 18.2673 23.1189 17.3823 24.1401C19.088 26.6588 21.5982 28.5204 24.5 29.4187C27.4018 28.5204 29.912 26.6588 31.6177 24.1401Z"
                        fill="#A087F4" />
                </g>
                <defs>
                    <filter id="filter0_d_43_10" x="0.5" y="0" width="48" height="48" filterUnits="userSpaceOnUse"
                        color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                            result="hardAlpha" />
                        <feOffset dy="4" />
                        <feGaussianBlur stdDeviation="2" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_43_10" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_43_10" result="shape" />
                    </filter>
                </defs>
            </svg>

            <span class="text-xs text-center font-semibold leading-6">No risk of military tracking or
                retaliation.</span>

        </div>

        <div
            class="p-2 flex flex-col items-center col-span-6 md:col-span-4 lg:col-span-2 rounded-lg bg-white shadow-lg border border-[#A087F4]">
            <svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_44_26)">
                    <rect x="4" width="39" height="39" rx="19.5" fill="white" />
                    <rect x="4.5" y="0.5" width="38" height="38" rx="19" stroke="#C5C5C5" />
                    <path
                        d="M24.4324 16.7027C26.8356 16.7027 28.7838 14.7545 28.7838 12.3514C28.7838 9.94817 26.8356 8 24.4324 8C22.0292 8 20.0811 9.94817 20.0811 12.3514C20.0811 14.7545 22.0292 16.7027 24.4324 16.7027Z"
                        fill="#A087F4" stroke="#A087F4" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M12 30.9997C12 25.5064 17.0096 21.0537 23.1892 21.0537" stroke="#A087F4" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M26.2972 24.7842H34.9999V31.0004H26.2972V24.7842Z" fill="#A087F4" stroke="#A087F4"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M32.5135 24.7834V22.9186C32.5135 22.424 32.3171 21.9496 31.9673 21.5999C31.6176 21.2502 31.1433 21.0537 30.6487 21.0537C30.1541 21.0537 29.6797 21.2502 29.33 21.5999C28.9803 21.9496 28.7838 22.424 28.7838 22.9186V24.7834"
                        stroke="#A087F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>
                <defs>
                    <filter id="filter0_d_44_26" x="0" y="0" width="47" height="47" filterUnits="userSpaceOnUse"
                        color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                            result="hardAlpha" />
                        <feOffset dy="4" />
                        <feGaussianBlur stdDeviation="2" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_44_26" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_44_26" result="shape" />
                    </filter>
                </defs>
            </svg>


            <span class="text-xs text-center font-semibold leading-6">All data is encrypted and safely stored.</span>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mx-4 mb-8">
        <div
            class="p-2 flex flex-col items-center col-start-4 col-span-6 md:col-start-5 md:col-span-4 lg:col-start-6 lg:col-span-2 rounded-lg bg-white shadow-lg border border-[#A087F4]">
            <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_43_10)">
                    <rect x="4.5" width="40" height="40" rx="20" fill="white" />
                    <rect x="5" y="0.5" width="39" height="39" rx="19.5" stroke="#C5C5C5" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.5 11.007C12.5 9.34715 13.844 8 15.5 8H33.5C35.156 8 36.5 9.34544 36.5 11.007V16.6036C36.499 20.0233 35.4048 23.3527 33.3778 26.1035C31.3508 28.8542 28.4978 30.8815 25.2371 31.8879C24.757 32.0374 24.243 32.0374 23.7629 31.8879C20.5022 30.8815 17.6492 28.8542 15.6222 26.1035C13.5952 23.3527 12.501 20.0233 12.5 16.6036V11.007ZM24.5 19.169C25.523 19.169 26.5041 18.7617 27.2274 18.0366C27.9508 17.3116 28.3571 16.3282 28.3571 15.3028C28.3571 14.2774 27.9508 13.2941 27.2274 12.569C26.5041 11.8439 25.523 11.4366 24.5 11.4366C23.477 11.4366 22.4959 11.8439 21.7726 12.569C21.0492 13.2941 20.6429 14.2774 20.6429 15.3028C20.6429 16.3282 21.0492 17.3116 21.7726 18.0366C22.4959 18.7617 23.477 19.169 24.5 19.169ZM31.6177 24.1401C30.7327 23.1189 29.6392 22.3 28.4113 21.7389C27.1833 21.1777 25.8495 20.8873 24.5 20.8873C23.1505 20.8873 21.8167 21.1777 20.5887 21.7389C19.3608 22.3 18.2673 23.1189 17.3823 24.1401C19.088 26.6588 21.5982 28.5204 24.5 29.4187C27.4018 28.5204 29.912 26.6588 31.6177 24.1401Z"
                        fill="#A087F4" />
                </g>
                <defs>
                    <filter id="filter0_d_43_10" x="0.5" y="0" width="48" height="48" filterUnits="userSpaceOnUse"
                        color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                            result="hardAlpha" />
                        <feOffset dy="4" />
                        <feGaussianBlur stdDeviation="2" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_43_10" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_43_10" result="shape" />
                    </filter>
                </defs>
            </svg>

            <span class="text-xs text-center font-semibold leading-6">Your identity stays anonymous
                <span class="text-base text-[#A087F4] font-normal">“Always”</span></span>

        </div>
    </div>

    <div class="lg:w-[50%] lg:mx-auto lg:relative bg-[#F7A9A0]">
        <div ref="scrollContainer"
            class="p-4 my-4 md:my-12 lg:my-0 flex items-center justify-between gap-4 overflow-y-auto scrollbar-hidden">
            <div class="p-2 bg-white shadow-lg border border-black/20 rounded-lg gap-2">

                <span class="text-[#665D5D] text-xs font-semibold">Case No. 19032</span>
                <p class="text-black w-[300px] text-xs leading-7 indent-15 line-clamp-5">
                    အကြမ်းဖက်မှုများကြောင့် ကျွန်ုပ်တို့ အလုပ်သမားများသည် ခံစားနေရသော အနစ်နာခံမှုများမှာ
                    ခန္ဓာကိုယ်ထိခိုက်မှု၊ စိတ်ဓာတ်ကျခြင်းနှင့် စီးပွားရေးဆိုင်ရာ ဆုံးရှုံးမှုများ ဖြစ်ပါသည်။
                    ကျွန်ုပ်တို့၏
                    အသက်အန္တရာယ် အတွက်လည်း စိုးရိမ်မိပါသည်။ ထို့ကြောင့် [သက်ဆိုင်ရာအဖွဲ့အစည်း / အလုပ်ရှင် /
                    အလုပ်သမားအခွင့်အရေးအဖွဲ့] သည် အမြန်ဆုံး ဝင်ရောက်စစ်ဆေးပေးရန်နှင့် တာဝန်ရှိသူများအား တာဝန်ယူစေရန်
                    တောင်းဆိုပါသည်။ ထို့အပြင် ထိခိုက်ပျက်စီးမှုများကို ပြန်လည်ပြုပြင်ပေးရန်နှင့် တရားမျှတမှုရရှိစေရန်
                    အရေးပေါ် ဥပဒေရေးရာနှင့် လူသားချင်းစာနာမှုဆိုင်ရာ အကူအညီများပေးစေပါ။
                </p>
            </div>

            <div class="p-2 bg-white shadow-lg border border-black/20 rounded-lg gap-2">

                <span class="text-[#665D5D] text-xs font-semibold">Case No. 19033</span>
                <p class="text-black w-[300px] text-xs leading-7 indent-15 line-clamp-5">
                    အကြမ်းဖက်မှုများကြောင့် ကျွန်ုပ်တို့ အလုပ်သမားများသည် ခံစားနေရသော အနစ်နာခံမှုများမှာ
                    ခန္ဓာကိုယ်ထိခိုက်မှု၊ စိတ်ဓာတ်ကျခြင်းနှင့် စီးပွားရေးဆိုင်ရာ ဆုံးရှုံးမှုများ ဖြစ်ပါသည်။
                    ကျွန်ုပ်တို့၏
                    အသက်အန္တရာယ် အတွက်လည်း စိုးရိမ်မိပါသည်။ ထို့ကြောင့် [သက်ဆိုင်ရာအဖွဲ့အစည်း / အလုပ်ရှင် /
                    အလုပ်သမားအခွင့်အရေးအဖွဲ့] သည် အမြန်ဆုံး ဝင်ရောက်စစ်ဆေးပေးရန်နှင့် တာဝန်ရှိသူများအား တာဝန်ယူစေရန်
                    တောင်းဆိုပါသည်။ ထို့အပြင် ထိခိုက်ပျက်စီးမှုများကို ပြန်လည်ပြုပြင်ပေးရန်နှင့် တရားမျှတမှုရရှိစေရန်
                    အရေးပေါ် ဥပဒေရေးရာနှင့် လူသားချင်းစာနာမှုဆိုင်ရာ အကူအညီများပေးစေပါ။
                </p>
            </div>

            <div class="p-2 bg-white shadow-lg border border-black/20 rounded-lg gap-2">

                <span class="text-[#665D5D] text-xs font-semibold">Case No. 19034</span>
                <p class="text-black w-[300px] text-xs leading-7 indent-15 line-clamp-5">
                    အကြမ်းဖက်မှုများကြောင့် ကျွန်ုပ်တို့ အလုပ်သမားများသည် ခံစားနေရသော အနစ်နာခံမှုများမှာ
                    ခန္ဓာကိုယ်ထိခိုက်မှု၊ စိတ်ဓာတ်ကျခြင်းနှင့် စီးပွားရေးဆိုင်ရာ ဆုံးရှုံးမှုများ ဖြစ်ပါသည်။
                    ကျွန်ုပ်တို့၏
                    အသက်အန္တရာယ် အတွက်လည်း စိုးရိမ်မိပါသည်။ ထို့ကြောင့် [သက်ဆိုင်ရာအဖွဲ့အစည်း / အလုပ်ရှင် /
                    အလုပ်သမားအခွင့်အရေးအဖွဲ့] သည် အမြန်ဆုံး ဝင်ရောက်စစ်ဆေးပေးရန်နှင့် တာဝန်ရှိသူများအား တာဝန်ယူစေရန်
                    တောင်းဆိုပါသည်။ ထို့အပြင် ထိခိုက်ပျက်စီးမှုများကို ပြန်လည်ပြုပြင်ပေးရန်နှင့် တရားမျှတမှုရရှိစေရန်
                    အရေးပေါ် ဥပဒေရေးရာနှင့် လူသားချင်းစာနာမှုဆိုင်ရာ အကူအညီများပေးစေပါ။
                </p>
            </div>

            <div class="p-2 bg-white shadow-lg border border-black/20 rounded-lg gap-2">

                <span class="text-[#665D5D] text-xs font-semibold">Case No. 19035</span>
                <p class="text-black w-[300px] text-xs leading-7 indent-15 line-clamp-5">
                    အကြမ်းဖက်မှုများကြောင့် ကျွန်ုပ်တို့ အလုပ်သမားများသည် ခံစားနေရသော အနစ်နာခံမှုများမှာ
                    ခန္ဓာကိုယ်ထိခိုက်မှု၊ စိတ်ဓာတ်ကျခြင်းနှင့် စီးပွားရေးဆိုင်ရာ ဆုံးရှုံးမှုများ ဖြစ်ပါသည်။
                    ကျွန်ုပ်တို့၏
                    အသက်အန္တရာယ် အတွက်လည်း စိုးရိမ်မိပါသည်။ ထို့ကြောင့် [သက်ဆိုင်ရာအဖွဲ့အစည်း / အလုပ်ရှင် /
                    အလုပ်သမားအခွင့်အရေးအဖွဲ့] သည် အမြန်ဆုံး ဝင်ရောက်စစ်ဆေးပေးရန်နှင့် တာဝန်ရှိသူများအား တာဝန်ယူစေရန်
                    တောင်းဆိုပါသည်။ ထို့အပြင် ထိခိုက်ပျက်စီးမှုများကို ပြန်လည်ပြုပြင်ပေးရန်နှင့် တရားမျှတမှုရရှိစေရန်
                    အရေးပေါ် ဥပဒေရေးရာနှင့် လူသားချင်းစာနာမှုဆိုင်ရာ အကူအညီများပေးစေပါ။
                </p>
            </div>

            <div class="p-2 bg-white shadow-lg border border-black/20 rounded-lg gap-2">

                <span class="text-[#665D5D] text-xs font-semibold">Case No. 19032</span>
                <p class="text-black w-[300px] text-xs leading-7 indent-15 line-clamp-5">
                    အကြမ်းဖက်မှုများကြောင့် ကျွန်ုပ်တို့ အလုပ်သမားများသည် ခံစားနေရသော အနစ်နာခံမှုများမှာ
                    ခန္ဓာကိုယ်ထိခိုက်မှု၊ စိတ်ဓာတ်ကျခြင်းနှင့် စီးပွားရေးဆိုင်ရာ ဆုံးရှုံးမှုများ ဖြစ်ပါသည်။
                    ကျွန်ုပ်တို့၏
                    အသက်အန္တရာယ် အတွက်လည်း စိုးရိမ်မိပါသည်။ ထို့ကြောင့် [သက်ဆိုင်ရာအဖွဲ့အစည်း / အလုပ်ရှင် /
                    အလုပ်သမားအခွင့်အရေးအဖွဲ့] သည် အမြန်ဆုံး ဝင်ရောက်စစ်ဆေးပေးရန်နှင့် တာဝန်ရှိသူများအား တာဝန်ယူစေရန်
                    တောင်းဆိုပါသည်။ ထို့အပြင် ထိခိုက်ပျက်စီးမှုများကို ပြန်လည်ပြုပြင်ပေးရန်နှင့် တရားမျှတမှုရရှိစေရန်
                    အရေးပေါ် ဥပဒေရေးရာနှင့် လူသားချင်းစာနာမှုဆိုင်ရာ အကူအညီများပေးစေပါ။
                </p>
            </div>

            <div class="p-2 bg-white shadow-lg border border-black/20 rounded-lg gap-2">

                <span class="text-[#665D5D] text-xs font-semibold">Case No. 19032</span>
                <p class="text-black w-[300px] text-xs leading-7 indent-15 line-clamp-5">
                    အကြမ်းဖက်မှုများကြောင့် ကျွန်ုပ်တို့ အလုပ်သမားများသည် ခံစားနေရသော အနစ်နာခံမှုများမှာ
                    ခန္ဓာကိုယ်ထိခိုက်မှု၊ စိတ်ဓာတ်ကျခြင်းနှင့် စီးပွားရေးဆိုင်ရာ ဆုံးရှုံးမှုများ ဖြစ်ပါသည်။
                    ကျွန်ုပ်တို့၏
                    အသက်အန္တရာယ် အတွက်လည်း စိုးရိမ်မိပါသည်။ ထို့ကြောင့် [သက်ဆိုင်ရာအဖွဲ့အစည်း / အလုပ်ရှင် /
                    အလုပ်သမားအခွင့်အရေးအဖွဲ့] သည် အမြန်ဆုံး ဝင်ရောက်စစ်ဆေးပေးရန်နှင့် တာဝန်ရှိသူများအား တာဝန်ယူစေရန်
                    တောင်းဆိုပါသည်။ ထို့အပြင် ထိခိုက်ပျက်စီးမှုများကို ပြန်လည်ပြုပြင်ပေးရန်နှင့် တရားမျှတမှုရရှိစေရန်
                    အရေးပေါ် ဥပဒေရေးရာနှင့် လူသားချင်းစာနာမှုဆိုင်ရာ အကူအညီများပေးစေပါ။
                </p>
            </div>

            <div class="p-2 bg-white shadow-lg border border-black/20 rounded-lg gap-2">

                <span class="text-[#665D5D] text-xs font-semibold">Case No. 19032</span>
                <p class="text-black w-[300px] text-xs leading-7 indent-15 line-clamp-5">
                    အကြမ်းဖက်မှုများကြောင့် ကျွန်ုပ်တို့ အလုပ်သမားများသည် ခံစားနေရသော အနစ်နာခံမှုများမှာ
                    ခန္ဓာကိုယ်ထိခိုက်မှု၊ စိတ်ဓာတ်ကျခြင်းနှင့် စီးပွားရေးဆိုင်ရာ ဆုံးရှုံးမှုများ ဖြစ်ပါသည်။
                    ကျွန်ုပ်တို့၏
                    အသက်အန္တရာယ် အတွက်လည်း စိုးရိမ်မိပါသည်။ ထို့ကြောင့် [သက်ဆိုင်ရာအဖွဲ့အစည်း / အလုပ်ရှင် /
                    အလုပ်သမားအခွင့်အရေးအဖွဲ့] သည် အမြန်ဆုံး ဝင်ရောက်စစ်ဆေးပေးရန်နှင့် တာဝန်ရှိသူများအား တာဝန်ယူစေရန်
                    တောင်းဆိုပါသည်။ ထို့အပြင် ထိခိုက်ပျက်စီးမှုများကို ပြန်လည်ပြုပြင်ပေးရန်နှင့် တရားမျှတမှုရရှိစေရန်
                    အရေးပေါ် ဥပဒေရေးရာနှင့် လူသားချင်းစာနာမှုဆိုင်ရာ အကူအညီများပေးစေပါ။
                </p>
            </div>

            <div class="p-2 bg-white shadow-lg border border-black/20 rounded-lg gap-2">

                <span class="text-[#665D5D] text-xs font-semibold">Case No. 19032</span>
                <p class="text-black w-[300px] text-xs leading-7 indent-15 line-clamp-5">
                    အကြမ်းဖက်မှုများကြောင့် ကျွန်ုပ်တို့ အလုပ်သမားများသည် ခံစားနေရသော အနစ်နာခံမှုများမှာ
                    ခန္ဓာကိုယ်ထိခိုက်မှု၊ စိတ်ဓာတ်ကျခြင်းနှင့် စီးပွားရေးဆိုင်ရာ ဆုံးရှုံးမှုများ ဖြစ်ပါသည်။
                    ကျွန်ုပ်တို့၏
                    အသက်အန္တရာယ် အတွက်လည်း စိုးရိမ်မိပါသည်။ ထို့ကြောင့် [သက်ဆိုင်ရာအဖွဲ့အစည်း / အလုပ်ရှင် /
                    အလုပ်သမားအခွင့်အရေးအဖွဲ့] သည် အမြန်ဆုံး ဝင်ရောက်စစ်ဆေးပေးရန်နှင့် တာဝန်ရှိသူများအား တာဝန်ယူစေရန်
                    တောင်းဆိုပါသည်။ ထို့အပြင် ထိခိုက်ပျက်စီးမှုများကို ပြန်လည်ပြုပြင်ပေးရန်နှင့် တရားမျှတမှုရရှိစေရန်
                    အရေးပေါ် ဥပဒေရေးရာနှင့် လူသားချင်းစာနာမှုဆိုင်ရာ အကူအညီများပေးစေပါ။
                </p>
            </div>

            <div class="p-2 bg-white shadow-lg border border-black/20 rounded-lg gap-2">

                <span class="text-[#665D5D] text-xs font-semibold">Case No. 19032</span>
                <p class="text-black w-[300px] text-xs leading-7 indent-15 line-clamp-5">
                    အကြမ်းဖက်မှုများကြောင့် ကျွန်ုပ်တို့ အလုပ်သမားများသည် ခံစားနေရသော အနစ်နာခံမှုများမှာ
                    ခန္ဓာကိုယ်ထိခိုက်မှု၊ စိတ်ဓာတ်ကျခြင်းနှင့် စီးပွားရေးဆိုင်ရာ ဆုံးရှုံးမှုများ ဖြစ်ပါသည်။
                    ကျွန်ုပ်တို့၏
                    အသက်အန္တရာယ် အတွက်လည်း စိုးရိမ်မိပါသည်။ ထို့ကြောင့် [သက်ဆိုင်ရာအဖွဲ့အစည်း / အလုပ်ရှင် /
                    အလုပ်သမားအခွင့်အရေးအဖွဲ့] သည် အမြန်ဆုံး ဝင်ရောက်စစ်ဆေးပေးရန်နှင့် တာဝန်ရှိသူများအား တာဝန်ယူစေရန်
                    တောင်းဆိုပါသည်။ ထို့အပြင် ထိခိုက်ပျက်စီးမှုများကို ပြန်လည်ပြုပြင်ပေးရန်နှင့် တရားမျှတမှုရရှိစေရန်
                    အရေးပေါ် ဥပဒေရေးရာနှင့် လူသားချင်းစာနာမှုဆိုင်ရာ အကူအညီများပေးစေပါ။
                </p>
            </div>

        </div>

        <div v-if="deviceType === 'desktop'">
            <div class="flex justify-end mr-4">
                <div class="w-8 h-8 shrink-0">
                    <svg @click="scrollLeft" class="w-full h-full" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_184_4)">
                            <rect x="52" y="48" width="48" height="48" rx="24" transform="rotate(180 52 48)"
                                fill="#F7A9A0" />
                            <path
                                d="M49 24C49 19.8466 47.7684 15.7865 45.4609 12.333C43.1534 8.87959 39.8736 6.18797 36.0364 4.59853C32.1991 3.00909 27.9767 2.59322 23.9031 3.40351C19.8295 4.2138 16.0877 6.21386 13.1508 9.15076C10.2139 12.0877 8.2138 15.8295 7.40351 19.9031C6.59322 23.9767 7.00909 28.1991 8.59853 32.0364C10.188 35.8736 12.8796 39.1534 16.333 41.4609C19.7865 43.7684 23.8466 45 28 45C33.5695 45 38.911 42.7875 42.8492 38.8492C46.7875 34.911 49 29.5695 49 24ZM40 25.5L21.775 25.5L30.145 33.9105L28 36L16 24L28 12L30.145 14.1405L21.775 22.5L40 22.5V25.5Z"
                                fill="#C7454E" />
                        </g>
                        <defs>
                            <filter id="filter0_d_184_4" x="0" y="0" width="56" height="56" filterUnits="userSpaceOnUse"
                                color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dy="4" />
                                <feGaussianBlur stdDeviation="2" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_184_4" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_184_4"
                                    result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </div>

                <div class="w-8 h-8 shrink-0">
                    <svg @click="scrollRight" class="w-full h-full" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_39_4600)">
                            <rect x="4" width="48" height="48" rx="24" fill="#F7A9A0" />
                            <path
                                d="M7 24C7 28.1534 8.23163 32.2135 10.5391 35.667C12.8466 39.1204 16.1264 41.812 19.9636 43.4015C23.8009 44.9909 28.0233 45.4068 32.0969 44.5965C36.1705 43.7862 39.9123 41.7861 42.8492 38.8492C45.7861 35.9123 47.7862 32.1705 48.5965 28.0969C49.4068 24.0233 48.9909 19.8009 47.4015 15.9636C45.812 12.1264 43.1204 8.84665 39.667 6.53914C36.2135 4.23163 32.1534 3 28 3C22.4305 3 17.089 5.21249 13.1508 9.15076C9.21249 13.089 7 18.4305 7 24ZM16 22.5H34.225L25.855 14.0895L28 12L40 24L28 36L25.855 33.8595L34.225 25.5H16V22.5Z"
                                fill="#C7454E" />
                        </g>
                        <defs>
                            <filter id="filter0_d_39_4600" x="0" y="0" width="56" height="56"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dy="4" />
                                <feGaussianBlur stdDeviation="2" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_39_4600" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_39_4600"
                                    result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </div>

            </div>


        </div>
    </div>

    <div class="px-2 py-2 m-4 md:mx-8 border-l-4 border-[#00E0E9]">
        <h1 class="text-base text-black/80 italic">Why Myanmar Junta afraid of ILO’s article 33</h1>
    </div>

    <div class="bg-white rounded-lg h-[120px] border border-black/20 shadow-lg p-4 m-4 md:mx-[90px] lg:mx-[360px]">
        <!-- Content required -->
        <span class="text-xs text-black/60 font-semibold">Content required</span>

        <h1 class="text-base text-black/80 m-4 text-center">[ Explain article 33’s impact over Myanmar Junta ]</h1>
    </div>

    <div class="bg-white rounded-lg h-[120px] border border-black/20 shadow-lg p-4 m-4 md:mx-[90px] lg:mx-[360px]">
        <!-- Content required -->
        <span class="text-xs text-black/60 font-semibold">Content required</span>

        <h1 class="text-base text-black/80 m-4 text-center">[ Progress so far ]</h1>
    </div>


    <div class="bg-white rounded-lg border border-black/20 shadow-lg p-4 m-4 md:mx-[90px] lg:mx-[360px]">
        <!-- Content required -->
        <span class="text-xs text-black/60 font-semibold">Content required</span>

        <h1 class="text-base text-black/80 m-4 text-center">[ Encouraging people, how their report effect article 33
            implimation, data & privacy safety ]</h1>
    </div>

</template>

<script setup>

import ConeBgCover from '@/components/ConeBgCover.vue';
import { useDeviceType } from '@/composables/useDeviceType';
import { useGetCurrentPageName } from '@/composables/useGetCurrentPage';
import { ref } from 'vue';

const scrollContainer = ref(null);
const currentPageName = useGetCurrentPageName();
const { deviceType } = useDeviceType();

function scrollLeft() {
    if (scrollContainer.value) {
        scrollContainer.value.scrollTo({
            left: scrollContainer.value.scrollLeft - 334, // Adjust the scroll amount as needed
            behavior: 'smooth', // Enables smooth scrolling
        });
    }
}

// Scroll right function
function scrollRight() {
    if (scrollContainer.value) {
        scrollContainer.value.scrollTo({
            left: scrollContainer.value.scrollLeft + 334, // Adjust the scroll amount as needed
            behavior: 'smooth', // Enables smooth scrolling
        });
    }
}

</script>