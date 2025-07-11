<template>
  <Navbar />
  <div class="d-md-flex">
    <Sidebar />

    <div class="">
      <div class="m-3">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script setup>
import Navbar from '../js/components/AdminComponents/Navbar.vue'
import Sidebar from '../js/components/AdminComponents/Sidebar.vue'
</script>

<style scoped>
@media (min-width: 768px) {
  .content {
    margin-left: 250px;
  }
}
</style>
