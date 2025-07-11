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
        <div class="text-center">
            <img :src="`/images/GROB-v2.png`" class="mx-auto">
        </div>
        <SidebarContent />
    </div>
  </div>

  <!-- Sidebar fijo en pantallas md+ -->
  <div class="bg-dark text-white p-3 d-none d-md-block" style="width: 250px; height: calc(100vh - 150px);">
    <SidebarContent />
  </div>
</template>

<script setup>
import SidebarContent from './SidebarContent.vue';

</script>
