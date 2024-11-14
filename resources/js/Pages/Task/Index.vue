<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({ tasks: Object, count: Number })
</script>

<template>

    <Head title="Listado de tareas" />
    <AuthenticatedLayout>
        
        <div class="relative overflow-x-auto">
            <h1>Tasks <small class="text-text-slate-500">({{ count + ' found' }})</small></h1>
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
                        <th>
                            Last activity completed
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="task in tasks.data" :key="task.id">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ task.name.substring(0, 14) }}
                        </th>
                        <td class="px-6 py-4">
                           {{ task.description.substring(0, 14) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ task.init_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ task.finish_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ task.status.substring(0, 15) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ task.user.name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ task.last_activities_completed?.name.substring(0, 18) }}
                            <span class="text-slate-500">({{ task.last_activities_completed?.created_at }})</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <nav class="relative flex justify-center">
        <template v-for="link in tasks.links" :key="link.label">
            <Link
                preserve-scroll
                :href="link.url ?? ''"
                v-html="link.label"
                class="flex items-center justify-center px-3 py-2 text-sm rounded-lg text-gray-600"
                :class="{ 'bg-gray-200': link.active, '!text-gray-300': !link.url }"
            />
        </template>
    </nav>

    </AuthenticatedLayout>
</template>