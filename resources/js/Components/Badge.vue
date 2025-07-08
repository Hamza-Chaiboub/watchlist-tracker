<template>
  <span
    class="inline-block text-xs px-2 py-0.5 rounded-full font-medium"
    :class="badgeClasses[type]"
  >
    {{ type }}
  </span>
</template>

<script setup>
const props = defineProps({ type: String });

const badgeClasses = {
  movie: 'bg-indigo-600 text-white',
  series: 'bg-purple-600 text-white',
  anime: 'bg-green-600 text-white',
  documentary: 'bg-yellow-600 text-black',
};
</script>

<style scoped>
/* optional styling */
</style>
