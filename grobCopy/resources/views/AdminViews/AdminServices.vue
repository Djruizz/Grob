<template>
    <div>
        <h2>Administrar Servicios</h2>
        <button class="btn btn-primary mb-3" @click="showCreate = true">Agregar Servicio</button>

        <MessageAlert :alert="alert" />

        <!-- Formulario Crear -->
        <div v-if="showCreate" class="card p-3 mb-3">
            <input v-model="newService.title" placeholder="Nombre del servicio" class="form-control mb-2" />
            <textarea v-model="newService.text" placeholder="Descripción" class="form-control mb-2"></textarea>
            <button
                class="btn btn-primary mb-2 d-flex align-items-center justify-content-center"
                data-bs-toggle="modal"
                data-bs-target="#iconModal"
            >
                <span class="me-2">Icono:</span>
                <Icon :name="newService.icon" />
            </button>

            <button class="btn btn-success" @click="createService">Guardar</button>
            <button class="btn btn-secondary mt-2" @click="showCreate = false">Cancelar</button>
        </div>

        <!-- Lista -->
        <EntityTable
            :items="services"
            :columns="[
                { label: 'Título', key: 'title' },
                { label: 'Descripción', key: 'text', type: 'textarea' },
                { label: 'Icono', key: 'icon' },
                { label: 'Boton', key: 'btn'}
            ]"
            :editingId="editingId"
            :editItem="editService"
            :showIcon="true"
            @edit="startEdit"
            @delete="deleteService"
            @save="updateService"
            @cancel="cancelEdit"
        >
            <template #cell-icon="{ item, isEditing, editItem }">
                <div class="text-center">
                    <button
                        class="btn btn-sm btn-primary"
                        :class="{ disabled: !isEditing }"
                        data-bs-toggle="modal"
                        data-bs-target="#iconModal"
                    >
                        <Icon :name="isEditing ? editItem.icon : item.icon" />
                    </button>
                </div>
            </template>
            <template #cell-btn="{item, isEditing, editItem }">
                <div class="text-center">
                    <button class="btn btn-sm btn-primary" :class="{disabled:!isEditing}"">
                        {{editItem}}
                        {{ item }}
                    </button>
                </div>
            </template>
        </EntityTable>
    </div>
    <IconModal :selectedIcon="editService.icon" @icon-selected="updateIcon" />
</template>

<script setup>
    import Icon from '../../js/components/Icon.vue';
    import IconModal from '../../js/components/AdminComponents/AdminServicesComponents/IconModal.vue';
    import MessageAlert from '../../js/components/AdminComponents/AdminServicesComponents/MessageAlert.vue';
    import EntityTable from '../../js/components/AdminComponents/SharedComponents/EntityTable.vue';

    import { ref, onMounted } from 'vue';

    const services = ref([]);
    const showCreate = ref(false);
    const newService = ref({ title: '', text: '', icon: 'alert-triangle' });
    const editingId = ref(null);
    const editService = ref({ title: '', text: '', icon: '' });

    const alert = ref({ show: false, message: '' });

    const fetchServices = async () => {
        const res = await fetch('/api/services');
        services.value = await res.json();
    };

    const createService = async () => {
        if (newService.value === null || newService.value.title === '' || newService.value.text === '') {
            alert.value = { show: true, message: 'Por favor completa todos los campos antes de crear.' };
            return;
        }
        const res = await fetch('/api/services', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(newService.value),
        });
        if (res.ok) {
            newService.value = { title: '', text: '', icon: '' };
            showCreate.value = false;
            alert.value = { show: false, message: '' };
            fetchServices();
        }
    };

    const deleteService = async (id) => {
        if (!confirm('¿Seguro que quieres eliminar este servicio?')) return;
        await fetch(`/api/services/${id}`, { method: 'DELETE' });
        fetchServices();
    };

    const startEdit = (service) => {
        editingId.value = service.id;
        editService.value = { title: service.title, text: service.text, icon: service.icon };
    };

    const cancelEdit = () => {
        editingId.value = null;
    };

    const updateService = async (id) => {
        if (
            editService.value === null ||
            editService.value.title === '' ||
            editService.value.text === '' ||
            editService.value.icon === ''
        ) {
            alert.value = { show: true, message: 'Por favor completa todos los campos antes de guardar.' };
            return;
        }
        if (
            editService.value.text === services.value.find((s) => s.id === id).text &&
            editService.value.title === services.value.find((s) => s.id === id).title &&
            editService.value.icon === services.value.find((s) => s.id === id).icon
        ) {
            alert.value = { show: true, message: 'No se han realizado cambios.' };
            return;
        }
        await fetch(`/api/services/${id}`, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(editService.value),
        });
        editingId.value = null;
        alert.value = { show: false, message: '' };
        fetchServices();
    };

    function updateIcon(icon) {
        if (showCreate.value) {
            newService.value.icon = icon;
            return;
        } else {
            editService.value.icon = icon;
        }
    }

    onMounted(fetchServices);
</script>
