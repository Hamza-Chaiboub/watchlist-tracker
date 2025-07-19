<script setup>
import { ref, defineEmits, defineProps } from 'vue';
import Icon from "@/Components/Icon.vue";

const inputEl = ref(null);
const emit = defineEmits(['search']);
const props = defineProps({
  loading: Boolean
});

const handleSearch = () => {
  emit('search', inputEl.value.value);
};
</script>

<template>
    <div class="flex items-center justify-between text-gray-800 dark-text-white shadow rounded-lg">
        <input
        ref="inputEl"
        type="text"
        placeholder="Search..."
        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400"
        @keyup.enter="handleSearch"
        />
        <button
        class="ml-4 px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400"
        @click="handleSearch"
        :disabled="loading"
        >
            <span v-if="!loading" class="flex items-center">
                <Icon name="magnifying-glass" class="inline-block mr-2" />
                Search
            </span>
            <span v-else class="flex items-center">
                <Icon name="spinner" class="animate-spin inline-block mr-2" />
                Searching...
            </span>
        </button>
    </div>
</template>

<style scoped>

</style>
