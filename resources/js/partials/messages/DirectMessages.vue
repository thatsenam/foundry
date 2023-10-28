<template>

    <div>
        <form class="relative">
            <label for="msg-search" class="sr-only">Search</label>
            <input id="msg-search" class="form-input w-full pl-9 focus:border-slate-300"
                   v-model="query" @input.stop="onSearchInput"
                   type="search" placeholder="Search…"/>
            <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 group-hover:text-slate-500 ml-3 mr-2"
                     viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"/>
                    <path
                        d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"/>
                </svg>
            </button>
        </form>

        <div class="mt-4">
            <div class="flex justify-between items-center">
                <div class="text-xs font-semibold text-slate-400 uppercase mb-3 ">Direct messages</div>

                <InviteMemberModal text="Invite Member">
                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.1983 9.17307H8.23972V12.1731H6.76041V9.17307H3.80179V7.67307H6.76041V4.67307H8.23972V7.67307H11.1983V9.17307ZM7.50007 0.923065C6.52874 0.923065 5.56692 1.11706 4.66953 1.49397C3.77214 1.87088 2.95675 2.42332 2.26992 3.11976C0.882793 4.52629 0.103516 6.43394 0.103516 8.42307C0.103516 10.4122 0.882793 12.3198 2.26992 13.7264C2.95675 14.4228 3.77214 14.9753 4.66953 15.3522C5.56692 15.7291 6.52874 15.9231 7.50007 15.9231C9.46175 15.9231 11.3431 15.1329 12.7302 13.7264C14.1173 12.3198 14.8966 10.4122 14.8966 8.42307C14.8966 7.43815 14.7053 6.46288 14.3336 5.55294C13.9619 4.643 13.4171 3.8162 12.7302 3.11976C12.0434 2.42332 11.228 1.87088 10.3306 1.49397C9.43322 1.11706 8.4714 0.923065 7.50007 0.923065Z" fill="white"/>
                        </svg>

                    </button>
                </InviteMemberModal>
            </div>

            <ul class="mb-6">

                <router-link :to="{name: 'user',params:{ chat_id: user.uid}}"
                             v-for="user in members"
                             :key="$route.fullPath"
                             v-slot="{ href, navigate, isExactActive }"
                             custom
                             @click="query = null"
                >
                    <li
                        @click.stop="checkAuth(navigate, $event)"


                        class="-mx-2 mb-2" :class="user.unseen_count > 0 && authenticated?'bg-amber-50':''">
                        <button class="flex items-center justify-between w-full p-2 rounded   "
                                :class="isExactActive && 'bg-indigo-100'">
                            <div class="flex items-start truncate">
                                <img class="w-8 h-8 rounded-full mr-2" :src="user.avatar_url" width="32" height="32"
                                     alt="User 01"/>
                                <div>
                                    <div class="truncate text-start" style="text-align: start">
                                    <span :class="user.unseen_count > 0?'font-bold':'font-medium'"
                                          class="text-sm  text-slate-800"> {{ user.name }} </span>
                                    </div>
                                    <span style="text-align: start" class="text-xs block truncate"
                                          v-if="user.last_message != null && authenticated">
                                    <span v-if="user.last_message.from_id == this.user.id">You:</span>
                                    {{ user.last_message.body }}</span>

                                </div>

                            </div>
                            <div v-if="user.unseen_count > 0 && authenticated" class="flex items-center ml-2">
                                <div
                                    class="text-xs inline-flex font-medium bg-indigo-400 text-white rounded-full text-center leading-5 px-2">
                                    {{ user.unseen_count }}
                                </div>
                            </div>
                        </button>
                    </li>
                </router-link>

                <li class="flex justify-center align-items-center mt-4" v-if="members.length == 0">
                    <div>
                        <img src="images/message.png" alt="channel">

                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import InviteMemberModal from "../../components/modal/InviteMemberModal";

export default {
    name: 'DirectMessages',
    props: ['msgSidebarOpen'],
    components: {InviteMemberModal},
    data() {
        return {
            users: [],
            query: null,
        }
    },
    computed: {
        members() {
            return this.$store.state.community.members;
        },
        user() {
            return this.$store.state.auth.user;
        },
        authenticated() {
            return this.$store.state.auth.authenticated;
        },
        community() {
            return this.$store.state.community.active_community;
        },

    },
    mounted() {

    },
    methods: {
        onSearchInput() {
            this.$store.commit('community/SEARCH_MEMBER', this.query)
        },
        checkAuth(navigate, event) {
            if (!this.authenticated) {
                this.$store.state.auth.Login_modal = true;
                this.$store.state.auth.type = "login";
                event.preventDefault()
            }
            navigate(event)
        }

    },
    watch: {
        authenticated: function (is_loggedin) {
            if (is_loggedin) {
                setInterval(() => {
                    if (!this.query) {
                        this.$store.dispatch('community/loadMembers')
                    }
                }, 3000)
            }
        },
        community: function (newCommunity) {
            if (newCommunity) {
                this.$store.dispatch('community/loadMembers', {community_id: newCommunity.id})
            }
        }
    }
}
</script>
