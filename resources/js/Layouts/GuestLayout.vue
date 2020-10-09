<template>
    <div class="flex flex-col h-screen justify-between">
        <nav class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <inertia-link :href="route('about')">
                                <jet-application-mark class="block h-9 w-auto" />
                            </inertia-link>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <jet-nav-link :href="route('about')" :active="$page.currentRouteName == 'about'">
                                About
                            </jet-nav-link>
                            <jet-nav-link :href="route('projects')" :active="$page.currentRouteName == 'projects'">
                                Projects
                            </jet-nav-link>
                            <jet-nav-link :href="route('resume')" :active="$page.currentRouteName == 'resume'">
                                Resume
                            </jet-nav-link>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <jet-responsive-nav-link :href="route('about')" :active="$page.currentRouteName == 'about'">
                        About
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link :href="route('projects')" :active="$page.currentRouteName == 'projects'">
                        Projects
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link :href="route('resume')" :active="$page.currentRouteName == 'resume'">
                        Resume
                    </jet-responsive-nav-link>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="mb-auto">
            <slot></slot>
        </main>

        <!-- Footer -->
        <div class="h-64 bg-gray-900 text-gray-300">
            <div class="flex flex-col">
                <div>
                    Contact Information
                </div>
                <div>
                    Here are some ways to get into contact with me. Let me know if you'd like to talk about your next project.
                </div>
                <div>
                    This site was built with Vue.js, Laravel, and Tailwind css.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationMark from './../Jetstream/ApplicationMark'
    import JetNavLink from './../Jetstream/NavLink'
    import JetResponsiveNavLink from './../Jetstream/ResponsiveNavLink'

    export default {
        components: {
            JetApplicationMark,
            JetNavLink,
            JetResponsiveNavLink,
        },
        data() {
            return {
                showingNavigationDropdown: false,
            }
        }
    }
</script>
