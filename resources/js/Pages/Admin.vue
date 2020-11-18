<template>
    <app-layout>
        <inertia-link :href="route('testimonials.index')" class="text-gray-500">
            Testimonials
        </inertia-link>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'
    import Welcome from './../Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
    }
</script>
