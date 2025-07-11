<template>
    <nav class="navbar navbar-expand-lg fixed-top px-4 py-3" :class="{'bg-dark': !homeRoute }" v-if="!adminRoute">
        <div class="container">
            <router-link class="navbar-brand m-0" to="/"><img :src="logo" alt="Logo"/></router-link>
            <span class="navbar-toggler">
                <button class=" btn btn-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                Menú
                <span v-html="menuIcon"></span>
            </button>
            </span>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav text-uppercase ms-auto custom-link">
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="/Services">Servicios</a> -->
                        <router-link class="nav-link" to="/services">Servicios</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/products">Productos</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/catalogue">Catálogo</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/about">Nosotros</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/locations">Ubicaciones</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/contact">Contacto</router-link>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
import feather from 'feather-icons';
     export default {
        name: 'Navbar',
        data() {
            return {
                menuIcon: feather.icons["menu"].toSvg({
                    width: '16',
                    height: '16'
                }),
            };
        },
    }
</script>
<script setup>
import { useRoute } from 'vue-router';
import { onMounted, nextTick, computed  } from 'vue';

const logo = "../images/GROB-v2.png"; 

const route = useRoute();

const homeRoute = computed(() => {
  return route.path === '/';
});
const adminRoute = computed(() => {
  return route.path === '/admin';
});

onMounted(async () => {
  await nextTick(); // espera a que el DOM esté renderizado

  const routeList = document.getElementsByClassName('nav-item');

  for (let i = 0; i < routeList.length; i++) {
    const link = routeList[i].querySelector('a');
    
    if (link && link.getAttribute('href') && link.getAttribute('href') === route.path) {
      link.classList.add('text-primary');
    } else if (link) {
      link.classList.remove('text-primary');
    }
  }
});




</script>


<style scoped>
.custom-link li a{
    color: white;
    margin: 0 10px;
}
.custom-link li a:hover{
    color: var(--bs-primary);
}
@media (max-width: 992px) {
  .navbar {
    background-color: var(--bs-dark); /* color para móvil */
  }
  @media (max-width: 338px) {
    .navbar .container{
        display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
    }
  }
}

</style>