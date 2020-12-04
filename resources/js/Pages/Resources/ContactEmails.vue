<template>
    <app-layout>
        <div class="mb-5 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="flex justify-between mb-8">
                <h3 class="text-3xl leading-8 font-semibold text-gray-900 self-center">
                    Contact Emails
                </h3>
            </div>
            <ab-table>
                <template #thead>
                    <ab-th>Name</ab-th>
                    <ab-th>Email</ab-th>
                    <ab-th>Message</ab-th>
                    <ab-th>When</ab-th>
                </template>
                <template #tbody>
                    <tr v-for="(email, i) in emails.data" :key="i">
                        <ab-td class="whitespace-no-wrap">{{email.name}}</ab-td>
                        <ab-td class="whitespace-no-wrap">{{email.email}}</ab-td>
                        <ab-td class="text-left text-gray-500">{{email.message}}</ab-td>
                        <ab-td class="whitespace-no-wrap">{{fromNow(email.created_at)}}</ab-td>
                    </tr>
                </template>
            </ab-table>
            <pagination :links="emails.links" />
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import AbTable from './../../Ab/Table'
    import AbTh from './../../Ab/Th'
    import AbTd from './../../Ab/Td'
    import Pagination from './../../Ab/Pagination'

    export default {
        components: {
            AppLayout,
            AbTable,
            AbTh,
            AbTd,
            Pagination,
        },

        props: ['emails'],

        data() {
            return {
            }
        },

        methods: {
            fromNow(date) {
                return moment(date).fromNow()
            }
        },
    }
</script>
