<template>
    <app-layout>
        <transition leave-active-class="transition ease-in duration-500" leave-class="opacity-100" leave-to-class="opacity-0">
            <div v-show="updateForm.recentlySuccessful" class="absolute top-20 right-10 rounded bg-green-300 px-5 py-2 ">Profile Updated!</div>
        </transition>
        <div class="max-w-7xl mx-auto py-6 px-6">
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-1">
                    <div class="px-4">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Profile
                        </h3>
                        <p class="text-sm text-gray-600">
                            This information will be displayed publicly.
                        </p>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="shadow rounded-md overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <jet-label for="name" value="Name" />
                                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="updateForm.name" />
                                    <jet-input-error :message="updateForm.error('name')" class="mt-2" />
                                </div>
                                <div class="col-span-3">
                                    <jet-label for="email" value="Email Address" />
                                    <jet-input id="email" type="text" class="mt-1 block w-full" v-model="updateForm.email" />
                                    <jet-input-error :message="updateForm.error('email')" class="mt-2" />
                                </div>
                                <div class="col-span-3">
                                    <jet-label for="phone" value="Phone Number" />
                                    <jet-input id="phone" type="text" class="mt-1 block w-full" v-model="updateForm.phone" />
                                    <jet-input-error :message="updateForm.error('phone')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right px-6">
                            <jet-button class="self-center" @click.native="updateProfile()">
                                Save
                            </jet-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'
    import JetLabel from './../Jetstream/Label'
    import JetInput from './../Jetstream/Input'
    import JetInputError from './../Jetstream/InputError'
    import JetButton from './../Jetstream/Button'

    export default {
        components: {
            AppLayout,
            JetLabel,
            JetInput,
            JetInputError,
            JetButton,
        },
        props: ['user'],
        data() {
            return {
                updateForm: this.$inertia.form({
                    id: this.user.id,
                    name: this.user.name,
                    email: this.user.email,
                    phone: this.user.phone,
                }, {
                    bag: 'updateBag',
                    resetOnSuccess: false,
                }),
            }
        },
        methods: {
            updateProfile() {
                this.updateForm.put(route('profile.update', this.updateForm.id))
                .then(() => {})
            },
        },
    }
</script>
