<template>
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <Sidebar :sidebarOpen="sidebarOpen" @close-sidebar="sidebarOpen = false"/>

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden bg-white">

            <!-- Site header -->
            <Header :sidebarOpen="sidebarOpen" @toggle-sidebar="sidebarOpen = !sidebarOpen"/>

            <main>

                <!-- Search area -->
                <div
                    class="relative flex flex-col bg-slate-100 items-center justify-center px-4 sm:px-6 lg:px-8 py-8 lg:py-12  overflow-hidden">
                    <!-- Glow -->
                    <div class="absolute pointer-events-none" aria-hidden="true">
                        <svg width="512" height="512" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <radialGradient cx="50%" cy="50%" fx="50%" fy="50%" r="50%" id="ill-a">
                                    <stop stop-color="#FFF" offset="0%"/>
                                    <stop stop-color="#FFF" stop-opacity="0" offset="100%"/>
                                </radialGradient>
                            </defs>
                            <circle style="mix-blend-mode:overlay" cx="588" cy="650" r="256"
                                    transform="translate(-332 -394)" fill="url(#ill-a)" fill-rule="evenodd"
                                    opacity=".48"/>
                        </svg>
                    </div>
                    <!-- Illustration -->
                    <div class="absolute pointer-events-none" aria-hidden="true">
                        <svg width="1280" height="361" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="ill2-b">
                                    <stop stop-color="#A5B4FC" offset="0%"/>
                                    <stop stop-color="#818CF8" offset="100%"/>
                                </linearGradient>
                                <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="ill2-c">
                                    <stop stop-color="#4338CA" offset="0%"/>
                                    <stop stop-color="#6366F1" stop-opacity="0" offset="100%"/>
                                </linearGradient>
                                <path id="ill2-a" d="m64 0 64 128-64-20-64 20z"/>
                                <path id="ill2-e" d="m40 0 40 80-40-12.5L0 80z"/>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <g transform="rotate(51 -92.764 293.763)">
                                    <mask id="ill2-d" fill="#fff">
                                        <use xlink:href="#ill2-a"/>
                                    </mask>
                                    <use fill="url(#ill2-b)" xlink:href="#ill2-a"/>
                                    <path fill="url(#ill2-c)" mask="url(#ill2-d)" d="M64-24h80v152H64z"/>
                                </g>
                                <g transform="rotate(-51 618.151 -940.113)">
                                    <mask id="ill2-f" fill="#fff">
                                        <use xlink:href="#ill2-e"/>
                                    </mask>
                                    <use fill="url(#ill2-b)" xlink:href="#ill2-e"/>
                                    <path fill="url(#ill2-c)" mask="url(#ill2-f)" d="M40.333-15.147h50v95h-50z"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="relative w-full max-w-2xl mx-auto text-center">
                        <div class="mb-5">
                            <h1 class="text-2xl md:text-3xl text-slate-500 font-bold">👋 Find Your Community ...</h1>
                        </div>
                        <form class="relative">
                            <label for="action-search" class="sr-only">Search</label>
                            <input v-model="query" @input.stop="onSearchInput" id="action-search"
                                   class="form-input pl-9 py-3 focus:border-slate-300 w-full"
                                   type="search"/>
                            <button class="absolute inset-0 right-auto group" type="button" aria-label="Search">
                                <svg
                                    class="w-4 h-4 shrink-0 fill-current text-slate-400 group-hover:text-slate-500 ml-3 mr-2"
                                    viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"/>
                                    <path
                                        d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

                    <!-- Sections -->
                    <div class="space-y-8">

                        <!-- Popular Topics -->
                        <div>
                            <div class="mb-5">
                                <h2 class="text-xl text-slate-800 font-bold">Browse Community </h2>

                            </div>
                            <!-- Grid -->
                            <div
                                class="grid
                                        sm:grid-cols-2
                                        xl:grid-cols-3
                                        2xl:grid-cols-4
                                        gap-6">

                                <!-- Item -->

                                <div class="bg-slate-100 rounded-lg  p-5  hover:bg-slate-200 hover:scale-105"
                                     v-for="community in community_list" :key="community">
                                    <div class="flex  flex-row items-center gap-4 ">
                                        <img class="rounded-lg flex-2" :src="community.avatar_url" :alt="community.id"
                                             style="height: 5rem; width:5rem;"/>


                                        <div class="basis-1/2 flex flex-col justify-center ml-2 w-full">
                                            <h3 class="text-lg font-semibold text-slate-800 mb-1">
                                                {{ community.name }}
                                            </h3>
                                            <span class="text-sm">{{ community.description }} &nbsp; </span>
                                            <div class="flex items-center justify-end mt-2">

                                                <button v-if="!community.join_community"
                                                        class="btn-xs bg-white border-indigo-400 hover:border-slate-600 text-indigo-500 mr-2"
                                                        @click.stop="joinCommunity(community.id)"> Join -&gt;

                                                </button>
                                                <!--                                                <router-link :to="{name:'dashboard',params:{id:community.id}}"-->
                                                <!--                                                             >-->
                                                <!--                                                    Join -&gt;-->
                                                <!--                                                </router-link>-->
                                                <div v-else>

                                                    <button
                                                        class="btn-xs btn border-slate-200 hover:border-slate-300 text-rose-500 hover:text-white hover:bg-rose-600"
                                                        @click.stop="leaveCommunity(community.id)"> Leave -&gt;

                                                    </button>


                                                    <router-link v-if="community.style == 'facebook'"
                                                                 :to="{name:'CommunityPost',params:{id:community.slug}}"
                                                                 class="btn-xs bg-white border-indigo-400 hover:border-slate-600 text-indigo-500">
                                                        Launch -&gt;
                                                    </router-link>
                                                    <router-link v-else-if="community.style == 'reddit'"
                                                                 :to="{name:'ForumPostContainer',params:{id:community.slug}}"
                                                                 class="btn-xs bg-white border-indigo-400 hover:border-slate-600 text-indigo-500">
                                                        Launch -&gt;
                                                    </router-link>
                                                    <router-link v-else
                                                                 :to="{name:'ForumPostContainer',params:{id:community.slug}}"
                                                                 class="btn-xs bg-white border-indigo-400 hover:border-slate-600 text-indigo-500">
                                                        Launch -&gt;
                                                    </router-link>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>


                    </div>

                </div>
            </main>

        </div>

    </div>
</template>

<script>
    import {ref} from 'vue'
    import Sidebar from '../partials/Sidebar.vue'
    import Header from '../partials/Header.vue'
    import {notification} from "ant-design-vue";
    import {reactive, computed} from 'vue'

    export default {
        name: 'KnowledgeBase',
        components: {
            Sidebar,
            Header,

        },
        data() {
            return {
                community_list: [],
                query: '',
            }
        },
        setup() {

            const sidebarOpen = ref(false)


            return {
                sidebarOpen,

            }
        },


        methods: {
            onSearchInput() {
                console.log(this.query, this.$store.state.community.browse_communities_list)
                if (this.query)
                    console.log('bal')
                // this.community_list = this.$store.state.community.browse_communities_list.filter(c => c.name.toLowerCase().includes(this.query.toLocaleLowerCase()))
                else
                    this.community_list = this.$store.state.community.browse_communities_list;

            },
            joinCommunity(community_id) {
                if (this.$store.state.auth.authenticated) {
                    this.$store.dispatch('community/joinCommunity', community_id).then(({data}) => {
                        notification['success']({
                            message: 'Join Success!!',
                            description: "You have successfully join new community."
                        });

                        this.community_list = this.community_list.map(p =>
                            p.id === community_id ? {...p, join_community: true} : p
                        );

                    });
                } else {
                    this.$store.state.auth.Login_modal = true;
                }

            },

            leaveCommunity(community_id) {
                if (confirm('Are You Sure')) {
                    this.$store.dispatch('community/leaveCommunity', community_id).then(({data}) => {
                        notification['success']({
                            message: 'leave community!!',
                            description: "You have leave community."
                        });

                        this.community_list = this.community_list.map(p =>
                            p.id === community_id ? {...p, join_community: false} : p
                        );
                    });
                }
            },

        },

        mounted() {

            this.$store.commit('community/BROWSE_COMMUNITIES_LIST', [])

            axios.get('/api/browse_communities').then(({data}) => {
                this.community_list = data;
                this.$store.commit('community/BROWSE_COMMUNITIES_LIST', data)
            })

            this.$store.dispatch('community/loadCommunities')
            // setTimeout(() => {
            //     this.$store.state.auth.is_embed = true
            // }, 1000)
        }

    }
</script>
