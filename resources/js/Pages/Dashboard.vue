<!--<script setup>-->
<!--import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';-->
<!--import { Head } from '@inertiajs/vue3';-->
<!--</script>-->

<!--<template>-->
<!--    <Head title="Dashboard" />-->

<!--    <AuthenticatedLayout>-->
<!--        <template #header>-->
<!--            <h2-->
<!--                class="text-xl font-semibold leading-tight text-gray-800"-->
<!--            >-->
<!--                Dashboard-->
<!--            </h2>-->
<!--        </template>-->

<!--        <div class="py-12">-->
<!--            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">-->
<!--                <div-->
<!--                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"-->
<!--                >-->
<!--                    <div class="p-6 text-gray-900">-->
<!--                        You're logged in! {{ $page.props.auth.user.name }}-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </AuthenticatedLayout>-->
<!--</template>-->
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
        <button class="btn bg-green-400 p-2 rounded text-white hover:bg-green-300 hover:text-black">+ Add Content</button>
      </div>
      <StatsCards :data="stats" />
      <div class="grid lg:grid-cols-3 gap-6 mt-6">
        <ContinueWatching :items="continue" class="lg:col-span-2" />
        <div class="space-y-6">
          <TopRated :items="top" />
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
import { usePage } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import Layout from '@/Layouts/AppLayout.vue';
import StatsCards from '@/Components/StatsCards.vue';
import ContinueWatching from '@/Components/ContinueWatching.vue';
import TopRated from '@/Components/TopRated.vue';
import RecentActivity from '@/Components/RecentActivity.vue';
import QuickActions from '@/Components/QuickActions.vue';

const props = usePage().props;
const { stats, continue: continueWatching, top: topRated, recent } = props;
console.log(stats)
</script>
