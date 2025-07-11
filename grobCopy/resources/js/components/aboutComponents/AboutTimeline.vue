<template>
  <div class="container timeline">
        <div v-for="(item, index) in timelineItems" :key="index">
          <TimelineItem :item="item" :index="index" :itemsList = "timelineItems" />
        </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import TimelineItem from './TimelineItem.vue';



const timelineItems = ref([]);

onMounted(async()=>{
    try{
    const res = await fetch('/api/timeline_items')
    if(!res.ok) throw new Error('Error al obtener items de la timeline')
    const data = await res.json()
    timelineItems.value = data
    }catch(err){
      console.log(err)
    }
})
</script>

<style scoped>


.timeline {
  position: relative;
  padding: 60px 0;
}

.timeline::before {
  content: '';
  position: absolute;
  top: 80px;
  bottom: 170px;
  left: 50%;
  transform: translateX(-50%);
  width: 4px;
  background: #dee2e6;
  z-index: 1;
}

/* Mobile View */
@media (max-width: 768px) {
  .timeline::before {
    left: 50%;
    top: 160px;
    transform: translateX(-50%);
  }
}
</style>
