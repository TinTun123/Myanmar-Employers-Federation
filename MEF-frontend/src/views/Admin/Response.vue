<template>
    <AdminTitleComponent :title="'View Responses'"></AdminTitleComponent>
    <LoadingComponent v-if="userStore.loading.state"></LoadingComponent>
    <div class="space-y-4 md:space-y-0 my-4 md:grid md:grid-cols-12 md:gap-6">

        <div class="flex justify-between items-start gap-4 px-4 py-2 md:py-0 md:mx-0 mx-4 md:col-start-4 md:col-span-6">
            <!-- Form title -->
            <div>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.40005 12.0008C6.61222 12.0008 6.81571 11.9165 6.96573 11.7665C7.11576 11.6164 7.20005 11.413 7.20005 11.2008C7.20005 10.9886 7.11576 10.7851 6.96573 10.6351C6.81571 10.4851 6.61222 10.4008 6.40005 10.4008C6.18788 10.4008 5.98439 10.4851 5.83436 10.6351C5.68433 10.7851 5.60005 10.9886 5.60005 11.2008C5.60005 11.413 5.68433 11.6164 5.83436 11.7665C5.98439 11.9165 6.18788 12.0008 6.40005 12.0008ZM7.20005 17.6008C7.20005 17.813 7.11576 18.0164 6.96573 18.1665C6.81571 18.3165 6.61222 18.4008 6.40005 18.4008C6.18788 18.4008 5.98439 18.3165 5.83436 18.1665C5.68433 18.0164 5.60005 17.813 5.60005 17.6008C5.60005 17.3886 5.68433 17.1851 5.83436 17.0351C5.98439 16.8851 6.18788 16.8008 6.40005 16.8008C6.61222 16.8008 6.81571 16.8851 6.96573 17.0351C7.11576 17.1851 7.20005 17.3886 7.20005 17.6008ZM0.800049 5.60078C0.800049 4.32774 1.30576 3.10684 2.20594 2.20667C3.10611 1.30649 4.32701 0.800781 5.60005 0.800781H18.4C19.6731 0.800781 20.894 1.30649 21.7942 2.20667C22.6943 3.10684 23.2 4.32774 23.2 5.60078V18.4008C23.2 19.6738 22.6943 20.8947 21.7942 21.7949C20.894 22.6951 19.6731 23.2008 18.4 23.2008H5.60005C4.32701 23.2008 3.10611 22.6951 2.20594 21.7949C1.30576 20.8947 0.800049 19.6738 0.800049 18.4008V5.60078ZM4.80005 4.00078C4.58788 4.00078 4.38439 4.08507 4.23436 4.2351C4.08433 4.38513 4.00005 4.58861 4.00005 4.80078C4.00005 5.01295 4.08433 5.21644 4.23436 5.36647C4.38439 5.5165 4.58788 5.60078 4.80005 5.60078H19.2C19.4122 5.60078 19.6157 5.5165 19.7657 5.36647C19.9158 5.21644 20 5.01295 20 4.80078C20 4.58861 19.9158 4.38513 19.7657 4.2351C19.6157 4.08507 19.4122 4.00078 19.2 4.00078H4.80005ZM6.40005 13.6008C7.03657 13.6008 7.64702 13.3479 8.09711 12.8978C8.54719 12.4478 8.80005 11.8373 8.80005 11.2008C8.80005 10.5643 8.54719 9.95381 8.09711 9.50372C7.64702 9.05364 7.03657 8.80078 6.40005 8.80078C5.76353 8.80078 5.15308 9.05364 4.70299 9.50372C4.2529 9.95381 4.00005 10.5643 4.00005 11.2008C4.00005 11.8373 4.2529 12.4478 4.70299 12.8978C5.15308 13.3479 5.76353 13.6008 6.40005 13.6008ZM8.80005 17.6008C8.80005 16.9643 8.54719 16.3538 8.09711 15.9037C7.64702 15.4536 7.03657 15.2008 6.40005 15.2008C5.76353 15.2008 5.15308 15.4536 4.70299 15.9037C4.2529 16.3538 4.00005 16.9643 4.00005 17.6008C4.00005 18.2373 4.2529 18.8478 4.70299 19.2978C5.15308 19.7479 5.76353 20.0008 6.40005 20.0008C7.03657 20.0008 7.64702 19.7479 8.09711 19.2978C8.54719 18.8478 8.80005 18.2373 8.80005 17.6008ZM10.4 11.2008C10.4 11.413 10.4843 11.6164 10.6344 11.7665C10.7844 11.9165 10.9879 12.0008 11.2 12.0008H19.2C19.4122 12.0008 19.6157 11.9165 19.7657 11.7665C19.9158 11.6164 20 11.413 20 11.2008C20 10.9886 19.9158 10.7851 19.7657 10.6351C19.6157 10.4851 19.4122 10.4008 19.2 10.4008H11.2C10.9879 10.4008 10.7844 10.4851 10.6344 10.6351C10.4843 10.7851 10.4 10.9886 10.4 11.2008ZM11.2 16.8008C10.9879 16.8008 10.7844 16.8851 10.6344 17.0351C10.4843 17.1851 10.4 17.3886 10.4 17.6008C10.4 17.813 10.4843 18.0164 10.6344 18.1665C10.7844 18.3165 10.9879 18.4008 11.2 18.4008H19.2C19.4122 18.4008 19.6157 18.3165 19.7657 18.1665C19.9158 18.0164 20 17.813 20 17.6008C20 17.3886 19.9158 17.1851 19.7657 17.0351C19.6157 16.8851 19.4122 16.8008 19.2 16.8008H11.2Z"
                        fill="black" fill-opacity="0.7" />
                </svg>

            </div>
            <h1 class="text-base text-black/70 md:text-lg font-semibold text-center leading-7">
                {{ model.title }}
            </h1>
            <div>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.40005 12.0008C6.61222 12.0008 6.81571 11.9165 6.96573 11.7665C7.11576 11.6164 7.20005 11.413 7.20005 11.2008C7.20005 10.9886 7.11576 10.7851 6.96573 10.6351C6.81571 10.4851 6.61222 10.4008 6.40005 10.4008C6.18788 10.4008 5.98439 10.4851 5.83436 10.6351C5.68433 10.7851 5.60005 10.9886 5.60005 11.2008C5.60005 11.413 5.68433 11.6164 5.83436 11.7665C5.98439 11.9165 6.18788 12.0008 6.40005 12.0008ZM7.20005 17.6008C7.20005 17.813 7.11576 18.0164 6.96573 18.1665C6.81571 18.3165 6.61222 18.4008 6.40005 18.4008C6.18788 18.4008 5.98439 18.3165 5.83436 18.1665C5.68433 18.0164 5.60005 17.813 5.60005 17.6008C5.60005 17.3886 5.68433 17.1851 5.83436 17.0351C5.98439 16.8851 6.18788 16.8008 6.40005 16.8008C6.61222 16.8008 6.81571 16.8851 6.96573 17.0351C7.11576 17.1851 7.20005 17.3886 7.20005 17.6008ZM0.800049 5.60078C0.800049 4.32774 1.30576 3.10684 2.20594 2.20667C3.10611 1.30649 4.32701 0.800781 5.60005 0.800781H18.4C19.6731 0.800781 20.894 1.30649 21.7942 2.20667C22.6943 3.10684 23.2 4.32774 23.2 5.60078V18.4008C23.2 19.6738 22.6943 20.8947 21.7942 21.7949C20.894 22.6951 19.6731 23.2008 18.4 23.2008H5.60005C4.32701 23.2008 3.10611 22.6951 2.20594 21.7949C1.30576 20.8947 0.800049 19.6738 0.800049 18.4008V5.60078ZM4.80005 4.00078C4.58788 4.00078 4.38439 4.08507 4.23436 4.2351C4.08433 4.38513 4.00005 4.58861 4.00005 4.80078C4.00005 5.01295 4.08433 5.21644 4.23436 5.36647C4.38439 5.5165 4.58788 5.60078 4.80005 5.60078H19.2C19.4122 5.60078 19.6157 5.5165 19.7657 5.36647C19.9158 5.21644 20 5.01295 20 4.80078C20 4.58861 19.9158 4.38513 19.7657 4.2351C19.6157 4.08507 19.4122 4.00078 19.2 4.00078H4.80005ZM6.40005 13.6008C7.03657 13.6008 7.64702 13.3479 8.09711 12.8978C8.54719 12.4478 8.80005 11.8373 8.80005 11.2008C8.80005 10.5643 8.54719 9.95381 8.09711 9.50372C7.64702 9.05364 7.03657 8.80078 6.40005 8.80078C5.76353 8.80078 5.15308 9.05364 4.70299 9.50372C4.2529 9.95381 4.00005 10.5643 4.00005 11.2008C4.00005 11.8373 4.2529 12.4478 4.70299 12.8978C5.15308 13.3479 5.76353 13.6008 6.40005 13.6008ZM8.80005 17.6008C8.80005 16.9643 8.54719 16.3538 8.09711 15.9037C7.64702 15.4536 7.03657 15.2008 6.40005 15.2008C5.76353 15.2008 5.15308 15.4536 4.70299 15.9037C4.2529 16.3538 4.00005 16.9643 4.00005 17.6008C4.00005 18.2373 4.2529 18.8478 4.70299 19.2978C5.15308 19.7479 5.76353 20.0008 6.40005 20.0008C7.03657 20.0008 7.64702 19.7479 8.09711 19.2978C8.54719 18.8478 8.80005 18.2373 8.80005 17.6008ZM10.4 11.2008C10.4 11.413 10.4843 11.6164 10.6344 11.7665C10.7844 11.9165 10.9879 12.0008 11.2 12.0008H19.2C19.4122 12.0008 19.6157 11.9165 19.7657 11.7665C19.9158 11.6164 20 11.413 20 11.2008C20 10.9886 19.9158 10.7851 19.7657 10.6351C19.6157 10.4851 19.4122 10.4008 19.2 10.4008H11.2C10.9879 10.4008 10.7844 10.4851 10.6344 10.6351C10.4843 10.7851 10.4 10.9886 10.4 11.2008ZM11.2 16.8008C10.9879 16.8008 10.7844 16.8851 10.6344 17.0351C10.4843 17.1851 10.4 17.3886 10.4 17.6008C10.4 17.813 10.4843 18.0164 10.6344 18.1665C10.7844 18.3165 10.9879 18.4008 11.2 18.4008H19.2C19.4122 18.4008 19.6157 18.3165 19.7657 18.1665C19.9158 18.0164 20 17.813 20 17.6008C20 17.3886 19.9158 17.1851 19.7657 17.0351C19.6157 16.8851 19.4122 16.8008 19.2 16.8008H11.2Z"
                        fill="black" fill-opacity="0.7" />
                </svg>

            </div>
        </div>

        <div class="md:col-start-3 md:col-span-6">
            <DropDownComponent :versions="model.versions" v-model="versionId">
            </DropDownComponent>
        </div>


        <div class="flex justify-between items-center gap-4 px-4 py-2 md:p-0  md:m-0 mx-4 md:col-start-3 md:col-span-8">
            <!-- Total questions and answers -->
            <div class=" flex items-start gap-2 text-sm text-black/60 font-semibold">
                <h3>
                    Responses: {{ model.responses.length }}
                </h3>
                <div>
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.18006 2.52632C6.99959 2.52632 7.78555 2.8812 8.36504 3.5129C8.94453 4.1446 9.27009 5.00138 9.27009 5.89474C9.27009 6.7881 8.94453 7.64487 8.36504 8.27657C7.78555 8.90827 6.99959 9.26316 6.18006 9.26316C5.36053 9.26316 4.57457 8.90827 3.99508 8.27657C3.41559 7.64487 3.09003 6.7881 3.09003 5.89474C3.09003 5.00138 3.41559 4.1446 3.99508 3.5129C4.57457 2.8812 5.36053 2.52632 6.18006 2.52632ZM6.18006 10.9474C8.24265 10.9474 12.3601 12.0758 12.3601 14.3158V16H0V14.3158C0 12.0758 4.11746 10.9474 6.18006 10.9474ZM12.1747 2.82947C13.7352 4.68211 13.7352 7.25053 12.1747 8.95158L10.8769 7.52842C11.5258 6.53474 11.5258 5.24632 10.8769 4.25263L12.1747 2.82947ZM14.7317 0C17.7677 3.41053 17.7445 8.51368 14.7317 11.7895L13.4725 10.4168C15.6124 7.73895 15.6124 3.91579 13.4725 1.37263L14.7317 0Z"
                            fill="black" fill-opacity="0.7" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center gap-2 text-sm text-black/60 font-semibold">
                <h3>
                    Questions: {{ model.total_question }}
                </h3>
                <div>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0C8.85652 0 10.637 0.737498 11.9497 2.05025C13.2625 3.36301 14 5.14348 14 7C14 8.85652 13.2625 10.637 11.9497 11.9497C10.637 13.2625 8.85652 14 7 14C5.14348 14 3.36301 13.2625 2.05025 11.9497C0.737498 10.637 0 8.85652 0 7C0 5.14348 0.737498 3.36301 2.05025 2.05025C3.36301 0.737498 5.14348 0 7 0ZM7.371 2.992C6.557 2.992 5.919 3.223 5.446 3.685C4.962 4.147 4.731 4.785 4.731 5.599H5.985C5.985 5.137 6.073 4.774 6.26 4.521C6.469 4.213 6.81 4.07 7.294 4.07C7.668 4.07 7.965 4.169 8.174 4.378C8.372 4.587 8.482 4.873 8.482 5.236C8.482 5.511 8.383 5.775 8.185 6.017L8.053 6.171C7.338 6.809 6.909 7.271 6.766 7.568C6.612 7.865 6.546 8.228 6.546 8.646V8.8H7.811V8.646C7.811 8.382 7.866 8.151 7.976 7.931C8.075 7.733 8.218 7.546 8.416 7.381C8.944 6.919 9.263 6.622 9.362 6.512C9.626 6.16 9.769 5.709 9.769 5.159C9.769 4.488 9.549 3.96 9.109 3.575C8.669 3.179 8.086 2.992 7.371 2.992ZM7.173 9.339C6.94871 9.33293 6.73116 9.41599 6.568 9.57C6.48744 9.64587 6.42413 9.73819 6.38238 9.84067C6.34063 9.94316 6.3214 10.0534 6.326 10.164C6.326 10.406 6.403 10.604 6.568 10.758C6.72994 10.9152 6.94734 11.0021 7.173 11C7.415 11 7.613 10.923 7.778 10.769C7.86027 10.6916 7.92531 10.5977 7.9689 10.4934C8.01249 10.3892 8.03365 10.277 8.031 10.164C8.03311 10.0537 8.01274 9.94422 7.97113 9.84209C7.92953 9.73997 7.86756 9.64739 7.789 9.57C7.62159 9.41571 7.40058 9.33284 7.173 9.339Z"
                            fill="black" fill-opacity="0.7" />
                    </svg>

                </div>
            </div>
        </div>

        <div
            class="mx-6 flex items-center justify-between md:justify-between gap-4 md:gap-4 md:mx-0 mx-4 md:col-start-3 md:col-span-5">
            <!-- Search bar -->
            <input type="text" placeholder="Enter case-id..."
                class="px-4 py-1 flex-2 md:flex-none border md:w-full border-black/60 rounded-full shadow-sm focus:outline-none text-sm text-black/70" />
            <button
                class="px-3 py-1 flex items-center gap-1 bg-white border border-black/60 rounded-full shadow-sm group hover:bg-secondary-red cursor-pointer transition duration-200 ease-in-out">
                <span class="text-xs text-black/70 font-semibold group-hover:text-white">Search</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="fill-black/70 group-hover:fill-white">
                    <path
                        d="M19.6 21L13.3 14.7C12.8 15.1 12.225 15.4167 11.575 15.65C10.925 15.8833 10.2333 16 9.5 16C7.68333 16 6.146 15.3707 4.888 14.112C3.63 12.8533 3.00067 11.316 3 9.5C2.99933 7.684 3.62867 6.14667 4.888 4.888C6.14733 3.62933 7.68467 3 9.5 3C11.3153 3 12.853 3.62933 14.113 4.888C15.373 6.14667 16.002 7.684 16 9.5C16 10.2333 15.8833 10.925 15.65 11.575C15.4167 12.225 15.1 12.8 14.7 13.3L21 19.6L19.6 21ZM9.5 14C10.75 14 11.8127 13.5627 12.688 12.688C13.5633 11.8133 14.0007 10.7507 14 9.5C13.9993 8.24933 13.562 7.187 12.688 6.313C11.814 5.439 10.7513 5.00133 9.5 5C8.24867 4.99867 7.18633 5.43633 6.313 6.313C5.43967 7.18967 5.002 8.252 5 9.5C4.998 10.748 5.43567 11.8107 6.313 12.688C7.19033 13.5653 8.25267 14.0027 9.5 14Z" />
                </svg>
            </button>
        </div>

        <div
            class="rounded-lg bg-white shadow-lg overflow-hidden m-4 md:m-0 space-y-4 border border-[#505050] mx-4 md:col-start-3 md:col-span-8">
            <!-- Response card -->
            <div class="flex justify-between items-center px-4 pt-4">
                <h1>Version {{ model.version }}</h1>

                <div class="flex gap-2">
                    <button @click.stop="downloadResponse(model.form_version_id)"
                        class="flex items-center group cursor-pointer hover:bg-black/80 transition gap-2 px-2 py-1 rounded-full border border-black/70 text-xs">
                        <span class="text-black/70 group-hover:text-white text-xs">Download</span>
                        <svg class="opacity-60 fill-black group-hover:fill-white group-hover:opacity-100" width="16"
                            height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_286_503)">
                                <path
                                    d="M12.3077 13.625C12.3077 13.4557 12.2468 13.3092 12.125 13.1855C12.0032 13.0618 11.859 13 11.6923 13C11.5256 13 11.3814 13.0618 11.2596 13.1855C11.1378 13.3092 11.0769 13.4557 11.0769 13.625C11.0769 13.7943 11.1378 13.9408 11.2596 14.0645C11.3814 14.1882 11.5256 14.25 11.6923 14.25C11.859 14.25 12.0032 14.1882 12.125 14.0645C12.2468 13.9408 12.3077 13.7943 12.3077 13.625ZM14.7692 13.625C14.7692 13.4557 14.7083 13.3092 14.5865 13.1855C14.4647 13.0618 14.3205 13 14.1538 13C13.9872 13 13.8429 13.0618 13.7212 13.1855C13.5994 13.3092 13.5385 13.4557 13.5385 13.625C13.5385 13.7943 13.5994 13.9408 13.7212 14.0645C13.8429 14.1882 13.9872 14.25 14.1538 14.25C14.3205 14.25 14.4647 14.1882 14.5865 14.0645C14.7083 13.9408 14.7692 13.7943 14.7692 13.625ZM16 11.4375V14.5625C16 14.8229 15.9103 15.0443 15.7308 15.2266C15.5513 15.4089 15.3333 15.5 15.0769 15.5H0.923077C0.666667 15.5 0.448718 15.4089 0.269231 15.2266C0.0897436 15.0443 0 14.8229 0 14.5625V11.4375C0 11.1771 0.0897436 10.9557 0.269231 10.7734C0.448718 10.5911 0.666667 10.5 0.923077 10.5H5.39423L6.69231 11.8281C7.0641 12.1927 7.5 12.375 8 12.375C8.5 12.375 8.9359 12.1927 9.30769 11.8281L10.6154 10.5H15.0769C15.3333 10.5 15.5513 10.5911 15.7308 10.7734C15.9103 10.9557 16 11.1771 16 11.4375ZM12.875 5.88086C12.984 6.14779 12.9391 6.37565 12.7404 6.56445L8.43269 10.9395C8.31731 11.0632 8.17308 11.125 8 11.125C7.82692 11.125 7.68269 11.0632 7.56731 10.9395L3.25962 6.56445C3.0609 6.37565 3.01603 6.14779 3.125 5.88086C3.23397 5.62695 3.42308 5.5 3.69231 5.5H6.15385V1.125C6.15385 0.955729 6.21474 0.809245 6.33654 0.685547C6.45833 0.561849 6.60256 0.5 6.76923 0.5H9.23077C9.39744 0.5 9.54167 0.561849 9.66346 0.685547C9.78526 0.809245 9.84615 0.955729 9.84615 1.125V5.5H12.3077C12.5769 5.5 12.766 5.62695 12.875 5.88086Z"
                                    fill-opacity="0.7" />
                            </g>
                            <defs>
                                <clipPath id="clip0_286_503">
                                    <rect width="16" height="15" fill="white" transform="translate(0 0.5)" />
                                </clipPath>
                            </defs>
                        </svg>

                    </button>
                    <button @click.stop="deleteFormVersion(model.form_version_id)"
                        class="flex items-center transition gap-2 px-2 py-1 rounded-full group cursor-pointer hover:bg-[#F3462B] border border-[#F3462B] text-xs text-[#F3462B]">
                        <span class="text-[#F3462B] group-hover:text-white text-xs">Delete</span>
                        <svg class="fill-[#F3462B] opacity-60 group-hover:fill-white group-hover:opacity-100" width="12"
                            height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 0.666667H9L8.14286 0H3.85714L3 0.666667H0V2H12M0.857143 10.6667C0.857143 11.0203 1.03775 11.3594 1.35925 11.6095C1.68074 11.8595 2.11677 12 2.57143 12H9.42857C9.88323 12 10.3193 11.8595 10.6408 11.6095C10.9622 11.3594 11.1429 11.0203 11.1429 10.6667V2.66667H0.857143V10.6667Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <p class="text-xs text-[#505050] font-medium leading-7 line-clamp-3 px-4">
                {{ model.description }}
            </p>

            <div class="flex items-center justify-between text-sm text-black/70 px-4 pb-2">
                <h3>Case ID</h3>
                <h3>Submitted</h3>
            </div>
            <div v-if="model.responses.length === 0" class="flex items-center justify-center py-4">

                <h1>No response submitted yet!</h1>

            </div>
            <div v-else>
                <div v-for="(item, index) in model.responses" @click.stop="selectResponse(item.id)" :key="index"
                    class="mb-0">
                    <ResponseRow :response="item"></ResponseRow>
                </div>
            </div>

        </div>
    </div>

</template>
<script setup>
import AdminTitleComponent from '@/components/admin/adminTitleComponent.vue'
import DropDownComponent from '@/components/DropdownComponent.vue'
import { ref, computed, onMounted, watch } from 'vue'
import { useRoute } from 'vue-router'
import { useSurveyStore } from '@/stores/surveyStore.js'
import { useUserStore } from '@/stores/userStore.js'
import ResponseRow from '@/components/admin/ResponseRow.vue'
import LoadingComponent from '@/components/LoadingComponent.vue'

const model = ref({
    form_version_id: 1,
    title: 'အလုပ်ရှင်များ၏ စစ်တပ်နှင့်ပတ်သက်သော အပြစ်မှု တိုင်ကြားဖောင်',
    description: '',
    total_question: 26,
    version: 1,
    versions: [1, 2, 3],
    responses: [
    ],
})


const versionId = ref({
    'id': '',
    'version': 1
})

const isDrop = ref(false)
const selectedRowId = ref(null)
const questionAnswer = ref({});
const route = useRoute();
const surveyStore = useSurveyStore()
const userStore = useUserStore()

onMounted(() => {

    const form_version_id = route.params.id

    if (form_version_id) {
        userStore.loading.state = true;
        userStore.loading.message = 'Loading responses...'
        surveyStore.getFormResponses(form_version_id).then((response) => {
            userStore.loading.state = false;
            userStore.loading.message = ''

            if (response.status === 200) {
                model.value = response.data;

                versionId.value = {
                    'id': response.data.form_version_id,
                    'version': response.data.version
                }

            } else {
                userStore.setNotification({
                    type: 'error',
                    message: 'Failed to load responses.',
                })
            }
        }).catch((error) => {
            console.error(error)
            userStore.loading.state = false;
            userStore.loading.message = ''
        })
    }
})

watch(() => versionId.value, (newValue) => {
    if (newValue) {
        userStore.loading.state = true;
        userStore.loading.message = 'Loading responses...'
        surveyStore.getFormResponses(newValue.id).then((response) => {
            userStore.loading.state = false;
            userStore.loading.message = ''

            if (response.status === 200) {
                model.value = response.data;
            } else {
                userStore.setNotification({
                    type: 'error',
                    message: 'Failed to load responses.',
                })
            }
        }).catch((error) => {
            console.error(error)
            userStore.loading.state = false;
            userStore.loading.message = ''
        })
    }
})

function selectResponse(id) {

    if (surveyStore.selectedresponseId === id) {
        surveyStore.selectedresponseId = null
    } else {
        surveyStore.selectedresponseId = id
    }
}

function downloadResponse(form_version_id) {
    surveyStore.downloadResponse(form_version_id).then((response) => {
        if (response.status === 200) {
            const blob = new Blob([response.data], { type: response.headers['content-type'] })
            const link = document.createElement('a')
            const url = window.URL.createObjectURL(blob)
            link.href = url

            // You can name the file dynamically or statically
            link.download = `form_responses_${form_version_id}.xlsx`

            document.body.appendChild(link)
            link.click()

            // Clean up
            window.URL.revokeObjectURL(url)
            link.remove()
        } else {
            userStore.setNotification({
                type: 'error',
                message: 'Failed to download response.',
            })
        }
    }).catch((error) => {
        console.error(error)
        userStore.setNotification({
            type: 'error',
            message: error?.response?.data?.message || 'Download failed.',
        })
    })
}

function deleteFormVersion(id) {
    userStore.loading.state = true;
    userStore.loading.message = 'Deleting response...'
    surveyStore.deleteFormVersion(id).then((response) => {
        userStore.loading.state = false;
        userStore.loading.message = ''

        if (response.status === 200) {
            // Set local model to the response data
            model.value = response.data;
            versionId.value = {
                'id': response.data.form_version_id,
                'version': response.data.version
            }

            userStore.setNotification({
                type: 'success',
                message: 'Response deleted successfully.',
            })
        } else {
            userStore.setNotification({
                type: 'error',
                message: 'Failed to delete response.',
            })
        }
    }).catch((error) => {
        console.error(error)
        userStore.loading.state = false;
        userStore.loading.message = ''
        userStore.setNotification({
            type: 'error',
            message: error.response.data.message,
        })
    })
}

</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease-in-out;
    /* Adjust duration and easing */
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>