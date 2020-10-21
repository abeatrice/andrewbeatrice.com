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
                        <div class="mt-2 tracking-tight">
                            <span class="text-lg font-semibold tracking-wide">Consumer Attorney Marketing Group</span> 
                            <div class="mt-1 flex justify-between italic">
                                <span>Programmer</span>
                                <span>Feb 2020 - Current</span>
                            </div>
                            <ul class="mt-1 ml-8 text-gray-500 list-disc text-sm md:text-base">
                                <li>Created QA environments with docker and bash scripts to facilitate quality assurance testing.</li>
                                <li>Added role based access control to primary web application letting management have granular control over read, write, and update access to specific resources.</li>
                                <li>Modernized legacy application with the addition of PSR-4 autoloading and a variety of packagist libraries to expedite development.</li>
                                <li>Created and facilitated developer training on subjects: Git, Docker, Laravel packages, Redis, and more.</li>
                            </ul>
                        </div>
                        <div class="mt-4 tracking-tight">
                            <span class="text-lg font-semibold tracking-wide">Lamps Plus</span> 
                            <div class="mt-1 flex justify-between italic">
                                <span>Programmer Analyst II</span>
                                <span>Aug 2019 - Feb 2020</span>
                            </div>
                            <ul class="mt-1 ml-8 text-gray-500 list-disc text-sm md:text-base">
                                <li>Developed a web app for store personnel to order expense items from the company's warehouse using laravel, bootstrap, and jQuery.</li>
                            </ul>
                            <div class="mt-1 flex justify-between italic">
                                <span>Programmer Analyst I</span>
                                <span>Feb 2018 - Aug 2019</span>
                            </div>
                            <ul class="mt-1 ml-8 text-gray-500 list-disc text-sm md:text-base">
                                <li>Developed a web app with laravel, Vue.js and sql that provides order metrics in charts and tables. The application monitors orders through each stage of order processing and has effectively identified issues with orders and alerted the appropriate departments.</li>
                                <li>Developed web app in php and jQuery for store personnel to disposition all customer returns and decide if a return should be accepted.</li>
                            </ul>
                            <div class="mt-1 flex justify-between italic">
                                <span>Programmer</span>
                                <span>Feb 2017 - Feb 2018</span>
                            </div>
                            <ul class="mt-1 ml-8 text-gray-500 list-disc text-sm md:text-base">
                                <li>Developed php (Symfony) console application that creates a table driven queue service. The service provides developers a means to drop messages into a table and it will automatically be sent to amazon web service’s simple queue service or listen for messages on aws sqs and store them in local tables.</li>
                                <li>Developed Symfony application that acts as an adapter for translating json data from all point of sale transactions into xml that is used by sales audit software.</li>
                                <li>Developed batch process in ILE RPG that reviews all Lamps Plus products nightly and determines if it should be listed on online marketplaces such as walmart or ebay.</li>
                                <li>Developed php and bootstrap web app to provide buying department gross margin calculations on products listed on online marketplaces.</li>
                            </ul>
                            <div class="mt-1 flex justify-between italic">
                                <span>Junior Programmer</span>
                                <span>Aug 2016 - Feb 2017</span>
                            </div>
                            <ul class="mt-1 ml-8 text-gray-500 list-disc text-sm md:text-base">
                                <li>Developed a php and javascript web application for the buying department to create kit products from other existing products as components.</li>
                                <li>Debugged and modified ILE RPG programs to fix and add features to existing processes.</li>
                            </ul>
                        </div>
                        <div class="mt-4 tracking-tight">
                            <span class="text-lg font-semibold tracking-wide">Bank of America</span> 
                            <div class="mt-1 flex justify-between italic">
                                <span>Multiple Roles</span>
                                <span>May 2011 - Aug 2016</span>
                            </div>
                            <ul class="mt-1 ml-8 text-gray-500 list-disc text-sm md:text-base">
                                <li><span class="font-semibold">Team Manager:</span> Managed ~15 direct reports.</li>
                                <li><span class="font-semibold">Process Support:</span> Designed and facilitated training for ~90 associates.</li>
                                <li><span class="font-semibold">Media Researcher:</span> Provided media relations and executive management recommendation of action in response to media inquiries.</li>
                            </ul>
                        </div>
                        <div class="mt-4 text-xl leading-6 font-bold uppercase tracking-wide">
                            EDUCATION
                        </div>
                        <div class="mt-2 tracking-tight">
                            <span class="text-lg font-semibold tracking-wide">ITT Technical Institute</span> 
                            <div class="mt-1 flex justify-between italic">
                                <span>Bachelors of Science</span>
                                <span>Sep 2005 - Nov 2009</span>
                            </div>
                            <ul class="mt-1 ml-8 text-gray-500 list-disc text-sm md:text-base">
                                <li>Developed a game engine in C++ with user input, graphics rendering, and collision detection/correction.</li>
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
    }
</script>
