<template>
    <img :src="data.image_url" alt="" class="w-full h-[50vh] object-cover relative" />
    <div class="absolute top-0 right-0 w-full h-[50vh] bg-gradient-to-b from-transparent from-30% to-black to-90% flex justify-center items-end">
        <div class="w-1/2 p-8 flex">
            <div>
                <img :src="data.image_url" alt="" class="w-32 h-64 object-cover rounded-md shadow-2xl" >
            </div>
            <div class="ml-4 flex flex-col justify-end items-start gap-6">
                <Badge :type="data.type" class="mt-2 !text-lg" />
                <h2 class="text-4xl text-white font-black">{{ data.title }}</h2>
                <div>
                    <span class="text-lg text-gray-300 font-thin">{{ data.release_date }}</span>
                    <Icon name="circle" custom-class="text-white ml-3 text-xs" />
                    <span class="text-lg text-gray-300 font-thin ml-3">Drama</span>
                    <Icon name="circle" custom-class="text-white ml-3 text-xs" />
                    <span class="text-lg text-gray-300 font-thin ml-3">62 episodes</span>
                    <div class="flex gap-6">
                        <div class="flex items-center gap-2">
                            <Icon name="star" custom-class="text-green-400 text-2xl" />
                            <div class="flex flex-col items-start">
                                <span class="text-white text-lg font-bold">9.2</span>
                                <span class="text-gray-400 text-xs">IMDB Rating</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <Icon name="star" custom-class="text-yellow-400 text-2xl" />
                            <div class="flex flex-col items-start">
                                <span class="text-white text-lg font-bold">{{ data.rating ?? '-' }}</span>
                                <span class="text-gray-400 text-xs">Your Rating</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 mt-4">
                        <select name="" id="" class="bg-gray-600 text-gray-200 dark:bg-gray-800 dark:text-white p-2 rounded-md w-48">
                            <option value="1" class="p-2">Want To Watch</option>
                            <option value="2">Currently Watching</option>
                            <option value="3">Completed</option>
                            <option value="4">On Hold</option>
                            <option value="5">Dropped</option>
                        </select>
                        <a
                           href=""
                           class="text-white text-lg py-2 hover:py-[6px] px-3 hover:px-[10px] rounded-md bg-yellow-900 hover:text-yellow-400 hover:bg-green-800 hover:border-green-300 hover:border-2"
                        >
                            <Icon name="heart" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Badge from "@/Components/Badge.vue";
import Icon from "@/Components/Icon.vue";

const props = defineProps({
    data: Array,
});
</script>

<style scoped>
/* optional styling */
</style>
