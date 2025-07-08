<template>
  <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow flex flex-col">
    <div class="mb-2">
      <span class="font-medium text-gray-700 dark:text-gray-200">{{ title }}</span>
      <div class="text-2xl font-semibold text-gray-900 dark:text-white">{{ value }}</div>
    </div>
    <Icon :name="icon" :custom-class="customClass" class="w-6 h-6 text-white mr-2  p-2 rounded-md" />
  </div>
</template>

<script setup>
import Icon from './Icon.vue';
const props = defineProps({
  title: String,
  value: [String, Number],
  icon: String,
  customClass: String
});
</script>

<style scoped>
/* optional styling */
</style>
