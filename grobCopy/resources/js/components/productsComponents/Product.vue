<template>
    <div class="card mb-4" v-if="product">
        <img class="card-img-top" :src="`/images/products/${product.image}`" :alt="product.name" >
        <div class="card-body text-center p-2 border bg-light">
            <p class="card-title text-uppercase">{{ product.name }}</p>
        </div>
    </div>
    <p v-else>Cargando...</p>
</template>

<script setup>

defineProps({
    product: {
        type: Object,
    }
})

</script>

<style scoped>

.card-img-top {
    width: 100%;
    height: 50%;
    max-height: 200px;
    object-fit: cover;
}
.card-title{
    font-size: 1.2rem;
    font-weight: bold;
}
</style>