<template>
  <section class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4 flex items-center">
      <Icon name="play" class="w-5 h-5 text-green-500 mr-2" />
      Continue Watching
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <div
        v-for="item in items"
        :key="item.id"
        class="flex flex-col bg-gray-50 dark:bg-gray-700 rounded overflow-hidden"
      >
        <img :src="item.content.image_url" alt="" class="h-32 w-full object-cover" />
        <div class="p-3 flex-1 flex flex-col justify-between">
          <div>
            <h3 class="font-medium text-gray-900 dark:text-white">{{ item.content.title }}</h3>
            <Badge :type="item.content.type" class="mt-1" />
          </div>
          <div class="mt-3">
            <div class="flex justify-between text-sm text-gray-700 dark:text-gray-300">
              <span>⭐ {{ item.rating ?? '-' }}</span>
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
