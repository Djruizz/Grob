<template>
  <Navbar />
  <div class="d-md-flex">
    <Sidebar />
    <div class="content mx-3 mt-3">
      <router-view></router-view>
    </div>
    
  </div>
</template>

<script setup>
import Navbar from '../js/components/AdminComponents/Navbar.vue'
import Sidebar from '../js/components/AdminComponents/Sidebar.vue'
</script>

<style scoped>
.content {
  margin-left: 16px !important;
  margin-top: 170px !important;
}
@media (min-width: 767px) {
  .content {
    width: calc(100vw - 250px);
    margin-left: 270px !important;
  }
}
</style>
