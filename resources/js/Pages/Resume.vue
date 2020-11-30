<template>
    <guest-layout>
        <div class="bg-gray-100">
            <div class="py-4 md:py-8 lg:py-16">
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h3 class="max-w-3xl text-2xl leading-8 font-semibold font-display text-gray-900 sm:text-3xl sm:leading-9 lg:max-w-4xl lg:text-4xl lg:leading-10 mx-auto">
                        Andrew Beatrice
                    </h3>
                    <p class="mt-1 text-sm">
                        661-236-7509 | abeatrice.mail@gmail.com
                    </p>
                    <p class="mt-1 text-sm text-gray-500">
                        Full Stack Developer | Laravel | Javascript | Vue.js | MySql
                    </p>
                    <div class="my-4 max-w-3xl mx-auto border-t border-gray-300 text-left">
                        <div class="mt-4 text-xl leading-6 font-bold uppercase tracking-wide">
                            EXPERIENCE
                        </div>
                        <div v-for="(experience, i) in experiences" :key="i">
                            <p class="mt-4 text-lg font-semibold tracking-wide" v-if="i == 0 || (i > 0 && experiences[i].company !== experiences[i-1].company)">{{experience.company}}</p>
                            <div class="mt-1 flex justify-between italic">
                                <span>{{experience.title}}</span>
                                <span>{{formatDate(experience.started_on)}} - {{formatDate(experience.ended_on)}}</span>
                            </div>
                            <ul class="mt-1 ml-8 text-gray-500 list-disc text-sm md:text-base tracking-tight">
                                <li v-for="(bullet_point, j) in experience.bullet_points" :key="j">{{bullet_point.content}}</li>
                            </ul>
                        </div>
                        <div class="mt-4 text-xl leading-6 font-bold uppercase tracking-wide">
                            EDUCATION
                        </div>
                        <div v-for="(value, i) in education" :key="i">
                            <p class="mt-4 text-lg font-semibold tracking-wide" v-if="i == 0 || (i > 0 && education[i].provider !== education[i-1].provider)">{{value.provider}}</p>
                            <div class="mt-1 flex justify-between italic">
                                <span>{{value.degree}}</span>
                                <span>{{formatDate(value.started_on)}} - {{formatDate(value.ended_on)}}</span>
                            </div>
                            <ul class="mt-1 ml-8 text-gray-500 list-disc text-sm md:text-base tracking-tight">
                                <li v-for="(bullet_point, j) in value.bullet_points" :key="j">{{bullet_point.content}}</li>
                            </ul>
                        </div>
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
        props: ['experiences','education'],
        methods: {
            formatDate(date) {
                if(!date) {
                    return 'Current'
                }
                return moment(date).format('MMM YYYY');
            }
        },
    }
</script>
