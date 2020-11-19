<template>
    <app-layout>
        <div class="mb-5 px-8 align-middle inline-block min-w-full">
            <div class="flex justify-between mb-8">
                <h3 class="text-3xl leading-8 font-semibold text-gray-900 self-center">
                    Experiences
                </h3>
                <jet-button class="self-center" @click.native="creating = true">
                    Create
                </jet-button>
            </div>

            <ab-table>
                <template #thead>
                    <ab-th>Company</ab-th>
                    <ab-th>Title</ab-th>
                    <ab-th>Started</ab-th>
                    <ab-th>Ended</ab-th>
                    <ab-th></ab-th>
                </template>
                <template #tbody>
                    <tr v-for="(experience, i) in experiences" :key="i">
                        <ab-td>{{experience.company}}</ab-td>
                        <ab-td>{{experience.title}}</ab-td>
                        <ab-td>{{experience.started_on}}</ab-td>
                        <ab-td>{{experience.ended_on}}</ab-td>
                        <ab-td class="text-right">
                            <ab-delete-button @click="confirmDeletion(testimonial)" />
                        </ab-td>
                    </tr>
                </template>
            </ab-table>
        </div>

        <!-- Create Modal -->
        <jet-dialog-modal :show="creating" @close="creating = false">
            <template #title>Create Experience</template>

            <template #content>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="content" value="Content" />
                        <textarea id="content" name="content" class="mt-1 block w-full form-input rounded-md shadow-sm text-gray-500" rows="10" v-model="createTestimonialForm.content" autofocus></textarea>
                        <jet-input-error :message="createTestimonialForm.error('content')" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="provider" value="Provider" />
                        <jet-input id="provider" type="text" class="mt-1 block w-full" v-model="createTestimonialForm.provider" />
                        <jet-input-error :message="createTestimonialForm.error('provider')" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="subprovider" value="Sub-Provider" />
                        <jet-input id="subprovider" type="text" class="mt-1 block w-full" v-model="createTestimonialForm.subprovider" />
                        <jet-input-error :message="createTestimonialForm.error('subprovider')" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="year" value="Year" />
                        <jet-input id="year" type="text" class="mt-1 block w-full" v-model="createTestimonialForm.year" />
                        <jet-input-error :message="createTestimonialForm.error('year')" class="mt-2" />
                    </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click.native="creating = false">
                    Nevermind
                </jet-secondary-button>

                <jet-button class="ml-2" @click.native="createTestimonial" :class="{ 'opacity-25': createTestimonialForm.processing }" :disabled="createTestimonialForm.processing">
                    Save
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Update Modal -->
        <jet-dialog-modal :show="updatingTestimonial" @close="updatingTestimonial = false">
            <template #title>
                Update Testimonial
            </template>

            <template #content>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="content" value="Content" />
                        <textarea id="content" name="content" class="mt-1 block w-full form-input rounded-md shadow-sm text-gray-500" rows="10" v-model="updateTestimonialForm.content" autofocus></textarea>
                        <jet-input-error :message="updateTestimonialForm.error('content')" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="provider" value="Provider" />
                        <jet-input id="provider" type="text" class="mt-1 block w-full" v-model="updateTestimonialForm.provider" />
                        <jet-input-error :message="updateTestimonialForm.error('provider')" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="subprovider" value="Sub-Provider" />
                        <jet-input id="subprovider" type="text" class="mt-1 block w-full" v-model="updateTestimonialForm.subprovider" />
                        <jet-input-error :message="updateTestimonialForm.error('subprovider')" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="year" value="Year" />
                        <jet-input id="year" type="text" class="mt-1 block w-full" v-model="updateTestimonialForm.year" />
                        <jet-input-error :message="updateTestimonialForm.error('year')" class="mt-2" />
                    </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click.native="updatingTestimonial = false">
                    Nevermind
                </jet-secondary-button>

                <jet-button class="ml-2" @click.native="updateTestimonial" :class="{ 'opacity-25': updateTestimonialForm.processing }" :disabled="updateTestimonialForm.processing">
                    Update
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Delete Confirmation Modal -->
        <jet-confirmation-modal :show="testimonialBeingDeleted" @close="testimonialBeingDeleted = null">
            <template #title>
                Delete Testimonial
            </template>

            <template #content>
                Are you sure you would like to delete this Testimonial?
            </template>

            <template #footer>
                <jet-secondary-button @click.native="testimonialBeingDeleted = null">
                    Nevermind
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click.native="deleteTestimonial" :class="{ 'opacity-25': deleteTestimonialForm.processing }" :disabled="deleteTestimonialForm.processing">
                    Delete
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import AbTable from './../../Ab/Table'
    import AbTh from './../../Ab/Th'
    import AbTd from './../../Ab/Td'
    import AbDeleteButton from './../../Ab/DeleteButton'
    import JetFormSection from './../../Jetstream/FormSection'
    import JetLabel from './../../Jetstream/Label'
    import JetInput from './../../Jetstream/Input'
    import JetInputError from './../../Jetstream/InputError'
    import JetDialogModal from './../../Jetstream/DialogModal'
    import JetConfirmationModal from './../../Jetstream/ConfirmationModal'
    import JetButton from './../../Jetstream/Button'
    import JetSecondaryButton from './../../Jetstream/SecondaryButton'
    import JetDangerButton from './../../Jetstream/DangerButton'

    export default {
        components: {
            AppLayout,
            AbTable,
            AbTh,
            AbTd,
            AbDeleteButton,
            JetFormSection,
            JetLabel,
            JetInput,
            JetInputError,
            JetDialogModal,
            JetConfirmationModal,
            JetButton,
            JetSecondaryButton,
            JetDangerButton,
        },

        props: ['experiences'],

        data() {
            return {
                creating: false,
                updatingTestimonial: false,
                testimonialBeingDeleted: null,

                createTestimonialForm: this.$inertia.form({
                    content: '',
                    provider: '',
                    subprovider: '',
                    year: '',
                }, {
                    bag: 'createTestimonial',
                    resetOnSuccess: true,
                }),

                updateTestimonialForm: this.$inertia.form({
                    id: null,
                    content: null,
                    provider: null,
                    subprovider: null,
                    year: null,
                }, {
                    bag: 'updateTestimonial',
                    resetOnSuccess: false,
                }),

                deleteTestimonialForm: this.$inertia.form(),
            }
        },

        methods: {
            createTestimonial() {
                this.createTestimonialForm.post(route('testimonials.store'), {
                    preserveScroll: true,
                }).then(response => {
                    this.creating = this.createTestimonialForm.hasErrors()
                })
            },

            updateTestimonial() {
                this.updateTestimonialForm.put(route('testimonials.update', this.updateTestimonialForm.id), {
                    preserveScroll: true,
                    preserveState: true,
                }).then(response => {
                    this.updatingTestimonial = this.updateTestimonialForm.hasErrors()
                })
            },

            confirmDeletion(testimonial) {
                this.testimonialBeingDeleted = testimonial
            },

            showUpdateTestimonial(testimonial) {
                if (this.$page.errorBags['updateTestimonial'] !== undefined) {
                    delete this.$page.errorBags['updateTestimonial']['content']
                    delete this.$page.errorBags['updateTestimonial']['year']
                }
                this.updateTestimonialForm.id = testimonial.id
                this.updateTestimonialForm.content = testimonial.content
                this.updateTestimonialForm.provider = testimonial.provider
                this.updateTestimonialForm.subprovider = testimonial.subprovider
                this.updateTestimonialForm.year = testimonial.year
                this.updatingTestimonial = true
            },

            deleteTestimonial() {
                this.deleteTestimonialForm.delete(route('testimonials.destroy', this.testimonialBeingDeleted), {
                    preserveScroll: true,
                    preserveState: true,
                }).then(() => {
                    this.testimonialBeingDeleted = null
                })
            },

            fromNow(timestamp) {
                return moment(timestamp).local().fromNow()
            },
        },
    }
</script>
