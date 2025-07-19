<template>
  <div class="min-h-screen flex bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white">
    <div class="flex-1 flex flex-col">
      <main class="flex-1 overflow-auto">
        <slot />
      </main>
    </div>
  </div>
</template>

<script setup>
// No script logic needed for layout
</script>

<style scoped>

</style>
