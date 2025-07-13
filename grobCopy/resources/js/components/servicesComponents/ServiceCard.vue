<template>
    <div class="card text-center mb-4 border-0">
        <div class="card-body bg-light">
            <div class="icon-container mx-auto">
                <Icon :name="service.icon" :customParameters="iconParameters"></Icon>
            </div>
            <h4 class="card-title my-3">{{ service.title }}</h4>
            <p class="card-text">{{ service.text }}</p>
        </div>
    </div>
</template>
<script setup>
import Icon from '../Icon.vue';
const iconParameters = {
    color: 'white',
    stroke: 'currentColor',
    'stroke-width': 2,
    width: '80',
    height: '80',
    display: 'block',
};
</script>

<script>
export default {
    name: 'ServiceCard',
    props: {
        service: {
            type: Object,
            required: true,
        },
    },
};
</script>

<style scoped>
.card-title {
    font-weight: bold;
}
.card-text {
    font-size: 15px;
    color: var(--bs-gray);
}
.icon-container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 120px;
    width: 120px;
    border-radius: 100%;
    background-color: var(--bs-primary);
}
</style>
