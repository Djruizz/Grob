<template>
    <div class="container">
        <HeadComponent :headInfo="headInfo"></HeadComponent>
        <div class="row">
            <div class="col">
                <!-- Tabs -->
                <ul class="nav nav-tabs" id="productsTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="suspension-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#suspension"
                            type="button"
                            role="tab"
                            aria-controls="suspension"
                            aria-selected="true"
                        >
                            Suspensión
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="traccionDelantera-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#traccionDelantera"
                            type="button"
                            role="tab"
                            aria-controls="traccionDelantera"
                            aria-selected="false"
                        >
                            Tracción Delantera
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="direccion-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#direccion"
                            type="button"
                            role="tab"
                            aria-controls="direccion"
                            aria-selected="false"
                        >
                            Dirección
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="soportes-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#soportes"
                            type="button"
                            role="tab"
                            aria-controls="soportes"
                            aria-selected="false"
                        >
                            Soportes
                        </button>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content mt-3" id="productsTabContent">
                    <div
                        class="tab-pane fade show active"
                        id="suspension"
                        role="tabpanel"
                        aria-labelledby="suspension-tab"
                    >
                        <div class="row">
                            <div
                                class="col-md-4"
                                v-for="item in products.filter((product) => product.category === 'Suspensión')"
                                :key="item.id"
                            >
                                <Product :product="item"></Product>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="traccionDelantera"
                        role="tabpanel"
                        aria-labelledby="traccionDelantera-tab"
                    >
                        <div class="row">
                            <div
                                class="col-md-4"
                                v-for="item in products.filter((product) => product.category === 'Tracción Delantera')"
                                :key="item.id"
                            >
                                <Product :product="item"></Product>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="direccion" role="tabpanel" aria-labelledby="direccion-tab">
                        <div class="row">
                            <div
                                class="col-md-4"
                                v-for="item in products.filter((product) => product.category === 'Dirección')"
                                :key="item.id"
                            >
                                <Product :product="item"></Product>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="soportes" role="tabpanel" aria-labelledby="soportes-tab">
                        <div class="row">
                            <div
                                class="col-md-4"
                                v-for="item in products.filter((product) => product.category === 'Soporte')"
                                :key="item.id"
                            >
                                <Product :product="item"></Product>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

import HeadComponent from '../../js/components/HeadComponent.vue';
import Product from '../../js/components/productsComponents/Product.vue';

const headInfo = {
    title: 'Productos',
    subtitle: 'Nuestra Calidad es desarrollada en Equipo Original.',
};
const products = ref([]);

onMounted(async () => {
    try {
        const res = await fetch('/api/products');
        if (!res.ok) throw new Error('Error al obtener los productos');
        const data = await res.json();
        products.value = data;
    } catch (error) {
        console.error(error);
    }
});
</script>

<style>
.main-container {
    padding-top: 170px;
    padding-bottom: 100px;
}
</style>
