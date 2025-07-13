<template>
    <nav class="navbar navbar-dark bg-dark fixed-top" style="height: 150px">
        <div class="container-fluid justify-content-start flex-nowrap">
            <button
                class="btn btn-outline-light d-md-none"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#sidebarOffcanvas"
                aria-controls="sidebarOffcanvas"
            >
                ☰
            </button>

            <div class="title text-white border-start p-4">
                <h1 class="m-0">Panel de Administración</h1>
            </div>
        </div>
    </nav>
</template>
<script></script>

<style scoped>
.title {
    margin-left: 250px !important;
}
@media (max-width: 767px) {
    .title {
        margin-left: 20px !important;
    }
}
@media (max-width: 500px) {
    .title {
        border-left: none !important;
        margin-left: 10px !important;
    }
    .title h1 {
        font-size: 20px !important;
    }
}
@media (max-width: 278px) {
    .title {
        display: none !important;
    }
}
</style>
