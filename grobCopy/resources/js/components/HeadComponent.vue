<template>
    <div class="text-center head-section mb-5 mt-3">
        <h1 class="text-uppercase">{{ headInfo.title }}</h1>
        <h3 class="text-primary">{{ headInfo.subtitle }}</h3>
    </div>
</template>

<script>
export default {
    name: 'HeadComponent',
    props: {
        headInfo: {
            type: Object,
            required: true,
        },
    },
};
</script>

<style scoped>
.head-section h1 {
    font-size: 2.5rem;
    font-weight: 700;
}
.head-section h3 {
    font-size: 1rem;
    font-weight: 500;
    font-family: 'Playfair Display', serif;
    font-style: italic;
}
</style>
