<template>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th v-for="col in columns" :key="col.key">{{ col.label }}</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in items" :key="item.id">
                <!-- Columnas -->
                <td v-for="col in columns" :key="col.key" class="align-middle">
                    <slot
                        :name="`cell-${col.key}`"
                        :item="item"
                        :isEditing="editingId === item.id"
                        :editItem="editItem"
                    >
                        <template v-if="editingId !== item.id">
                            {{ item[col.key] }}
                        </template>
                        <template v-else>
                            <input v-model="editItem[col.key]" class="form-control" v-if="col.type !== 'textarea'" />
                            <textarea v-model="editItem[col.key]" class="form-control" v-else></textarea>
                        </template>
                    </slot>
                </td>

                <!-- Acciones -->
                <td class="text-center align-middle">
                    <template v-if="editingId !== item.id">
                        <button class="btn btn-secondary btn-sm mx-1" @click="$emit('edit', item)">
                            <Icon name="edit" />
                        </button>
                        <button class="btn btn-danger btn-sm mx-1 mt-2" @click="$emit('delete', item.id)">
                            <Icon name="trash-2" />
                        </button>
                    </template>
                    <template v-else>
                        <button class="btn btn-success btn-sm mx-1" @click="$emit('save', item.id)">
                            <Icon name="save" />
                        </button>
                        <button class="btn btn-secondary btn-sm mx-1 mt-2" @click="$emit('cancel')">
                            <Icon name="x" />
                        </button>
                    </template>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script setup>
    import Icon from '../../Icon.vue';
    defineProps({
        items: Array,
        columns: Array, // [{ label: 'Título', key: 'title' }, { label: 'Texto', key: 'text' }]
        editingId: Number,
        editItem: Object,
    });

    defineEmits(['edit', 'delete', 'save', 'cancel']);
</script>
