<template>
    <div class="relative" style="min-height: 80vh">
        <article class="bg-white rounded border border-slate-200 p-5" v-if="message!=null">

            <!-- Header -->
            <header class="pb-4">
                <!-- Title -->
                <div class="flex items-start space-x-3 mb-3">
                    <h2 class="text-2xl text-slate-800 font-bold">{{ message.body }}</h2>

                </div>
                <!-- Meta -->
                <div class="flex flex-wrap text-sm">

                    <div
                        class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                        <span class="text-slate-500"> {{ $filters.timeAgo(message.created_at ) }}</span>
                    </div>

                </div>
            </header>
            <!-- Comments -->
            <div class="mb-4">
                <h3 class="font-semibold text-slate-800 mb-4">Replies</h3>
                <ul class="">

                    <!-- Comment -->
                    <li class="relative my-2" v-for="message in messages">


                        <!-- Comment content -->
                        <div class="flex items-start gap-2">

                            <img class="rounded" :src="message.from.avatar_url" width="24"
                                 style="height: 24px;width: 24px;margin-top:3px"
                                 height="24" alt="User 02"/>

                            <!-- Comment text -->
                            <div class="grow text-sm text-slate-800">
                                <div class="flex justify-between items-center">
                                    <strong>{{ message.from.name }}</strong>
                                    <span> {{ $filters.timeAgo(message.created_at ) }}</span>
                                </div>
                                <p>{{ message.body }}</p>
                            </div>

                        </div>

                    </li>

                </ul>

            </div>
            <!-- Comment form -->
            <form @submit.prevent="addReply">
                <div class="flex items-start space-x-3 mb-3">
                    <img class="rounded-full shrink-0" :src="user.avatar_url" style="width: 40px;height:40px" width="40"
                         height="40"
                         alt="User 02"/>
                    <div class="grow">
                        <label for="comment" class="sr-only">Write a comment…</label>
                        <textarea v-model="newmessage.body" id="comment"
                                  class="form-textarea w-full focus:border-slate-300" rows="4" required
                                  placeholder="Write a comment…"></textarea>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">
                        Reply -&gt;
                    </button>
                </div>
            </form>

        </article>

    </div>
</template>

<script>
    import {getCurrentInstance} from "vue";

    export default {
        name: 'ReplyThreadContent',
        props: ['message'],
        data() {
            return {
                comment_id: getCurrentInstance().vnode.key,
                loading: false,
                newmessage: {
                    body: '',
                    type: 'user',
                    from_id: '',
                },
                messages: []
            }
        },
        computed: {
            user() {
                return this.$store.state.auth.user;
            },
            community() {
                return this.$store.state.community.active_community;
            },
        },
        methods: {
            fetchMessages() {
                this.$store.dispatch('chat/loadReplies', {message_id: this.comment_id}).then(response => {
                    this.messages = response.data
                    this.loading = false
                })
            },
            addReply() {
                this.$emit('addreply')
                //Pushes it to the messages array
                this.newmessage.from_id = this.user.id
                this.newmessage.message_id = this.message.id
                this.newmessage.community_id = this.community.id
                let m = {...this.newmessage}
                this.newmessage.body = ""
                // this.messages.push(m);
                //POST request to the messages route with the message data in order for our Laravel server to broadcast it.
                axios.post('api/reply', m).then(response => {
                    this.messages.push(response.data)
                    let updatedMessage = response.data.root_message;
                    this.$store.commit('chat/UPDATE_MESSAGE',updatedMessage)

                });
            },
            initializeEvents() {
                // chat-reply-146
                window.Echo.channel(`chat-reply-${this.comment_id}`)
                    .listen('NewReply', (e) => {
                        this.messages.push(e.message)
                    });



            }
        },
        mounted() {
            this.fetchMessages()
            this.initializeEvents()

        },


    }
</script>
