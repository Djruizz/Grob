<template>
    <div 
        v-if="!(item.is_final)" class="timeline-item" 
        :class="
            {'timeline-start': index===0,},
            index % 2 === 0 ? 'left' : 'right'
        "
     >
        <div class="timeline-img-wrapper">
            <img :src="`/images/${item.image}`" :alt="item.title" class="timeline-img" />
        </div>
        <div class="timeline-content">
            <h5><strong>{{ item.title }}</strong></h5>
            <p v-html="item.description.replace(/\n/g, '<br>')" class="custom-text"></p>
        </div>
    </div>
    <div v-else class="timeline-end">
            <div class="timeline-end-circle">
                <span>{{ item.title }}</span>
            </div>
        </div>
</template>

<script setup>

defineProps({
    item: {
        type: Object,
        required: true
    },
    index: {
        type: Number,
        required: true
    },
    itemsList: {
        type: Object,
        required: true
    }
});

</script>

<style scoped>
.timeline-item {
  position: relative;
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 100px 0;
}
.timeline-content {
  width: 40%;
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  z-index: 2;
}
.custom-text{
    color: #747474;
    font-size: 16px;
}

.timeline-img-wrapper {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: 3;
}
.timeline-start .timeline-img-wrapper{
  top: 0;
}
.timeline-img {
  width: 170px;
  height: 170px;
  border-radius: 50%;
  object-fit: contain;
  border: 5px solid #fff;
  box-shadow: 0 0 0 4px #dee2e6;
  background-color: white;
}

.left .timeline-content {
  text-align: right;
}
.right .timeline-content {
  text-align: left;
  margin-left: auto;
}


.timeline-end {
  position: relative;
  margin-top: 100px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.timeline-end-circle {
  width: 140px;
  height: 140px;
  background-color: var(--bs-primary); /* Cambia a tu color primario */
  border-radius: 50%;
  color: white;
  font-weight: bold;
  font-size: 18px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  z-index: 3;
  box-shadow: 0 0 0 4px #dee2e6;
}

@media (max-width: 767px) {
  .timeline-item {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
  .timeline-start{
    margin-top: 0 !important;
  }
  .timeline-item .left{
    margin-top: 0 !important;
  }

  .timeline-content {
    width: 90%;
    text-align: center !important;
    margin: 0;
    order: 2;
  }

  .right .timeline-content {
    text-align: left;
    margin-left: 0 !important;
  }

  .timeline-img-wrapper {
    position: relative;
    top: auto;
    left: auto;
    transform: none;
    margin-bottom: 20px;
    order: 1;
  }
}

</style>