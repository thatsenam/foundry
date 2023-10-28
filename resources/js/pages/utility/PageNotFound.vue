<template>
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <Sidebar :sidebarOpen="sidebarOpen" @close-sidebar="sidebarOpen = false"/>

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden bg-white">

            <!-- Site header -->
            <Header :sidebarOpen="sidebarOpen" @toggle-sidebar="sidebarOpen = !sidebarOpen"/>

            <main>
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

                    <div class="max-w-2xl m-auto mt-16">

                        <div class="text-center px-4">
                            <div class="inline-flex mb-8">
                                <img src="../../images/404-illustration.svg" width="176" height="176"
                                     alt="404 illustration"/>
                            </div>
                            <div class="mb-6">Hmm...this page doesn’t exist. Try searching for something else!</div>
                            <span @click.stop="back"
                                  class="btn bg-indigo-500 hover:bg-indigo-600 text-white cursor-pointer hover:text-white"> &lt;- Back To Previous Page
                            </span>
                        </div>

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
    import router from "../../router";


    export default {
        name: 'PageNotFound',
        components: {
            Sidebar,
            Header,
        },
        setup() {

            const sidebarOpen = ref(false);

            function back() {
                router.back()
            }

            return {
                sidebarOpen,
                back
            }
        },
    }
</script>
