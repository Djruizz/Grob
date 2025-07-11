<template>
    <div>
        <h2>Administrar Servicios</h2>
        <button class="btn btn-primary mb-3" @click="showCreate = true">Agregar Servicio</button>

        <!-- Formulario Crear -->
        <div v-if="showCreate" class="card p-3 mb-3">
        <input v-model="newService.title" placeholder="Nombre del servicio" class="form-control mb-2" />
        <textarea v-model="newService.text" placeholder="Descripción" class="form-control mb-2"></textarea>
        <button class="btn btn-success" @click="createService">Guardar</button>
        <button class="btn btn-secondary ms-2" @click="showCreate = false">Cancelar</button>
        </div>

        <!-- Lista -->
        <table class="table table-bordered overflow-auto">
        <thead>
            <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="service in services" :key="service.id">
            <td v-if="editingId !== service.id">{{ service.title }}</td>
            <td v-else><input v-model="editService.title" class="form-control" /></td>

            <td v-if="editingId !== service.id">{{ service.text }}</td>
            <td v-else><textarea v-model="editService.text" class="form-control"></textarea></td>

            <td class="text-center">
                <div v-if="editingId !== service.id" class="text-center">
                <button class="btn btn-secondary btn-sm mx-1" @click="startEdit(service)"><Icon name="edit"></Icon></button>
                <button class="btn btn-danger btn-sm mt-2 mx-1" @click="deleteService(service.id)"><Icon name="trash-2"></Icon></button>
                </div>
                <div v-else class="text-center">
                <button class="btn btn-success btn-sm mx-1" @click="updateService(service.id)"><Icon name="save"></Icon></button>
                <button class="btn btn-secondary btn-sm mx-1 mt-2" @click="cancelEdit"><Icon name="x"></Icon></button>
                </div>
            </td>
            </tr>
        </tbody>
        </table>
    </div>
</template>

<script setup>
import Icon from '../../js/components/Icon.vue'
import { ref, onMounted } from 'vue'

const services = ref([])
const showCreate = ref(false)
const newService = ref({ title: '', text: '' })
const editingId = ref(null)
const editService = ref({ title: '', text: '' })

const fetchServices = async () => {
  const res = await fetch('/api/services')
  services.value = await res.json()
}

const createService = async () => {
  const res = await fetch('/api/services', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(newService.value),
  })
  if (res.ok) {
    newService.value = { title: '', text: '' }
    showCreate.value = false
    fetchServices()
  }
}

const deleteService = async (id) => {
  if (!confirm('¿Seguro que quieres eliminar este servicio?')) return
  await fetch(`/api/services/${id}`, { method: 'DELETE' })
  fetchServices()
}

const startEdit = (service) => {
  editingId.value = service.id
  editService.value = { title: service.title, text: service.text }
}

const cancelEdit = () => {
  editingId.value = null
}

const updateService = async (id) => {
    if(editService.value === null || editService.value.title === '' || editService.value.text === '') {
        alert('Por favor completa todos los campos antes de guardar.')
        return
    }
    if(editService.value.text === services.value.find(s => s.id === id).text &&
       editService.value.title === services.value.find(s => s.id === id).title) {
        alert('No se han realizado cambios.')
        return
    }
    await fetch(`/api/services/${id}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(editService.value),
    })
    editingId.value = null
    fetchServices()
}

onMounted(fetchServices)
</script>
