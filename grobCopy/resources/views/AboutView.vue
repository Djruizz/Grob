<template>
    <div class="container">
        <HeadComponent :headInfo=headInfo />
        <AboutTimeline></AboutTimeline>
    </div>
</template>

<script setup>

import HeadComponent from '../js/components/HeadComponent.vue';
import AboutTimeline from '../js/components/aboutComponents/AboutTimeline.vue';

const headInfo = {
    title: "Nosotros",
    subtitle: "GRUPO GROVI"
}


</script>


