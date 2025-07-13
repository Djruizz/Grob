<template>
    <Header></Header>
    <div :class="{ 'main-content': !homeRoute }">
        <router-view></router-view>
    </div>
    <Footer></Footer>
</template>

<script setup>
    import Header from '../js/components/Header.vue';
    import Footer from '../js/components/Footer.vue';
    import { useRoute } from 'vue-router';
    import { computed } from 'vue';

    const route = useRoute();

    const homeRoute = computed(() => {
        return route.path === '/';
    });
</script>

<style scoped>
    .main-content {
        padding-top: 170px;
    }
</style>
