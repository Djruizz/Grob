<template>
<ul class="nav flex-column">
    
    <li class="nav-item">
        <router-link class="nav-link text-white">
            <Icon name="home" class="me-2"></Icon> 
            Inicio
        </router-link>
    </li>
    <li class="nav-item">
        <router-link class="nav-link text-white">
            <Icon name="clipboard" class="me-2"></Icon> 
            Servicios
        </router-link>
    </li>
    <li class="nav-item">
        <router-link class="nav-link text-white">
            <Icon name="package" class="me-2"></Icon> 
            Productos
        </router-link>
    </li>
</ul>
</template>

<script setup>
import Icon from '../Icon.vue';  
</script>