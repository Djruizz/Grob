<template>
    <!-- Para pantallas pequeñas (offcanvas) -->
    <div
        class="offcanvas offcanvas-start bg-dark text-white d-md-none"
        tabindex="-1"
        id="sidebarOffcanvas"
        aria-labelledby="sidebarOffcanvasLabel"
    >
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Menú</h5>
            <button
                type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
            ></button>
        </div>
        <div class="offcanvas-body">
            <SidebarContent />
        </div>
    </div>

    <!-- Sidebar fijo en pantallas md+ -->
    <div class="bg-dark text-white px-3 pt-3 d-none d-md-block fixed-top" style="width: 250px; height: calc(100vh)">
        <SidebarContent />
    </div>
</template>

<script setup>
import SidebarContent from './SidebarContent.vue';
</script>
