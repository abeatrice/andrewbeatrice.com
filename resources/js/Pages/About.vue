<template>
    <guest-layout>
        <div class="bg-white py-10 sm:py-12 lg:py-16">
            <div class="py-12 bg-white">
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center">
                    <h3 class="mt-2 max-w-3xl text-2xl leading-8 font-semibold font-display text-gray-900 sm:text-3xl sm:leading-9 lg:max-w-4xl lg:text-4xl lg:leading-10 lg:mx-auto lg:text-center">
                        I'm Andrew,
                    </h3>
                    <p class="text-base leading-6 font-semibold text-teal-500 uppercase tracking-wide lg:text-center">
                        an enterprise software developer.
                    </p>
                    </div>
                    <div class="mt-10">
                        <ul class="md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                            <li>
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg leading-6 font-medium text-gray-900">Business Focused</h4>
                                        <p class="mt-2 text-base leading-6 text-gray-500">
                                            I have years of experience working with business partners and project stakeholders. I can talk business with the clients without technical lingo.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-10 md:mt-0">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg leading-6 font-medium text-gray-900">Delightful Front End</h4>
                                        <p class="mt-2 text-base leading-6 text-gray-500">
                                            It's my goal to make applications that are a pleasure to use. The face of my applications represents their internal workings.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-10 md:mt-0">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg leading-6 font-medium text-gray-900">Clean Back End</h4>
                                        <p class="mt-2 text-base leading-6 text-gray-500">
                                            I pride myself on having clean and maintainable source code. It's nice to come back to a tidy codebase when a change is needed months after initial development.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-10 md:mt-0">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg leading-6 font-medium text-gray-900">Server Ready</h4>
                                        <p class="mt-2 text-base leading-6 text-gray-500">
                                            I can get hands on with the servers. I have provisioned and maintained production servers and docker development environments.
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </guest-layout>
</template>

<script>
    import GuestLayout from './../Layouts/GuestLayout'

    export default {
        components: {
            GuestLayout,
        },
    }
</script>
