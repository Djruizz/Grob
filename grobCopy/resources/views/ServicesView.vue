<template>
    <div class="container">
        <HeadComponent :headInfo="headInfo"></HeadComponent>
        <div class="row">
            <div class="col-md-4 mb-4" v-for="(service, index) in services" :key="index">
                <TextCard :service="service"></TextCard>
            </div>
        </div>
    </div>
</template>

<script setup>
import TextCard from '../js/components/servicesComponents/ServiceCard.vue'
import HeadComponent from '../js/components/HeadComponent.vue'
import feather from 'feather-icons'
import { onMounted, ref } from 'vue';

const headInfo = {
    title:"Servicios",
    subtitle: "Somos Expertos en Seguridad y Confort"
};




const services = ref([]);


onMounted(async () => {
    // Initialize feather icons
    feather.replace();

    
    try {
        const res = await fetch('/api/services')
        if (!res.ok) throw new Error('Error al obtener servicios')
        const data = await res.json()
        services.value = data
    } catch (error) {
        console.error(error) 
    }
    

    
});


</script>