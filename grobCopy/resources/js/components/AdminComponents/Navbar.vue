<template>
  <nav class="navbar navbar-dark bg-dark" style="height: 150px;">
    <div class="container-fluid">
        <button
            class="btn btn-outline-light d-md-none"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebarOffcanvas"
            aria-controls="sidebarOffcanvas"
        >
            ☰
        </button>
        <router-link class="navbar-brand ms-4 d-none d-md-block" to="/admin">
            <img :src="`/images/GROB-v2.png`" alt="Logo" width="120">
        </router-link>
    </div>
  </nav>
</template>
<script>

</script>
