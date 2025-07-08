<template>
<!--  <i :class="['icon', `icon-${name}`, customClass]"></i>-->
  <font-awesome-icon :icon="['fas', `${name}`]" class="fa-icon" :class="customClass" />
<!--    <font-awesome-icon :icon="['fas', 'home']" />-->
</template>

<script setup>
const props = defineProps({
  name: String,
  customClass: String,
});
</script>

<style scoped>

</style>
