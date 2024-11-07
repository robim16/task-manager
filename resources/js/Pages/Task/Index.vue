<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({ tasks: Array })
</script>

<template>

    <Head title="Listado de tareas" />
    <AuthenticatedLayout>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Init date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Finish date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="task in tasks" :key="task.id">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ task.name.substring(0, 15) }}
                        </th>
                        <td class="px-6 py-4">
                           {{ task.description.substring(0, 15) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ task.init_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ task.finish_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ task.status }}
                        </td>
                        <td class="px-6 py-4">
                            {{ task.user.name }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </AuthenticatedLayout>
</template>