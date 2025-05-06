<template>
    <AdminTitleComponent :title="'Manage Dynamic content'"></AdminTitleComponent>
    <div class="md:grid md:grid-cols-12 md:gap-8 mb-8">
        <div class="flex flex-col gap-4 mx-4 md:mx-0 md:col-start-2 md:col-span-5">
            <div class="border-l-4 border-secondary-red pl-2">
                <label for="image" class="text-sm font-semibold">Cover image</label>
            </div>

            <div @click.stop="openFileSelector"
                class="bg-white border border-black/20 rounded-lg w-[70%] md:w-auto shadow-lg overflow-hidden h-[200px] flex justify-center items-center cursor-pointer">
                <div v-if="!model.image" class="h-16 w-16 flex justify-center items-center">
                    <svg class="w-full h-full" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M80.2143 0.5H13.7857C10.2633 0.504487 6.88626 2.13896 4.39554 5.0448C1.90482 7.95064 0.503846 11.8905 0.5 16V78C0.503846 82.1095 1.90482 86.0494 4.39554 88.9552C6.88626 91.861 10.2633 93.4955 13.7857 93.5H80.2143C83.7367 93.4955 87.1137 91.861 89.6045 88.9552C92.0952 86.0494 93.4962 82.1095 93.5 78V16C93.4962 11.8905 92.0952 7.95064 89.6045 5.0448C87.1137 2.13896 83.7367 0.504487 80.2143 0.5ZM63.6071 16C65.5779 16 67.5044 16.6818 69.143 17.9592C70.7816 19.2365 72.0588 21.0521 72.8129 23.1763C73.5671 25.3005 73.7644 27.6379 73.38 29.8929C72.9955 32.148 72.0465 34.2193 70.653 35.8451C69.2594 37.4709 67.484 38.5781 65.5511 39.0266C63.6182 39.4752 61.6147 39.245 59.794 38.3651C57.9732 37.4852 56.417 35.9952 55.3221 34.0835C54.2272 32.1718 53.6429 29.9242 53.6429 27.625C53.6456 24.5428 54.6963 21.5878 56.5644 19.4084C58.4324 17.229 60.9653 16.0032 63.6071 16ZM13.7857 85.75C12.0239 85.75 10.3343 84.9335 9.0885 83.4801C7.84273 82.0267 7.14286 80.0554 7.14286 78V61.6209L26.8306 41.2045C28.7302 39.239 31.2005 38.1924 33.7384 38.2779C36.2764 38.3634 38.6908 39.5746 40.49 41.6646L53.9729 57.3608L29.6393 85.75H13.7857ZM86.8571 78C86.8571 80.0554 86.1573 82.0267 84.9115 83.4801C83.6657 84.9335 81.9761 85.75 80.2143 85.75H39.0348L64.2403 56.3436C66.0248 54.573 68.2895 53.5976 70.6321 53.5905C72.9747 53.5834 75.2437 54.5451 77.0361 56.3048L86.8571 65.8519V78Z"
                            fill="black" fill-opacity="0.4" />
                    </svg>
                </div>

                <img v-else :src="model.image" class="w-full h-full" alt="" />
            </div>
            <input @change="onFileSelected" ref="inputController" type="file" class="hidden" id="image"
                accept="image/*" />
        </div>

        <div class="flex flex-col items-end gap-4 w-[60%] mx-4 mt-8 md:mx-0 md:col-span-5 md:w-auto md:m-0">
            <div class="border-r-4 border-secondary-red pr-2">
                <label for="body" class="text-sm font-semibold">Body:</label>
            </div>
            <textarea v-model="model.text"
                class="border border-black/40 focus:outline-none focus:shadow-none transition w-full md:h-full leading-8 text-sm bg-white shadow-lg rounded-md px-4 py-2"
                id="body" placeholder="Enter title" rows="3"></textarea>
        </div>

        <div class="mt-8 mx-4 md:m-0 md:col-start-2 md:col-span-3">
            <button @click.stop="saveDynamicContent"
                class="cursor-pointer w-full group hover:bg-light-blue/90 focus:bg-light-blue/70 bg-light-blue border border-light-blue shadow-lg rounded-full px-4 py-2 flex items-center justify-center gap-1 text-base text-white">
                <span>Save</span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.922 2.00467L8 2C8.16329 2.00002 8.32089 2.05997 8.44291 2.16848C8.56494 2.27698 8.6429 2.4265 8.662 2.58867L8.66667 2.66667V7.33333H13.3333C13.4966 7.33335 13.6542 7.3933 13.7762 7.50181C13.8983 7.61032 13.9762 7.75983 13.9953 7.922L14 8C14 8.16329 13.94 8.32089 13.8315 8.44291C13.723 8.56494 13.5735 8.6429 13.4113 8.662L13.3333 8.66667H8.66667V13.3333C8.66665 13.4966 8.6067 13.6542 8.49819 13.7762C8.38968 13.8983 8.24017 13.9762 8.078 13.9953L8 14C7.83671 14 7.67911 13.94 7.55709 13.8315C7.43506 13.723 7.3571 13.5735 7.338 13.4113L7.33333 13.3333V8.66667H2.66667C2.50338 8.66665 2.34578 8.6067 2.22375 8.49819C2.10173 8.38968 2.02377 8.24017 2.00467 8.078L2 8C2.00002 7.83671 2.05997 7.67911 2.16848 7.55709C2.27698 7.43506 2.4265 7.3571 2.58867 7.338L2.66667 7.33333H7.33333V2.66667C7.33335 2.50338 7.3933 2.34578 7.50181 2.22375C7.61032 2.10173 7.75983 2.02377 7.922 2.00467Z"
                        fill="white" />
                </svg>
            </button>
        </div>

        <div class="flex justify-between items-center mx-4 mt-8 md:col-start-2 md:col-span-3 md:m-0">
            <h3 class="text-sm">Total: {{ surveyStore.dynamicBoard.data.length }}</h3>

        </div>
        <div v-if="surveyStore.dynamicBoard.data.length === 0"
            class="flex justify-center items-center mx-4 mt-8 md:col-start-2 md:col-span-10 md:m-0">
            <p class="text-center text-sm text-black/60 font-semibold">No dynamic content found</p>
        </div>
        <div v-else
            class="mx-4 flex flex-col gap-4 my-8 md:m-0 md:grid md:grid-cols-12 md:gap-8 md:col-start-2 md:col-span-10 md:m-0">
            <div v-for="(content, index) in surveyStore.dynamicBoard.data" :key="index"
                class="bg-white shadow-md rounded-lg border border-light-blue/50 md:col-span-6 lg:col-span-4">
                <div class="md:w-full h-[200px]">
                    <img :src="content.image" class="w-full h-full brightness-70" alt="">
                </div>

                <p class="text-sm md:text-base p-4">{{ content.text }}</p>

                <div class="flex gap-4 justify-end items-center mb-2 mr-2">

                    <button @click.stop="deleteDynamicContent(content.id)"
                        class="flex items-center transition gap-2 px-2 py-1 rounded-full group cursor-pointer hover:bg-[#F3462B] border border-[#F3462B] text-xs text-[#F3462B]">
                        <span class="text-[#F3462B] group-hover:text-white text-xs">Delete</span>
                        <svg class="fill-[#F3462B] opacity-60 group-hover:fill-white group-hover:opacity-100" width="12"
                            height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 0.666667H9L8.14286 0H3.85714L3 0.666667H0V2H12M0.857143 10.6667C0.857143 11.0203 1.03775 11.3594 1.35925 11.6095C1.68074 11.8595 2.11677 12 2.57143 12H9.42857C9.88323 12 10.3193 11.8595 10.6408 11.6095C10.9622 11.3594 11.1429 11.0203 11.1429 10.6667V2.66667H0.857143V10.6667Z" />
                        </svg>
                    </button>

                    <button @click.stop="setEditContent(content.id)"
                        class="flex items-center group bg-secondary-red cursor-pointer hover:bg-secondary-red/80 transition gap-2 px-2 py-1 rounded-full border border-secondary-red/70 text-xs">
                        <span class="text-white/70 group-hover:text-white text-xs">Edit</span>
                        <svg class="opacity-60 fill-white group-hover:fill-white group-hover:opacity-100" width="16"
                            height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.1319 14.6632H3.39861C3.12554 14.6643 2.85501 14.6106 2.60307 14.5053C2.35114 14.3999 2.12292 14.2451 1.93194 14.0499C1.73956 13.8561 1.58749 13.6261 1.4845 13.3732C1.38152 13.1204 1.32967 12.8496 1.33194 12.5765V4.84987C1.32854 4.57806 1.38058 4.30841 1.48489 4.05738C1.58919 3.80635 1.74358 3.57923 1.93861 3.38987C2.12837 3.19747 2.35516 3.04553 2.60528 2.9432C2.85866 2.83724 3.13063 2.78285 3.40528 2.7832H6.36528C6.49789 2.7832 6.62506 2.83588 6.71883 2.92965C6.8126 3.02342 6.86528 3.1506 6.86528 3.2832C6.86528 3.41581 6.8126 3.54299 6.71883 3.63676C6.62506 3.73053 6.49789 3.7832 6.36528 3.7832H3.40528C3.26189 3.78711 3.12006 3.81412 2.98528 3.8632C2.78884 3.94612 2.62134 4.08533 2.50389 4.26329C2.38644 4.44124 2.32429 4.64999 2.32528 4.8632V12.5899C2.32361 12.7331 2.35045 12.8753 2.40424 13.008C2.45804 13.1408 2.53771 13.2615 2.63861 13.3632C2.7395 13.4633 2.85915 13.5425 2.99071 13.5963C3.12228 13.6501 3.26316 13.6773 3.40528 13.6765H11.1386C11.2806 13.6765 11.4206 13.6499 11.5519 13.5965C11.6826 13.544 11.8008 13.4645 11.8986 13.3632C11.9999 13.2654 12.0794 13.1472 12.1319 13.0165C12.1909 12.8845 12.2204 12.7412 12.2186 12.5965V9.63654C12.2186 9.50393 12.2713 9.37675 12.3651 9.28298C12.4588 9.18922 12.586 9.13654 12.7186 9.13654C12.8512 9.13654 12.9784 9.18922 13.0722 9.28298C13.1659 9.37675 13.2186 9.50393 13.2186 9.63654V12.6165C13.2197 12.8896 13.166 13.1601 13.0607 13.4121C12.9553 13.664 12.8005 13.8922 12.6053 14.0832C12.4139 14.2753 12.1876 14.4292 11.9386 14.5365C11.6806 14.6299 11.4066 14.6732 11.1319 14.6632Z" />
                            <path
                                d="M14.5386 3.63717C14.4707 3.46552 14.366 3.3108 14.232 3.18384L12.7986 1.75051C12.6717 1.61647 12.517 1.5118 12.3453 1.44384C12.0874 1.33515 11.8028 1.30628 11.5283 1.36094C11.2537 1.41561 11.0019 1.5513 10.8053 1.75051L9.6653 2.89051V2.92384L4.5053 8.07717C4.24479 8.33947 4.0986 8.69416 4.09863 9.06384V10.5105C4.10039 10.883 4.24915 11.2398 4.51257 11.5032C4.776 11.7667 5.13277 11.9154 5.5053 11.9172H6.95197C7.13566 11.9174 7.31755 11.881 7.48698 11.81C7.65641 11.739 7.80996 11.6349 7.93863 11.5038L13.0986 6.34384L14.2453 5.19717C14.38 5.07051 14.4853 4.91584 14.552 4.74384C14.6283 4.57286 14.6677 4.38773 14.6677 4.20051C14.6677 4.01328 14.6283 3.82815 14.552 3.65717L14.5386 3.63717ZM13.6186 4.33717C13.597 4.38754 13.5652 4.43293 13.5253 4.47051L12.712 5.28384L10.712 3.28384L11.532 2.46384C11.6107 2.38766 11.7157 2.34469 11.8253 2.34384C11.8781 2.34472 11.9302 2.35605 11.9786 2.37717C12.0302 2.39895 12.0746 2.43006 12.112 2.47051L13.552 3.90384C13.5883 3.943 13.6176 3.9881 13.6386 4.03717C13.6485 4.08781 13.6485 4.13987 13.6386 4.19051C13.6411 4.24021 13.6344 4.28995 13.6186 4.33717Z" />
                        </svg>
                    </button>

                </div>

            </div>
        </div>
    </div>



</template>

<script setup>
import AdminTitleComponent from '@/components/Admin/AdminTitleComponent.vue'
import { ref, onMounted } from 'vue'
import { useSurveyStore } from '@/stores/surveyStore.js'
import { useUserStore } from '@/stores/userStore.js'

const model = ref({
    id: null,
    image: null,
    imgFile: null,
    text: null,
})

const inputController = ref(null)
const userStore = useUserStore();
const surveyStore = useSurveyStore()

function openFileSelector() {
    inputController.value.click()
}

onMounted(() => {
    if (surveyStore.dynamicBoard.data?.length === 0) {

        surveyStore.fetchDynamicContent().then((response) => { })
    }
})

function setEditContent(id) {
    const content = surveyStore.dynamicBoard.data.find((content) => content.id === id)
    if (content) {
        model.value.id = content.id
        model.value.image = content.image
        model.value.text = content.text
        model.value.imgFile = null
    }

    window.scrollTo({
        top: 0,
        behavior: 'smooth', // Smooth scrolling effect
    });
}

function deleteDynamicContent(id) {

    surveyStore.deleteDyncmicContent(id).then((response) => {

        if (response.status === 200) {
            userStore.setNotification({
                type: 'success',
                message: 'Content deleted successfully!',
            })
        }

    }).catch((error) => {
        console.error('Error deleting dynamic content:', error)
    })

}

function onFileSelected(event) {
    const file = event.target.files[0]

    if (file) {
        const reader = new FileReader()
        reader.onload = (e) => {
            model.value.image = e.target.result
        }

        model.value.imgFile = file;
        reader.readAsDataURL(file)

    }
}

function saveDynamicContent() {

    if (!model.value.imgFile && !model.value.image) {
        userStore.setNotification({
            type: 'error',
            message: 'Please select an image.',
        });
        return;
    }

    if (!model.value.text || model.value.text.trim() === '') {
        userStore.setNotification({
            type: 'error',
            message: 'Please enter some text.',
        });
        return;
    }

    const formData = new FormData()
    formData.append('image', model.value.imgFile)
    formData.append('text', model.value.text)

    if (model.value.id) {
        formData.append('_method', 'PUT');

        surveyStore.updateDyncmicContent(formData, model.value.id).then((response) => {
            if (response.status === 200) {
                model.value = {
                    id: null,
                    image: null,
                    imgFile: null,
                    text: null,
                }
                userStore.setNotification({
                    type: 'success',
                    message: 'Content updated successfully!',
                })
            }
        }).catch((error) => {
            console.error('Error updating dynamic content:', error)
        })
    } else {
        surveyStore.storeDyncmicContent(formData).then((response) => {
            if (response.status === 201) {
                model.value = {
                    id: null,
                    image: null,
                    imgFile: null,
                    text: null,
                }
                userStore.setNotification({
                    type: 'success',
                    message: 'Content saved successfully!',
                })
            }
        }).catch((error) => {
            console.error('Error saving dynamic content:', error)
        })
    }


}
</script>