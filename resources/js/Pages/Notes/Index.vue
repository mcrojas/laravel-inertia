<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modulo de Notas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg text-gray-900">Listado de Notas</h3>
                                <p class="text-sm text-gray-600">Toma el registro correcto y ejecuta cualquier función (Ver, editar o eliminar)</p>
                            </div>
                        </div>
                        <div class="md:col-span-2 mt-5 md:mt-0">
                            <div class="px-4 sm:px-0">
                                <div class="flex justify-between">
                                    <input type="text" class="form-input rounded-md shadow-sm" placeholder="Buscar..." v-model="q">
                                    <inertia-link :href="route('notes.create')" class="bg-blue-500 hover:bg-blue-700 rounded-md text-white font-bold py-2 px-4">
                                        Crear
                                    </inertia-link>
                                </div>
                                <hr class="my-6">
                                <table class="mt-4 rounded-md">
                                    <tr v-for="(note, i) in notes" :key="i">
                                        <td class="border px-4 py-2">
                                            {{ note.excerpt }}
                                        </td>
                                        <td class="px-4 py-2">
                                            <inertia-link :href="route('notes.show', note.id)">
                                                Ver
                                            </inertia-link>
                                            <inertia-link :href="route('notes.edit', note.id)">
                                                Editar
                                            </inertia-link>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
        },
        props: {
            notes: Array,
        },
        data() {
            return {
                q: ''
            }
        },
        watch: {
            q: function(value) {
                this.$inertia.replace(this.route('notes.index', {q: value}))
            }
        }
    }
</script>
