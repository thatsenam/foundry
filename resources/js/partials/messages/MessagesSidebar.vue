<template>
    <div
        id="messages-sidebar"
        class="absolute z-20 top-0 bottom-0 w-full md:w-auto md:static md:top-auto md:bottom-auto -mr-px md:translate-x-0 transform transition-transform duration-200 ease-in-out"
        :class="msgSidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <div
            class="sticky top-16 bg-white overflow-x-hidden overflow-y-auto no-scrollbar shrink-0 border-r border-slate-200 md:w-72 xl:w-80 h-[calc(100vh-64px)]">

            <!-- #Marketing group -->
            <div>
                <!-- Group header -->
                <div class="sticky top-0 z-10">
                    <div class="flex items-center bg-white border-b border-slate-200 px-5 h-16">
                        <div class="w-full flex items-center justify-between">
                            <!-- Channel menu -->

                            <router-link  v-if="community" :to="{ name: 'CommunityPost',params:{id:community.slug}}">
                                <h2 class="text-xl font-bold">{{ community.name }}</h2>

                            </router-link>
                            <!-- Edit button -->
                            <button v-if="community"
                                class="p-1.5 shrink-0 rounded border border-slate-200 hover:border-slate-300 shadow-sm ml-2">
                                <span class="mr-0.5 md:mr-0 md:mb-0.5" v-if="user && community.user_id == user.id">
                                    <router-link :to="{name:'community-settings',params:{id:community.id}}"
                                                 class="flex items-center px-2.5 py-2 rounded whitespace-nowrap hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-settings shrink-0 fill-current text-slate-100 mr-1"
                                             width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                             stroke="#000000" fill="none" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path
                                                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                        <span
                                            class="text-sm font-medium text-slate-600 hover:text-indigo-500"></span>
                                    </router-link>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Group body -->
                <div class="px-5 py-4">
                    <Channels :channels="channels" :msgSidebarOpen="msgSidebarOpen"
                              @close-msgsidebar="$emit('close-msgsidebar')"/>

                    <!-- Search form -->
                    <!-- Direct messages -->
                    <DirectMessages :msgSidebarOpen="msgSidebarOpen" @close-msgsidebar="$emit('close-msgsidebar')"/>
                    <!-- Channels -->
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import ChannelMenu from './ChannelMenu.vue'
    import DirectMessages from './DirectMessages.vue'
    import Channels from './Channels.vue'

    export default {
        name: 'MessagesSidebar',
        props: ['msgSidebarOpen'],
        components: {
            ChannelMenu,
            DirectMessages,
            Channels
        },
        data() {
            return {
                channels: [],


            }
        },
        computed: {
            user() {
                return this.$store.state.auth.user;
            },
            community() {
                return this.$store.state.community.active_community;
            },
            authenticated() {
                return this.$store.state.auth.authenticated;
            },
        },
        mounted() {
            this.$store.dispatch('post/loadChannels', this.community.id)
                .then((response) => {
                    this.channels = response.data;
                })

        },
        watch: {
            community(community) {
                if (community) {
                    this.$store.dispatch('post/loadChannels', community.id)
                        .then((response) => {
                            this.channels = response.data;
                        })

                }
            }
        }

    }
</script>
