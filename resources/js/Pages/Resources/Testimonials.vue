<template>
    <app-layout>
        <div class="mb-5 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="flex justify-between mb-8">
                <h3 class="text-3xl leading-8 font-semibold text-gray-900 self-center">
                    Testimonials
                </h3>
                <jet-button class="self-center" @click.native="creating = true">
                    Create
                </jet-button>
            </div>
            <ab-table>
                <template #thead>
                    <ab-th>Provider / Sub-Provider (Year)</ab-th>
                    <ab-th>content</ab-th>
                    <ab-th></ab-th>
                </template>
                <template #tbody>
                    <tr v-for="(testimonial, i) in testimonials" :key="i">
                        <ab-td class="whitespace-no-wrap">
                            <ab-edit-button @click.native="showUpdate(testimonial)">
                                {{testimonial.provider}} / {{testimonial.subprovider}} ({{testimonial.year}})
                            </ab-edit-button>
                        </ab-td>
                        <ab-td>
                            <ab-edit-button class="text-left text-gray-500 hover:text-gray-900" @click.native="showUpdate(testimonial)">
                                {{testimonial.content}}
                            </ab-edit-button>
                        </ab-td>
                        <ab-td class="text-right">
                            <ab-delete-button @click.native="confirmDeletion(testimonial)" />
                        </ab-td>
                    </tr>
                </template>
            </ab-table>
        </div>

        <!-- Create Modal -->
        <jet-dialog-modal :show="creating" @close="creating = false">
            <template #title>Create Testimonial</template>

            <template #content>
                <div class="mb-4">
                    <jet-label for="content" value="Content" />
                    <textarea id="content" name="content" class="mt-1 block w-full form-input rounded-md shadow-sm text-gray-500" rows="10" v-model="createForm.content" autofocus></textarea>
                    <jet-input-error :message="createForm.error('content')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <jet-label for="provider" value="Provider" />
                    <jet-input id="provider" type="text" class="mt-1 block w-full" v-model="createForm.provider" />
                    <jet-input-error :message="createForm.error('provider')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <jet-label for="subprovider" value="Sub-Provider" />
                    <jet-input id="subprovider" type="text" class="mt-1 block w-full" v-model="createForm.subprovider" />
                    <jet-input-error :message="createForm.error('subprovider')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <jet-label for="year" value="Year" />
                    <jet-input id="year" type="text" class="mt-1 block w-full" v-model="createForm.year" />
                    <jet-input-error :message="createForm.error('year')" class="mt-2" />
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click.native="creating = false">
                    Nevermind
                </jet-secondary-button>

                <jet-button class="ml-2" @click.native="createTestimonial" :class="{ 'opacity-25': createForm.processing }" :disabled="createForm.processing">
                    Save
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Update Modal -->
        <jet-dialog-modal :show="updating" @close="updating = false">
            <template #title>Update Testimonial</template>

            <template #content>
                <div class="mb-4">
                    <jet-label for="content" value="Content" />
                    <textarea id="content" name="content" class="mt-1 block w-full form-input rounded-md shadow-sm text-gray-500" rows="10" v-model="updateForm.content" autofocus></textarea>
                    <jet-input-error :message="updateForm.error('content')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <jet-label for="provider" value="Provider" />
                    <jet-input id="provider" type="text" class="mt-1 block w-full" v-model="updateForm.provider" />
                    <jet-input-error :message="updateForm.error('provider')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <jet-label for="subprovider" value="Sub-Provider" />
                    <jet-input id="subprovider" type="text" class="mt-1 block w-full" v-model="updateForm.subprovider" />
                    <jet-input-error :message="updateForm.error('subprovider')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <jet-label for="year" value="Year" />
                    <jet-input id="year" type="text" class="mt-1 block w-full" v-model="updateForm.year" />
                    <jet-input-error :message="updateForm.error('year')" class="mt-2" />
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click.native="updating = false">
                    Nevermind
                </jet-secondary-button>

                <jet-button class="ml-2" @click.native="updateTestimonial" :class="{ 'opacity-25': updateForm.processing }" :disabled="updateForm.processing">
                    Update
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Delete Confirmation Modal -->
        <jet-confirmation-modal :show="deleting" @close="deleting = null">
            <template #title>Delete Testimonial</template>

            <template #content>
                Are you sure you would like to delete this Testimonial?
            </template>

            <template #footer>
                <jet-secondary-button @click.native="deleting = null">
                    Nevermind
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click.native="deleteTestimonial" :class="{ 'opacity-25': deleteForm.processing }" :disabled="deleteForm.processing">
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
    import AbEditButton from './../../Ab/EditButton'
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
            AbEditButton,
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

        props: ['testimonials'],

        data() {
            return {
                creating: false,
                updating: false,
                deleting: null,

                createForm: this.$inertia.form({
                    content: '',
                    provider: '',
                    subprovider: '',
                    year: '',
                }, {
                    bag: 'createTestimonial',
                    resetOnSuccess: true,
                }),

                updateForm: this.$inertia.form({
                    id: null,
                    content: null,
                    provider: null,
                    subprovider: null,
                    year: null,
                }, {
                    bag: 'updateTestimonial',
                    resetOnSuccess: false,
                }),

                deleteForm: this.$inertia.form(),
            }
        },

        methods: {
            createTestimonial() {
                this.createForm.post(route('testimonials.store'))
                .then(() => this.creating = this.createForm.hasErrors())
            },

            showUpdate(testimonial) {
                if (this.$page.errorBags['updateTestimonial'] !== undefined) {
                    delete this.$page.errorBags['updateTestimonial']['content']
                    delete this.$page.errorBags['updateTestimonial']['year']
                }
                this.updateForm.id = testimonial.id
                this.updateForm.content = testimonial.content
                this.updateForm.provider = testimonial.provider
                this.updateForm.subprovider = testimonial.subprovider
                this.updateForm.year = testimonial.year
                this.updating = true
            },

            updateTestimonial() {
                this.updateForm.put(route('testimonials.update', this.updateForm.id), {
                    preserveState: true,
                })
                .then(() => this.updating = this.updateForm.hasErrors())
            },

            confirmDeletion(testimonial) {
                this.deleting = testimonial
            },

            deleteTestimonial() {
                this.deleteForm.delete(route('testimonials.destroy', this.deleting), {
                    preserveState: true,
                })
                .then(() => this.deleting = null)
            },
        },
    }
</script>
