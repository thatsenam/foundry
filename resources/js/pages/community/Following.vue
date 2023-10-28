<template>
    <div class="w-full">
        <div class="p-6">
            <h2 class="text-2xl text-slate-800 font-bold mb-6">Following</h2>

            <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                <div v-if="following.length==0" class="text-center">
                    <span class="h3 font-bold ">You did not followed anyone yet.</span>
                </div>
                <div class="grid grid-cols-12 gap-6 ">

                    <div v-for="(item,index) in following" :key="index"
                         class="col-span-full 2xl:grid-cols-3 sm:col-span-6 xl:col-span-4  bg-white shadow-lg rounded-sm border border-slate-200">
                        <div class="flex flex-col h-full">
                            <!-- Card top -->
                            <div class="grow p-5">
                                <!-- Menu button -->
                                <div class="relative">

                                </div>
                                <!-- Image + name -->
                                <header>
                                    <div class="flex justify-center mb-2">
                                        <div class="relative inline-flex items-start" :to="item.link">
                                            <div class="absolute top-0 right-0 -mr-2 bg-white rounded-full shadow"
                                                 aria-hidden="true">
                                                <svg class="w-8 h-8 fill-current text-amber-500" viewBox="0 0 32 32">
                                                    <path
                                                        d="M21 14.077a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 010 1.5 1.5 1.5 0 00-1.5 1.5.75.75 0 01-.75.75zM14 24.077a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z"/>
                                                </svg>
                                            </div>
                                            <img class="rounded-full" :src="item.avatar_url" width="64" height="64"
                                                 :alt="item.name"/>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="inline-flex text-slate-800 hover:text-slate-900" :to="item.link">
                                            <h2 class="text-xl leading-snug justify-center font-semibold">
                                                {{item.name}}</h2>
                                        </div>
                                    </div>

                                </header>
                                <!-- Bio -->
                                <div class="text-center mt-2">
                                    <div class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Pariatur, quibusdam.
                                    </div>
                                </div>
                            </div>
                            <!-- Card footer -->
                            <div class="border-t border-slate-200">

                                <div
                                    v-if="!item.following"
                                    @click="follow(item,index)"
                                    class="block text-center text-sm text-indigo-500 hover:text-indigo-900 font-medium px-3 py-4 cursor-pointer"
                                    to="/messages">
                                    <div class="flex items-center justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4 fill-current shrink-0 mr-2" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <circle cx="9" cy="7" r="4"/>
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                                            <path d="M16 11h6m-3 -3v6"/>
                                        </svg>
                                        <span>Follow</span>
                                    </div>
                                </div>
                                <div v-else
                                     @click="unfollow(item,index)"
                                     class="block text-center text-sm text-rose-500 hover:text-rose-900 font-medium px-3 py-4 cursor-pointer"
                                >
                                    <div

                                        class="flex items-center justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4 fill-current shrink-0 mr-2" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <circle cx="9" cy="7" r="4"/>
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                                            <path d="M16 11h6m-3 -3v6"/>
                                        </svg>
                                        <span>Unfollow</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>
</template>

<script>

    import Sidebar from '../../partials/Sidebar.vue'
    import Header from '../../partials/Header.vue'
    import FeedLeftContent from "../../partials/community/FeedLeftContent";
    import Notification from "../../components/Notification";
    import PaginationNumeric from "../../components/PaginationNumeric";

    import {notification} from "ant-design-vue";

    export default {
        name: 'Following',

        components: {
            PaginationNumeric,
            Notification,
            FeedLeftContent,
            Sidebar,
            Header,
        },

        data() {
            return {
                notificationWarningOpen: true,
            }
        },
        methods: {
            follow(member, index) {

                if (this.authenticated) {
                    member.following = true
                    this.following[index] = member
                    this.$store.dispatch('member/follow', {
                        followed_by: this.user.id,
                        followed_to: member.id
                    }).then(({data}) => {

                        notification['success']({
                            message: 'Started Following..'
                        });

                    });
                }

            },
            unfollow(member, index) {
                if (this.authenticated) {
                    member.following = false
                    this.following[index] = member
                    this.$store.dispatch('member/unfollow', {
                        followed_by: this.user.id,
                        followed_to: member.id
                    }).then(({data}) => {

                        notification['warn']({
                            message: 'Unfollowed '
                        });

                    });
                }

            }
        },
        computed: {
            following() {
                return this.$store.state.member.following.filter(item => {
                    item.following = true
                    return item
                });
            },
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
            this.$store.dispatch('member/get_following', this.user.id)
        }
    }
</script>

