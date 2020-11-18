<template>
    <app-layout>
        <div class="max-w-xs shadow overflow-hidden border-b border-gray-200 rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 uppercase tracking-wider text-xs leading-4">
                        <th class="px-6 py-3 text-left font-medium">
                            Resources
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 leading-5 text-sm text-gray-500">
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <inertia-link :href="route('testimonials.index')">
                                Testimonials
                            </inertia-link>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <inertia-link :href="route('education.index')">
                                Education
                            </inertia-link>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <inertia-link :href="route('experiences.index')">
                                Experience
                            </inertia-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
    }
</script>
