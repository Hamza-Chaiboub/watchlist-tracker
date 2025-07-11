<template>
  <section class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4 flex items-center">
      <Icon name="clock" class="w-5 h-5 text-indigo-500 mr-2" />
      Recent Activity
    </h2>
    <ul class="space-y-3">
      <li v-for="item in items" :key="item.id" class="flex items-start">
        <Badge :type="item.content.type" class="mr-3 mt-1" />
        <div>
          <h4 class="font-medium text-gray-900 dark:text-white">{{ item.content.title }}</h4>
          <p class="text-xs text-gray-500 dark:text-gray-400">
            Added {{ new Date(item.created_at).toLocaleDateString() }}
          </p>
        </div>
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
