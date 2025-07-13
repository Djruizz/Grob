<template>
    <div class="alert alert-danger d-flex align-items-center" v-if="alert.show">
        <Icon name="alert-triangle" class="me-2" />
        {{alert.message}}
    </div>
</template>
<script setup>
import Icon from '../../Icon.vue';
const props = defineProps({
    alert: {
        type: Object,
        default: () => ({ show: false, message: '' }),
    },
});
</script>