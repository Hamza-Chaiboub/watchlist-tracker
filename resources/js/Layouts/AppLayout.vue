<template>
  <div class="min-h-screen flex bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white">
<!--    <aside class="w-64 bg-white dark:bg-gray-800 p-4">-->
<!--      &lt;!&ndash; Sidebar content &ndash;&gt;-->
<!--      <nav class="space-y-2">-->
<!--        <inertia-link href="/dashboard" class="block py-2 px-3 rounded hover:bg-gray-200 dark:hover:bg-gray-700">-->
<!--          Dashboard-->
<!--        </inertia-link>-->
<!--        &lt;!&ndash; add other links here &ndash;&gt;-->
<!--      </nav>-->
<!--    </aside>-->
    <div class="flex-1 flex flex-col">
      <header class="bg-white dark:bg-gray-800 p-4 shadow">
        <!-- header content -->
        <slot name="header" />
      </header>
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
/* add any layout-specific styles here */
</style>
