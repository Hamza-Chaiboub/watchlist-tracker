<template>
  <section class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow text-gray-800 dark:text-white">
    <h2 class="text-xl font-semibold mb-4 flex items-center">
      <Icon name="play" class="w-5 h-5 text-green-500 mr-2" />
      Continue Watching
    </h2>
    <div class="grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4 justify-items-center">
        <div v-for="item in items" :key="item.id" class="h-[300px] w-48 mb-4">
          <a
            :href="route('content.show', item.content_id)"
            class="relative h-full w-full flex flex-col bg-gray-50 dark:bg-gray-700 rounded overflow-hidden w-48 hover:scale-105 transition-transform duration-200 shadow hover:shadow-lg hover:border-green-600 hover:border-2"
          >
            <img :src="item.image_url" alt="" class="h-32 w-full object-cover" />
            <div class="p-3 flex-1 flex flex-col justify-between">
              <div>
                <h3 class="font-medium text-gray-900 dark:text-white">{{ item.title }}</h3>
                <Badge :type="item.type" class="mt-1" />
              </div>
              <div class="mt-3">
                <div class="flex justify-between text-sm text-gray-700 dark:text-gray-300">
                  <span><Icon name="star" custom-class="text-yellow-400" /> {{ item.rating ?? '-' }}</span>
                  <span>{{ item.progress }}%</span>
                </div>
                <div class="mt-1 bg-gray-200 dark:bg-gray-600 h-2 rounded-full overflow-hidden">
                  <div
                    class="h-full bg-blue-500"
                    :style="{ width: item.progress + '%' }"
                  ></div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
  </section>
</template>

<script setup>
import Icon from './Icon.vue';
import Badge from './Badge.vue';
const props = defineProps({ items: Array });
</script>

<style scoped>
/* optional styling */
</style>
