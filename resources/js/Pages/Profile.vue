<template>
    <app-layout>
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
                                <div class="col-span-3">
                                    <jet-label for="first_name" value="First Name" />
                                    <jet-input id="first_name" type="text" class="mt-1 block w-full" v-model="profileForm.first_name" />
                                    <jet-input-error :message="profileForm.error('first_name')" class="mt-2" />
                                </div>
                                <div class="col-span-3">
                                    <jet-label for="last_name" value="Last Name" />
                                    <jet-input id="last_name" type="text" class="mt-1 block w-full" v-model="profileForm.last_name" />
                                    <jet-input-error :message="profileForm.error('last_name')" class="mt-2" />
                                </div>
                                <div class="col-span-3">
                                    <jet-label for="email" value="Email Address" />
                                    <jet-input id="email" type="text" class="mt-1 block w-full" v-model="profileForm.email" />
                                    <jet-input-error :message="profileForm.error('email')" class="mt-2" />
                                </div>
                                <div class="col-span-3">
                                    <jet-label for="phone" value="Phone Number" />
                                    <jet-input id="phone" type="text" class="mt-1 block w-full" v-model="profileForm.phone" />
                                    <jet-input-error :message="profileForm.error('phone')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right px-6">
                            <jet-button class="self-center" @click.native="creating = true">
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
        data() {
            return {
                profileForm: this.$inertia.form({
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone: '',
                }, {
                    bag: 'profileBag',
                    resetOnSuccess: false,
                }),
            }
        },
    }
</script>
