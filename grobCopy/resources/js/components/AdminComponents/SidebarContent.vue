<template>
<div class="text-center pb-3 mb-3 ">
    <img :src="`/images/GROB-v2.png`" class="mx-auto">
</div>
<ul class="nav flex-column custom-link">
    
    <li class="nav-item">
        <router-link class="nav-link" to="/admin" exact-active-class="text-primary">
            <Icon name="home" class="me-2"></Icon> 
            <span>Inicio</span>
        </router-link>
    </li>
    <li class="nav-item">
        <router-link class="nav-link" to="/admin/services" exact-active-class="text-primary">
            <Icon name="clipboard" class="me-2"></Icon> 
            <span>Servicios</span>
        </router-link>
    </li>
    <li class="nav-item">
        <router-link class="nav-link" to="/admin/products" exact-active-class="text-primary">
            <Icon name="package" class="me-2"></Icon> 
            <span>Productos</span>
        </router-link>
    </li>
</ul>
</template>

<script setup>
import Icon from '../Icon.vue';  

</script>

<style scoped>
.custom-link li a{
    color: white;
}
.custom-link li a:hover{
    color: var(--bs-primary);
}
</style>