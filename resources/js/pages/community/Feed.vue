<template>
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <Sidebar :sidebarOpen="sidebarOpen" @close-sidebar="sidebarOpen = false"/>

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- Site header -->
            <Header :sidebarOpen="sidebarOpen" @toggle-sidebar="sidebarOpen = !sidebarOpen"/>

            <main class="theme_background">
                <div class="px-4 sm:px-6 lg:px-8 py-8 md:py-0 w-full max-w-9xl mx-auto">

                    <div class="xl:flex">

                        <!-- Left + Middle content -->
                        <div class="md:flex flex-1">

                            <!-- Left content -->
                            <FeedLeftContent/>

                            <!-- Middle content -->
                            <router-view :key="$route.fullPath"></router-view>
                        </div>

                        <!-- Right content -->
                        <!--                        <FeedRightContent/>-->

                    </div>

                </div>
            </main>

        </div>

    </div>
</template>

<script>
    import {ref} from 'vue'
    import Sidebar from '../../partials/Sidebar.vue'
    import Header from '../../partials/Header.vue'
    import FeedLeftContent from '../../partials/community/FeedLeftContent.vue'
    import {useStore} from 'vuex'
    import {notification} from "ant-design-vue";


    export default {
        name: 'Feed',
        components: {
            Sidebar,
            Header,
            FeedLeftContent,
        },
        methods: {

        }

    }
</script>

<style>
    .theme_background {
        background-color: #F1F5F9 !important;
    }
</style>
