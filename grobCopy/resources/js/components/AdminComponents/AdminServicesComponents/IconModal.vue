<template>
    <div class="modal fade" id="iconModal" tabindex="-1" aria-labelledby="iconModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Iconos Disponibles:</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-wrap justify-content-center">
                                <button
                                    type="button"
                                    v-for="icon in icons"
                                    :key="icon"
                                    class="btn btn-outline-primary m-2"
                                    :class="{ active: icon === currentIcon }"
                                    @click="handleSelect(icon)"
                                    data-bs-dismiss="modal"
                                >
                                    <Icon :name="icon" />
                                    
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Icon from '../../Icon.vue';
import { ref, watch, onMounted } from 'vue';
import feather from 'feather-icons';

const emit = defineEmits(['icon-selected']);

const icons = ref(Object.keys(feather.icons));

const props = defineProps({
    selectedIcon: {
        type: String,
        default: '',
    },
});

const currentIcon = ref(props.selectedIcon);

watch(() => props.selectedIcon, (newVal) => {
    currentIcon.value = newVal;
});

import Modal from 'bootstrap/js/dist/modal';

const handleSelect = (iconName) => {
    document.activeElement?.blur();

    selectIcon(iconName);

    const modalEl = document.getElementById('iconModal');
    const modal = Modal.getInstance(modalEl);
    if (modal) {
        modal.hide();
    }
};
onMounted(() => {
  const modalEl = document.getElementById('iconModal');
  modalEl.addEventListener('hide.bs.modal', () => {
    document.activeElement?.blur();
  });
});



const selectIcon = (iconName) => {
    currentIcon.value = iconName;
    emit('icon-selected', iconName);
};
</script>
