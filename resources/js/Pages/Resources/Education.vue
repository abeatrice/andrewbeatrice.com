<template>
    <app-layout>
        <div class="mb-5 px-8 align-middle inline-block min-w-full">
            <div class="flex justify-between mb-8">
                <h3 class="text-3xl leading-8 font-semibold text-gray-900 self-center">
                    Education
                </h3>
                <jet-button class="self-center" @click.native="creating = true">
                    Create
                </jet-button>
            </div>

            <ab-table>
                <template #thead>
                    <ab-th>Provider</ab-th>
                    <ab-th>Degree</ab-th>
                    <ab-th>Started</ab-th>
                    <ab-th>Ended</ab-th>
                    <ab-th></ab-th>
                </template>
                <template #tbody>
                    <tr v-for="(education, i) in education" :key="i">
                        <ab-td>
                            <ab-edit-button @click.native="showUpdate(education)">
                                {{education.provider}}
                            </ab-edit-button>
                        </ab-td>
                        <ab-td>
                            <ab-edit-button @click.native="showUpdate(education)">
                                {{education.degree}}
                            </ab-edit-button>
                        </ab-td>
                        <ab-td>
                            <ab-edit-button @click.native="showUpdate(education)">
                                {{education.started_on}}
                            </ab-edit-button>
                        </ab-td>
                        <ab-td>
                            <ab-edit-button @click.native="showUpdate(education)">
                                {{education.ended_on}}
                            </ab-edit-button>
                        </ab-td>
                        <ab-td class="text-right">
                            <ab-delete-button @click.native="confirmDeletion(education)" />
                        </ab-td>
                    </tr>
                </template>
            </ab-table>
        </div>

        <!-- Create Modal -->
        <jet-dialog-modal :show="creating" maxWidth="3xl" @close="creating = false">
            <template #title>Create Education</template>

            <template #content>
                <div class="max-h-192 px-4 overflow-auto">
                    <div class="mb-4">
                        <jet-label for="provider" value="Provider" />
                        <jet-input id="provider" type="text" class="mt-1 block w-full" v-model="createForm.provider" />
                        <jet-input-error :message="createForm.error('provider')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <jet-label for="degree" value="Degree" />
                        <jet-input id="degree" type="text" class="mt-1 block w-full" v-model="createForm.degree" />
                        <jet-input-error :message="createForm.error('degree')" class="mt-2" />
                    </div>
                    <div class="flex justify-between mb-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <jet-label class="flex-1 self-center" for="started_on" value="Started On" />
                                <ab-delete-button class="self-center" title="Clear Started On" @click.native="createForm.started_on = null" />
                            </div>
                            <datepicker wrapper-class="flex justify-center" :inline="true" v-model="createForm.started_on" />
                            <jet-input-error :message="createForm.error('started_on')" class="mt-2" />
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <jet-label class="flex-1 self-center" for="ended_on" value="Ended On" />
                                <ab-delete-button class="self-center" title="Clear Ended On" @click.native="createForm.ended_on = null" />
                            </div>
                            <datepicker wrapper-class="flex justify-center" :inline="true" v-model="createForm.ended_on" />
                            <jet-input-error :message="createForm.error('ended_on')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex justify-between">
                            <jet-label class="flex-1" value="Bullet Points" />
                            <button class="text-green-600 hover:text-green-900 focus:outline-none" title="Add Bullet Point" @click="addBulletPoint(createForm.bullet_points)">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </button>
                        </div>
                    </div>
                    <div v-for="(bullet_point, i) in createForm.bullet_points" :key="i" class="mb-4">
                        <div class="flex">
                            <ab-delete-button @click.native="removeBulletPoint(createForm.bullet_points, i)">
                                <svg class="h-6 w-6 mr-3 self-center" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </ab-delete-button>
                            <textarea class="flex-1 self-center block w-full form-input rounded-md shadow-sm text-gray-500" rows="3" v-model="createForm.bullet_points[i].content" />
                        </div>
                    </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click.native="creating = false">
                    Nevermind
                </jet-secondary-button>

                <jet-button class="ml-2" @click.native="createEducation" :class="{ 'opacity-25': createForm.processing }" :disabled="createForm.processing">
                    Save
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Update Modal -->
        <jet-dialog-modal :show="updating" maxWidth="3xl" @close="updating = false">
            <template #title>Update Education</template>

            <template #content>
                <div class="max-h-192 px-4 overflow-auto">
                    <div class="mb-4">
                        <jet-label for="provider" value="Provider" />
                        <jet-input id="provider" type="text" class="mt-1 block w-full" v-model="updateForm.provider" />
                        <jet-input-error :message="updateForm.error('provider')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <jet-label for="degree" value="Degree" />
                        <jet-input id="degree" type="text" class="mt-1 block w-full" v-model="updateForm.degree" />
                        <jet-input-error :message="updateForm.error('degree')" class="mt-2" />
                    </div>
                    <div class="flex justify-between mb-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <jet-label class="flex-1 self-center" for="started_on" value="Started On" />
                                <ab-delete-button class="self-center" title="Clear Started On" @click.native="updateForm.started_on = null" />
                            </div>
                            <datepicker wrapper-class="flex justify-center" :inline="true" v-model="updateForm.started_on" />
                            <jet-input-error :message="updateForm.error('started_on')" class="mt-2" />
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <jet-label class="flex-1 self-center" for="ended_on" value="Ended On" />
                                <ab-delete-button class="self-center" title="Clear Ended On" @click.native="updateForm.ended_on = null" />
                            </div>
                            <datepicker wrapper-class="flex justify-center" :inline="true" v-model="updateForm.ended_on" />
                            <jet-input-error :message="updateForm.error('ended_on')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex justify-between">
                            <jet-label class="flex-1" value="Bullet Points" />
                            <button class="text-green-600 hover:text-green-900 focus:outline-none" title="Add Bullet Point" @click="addBulletPoint(updateForm.bullet_points)">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </button>
                        </div>
                    </div>
                    <div v-for="(bullet_point, i) in updateForm.bullet_points" :key="i" class="mb-4">
                        <div class="flex">
                            <ab-delete-button @click.native="removeBulletPoint(updateForm.bullet_points, i)">
                                <svg class="h-6 w-6 mr-3 self-center" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </ab-delete-button>
                            <textarea class="block w-full form-input rounded-md shadow-sm text-gray-500" rows="3" v-model="updateForm.bullet_points[i].content" />
                        </div>
                    </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click.native="updating = false">
                    Nevermind
                </jet-secondary-button>

                <jet-button class="ml-2" @click.native="updateEducation" :class="{ 'opacity-25': updateForm.processing }" :disabled="updateForm.processing">
                    Update
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Delete Confirmation Modal -->
        <jet-confirmation-modal :show="deleting" @close="deleting = null">
            <template #title>Delete Education</template>

            <template #content>
                Are you sure you would like to delete this?
            </template>

            <template #footer>
                <jet-secondary-button @click.native="deleting = null">
                    Nevermind
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click.native="deleteEducation" :class="{ 'opacity-25': deleteEducationForm.processing }" :disabled="deleteEducationForm.processing">
                    Delete
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import Datepicker from 'vuejs-datepicker'
    import AbTable from './../../Ab/Table'
    import AbTh from './../../Ab/Th'
    import AbTd from './../../Ab/Td'
    import AbDeleteButton from './../../Ab/DeleteButton'
    import AbEditButton from './../../Ab/EditButton'
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
            Datepicker,
            AbTable,
            AbTh,
            AbTd,
            AbDeleteButton,
            AbEditButton,
            JetLabel,
            JetInput,
            JetInputError,
            JetDialogModal,
            JetConfirmationModal,
            JetButton,
            JetSecondaryButton,
            JetDangerButton,
        },

        props: ['education'],

        data() {
            return {
                creating: false,
                updating: false,
                deleting: null,

                createForm: this.$inertia.form({
                    provider: '',
                    degree: '',
                    started_on: null,
                    ended_on: null,
                    bullet_points: [
                        {
                            content: '',
                        },
                    ],
                }, {
                    bag: 'createBag',
                    resetOnSuccess: true,
                }),

                updateForm: this.$inertia.form({
                    id: null,
                    provider: '',
                    degree: '',
                    started_on: null,
                    ended_on: null,
                    bullet_points: [],
                }, {
                    bag: 'updateBag',
                    resetOnSuccess: false,
                }),

                deleteEducationForm: this.$inertia.form(),
            }
        },

        methods: {
            addBulletPoint(bullet_points) {
                bullet_points.push({content: ''})
            },

            removeBulletPoint(bullet_points, i) {
                bullet_points.splice(i, 1)
            },

            createEducation() {
                this.createForm.started_on = this.createForm.started_on ? new Date(this.createForm.started_on).toDateString() : null
                this.createForm.ended_on = this.createForm.ended_on ? new Date(this.createForm.ended_on).toDateString() : null
                this.createForm.post(route('education.store'))
                .then(() => this.creating = this.createForm.hasErrors())
            },

            showUpdate(education) {
                this.updateForm.id = education.id
                this.updateForm.provider = education.provider
                this.updateForm.degree = education.degree
                this.updateForm.started_on = new Date(education.started_on + 'T00:00:00').toDateString()
                this.updateForm.ended_on = education.ended_on ? new Date(education.ended_on + 'T00:00:00').toDateString() : null
                this.updateForm.bullet_points = (Object.keys(education.bullet_points).length > 0) ? education.bullet_points : [{content: ''}]
                this.updating = true
            },

            updateEducation() {
                this.updateForm.put(route('education.update', this.updateForm.id))
                .then(() => this.updating = this.updateForm.hasErrors())
            },

            confirmDeletion(education) {
                this.deleting = education
            },

            deleteEducation() {
                this.deleteEducationForm.delete(route('education.destroy', this.deleting))
                .then(() => this.deleting = null)
            }
        },
    }
</script>
