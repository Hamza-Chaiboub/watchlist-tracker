<template>
  <section class="p-4 bg-white dark:bg-gray-800 text-gray-800 dark:text-white rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4 flex items-center">
      <Icon name="star" class="w-5 h-5 text-yellow-400 mr-2" />
      Top Rated
    </h2>
    <ul class="space-y-3">
      <li v-for="item in items" :key="item.id">
        <a href="" class="flex items-center dark:hover:bg-gray-700 hover:bg-gray-100 p-2 rounded-md">
          <img :src="item.image_url" alt="" class="w-10 h-10 rounded mr-3 object-cover" />
          <div class="flex-1">
            <h4 class="font-medium text-gray-900 dark:text-white">{{ item.title }}</h4>
            <Badge :type="item.type" class="mt-1" />
          </div>
          <span class="font-semibold text-gray-900 dark:text-white"><Icon name="star" custom-class="text-yellow-400" /> {{ item.rating }}</span>
        </a>
      </li>
    </ul>
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
