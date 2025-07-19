<template>
    <Head :title="content.title" />
  <Layout >
    <ContentHeader :data="content" />
    <div  class="w-1/2 mx-auto mt-10 flex justify-start items-center">
        <a :href="route('dashboard')" class="text-white flex items-center gap-2 p-2 hover:p-[6px] hover:text-yellow-400 hover:bg-green-800 hover:border-green-300 hover:border-2 bg-yellow-800 rounded-md">
            <Icon name="arrow-left" class="text-lg" />
            Dasboard
        </a>
    </div>
  </Layout>
</template>

<script setup>
import { usePage, Link, Head } from '@inertiajs/vue3';
import Layout from '@/Layouts/AppLayout.vue';
import Icon from "@/Components/Icon.vue";
import ContentHeader from "@/Components/ContentHeader.vue";

const props = usePage().props;
const {
    content,
} = props;
</script>
