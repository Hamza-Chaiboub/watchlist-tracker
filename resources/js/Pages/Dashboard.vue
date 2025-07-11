<template>
    <Head title="Dashboard" />
  <Layout >
    <!-- header -->
    <div class="p-6">
      <div class="flex justify-between items-center mb-6 text-white">
          <div>
              <h1 class="text-3xl font-bold">Dashboard</h1>
              <span>Track your entertainment journey</span>
          </div>
          <div>
              <Link href="#" class="btn bg-green-400 p-3 rounded text-white hover:bg-green-600 font-bold"><Icon name="plus" /> Add Content</Link>
              <Link :href="route('logout')" class="btn bg-slate-400 p-3 rounded text-white hover:bg-red-800 ml-3 font-bold"><Icon name="right-from-bracket" /> Log Out</Link>
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
import { usePage, Link } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import Layout from '@/Layouts/AppLayout.vue';
import StatsCards from '@/Components/StatsCards.vue';
import ContinueWatching from '@/Components/ContinueWatching.vue';
import TopRated from '@/Components/TopRated.vue';
import RecentActivity from '@/Components/RecentActivity.vue';
import QuickActions from '@/Components/QuickActions.vue';
import Icon from "@/Components/Icon.vue";

const props = usePage().props;
const {
    stats,
    userContinue: continueWatching,
    topRated: topRatedShows,
    recent
} = props;
console.log(props.topRated)
</script>
