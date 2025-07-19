<template>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mt-6">
    <StatCard
      v-for="(value, key) in data"
      :key="key"
      :title="labels[key]"
      :value="formatValue(key, value)"
      :icon="icons[key]"
      :custom-class="customClasses[key]"
    />
  </div>
</template>

<script setup>
import StatCard from './StatCard.vue';
const props = defineProps({ data: Object });

const labels = {
  total: 'Total',
  watching: 'Currently Watching',
  completed: 'Completed',
  wantToWatch: 'Want to Watch',
  avgRating: 'Average Rating',
};

const icons = {
  total: 'film',
  watching: 'play',
  completed: 'star',
  wantToWatch: 'eye',
  avgRating: 'arrow-trend-up',
};

const customClasses = {
  total: 'bg-blue-500',
  watching: 'bg-green-500',
  completed: 'bg-purple-500',
  wantToWatch: 'bg-orange-500',
  avgRating: 'bg-red-500',
};

function formatValue(key, val) {
  return key === 'avgRating' ? val.toFixed(1) : val;
}
</script>

<style scoped>
/* optional styling */
</style>
