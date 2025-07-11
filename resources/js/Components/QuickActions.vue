<template>
  <section class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4 flex items-center">
      <Icon name="arrow-right" class="w-5 h-5 text-green-500 mr-2" />
      Quick Actions
    </h2>
    <div class="flex flex-col space-y-2">
      <inertia-link
        href="/watchlist"
        class="py-2 px-4 bg-blue-600 text-white rounded hover:bg-blue-700 text-center"
      >
        View Full Watchlist
      </inertia-link>
      <inertia-link
        href="/contents/create"
        class="py-2 px-4 border border-blue-600 text-blue-600 rounded hover:bg-blue-50 dark:hover:bg-gray-700 text-center"
      >
        Add New Content
      </inertia-link>
    </div>
  </section>
</template>

<script setup>
import Icon from './Icon.vue';
</script>

<style scoped>
/* optional styling */
</style>
