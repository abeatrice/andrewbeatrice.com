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
                        <ab-td>
                            <ab-edit-button @click.native="showUpdate(experience)">
                                {{experience.company}}
                            </ab-edit-button>
                        </ab-td>
                        <ab-td>
                            <ab-edit-button @click.native="showUpdate(experience)">
                                {{experience.title}}
                            </ab-edit-button>
                        </ab-td>
                        <ab-td>
                            <ab-edit-button @click.native="showUpdate(experience)">
                                {{experience.started_on}}
                            </ab-edit-button>
                        </ab-td>
                        <ab-td>
                            <ab-edit-button @click.native="showUpdate(experience)">
                                {{experience.ended_on}}
                            </ab-edit-button>
                        </ab-td>
                        <ab-td class="text-right">
                            <ab-delete-button @click.native="confirmDeletion(experience)" />
                        </ab-td>
                    </tr>
                </template>
            </ab-table>
        </div>

        <!-- Create Modal -->
        <jet-dialog-modal :show="creating" @close="creating = false">
            <template #title>Create Experience</template>

            <template #content>
                <div class="mb-4">
                    <jet-label for="company" value="Company" />
                    <jet-input id="company" type="text" class="mt-1 block w-full" v-model="createForm.company" />
                    <jet-input-error :message="createForm.error('company')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <jet-label for="title" value="Title" />
                    <jet-input id="title" type="text" class="mt-1 block w-full" v-model="createForm.title" />
                    <jet-input-error :message="createForm.error('title')" class="mt-2" />
                </div>
                <div class="flex mb-4">
                    <div class="flex-1">
                        <div class="flex mb-1">
                            <jet-label class="flex-1 self-center" for="started_on" value="Started On" />
                            <ab-delete-button class="flex-1 self-center text-right pr-5" @click.native="createForm.started_on = null">Clear</ab-delete-button>
                        </div>
                        <datepicker input-class="form-input rounded-md shadow-sm mt-1 block w-full" :inline="true"  v-model="createForm.started_on" />
                        <jet-input-error :message="createForm.error('started_on')" class="mt-2" />
                    </div>
                    <div class="flex-1">
                        <div class="flex mb-1">
                            <jet-label class="flex-1 self-center" for="ended_on" value="Ended On" />
                            <ab-delete-button class="flex-1 self-center text-right pr-5" @click.native="createForm.ended_on = null">Clear</ab-delete-button>
                        </div>
                        <datepicker input-class="form-input rounded-md shadow-sm mt-1 block w-full" :inline="true" v-model="createForm.ended_on" />
                        <jet-input-error :message="createForm.error('ended_on')" class="mt-2" />
                    </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click.native="creating = false">
                    Nevermind
                </jet-secondary-button>

                <jet-button class="ml-2" @click.native="createExperience" :class="{ 'opacity-25': createForm.processing }" :disabled="createForm.processing">
                    Save
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Update Modal -->
        <jet-dialog-modal :show="updating" @close="updating = false">
            <template #title>Update Experience</template>

            <template #content>
                <div class="overflow-auto">
                    <div class="mb-4">
                        <jet-label for="company" value="Company" />
                        <jet-input id="company" type="text" class="mt-1 block w-full" v-model="updateForm.company" />
                        <jet-input-error :message="updateForm.error('company')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <jet-label for="title" value="Title" />
                        <jet-input id="title" type="text" class="mt-1 block w-full" v-model="updateForm.title" />
                        <jet-input-error :message="updateForm.error('title')" class="mt-2" />
                    </div>
                    <div class="flex mb-4">
                        <div class="flex-1">
                            <div class="flex mb-1">
                                <jet-label class="flex-1 self-center" for="started_on" value="Started On" />
                                <ab-delete-button class="flex-1 self-center text-right pr-5" @click.native="updateForm.started_on = null">Clear</ab-delete-button>
                            </div>
                            <datepicker input-class="mt-1" :inline="true" v-model="updateForm.started_on" />
                            <jet-input-error :message="updateForm.error('started_on')" class="mt-2" />
                        </div>
                        <div class="flex-1">
                            <div class="flex mb-1">
                                <jet-label class="flex-1 self-center" for="ended_on" value="Ended On" />
                                <ab-delete-button class="flex-1 self-center text-right pr-5" @click.native="updateForm.ended_on = null">Clear</ab-delete-button>
                            </div>
                            <datepicker input-class="mt-1" :inline="true" v-model="updateForm.ended_on" />
                            <jet-input-error :message="updateForm.error('ended_on')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mb-4">
                        <jet-label value="Bullet Points" />
                    </div>
                    <div v-for="(bullet_point, i) in updateForm.bullet_points" :key="i" class="mb-4">
                        <textarea class="block w-full form-input rounded-md shadow-sm text-gray-500" rows="3" v-model="updateForm.bullet_points[i].content" />
                    </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click.native="updating = false">
                    Nevermind
                </jet-secondary-button>

                <jet-button class="ml-2" @click.native="updateExperience" :class="{ 'opacity-25': updateForm.processing }" :disabled="updateForm.processing">
                    Update
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Delete Confirmation Modal -->
        <jet-confirmation-modal :show="deleting" @close="deleting = null">
            <template #title>Delete Experience</template>

            <template #content>
                Are you sure you would like to delete this?
            </template>

            <template #footer>
                <jet-secondary-button @click.native="deleting = null">
                    Nevermind
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click.native="deleteExperience" :class="{ 'opacity-25': deleteExperienceForm.processing }" :disabled="deleteExperienceForm.processing">
                    Delete
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import Datepicker from 'vuejs-datepicker';
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

        props: ['experiences'],

        data() {
            return {
                creating: false,
                updating: false,
                deleting: null,

                createForm: this.$inertia.form({
                    company: '',
                    title: '',
                    started_on: null,
                    ended_on: null,
                }, {
                    bag: 'createBag',
                    resetOnSuccess: true,
                }),

                updateForm: this.$inertia.form({
                    id: null,
                    company: '',
                    title: '',
                    started_on: null,
                    ended_on: null,
                    bullet_points: [],
                }, {
                    bag: 'updateBag',
                    resetOnSuccess: false,
                }),

                deleteExperienceForm: this.$inertia.form(),
            }
        },

        methods: {
            createExperience() {
                this.createForm.post(route('experiences.store'))
                .then(() => this.creating = this.createForm.hasErrors())
            },

            showUpdate(experience) {
                this.updateForm.id = experience.id
                this.updateForm.company = experience.company
                this.updateForm.title = experience.title
                this.updateForm.started_on = new Date(experience.started_on + 'T00:00:00')
                this.updateForm.ended_on = experience.ended_on ? new Date(experience.ended_on + 'T00:00:00') : null
                this.updateForm.bullet_points = experience.bullet_points
                this.updating = true
            },

            updateExperience() {
                this.updateForm.put(route('experiences.update', this.updateForm.id))
                .then(() => this.updating = this.updateForm.hasErrors())
            },

            confirmDeletion(experience) {
                this.deleting = experience
            },

            deleteExperience() {
                this.deleteExperienceForm.delete(route('experiences.destroy', this.deleting))
                .then(() => this.deleting = null)
            }
        },
    }
</script>
