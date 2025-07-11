<template>
  <font-awesome-icon :icon="['fas', `${name}`]" class="fa-icon" :class="customClass" />
</template>

<script setup>
const props = defineProps({
  name: String,
  customClass: String,
});
</script>

<style scoped>

</style>
