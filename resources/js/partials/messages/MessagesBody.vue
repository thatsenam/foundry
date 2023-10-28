<template>
    <div class="grow">
        <div class="grow relative">
            <div class="sticky top-16">
                <div
                    class="flex items-center justify-between bg-white border-b border-slate-200 px-4 sm:px-6 md:px-5 h-16">
                    <!-- People -->
                    <div class="flex items-center">
                        <!-- Close button -->
                        <button
                            class="md:hidden text-slate-400 hover:text-slate-500 mr-4"
                            @click.stop="$emit('toggle-msgsidebar')"
                            aria-controls="messages-sidebar"
                            :aria-expanded="msgSidebarOpen"
                        >
                            <span class="sr-only">Close sidebar</span>
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"/>
                            </svg>
                        </button>
                        <!-- People list -->
                        <div class="flex gap-4 items-center">

                            <img v-if="opponent.avatar_url" class="rounded-full "
                                 :src="opponent.avatar_url" style="width: 32px;height: 32px" width="32" height="32"
                                 alt="User 01"/>
                            <span
                                class="text-xl font-bold"> {{ type=='channel'?'#':'' }}{{ opponent.name }} </span>

                        </div>
                    </div>
                    <!-- Buttons on the right side -->
                    <div class="flex">
                        <button @click.stop="aboutUser"
                                class="p-1.5 shrink-0 rounded border border-slate-200 hover:border-slate-300 shadow-sm ml-2">
                            <svg class="w-4 h-4 fill-current text-slate-400" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"/>
                            </svg>
                        </button>
                        <button
                            class="p-1.5 shrink-0 rounded border border-slate-200 hover:border-slate-300 shadow-sm ml-2">
                            <svg class="w-4 h-4 fill-current text-indigo-500" viewBox="0 0 16 16">
                                <path
                                    d="M14.3 2.3L5 11.6 1.7 8.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="grow px-4 sm:px-6 md:px-5 py-6" ref="msgContainer" style="min-height: 80vh">
                <TransitionGroup name="fade">
                    <div v-if="!loading">

                        <div class="messages" style="padding-bottom: 20px;margin-bottom: 50px">

                            <div v-for="(message,index) in messages"
                                 class="" :key="index">
                                <!--Me-->
                                <div class="flex items-start justify-end mb-4 first:mb-0"
                                     @mouseover="message.replyMode = true"
                                     @mouseleave="message.replyMode=false"
                                     v-if="this.user.id == message.from_id">

                                    <div class="flex items-center">

                                        <div v-if="message.replyMode"
                                             class="text-xs text-slate-500  font-medium flex items-center space-x-4 mr-4 ">
                                    <span class="cursor-pointer">
                                          <a-tooltip>
                                        <template #title>Remove Message</template>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-trash" width="28" height="28"
                                                 viewBox="0 0 24 24" stroke-width="0.5" stroke="#ff2825" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                              <line x1="4" y1="7" x2="20" y2="7"/>
                                              <line x1="10" y1="11" x2="10" y2="17"/>
                                              <line x1="14" y1="11" x2="14" y2="17"/>
                                              <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/>
                                              <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/>
                                            </svg>
                                      </a-tooltip>

                                        </span>


                                            <span class="cursor-pointer" @click.stop="openReplyThread(message)">

                                         <a-tooltip>
                                        <template #title> Reply in thread</template>
                                           <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-message" width="28" height="28"
                                                viewBox="0 0 24 24" stroke-width="0.5" stroke="#000000" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path
                                                d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"/>
                                            <line x1="8" y1="9" x2="16" y2="9"/>
                                            <line x1="8" y1="13" x2="14" y2="13"/>
                                        </svg></a-tooltip></span>


                                        </div>


                                        <div>

                                    <span
                                        class="text-sm bg-indigo-500 text-white  p-3 rounded-lg rounded-tr-none border border-slate-200 shadow-md mb-1 text-right block"> {{ message.body }}</span>
                                            <div @click.stop="openReplyThread(message)"
                                                 class=" text-indigo-500 mr-2 cursor-pointer hover:underline"
                                                 v-if="message.reply_count > 0">{{ message.reply_count }} replies, View
                                                thread
                                            </div>

                                        </div>

                                    </div>
                                    <img class="rounded-full ml-4"
                                         :src="this.user.avatar_url"
                                         style="width: 32px;height: 32px"
                                         alt="User 01"/>
                                </div>
                                <!--Other User-->
                                <div class="flex items-start mb-4 last:mb-0" v-else
                                     @mouseover="message.replyMode = true"
                                     @mouseleave="message.replyMode=false">
                                    <img class="rounded-lg mr-4"

                                         :src="message.from.avatar_url"
                                         style="width: 32px;height: 32px"
                                         alt="User 01"/>

                                    <div class="flex">
                                        <div>
                                            <div class="mb-1"><b>{{ message.from.name }}</b></div>
                                            <div
                                                class="text-sm bg-white text-slate-800  p-3 rounded-lg rounded-tl-none border border-slate-200 shadow-md mb-1">
                                                {{ message.body }}
                                            </div>
                                            <div @click.stop="openReplyThread(message)"
                                                 class="mt-2 text-indigo-500 ml-2 cursor-pointer hover:underline"
                                                 v-if="message.reply_count>0">{{ message.reply_count }} replies, View
                                                thread
                                            </div>

                                        </div>
                                        <div class="flex items-center justify-between">
                                            <div v-if="message.replyMode"
                                                 class="text-xs text-slate-500 flex-row-reverse font-medium flex items-center space-x-4 ml-4 ">

                                            <span class="cursor-pointer" @click.stop="openReplyThread(message)">

                                         <a-tooltip>
                                        <template #title> Reply in thread</template>
                                           <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-message" width="28" height="28"
                                                viewBox="0 0 24 24" stroke-width="0.5" stroke="#000000" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path
                                                d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"/>
                                            <line x1="8" y1="9" x2="16" y2="9"/>
                                            <line x1="8" y1="13" x2="14" y2="13"/>
                                        </svg></a-tooltip></span>


                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="flex items-start "
                                     :class="this.user.id == message.from_id?' justify-end':'items-start'">
                                    <div class="attachment mx-4">

                                        <div v-for="file in message.files" :key="file" class="mb-4">
                                            <img
                                                v-if="isImage(file)"
                                                class="rounded-lg" :src="file" alt="" width="400px" height="100%"
                                                style="width:400px;height:100%">

                                            <a v-else target="_blank" :href="file">
                                                <img src="images/file.jpeg" class="h-16 w-16" alt=""
                                                     style="display: inline-block">
                                            </a>


                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                        <div class="text-center" v-if="messages.length==0" style="margin-right: 200px">
                            <br>
                            <span class=" text-2xl block ">
                    Empty Inbox. No Messages Yet.

                </span>
                            <br>

                            <hr>

                            <br>

                            <span class="text-xl"> Say hi 👋 to @{{opponent.name}}</span>

                            <br>
                        </div>

                    </div>

                    <div v-else class="relative" style="height: 80vh">
                        <div class="loading relative" v-cloak>

                        </div>
                    </div>
                </TransitionGroup>


            </div>
            <div class="sticky bottom-0 mb-4 w-full">

                <div class="flex gap-4 mb-4">

                    <div v-for="(file,index) in preview_files"
                         class="relative">
                        <img v-if="file.includes('image')" :src="file" class="h-16 w-16" alt=""
                             style="display: inline-block">
                        <img v-else src="images/file.jpeg" class="h-16 w-16" alt=""
                             style="display: inline-block">

                        <svg @click="removeFile(index)"
                             xmlns="http://www.w3.org/2000/svg"
                             class="icon cursor-pointer hover:text-2xl hover:fill-red icon-tabler icon-tabler-circle-minus absolute right-0 "
                             style="top:-5px" width="30" height="30"
                             viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="#ff2825" fill="white"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"
                                  fill="none"/>
                            <circle cx="12" cy="12" r="9"/>
                            <line x1="9" y1="12" x2="15" y2="12"/>
                        </svg>


                    </div>
                </div>

                <div
                    class="flex items-center justify-between bg-white border-t border-slate-200 px-4 sm:px-6 md:px-5 h-16">
                    <!-- Plus button -->
                    <button
                        onclick="document.getElementById('pickFileInput').click()"
                        class="shrink-0 text-slate-400 hover:text-slate-500 mr-3">
                        <span class="sr-only">Add</span>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12C23.98 5.38 18.62.02 12 0zm6 13h-5v5h-2v-5H6v-2h5V6h2v5h5v2z"/>
                        </svg>
                    </button>
                    <input type="file" hidden id="pickFileInput"
                           @change="onFilePick" multiple>
                    <!-- Message input -->
                    <form class="grow flex" @submit.prevent="addMessage">
                        <div class="grow mr-3">


                            <label for="message-input" class="sr-only">Type a message</label>
                            <input
                                @focus="markAsSeen" @change="markAsSeen" id="message-input" rows="1"
                                v-model="message.body"
                                class="form-input w-full bg-slate-100 border-transparent focus:bg-white focus:border-slate-300"
                                type="text" placeholder="Aa"/>
                        </div>
                        <button :disabled="message.body == ''" type="submit"

                                class="btn  text-white whitespace-nowrap "
                                :class="message.body == ''?'bg-indigo-400 hover:bg-indigo-400 cursor-not-allowed':'bg-indigo-500 hover:bg-indigo-600'"
                        >
                            Send -&gt;
                        </button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</template>

<script>

    import Tooltip from '../../components/Tooltip.vue'
    import {useRoute, useRouter} from 'vue-router';

    export default {
        name: 'MessagesBody',
        props: ['chat_type'],
        components: {Tooltip},
        data() {
            return {
                message: {
                    body: '',
                    type: 'user',
                    files: [],
                    from_id: '',
                },
                type: '',
                preview_files: [],
                loading: false,
                fetching: false

            }
        },


        methods: {
            isImage(url) {
                let ext = ['png', 'jpg', 'gif', 'jpeg', 'svg'];
                let is_image = false;
                for (let i = 0; i < ext.length; i++) {
                    if (url.toString().toLowerCase().includes(ext[i])) {
                        is_image = true
                        return is_image;
                    }
                }
                return is_image;
            },
            addMessage() {


                if (!this.authenticated) {
                    this.$store.state.auth.Login_modal = true;
                    this.$store.state.auth.type = "login";
                    return
                }

                //Pushes it to the messages array
                this.message.from_id = this.user.id
                this.message.to_id = this.opponent.id
                this.message.community_id = this.community.id
                this.message.attachments = this.community.id
                this.message.type = this.type
                let m = {...this.message}
                this.message.body = ""


                this.message.files = []


                var form_data = new FormData();
                for (let key in m) {
                    form_data.append(key, m[key]);
                }

                for (let i = 0; i < m.files.length; i++) {
                    form_data.append('media[]', m.files[i])
                }

                m.files = this.preview_files;
                this.messages.push(m);

                this.$emit('addmessage', 'test')
                setTimeout(() => {
                    this.$emit('addmessage', 'test')
                }, 1000)

                this.preview_files = [];


                //POST request to the messages route with the message data in order for our Laravel server to broadcast it.
                axios.post('api/messages', form_data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                    console.log(response.data);
                    this.$store.commit('community/UPDATE_MEMBER', response.data)
                    this.$store.commit('chat/UPDATE_MESSAGE_BY_BODY', response.data)


                });
            },
            fetchMessages() {

                this.loading = true
                this.fetching = true

                let to_id = -1;
                if (this.authenticated) {
                    to_id = this.user.id;
                }

                this.$store.dispatch('chat/loadMessages', {
                    page: this.$store.state.chat.page,
                    to_id: to_id,
                    from_id: this.opponent.id,
                    type: this.type
                }).then(res => {
                    this.$emit('addmessage', 'test')
                    this.loading = false
                    this.fetching = false

                    setTimeout(() => {
                        this.$emit('addmessage', 'test')
                    }, 500)
                });


                this.markAsSeen()
            },
            markAsSeen() {
                if (this.authenticated) {
                    // to_id = this.user.id;
                    this.$store.dispatch('chat/markAsSeen', {from_id: this.opponent.id, to_id: this.user.id})

                }

            },
            aboutUser() {
                this.$emit('onAboutModalOpen', this.opponent)
            },
            openReplyThread(comment) {
                this.$emit('onReplyModalOpen', comment)
            },
            onFilePick(event) {

                var input = event.target;
                var count = input.files.length;
                var index = 0;
                if (input.files) {
                    while (count--) {
                        var reader = new FileReader();
                        reader.onload = (e) => {
                            this.preview_files.push(e.target.result);
                        }
                        this.message.files.push(input.files[index]);
                        reader.readAsDataURL(input.files[index]);
                        index++;
                    }
                }
            },
            removeFile(index) {
                this.message.files.splice(index, 1)
                this.preview_files.splice(index, 1)
            },

            initEvents() {
                this.event.on('loadMessages', this.loadMoreMessages)
            },
             loadMoreMessages() {
                // this.loading = true
                 console.warn('Event Lister Fired')
                setTimeout(async () => {
                    if (this.fetching) {
                        return
                    }

                    this.fetching = true

                    let to_id = -1;
                    if (this.authenticated) {
                        to_id = this.user.id;
                    }

                    await this.$store.dispatch('chat/loadMessages', {
                        page: this.$store.state.chat.page,
                        to_id: to_id,
                        from_id: this.opponent.id,
                        type: this.type
                    })
                    this.fetching = false
                }, 1000)


            }
        },
        computed: {
            chat_id() {
                return this.$route.params.chat_id;
            },
            user() {
                return this.$store.state.auth.user;
            },
            authenticated() {
                return this.$store.state.auth.authenticated;
            },

            opponent() {
                // alert('changes in '+this.$route.name)
                if (this.$route.name === 'channel') {
                    this.type = 'channel'
                    let channel = this.$store.state.post.channels.find(m => m.uid == this.chat_id)
                    channel.avatar_url = "./images/user-avatar-80.png";

                    return channel;
                } else {
                    this.type = 'user'
                    return this.$store.state.community.members.find(m => m.uid == this.chat_id);

                }

            },
            community() {
                return this.$store.state.community.active_community;
            },
            CurrentActive() {
                return this.$store.state.chat.activeChatId;
            },
            messages() {
                return this.$store.state.chat.messages.sort((a, b) => a.id - b.id);
            },
            members() {
                return this.$store.state.community.members;
            },
            type() {
                return this.$route.name;
            },

        },
        created() {

            this.$store.commit('chat/SET_PAGE', 1)
            this.$store.commit('chat/RESET_MESSAGES', [])
            this.event.all.clear()

            this.initEvents()


        },
        mounted() {
            this.chat_id = this.$route.params.chat_id;
            this.fetchMessages();
            if (this.type == 'channel') {
                window.Echo.channel(`chat-channel-${this.opponent.id}`)
                    .listen('MessageSent', (e) => {
                        this.messages.push(e.message);
                        this.$emit('addmessage', 'test')
                        setTimeout(() => {
                            this.$emit('addmessage', 'test')
                        }, 500)
                    });
                window.Echo.channel(`chat-channel-${this.opponent.id}`)
                    .listen('MessageUpdate', (e) => {
                        this.$store.commit('chat/UPDATE_MESSAGE', e.message)
                    });
            } else {
                let numbers = [this.opponent.id, this.user.id].sort()
                window.Echo.channel(`chat-dm-${numbers[0]}-${numbers[1]}`)
                    .listen('MessageSent', (e) => {
                        this.messages.push(e.message);
                        this.$emit('addmessage', 'test')
                        setTimeout(() => {
                            this.$emit('addmessage', 'test')
                        }, 500)
                    });
                window.Echo.channel(`chat-dm-${numbers[0]}-${numbers[1]}`)
                    .listen('MessageUpdate', (e) => {
                        this.$store.commit('chat/UPDATE_MESSAGE', e.message)


                    });
            }


        },


    }
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }
</style>
