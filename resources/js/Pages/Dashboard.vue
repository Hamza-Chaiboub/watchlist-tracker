<template>
    <Head title="Dashboard" />
  <Layout >
    <!-- header -->
    <div class="p-6">
      <div class="flex justify-between items-center mb-6">
          <div>
              <h1 class="text-3xl font-bold">Dashboard</h1>
              <span>Track your entertainment journey</span>
          </div>
          <div>
              <SearchBar @search="searchOMDB" :loading="isLoading" class="relative" />
      <div v-if="error" class="flex justify-between items-center mt-6 px-10 py-2 bg-red-100 text-red-700 rounded-lg left-1/2 -translate-x-1/2 -translate-y-4 absolute z-10">
          {{ error }}
          <span @click="closeSearchResults" class="cursor-pointer text-3xl">&times;</span>
      </div>
      <div v-if="searchResults" class="h-[360px] overflow-y-scroll mt-6 px-10 py-2 bg-white dark:bg-gray-800 rounded-lg shadow absolute z-10 border-4 border-gray-200 dark:border-gray-700 left-1/2 -translate-x-1/2 -translate-y-4">
          <h2 class="flex items-center justify-between text-xl font-bold mb-4">
              <span>Search Results</span>
              <span @click="closeSearchResults" class="cursor-pointer text-3xl">&times;</span>
          </h2>
          <ul class="flex flex-col space-y-4">
              <li v-for="content in searchResults" :key="content.imdbID">
                  <div class="flex items-center">
                      <img v-if="content.Poster !== 'N/A'" :src="content.Poster" :alt="content.Title" class="w-16 h-16 object-cover mr-4 inline-block">
                      <div>
                          <h3>{{ content.Title }}</h3>
                          <p class="text-gray-500">{{ content.Year }} - {{ content.Type }}</p>
                      </div>
                  </div>
              </li>
              <button>
                  <Link href="#" class="text-blue-500 hover:underline">
                    <Icon name="magnifying-glass" class="inline-block mr-2" />
                      All Results
                  </Link>
              </button>
          </ul>
        </div>
          </div>
          <div>
              <Link href="#" class="btn bg-green-400 p-3 rounded-lg text-white hover:bg-green-600 font-bold"><Icon name="plus" /> Add Content</Link>
              <Link :href="route('logout')" class="btn bg-slate-400 p-3 rounded-lg text-white hover:bg-red-800 ml-3 font-bold"><Icon name="right-from-bracket" /> Log Out</Link>
          </div>
      </div>
      <StatsCards :data="stats" />
      <div class="grid lg:grid-cols-3 gap-6 mt-6">
        <ContinueWatching :items="continueWatching" class="lg:col-span-2" />
        <div class="space-y-6">
          <TopRated :items="topRatedShows" />
          <QuickActions />
        </div>
      </div>
      <div class="mt-6">
        <RecentActivity :items="recent" />
      </div>
    </div>
  </Layout>
</template>

<script setup>
import { usePage, Link, Head } from '@inertiajs/vue3';
import Layout from '@/Layouts/AppLayout.vue';
import StatsCards from '@/Components/StatsCards.vue';
import ContinueWatching from '@/Components/ContinueWatching.vue';
import TopRated from '@/Components/TopRated.vue';
import RecentActivity from '@/Components/RecentActivity.vue';
import QuickActions from '@/Components/QuickActions.vue';
import Icon from "@/Components/Icon.vue";
import SearchBar from "@/Components/SearchBar.vue";
import axios from 'axios';
import { ref } from 'vue';

const props = usePage().props;
const {
    stats,
    userContinue: continueWatching,
    topRated: topRatedShows,
    recent
} = props;

const searchResults = ref(null);
const isLoading = ref(false);
const error = ref(null);
async function searchOMDB(query) {
  if (!query.trim()) return;

  isLoading.value = true;
  error.value = null;

  try {
    const response = await axios.get(`/omdb/search`, {
      params: {
        query: query,
      }
    });

    if (response.data.Response === 'True') {
      searchResults.value = response.data.Search;
      console.log('OMDB Results:', searchResults.value);
    } else {
      error.value = response.data.Error || 'No results found';
      searchResults.value = null;
    }
  } catch (err) {
    error.value = 'Failed to fetch data from OMDB';
    console.error('OMDB Error:', err);
  } finally {
    isLoading.value = false;
  }
}

const closeSearchResults = () => {
  searchResults.value = null;
  error.value = null;
};
</script>
