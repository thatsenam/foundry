<template>
    <div class="mt-4">
        <div class="flex items-center justify-between">
            <div class="text-xs font-semibold text-slate-400 uppercase mb-3">Channels</div>
            <button @click.stop="onCreateNewChannel"  class="btn bg-indigo-500 hover:bg-indigo-600 text-white" v-if="authenticated">
                <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.1983 9.17307H8.23972V12.1731H6.76041V9.17307H3.80179V7.67307H6.76041V4.67307H8.23972V7.67307H11.1983V9.17307ZM7.50007 0.923065C6.52874 0.923065 5.56692 1.11706 4.66953 1.49397C3.77214 1.87088 2.95675 2.42332 2.26992 3.11976C0.882793 4.52629 0.103516 6.43394 0.103516 8.42307C0.103516 10.4122 0.882793 12.3198 2.26992 13.7264C2.95675 14.4228 3.77214 14.9753 4.66953 15.3522C5.56692 15.7291 6.52874 15.9231 7.50007 15.9231C9.46175 15.9231 11.3431 15.1329 12.7302 13.7264C14.1173 12.3198 14.8966 10.4122 14.8966 8.42307C14.8966 7.43815 14.7053 6.46288 14.3336 5.55294C13.9619 4.643 13.4171 3.8162 12.7302 3.11976C12.0434 2.42332 11.228 1.87088 10.3306 1.49397C9.43322 1.11706 8.4714 0.923065 7.50007 0.923065Z" fill="white"/>
                </svg>

            </button>

        </div>
        <ul class="mb-6">
            <li v-for="channel in channels" class="-mx-2">

                <router-link :to="{name: 'channel',params:{chat_id:channel.uid}}"
                             :key="$route.fullPath"
                             v-slot="{ href, navigate, isExactActive }"
                             @click="query = null"
                >


                    <button class="flex items-center justify-between w-full p-2 rounded"
                            @click.stop="$emit('close-msgsidebar')">
                        <div class="flex items-center">
                            <div class="truncate">
                                <span class="text-sm font-medium text-slate-800">#{{ channel.name }}</span>
                            </div>
                        </div>
                        <div class="flex items-center ml-2">
                            <div class="w-2 h-2 bg-indigo-400 rounded-full"></div>
                        </div>
                    </button>
                </router-link>
            </li>

            <li class="flex justify-center align-items-center mt-4" v-if="channels.length == 0">
                <div>
                    <img src="/images/channel.png" alt="channel">

                    <button @click.stop="onCreateNewChannel">Add a Channel</button>
                </div>
            </li>

        </ul>

        <ModalBasic id="category-modal" :modalOpen="channelModalOpen"
                    @close-modal="channelModalOpen = false"
                    :title="tempChannel.id === undefined?'Create a New Channel':'Edit Channel'">


            <form @submit.prevent="onChannelFormSubmit">
                <!-- Modal content -->
                <div class="px-5 py-4">

                    <div class="space-y-3">

                        <div>
                            <label class="block text-sm font-medium mb-1" for="name">Channel Name <span
                                class="text-rose-500">*</span></label>
                            <input required id="name" v-model="tempChannel.name"
                                   class="form-input w-full px-2 py-1"
                                   type="text"/>

                        </div>


                    </div>
                </div>
                <!-- Modal footer -->
                <div class="px-5 py-4 border-t border-slate-200">
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button class="btn-sm border-slate-200 hover:border-slate-300 text-slate-600"
                                @click.stop="channelModalOpen = false">Cancel
                        </button>
                        <button type="submit" class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">
                            Send
                        </button>
                    </div>
                </div>
            </form>

        </ModalBasic>
    </div>
</template>

<script>
    import ModalBasic from "../../components/ModalBasic";

    export default {
        name: 'Channels',
        components: {ModalBasic},
        props: ['msgSidebarOpen', 'channels'],
        methods: {
            my_key(id) {
                return "channel" + id;
            },
            onCreateNewChannel() {
                this.channelModalOpen = true;
            },
            onChannelFormSubmit() {

                if (this.tempChannel.id != undefined) {
                    this.$store.dispatch('post/updateChannel', this.tempChannel)
                        .then((response) => {
                            this.channelModalOpen = false;
                            let updatedChannel = this.channels.find(c => c.id == response.data.id);
                            updatedChannel.name = response.data.name;
                            this.tempChannel = {id: undefined, name: '', community_id: this.community_id};
                            this.toast('Channel updated.')
                        })
                } else {
                    this.$store.dispatch('post/addChannel', this.tempChannel)
                        .then((response) => {
                            this.channels.push(response.data);
                            this.tempChannel = {id: undefined, name: '', community_id: this.community_id};
                            this.channelModalOpen = false;
                            this.toast('New channel created.')

                        })
                }
            },
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
        data() {
            return {
                tempChannel: {
                    id: undefined,
                    name: '',
                    community_id: undefined
                },
                channelModalOpen: false,
            }
        },
        watch: {
            community(community) {
                if (community) {
                    this.tempChannel.community_id = community.id

                }
            }
        }
    }
</script>
