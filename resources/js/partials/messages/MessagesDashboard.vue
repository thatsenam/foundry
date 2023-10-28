<template>
    <div class="h-screen flex w-full items-center justify-center mb-16" style="padding-bottom: 150px">
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <h2 class="text-2xl text-slate-800 font-bold mb-2 border-b border-slate-400 pb-2 flex items-center">

                <svg xmlns="http://www.w3.org/2000/svg" class="" width="68" height="68" viewBox="0 0 24 24" stroke-width="0.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <line x1="5" y1="12" x2="9" y2="16" />
                    <line x1="5" y1="12" x2="9" y2="8" />
                </svg>
                <span>Please select a contact to start a
                        conversation</span>
            </h2>
            <div class="flex items-center gap-4">
                <div class="insightfull">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bulb" width="68" height="68" viewBox="0 0 24 24" stroke-width="0.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M3 12h1m8 -9v1m8 8h1m-15.4 -6.4l.7 .7m12.1 -.7l-.7 .7" />
                        <path d="M9 16a5 5 0 1 1 6 0a3.5 3.5 0 0 0 -1 3a2 2 0 0 1 -4 0a3.5 3.5 0 0 0 -1 -3" />
                        <line x1="9.7" y1="17" x2="14.3" y2="17" />
                    </svg>
                </div>
                <div class="">

                    <div class="mb-6 ml-4" style="margin-left: 20px">
                        <li>Have you done anything exciting lately?</li>
                        <li>What made you smile today?</li>
                        <li>How did you meet the host?</li>
                        <li>What's your favorite form of social media?</li>
                        <li>What was the last good book you read?</li>
                        <li>Do you listen to any podcasts?</li>
                    </div>
                </div>
            </div>


        </div>

    </div>
</template>

<script>


    export default {
        name: 'ChatDashboard',

        data() {
            return {}
        },
        methods: {},
        computed: {},
        created() {


        },
    }
</script>
