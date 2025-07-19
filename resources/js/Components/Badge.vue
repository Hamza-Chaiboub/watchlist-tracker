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
  Movie: 'bg-indigo-600/75 text-white',
  Series: 'bg-purple-600/75 text-white',
  Anime: 'bg-green-600/75 text-white',
  Documentary: 'bg-yellow-600/75 text-black',
  Cartoon: 'bg-gray-600/75 text-white',
};
</script>

<style scoped>
/* optional styling */
</style>
