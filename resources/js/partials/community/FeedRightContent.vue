<template>
    <div class="w-full hidden xl:block xl:w-72">
        <div class="lg:sticky lg:top-16 lg:h-[calc(100vh-64px)] lg:overflow-x-hidden lg:overflow-y-auto no-scrollbar">
            <div class="md:py-8">

                <!-- Search form -->
                <div class="mb-6">
                    <form class="relative">
                        <label for="feed-search-desktop" class="sr-only">Search</label>
                        <input id="feed-search-desktop" class="form-input w-full pl-9 focus:border-slate-300"
                               type="search" placeholder="Search…"/>
                        <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
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


                <!-- Blocks -->
                <div class="space-y-4">

                    <!-- Block 1 -->
                    <div class="bg-slate-50 p-4 rounded border border-slate-200">
                        <div class="text-xs font-semibold text-slate-400 uppercase mb-4">Top Communities</div>
                        <ul class="space-y-3">
                            <li v-for="community in TopCommunity" :key="community.id">
                                <div class="flex items-center justify-between">
                                    <div class="grow flex items-center">
                                        <div class="relative mr-3">
                                            <img class="w-8 h-8 rounded-full" :src="community.avatar_url" width="32"
                                                 height="32" alt="Group 01"/>
                                        </div>
                                        <div class="truncate">
                                            <span class="text-sm font-medium text-slate-800">{{ community.name }}</span>
                                        </div>
                                    </div>
                                    <button v-if="!community.join_community" class="text-xs inline-flex font-medium bg-indigo-100 text-indigo-600
                                     rounded-full text-center px-2.5 py-1" @click.stop="joinCommunity(community.id)">
                                        Join
                                    </button>
                                    <button v-else
                                            class="text-xs inline-flex font-medium bg-emerald-100 text-emerald-600 rounded-full text-center px-2.5 py-1">
                                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 16 16">
                                            <path
                                                d="m2.457 8.516.969-.99 2.516 2.481 5.324-5.304.985.989-6.309 6.284z"></path>
                                        </svg>
                                    </button>

                                </div>
                            </li>


                        </ul>
                    </div>

                    <div class="bg-slate-50 p-4 rounded border border-slate-200">
                        <div class="text-xs font-semibold text-slate-400 uppercase mb-4">Newest Members</div>
                        <ul class="space-y-3">
                            <li v-for="(member,index) in customers">
                                <div class="flex items-center justify-between">
                                    <div class="grow flex items-center">
                                        <div class="relative mr-3">
                                            <img class="w-8 h-8 rounded-full" :src="member.avatar_url"
                                                 width="32"
                                                 height="32" alt="User 02"/>
                                        </div>
                                        <div class="truncate">
                                                    <span
                                                        class="text-sm font-medium text-slate-800">{{
                                                            member.name
                                                        }}</span>
                                        </div>
                                    </div>
                                    <button
                                        v-if="!member.following"
                                        @click="follow(member,index)"
                                        class="text-xs inline-flex font-medium bg-indigo-100 text-indigo-600 rounded-full text-center px-2.5 py-1">
                                        Follow
                                    </button>
                                    <button
                                        v-else
                                        @click="unfollow(member,index)"
                                        class="text-xs inline-flex font-medium bg-indigo-100 text-indigo-600 rounded-full text-center px-2.5 py-1">
                                        Unfollow
                                    </button>
                                </div>
                            </li>


                            <li class="flex justify-center align-items-center mt-4" v-if="customers == 0">
                                <div>
                                    <img src="images/message.png" alt="channel">

                                </div>
                            </li>
                        </ul>
                        <div class="mt-4 flex justify-center w-full">

                                <InviteMemberModal text="Invite Member">
                                    <button class="btn bg-white hover:text-indigo-800 text-indigo-500 btn-full w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="20"
                                             height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <line x1="9" y1="12" x2="15" y2="12"></line>
                                            <line x1="12" y1="9" x2="12" y2="15"></line>
                                        </svg>
                                        <span class="ml-2">Invite Member</span>
                                    </button>
                                </InviteMemberModal>
                        </div>
                    </div>
                    <div class="bg-slate-50 p-4 rounded border border-slate-200  hidden">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <!-- Table header -->
                                <thead class="text-xs uppercase bg-indigo-100 text-black  bg-slate-50 rounded">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Avatar</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Name</div>
                                    </th>
                                </tr>
                                </thead>
                                <!-- Table body -->
                                <tbody class="text-sm font-medium divide-y divide-slate-100">
                                <!-- Row -->
                                <tr v-for="customer in customers">
                                    <td class="p-2 whitespace-nowrap ">
                                        <div class="flex items-center">
                                            <img :src="customer.avatar_url" v-if="customer.avatar_url" alt="avatar_url"
                                                 class="w-8 border-indigo-500 rounded-full">
                                        </div>
                                    </td>

                                    <td class="p-2 whitespace-nowrap">
                                        <div class="font-normal text-left">{{ customer.name }}</div>
                                    </td>
                                </tr>
                                <td colspan="3" class="ant-table-cell" v-if="customers.length ==0">
                                    <div class="ant-empty ant-empty-normal">
                                        <div class="ant-empty-image">
                                            <svg class="ant-empty-img-simple" width="64" height="41"
                                                 viewBox="0 0 64 41">
                                                <g transform="translate(0 1)" fill="none" fill-rule="evenodd">
                                                    <ellipse class="ant-empty-img-simple-ellipse" fill="#F5F5F5" cx="32"
                                                             cy="33" rx="32" ry="7"></ellipse>
                                                    <g class="ant-empty-img-simple-g" fill-rule="nonzero"
                                                       stroke="#D9D9D9">
                                                        <path
                                                            d="M55 12.76L44.854 1.258C44.367.474 43.656 0 42.907 0H21.093c-.749 0-1.46.474-1.947 1.257L9 12.761V22h46v-9.24z"></path>
                                                        <path
                                                            d="M41.613 15.931c0-1.605.994-2.93 2.227-2.931H55v18.137C55 33.26 53.68 35 52.05 35h-40.1C10.32 35 9 33.259 9 31.137V13h11.16c1.233 0 2.227 1.323 2.227 2.928v.022c0 1.605 1.005 2.901 2.237 2.901h14.752c1.232 0 2.237-1.308 2.237-2.913v-.007z"
                                                            fill="#FAFAFA" class="ant-empty-img-simple-path"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <p class="ant-empty-description">No Data</p><!----></div><!----></td>
                                <!-- Row -->

                                </tbody>
                            </table>

                        </div>
                        <div class="flex justify-center mt-2">
                            <InviteMemberModal text="Invite Member"/>
                        </div>
                    </div>
                    <!-- Block 3 -->
                    <div class="bg-slate-50 p-4 rounded border border-slate-200 hidden">
                        <div class="text-xs font-semibold text-slate-400 uppercase mb-4">Trends for you</div>
                        <ul class="space-y-3">
                            <li>
                                <div class="text-sm mb-1">
                                    <span class="font-medium text-slate-800" href="#0">Tracking your website
                                        traffic on
                                        launch day 📈</span>
                                </div>
                                <div class="text-xs text-slate-500">248 comments</div>
                            </li>
                            <li>
                                <div class="text-sm mb-1">
                                    <span class="font-medium text-slate-800" href="#0">Freemium model questions</span>
                                </div>
                                <div class="text-xs text-slate-500">47 comments</div>
                            </li>
                            <li>
                                <div class="text-sm mb-1">
                                    <span class="font-medium text-slate-800" href="#0">Slack and Community</span>
                                </div>
                                <div class="text-xs text-slate-500">24 comments</div>
                            </li>
                            <li>
                                <div class="text-sm mb-1">
                                    <span class="font-medium text-slate-800" href="#0">Who owns user onboarding in
                                        your
                                        company?</span>
                                </div>
                                <div class="text-xs text-slate-500">17 comments</div>
                            </li>
                            <li>
                                <div class="text-sm mb-1">
                                    <span class="font-medium text-slate-800" href="#0">Questions from a very
                                        confused Web3
                                        startup founder 🤔</span>
                                </div>
                                <div class="text-xs text-slate-500">9 comments</div>
                            </li>
                        </ul>
                        <div class="mt-4">
                            <button
                                class="btn-sm w-full bg-white border-slate-200 hover:border-slate-300 text-indigo-500 shadow-none">
                                View All
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {notification} from "ant-design-vue";
import InviteMemberModal from "../../components/modal/InviteMemberModal";
import axios from "axios";

export default {
    name: 'FeedRightContent',
    components: {InviteMemberModal},
    data() {
        return {
            TopCommunity: [],
            topMember: [],
            customers: [],
        }
    },
    created() {
        this.$store.dispatch('community/loadAllCommunities')
    },
    computed: {
        TopCommunity() {
            var _community = [...this.$store.state.community.browse_communities_list];

            if (_community.length > 5) {
                _community = _community.splice(0, 4)
            }
            return _community;
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

        axios.post('/api/newMember/' + this.community.id).then(({data}) => {
            this.customers = data;
        })


        axios.get('api/getTopMember').then(({data}) => {
            this.topMember = data;

            console.log('getTopMember', data);
        })
    },

    methods: {
        joinCommunity(community_id) {

            if (this.$store.state.auth.authenticated) {
                this.$store.dispatch('community/joinCommunity', community_id).then(({data}) => {

                    notification['success']({
                        message: 'Join Success!!',
                        description: "You have successfully join new community."
                    });

                });
            } else {
                this.$store.state.auth.Login_modal = true;
            }

        },
        follow(member, index) {

            if (this.authenticated) {
                member.following = true
                this.topMember[index] = member
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
                this.topMember[index] = member
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

    }
}
</script>
