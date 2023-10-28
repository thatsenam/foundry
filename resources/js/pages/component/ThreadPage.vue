<template>
    <article v-if="active_post_id != -1" class="bg-white shadow-md rounded border border-slate-200 p-5">

        <div v-if="loading" class="relative" style="height: 80vh">
            <div class="loading relative" v-cloak>

            </div>
        </div>
        <div v-else class="thread-content" v-if="post != null">
            <header class="pb-4">
                <!-- Title -->
                <div class="flex items-start justify-between space-x-3 mb-3">
                    <h2 class="font-semibold text-slate-800 mb-2" v-if="post.name != null">
                        <span>{{post.name}}</span>
                    </h2>
                    <h2 class="font-semibold text-slate-800 mb-2" v-else>
                        <span v-if="post.body.length<60">Welcome, {{ post.body }}</span>
                        <span v-else> {{ post.body.substring(0,60)+"...." }}</span>
                    </h2>
                    <!-- Upvote button -->
                    <div class="shrink-0">
                        <button
                            class="text-xs font-semibold text-center h-12 w-12 border border-slate-200 hover:border-slate-300
                            rounded-sm flex flex-col justify-center items-center">
                            <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5" width="12" height="6"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="m0 6 6-6 6 6z"/>
                            </svg>
                            <div>{{ post.react }}</div>
                        </button>
                    </div>
                </div>
                <!-- Meta -->
                <div class="flex flex-wrap text-sm">
                    <div
                        class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                        <a v-if="post.user" class="font-medium text-indigo-500 hover:text-indigo-600" href="#">{{
                            post.user.name }}</a>
                    </div>
                    <div
                        class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                        <span class="text-slate-500">{{ post.post_date }}</span>
                    </div>
                    <div
                        class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                        <span class="text-slate-500">{{ comments.length }} comments</span>
                    </div>
                </div>
            </header>
            <!-- Content -->
            <div class="space-y-4 mb-6">
                <p class="text-justify">{{ post.body }}</p>
            </div>
            <!-- Comment form -->
            <form @submit.prevent="onCommentFormSubmit">
                <div>
                    <div class="flex items-start space-x-3 mb-3">
                        <img v-if="is_login" class="rounded-full shrink-0" :src="user.avatar_url" width="40" height="40"
                             style="height: 40px;width: 40px;"
                             alt="User 02"/>
                        <div class="grow">
                            <label for="comment" class="sr-only">Write a comment…</label>
                            <span
                                v-if="reply_to != null"
                                class="flex align-center justify-between px-4 py-2 bg-emerald-100 border-emerald-200 text-emerald-600">
                                <span>
                                    <strong>Reply to</strong> -> <strong>{{ reply_to.user.name }}</strong> [{{ reply_to.body }}]
                                </span>
                                <span class="cursor-pointer" @click.stop="removeReplyTo">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon icon-tabler icon-tabler-square-x " width="24"
                                         height="24"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <rect x="4" y="4" width="16" height="16" rx="2"/>
                                          <path d="M10 10l4 4m0 -4l-4 4"/>
                                        </svg>
                                </span>




                            </span>
                            <textarea ref="comment_body" v-model="comment.body" id="comment"
                                      class="form-textarea w-full focus:border-slate-300" rows="4"
                                      placeholder="Write a comment…" required></textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit"
                                class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">
                            Reply -&gt;
                        </button>
                    </div>
                </div>
            </form>

            <!-- Comments -->
            <div class="mt-4" v-if="comments.length">
                <h3 class="font-semibold text-slate-800 mb-4">Comments</h3>
                <ul class="space-y-5">
                    <!-- Comment -->
                    <li v-for="comment in comments" class="relative pl-9 space-y-5">
                        <!-- Comment wrapper -->
                        <div class="flex items-start">
                            <!-- Comment upvote -->
<!--                            <div class="absolute top-0 left-0">-->
<!--                                <button-->
<!--                                    class="text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-indigo-500">-->
<!--                                    <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5" width="12" height="6"-->
<!--                                         xmlns="http://www.w3.org/2000/svg">-->
<!--                                        <path d="m0 6 6-6 6 6z"/>-->
<!--                                    </svg>-->
<!--                                    <div>{{ comment.react }}</div>-->
<!--                                </button>-->
<!--                            </div>-->
                            <!-- Comment content -->
                            <div>
                                <!-- Comment text -->
                                <div class="grow text-sm text-slate-800 space-y-2 mb-2">
                                    {{ comment.body }}
                                </div>
                                <!-- Comment footer -->
                                <div class="flex flex-wrap text-xs">
                                    <div
                                        class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                        <a class="block mr-2" href="#">
                                            <img class="rounded-full" :src="comment.user.avatar_url"
                                                 style="height: 24px;width:24px" alt="User 02"/>
                                        </a>
                                        <a class="font-medium text-indigo-500 hover:text-indigo-600"
                                           href="#">{{ comment.user.name }}</a>
                                    </div>
                                    <div
                                        class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                        <a class="font-medium text-slate-500 hover:text-slate-600"
                                           @click.stop="reply(comment)">Reply</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Nested comments -->

                        <ul class="  space-y-5" v-if="comment.replies.length">

                            <!-- Comment -->
                            <li class="relative pl-9 space-y-5" v-for="reply in comment.replies">
                                <!-- Comment wrapper -->
                                <div class="flex items-start">
                                    <!-- Comment upvote -->
<!--                                    <div class="absolute top-0 left-0">-->
<!--                                        <button-->
<!--                                            class="text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-indigo-500">-->
<!--                                            <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5" width="12" height="6"-->
<!--                                                 xmlns="http://www.w3.org/2000/svg">-->
<!--                                                <path d="m0 6 6-6 6 6z"/>-->
<!--                                            </svg>-->
<!--                                            <div>2</div>-->
<!--                                        </button>-->
<!--                                    </div>-->
                                    <!-- Comment content -->
                                    <div>
                                        <!-- Comment text -->
                                        <div class="grow text-sm text-slate-800 space-y-2 mb-2">
                                            <p>{{ reply.body }}</p>
                                        </div>
                                        <!-- Comment footer -->
                                        <div class="flex flex-wrap text-xs">
                                            <div
                                                class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                                <a class="block mr-2" href="#0">
                                                    <img class="rounded-full" :src="reply.user.avatar_url"
                                                         style="height: 24px;width: 24px"
                                                         alt="User 05"/>
                                                </a>
                                                <a class="font-medium text-indigo-500 hover:text-indigo-600" href="#0">{{
                                                    reply.user.name }}</a>
                                            </div>
                                            <div
                                                class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                                <span
                                                    class="font-medium text-slate-500 hover:text-slate-600 disabled:bg-slate-50 hidden"
                                                >Reply</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
                <!-- View more link -->
                <div class="text-center mt-5">
                    <button class="text-sm font-medium text-indigo-500 hover:text-indigo-600">View More Comments
                    </button>
                </div>
            </div>
            <div v-else class="mt-4">
                No comments Yet. Be first to comment.
            </div>

        </div>

        <!-- Header -->

    </article>
</template>
<script>
    import {getCurrentInstance} from "vue";

    export default {
        name: 'thread-page',
        data() {
            return {
                active_post_id: getCurrentInstance().vnode.key,
                loading: true,
                comments: [],
                comment: {
                    post_id: null,
                    body: '',
                    post_comment_id: null,
                    user_id: null

                },
                reply_to: null
            }
        },
        computed: {
            post() {
                return this.$store.state.post.posts.find(post => post.id == this.active_post_id);
            },
            user() {
                return this.$store.state.auth.user;
            },
            is_login(){
                return   this.$store.state.auth.authenticated
            }


        },

        methods: {
            onCommentFormSubmit() {

                if (this.$store.state.auth.authenticated){
                    this.comment.post_id = this.post.id
                    this.comment.user_id = this.user.id
                    if (this.reply_to != null) {
                        this.comment.post_comment_id = this.reply_to.id;
                    }else{
                        this.comment.post_comment_id = '';
                    }

                    // console.log(this.comment)
                    this.$store.dispatch('post/addComment', this.comment).then(response => {
                        let justComment = response.data;
                        console.log(justComment)
                        if (justComment.post_comment_id) {
                            let repliedComment = this.comments.find(comment => comment.id == justComment.post_comment_id)
                            repliedComment.replies.push(justComment)

                        } else {
                            this.comments = [justComment, ...this.comments]
                        }
                        this.comment.body = '';
                        this.reply_to = null

                    })
                }
                else{
                    this.$store.state.auth.Login_modal = true;
                }


            },
            reply(comment) {
                this.reply_to = comment;
                this.$refs.comment_body.focus();


            },
            removeReplyTo() {
                this.reply_to = null
            }
        },
        created() {
            this.$store.dispatch('post/loadComments', this.post.id).then(response => {
                this.comments = response.data
                console.log(this.comments, 'comments', response)
                this.loading = false
            })
        }
    }
</script>
