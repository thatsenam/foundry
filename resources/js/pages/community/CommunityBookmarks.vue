<template>
    <div>
        <main class="p-6 m-4">

            <div v-if="posts.length == 0">
                <h2 class="text-center h3">No Bookmark yet</h2>
            </div>
            <article class="bg-white shadow-md rounded border border-slate-200 p-5 mb-4"
                     :class="is_my_post(post)? 'bg-indigo-500 text-white':''" v-for="post in posts">
                <div class="flex flex-start space-x-4 ">

                    <!-- Content -->
                    <div class="grow cursor-pointer" @click.stop="onPostClick(post.id)">
                        <!-- Title -->
                        <h2 class="font-semibold   mb-2" :class="is_my_post(post)? 'text-white':'text-slate-800'"
                            v-if="post.name != null">
                            <span>{{post.name}}</span>
                        </h2>
                        <h2 class="font-semibold   mb-2" :class="is_my_post(post)? 'text-white':'text-slate-800'" v-else>
                        <span>
                            {{ post.body }}</span>
                        </h2>
                        <!-- Footer -->
                        <footer class="flex flex-wrap text-sm">
                            <div
                                class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                            <span class="font-medium " :class="is_my_post(post)? 'text-white':'text-slate-500'"
                                  href="#0">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.686 5.708 10.291.313c-.4-.4-.999-.4-1.399 0s-.4 1 0 1.399l.6.6-6.794 3.696-1-1C1.299 4.61.7 4.61.3 5.009c-.4.4-.4 1 0 1.4l1.498 1.498 2.398 2.398L.6 14.001 2 15.4l3.696-3.697L9.692 15.7c.5.5 1.199.2 1.398 0 .4-.4.4-1 0-1.4l-.999-.998 3.697-6.695.6.6c.599.6 1.199.2 1.398 0 .3-.4.3-1.1-.1-1.499Zm-7.193 6.095L4.196 7.507l6.695-3.697 1.298 1.299-3.696 6.694Z"/>
                                    </svg>
                                    {{post.user.name}}
                                </div>
                            </span>
                            </div>
                            <div
                                class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                            <span
                                :class="is_my_post(post)? 'text-white':'text-slate-500'">{{post.post_date}}</span>
                            </div>
                            <div
                                class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                <span :class="is_my_post(post)? 'text-white':'text-slate-500'">{{post.comment.length}} Comments</span>
                            </div>
                        </footer>
                    </div>
                    <!-- Upvote button -->
                    <div class="shrink-0" @click.stop="react_post(post.id)">
                        <button class="text-xs font-semibold text-center h-12 w-12 border rounded-sm flex flex-col
                            justify-center items-center outline outline-2 outline-indigo-100"
                                :class="post.is_react ? ' border-indigo-400  ' : ''">
                            <svg class="inline-flex  mt-1.5 mb-1.5"
                                 :class="post.is_react ? 'fill-indigo-500' : 'fill-slate-400'"
                                 width="12" height="6" xmlns="http://www.w3.org/2000/svg">
                                <path d="m0 6 6-6 6 6z"/>
                            </svg>
                            <div>{{post.react}}</div>
                        </button>
                    </div>
                </div>
            </article>
        </main>
    </div>
</template>

<script>

    import Sidebar from '../../partials/Sidebar.vue'
    import Header from '../../partials/Header.vue'
    import {getCurrentInstance} from "vue";


    export default {
        name: 'communityBookmarks',

        components: {
            Sidebar,
            Header,
        },
        data() {
            let category_id = getCurrentInstance().vnode.key;

            return {
                page: {
                    current_page: 1,
                }
            }
        },
        computed: {
            posts() {
                return this.$store.state.post.bookmarksPosts;
            },
            user() {
                return this.$store.state.auth.user;
            }, community() {
                return this.$store.state.community.active_community;
            },
        },


        mounted() {
            this.loadPosts()
        },

        methods: {
            loadPosts() {
                this.$store.dispatch('post/bookmarksPosts', {})
            },

            react_post(post_id) {

                if (this.$store.state.auth.authenticated) {
                    axios.post('/api/reacts', {
                        type: 'App\\Models\\Post',
                        type_id: post_id
                    }).then(response => {
                        if (response.data.message === 'Remove React') {
                            this.$store.commit('post/REMOVE_REACT', post_id);
                        } else {
                            this.$store.commit('post/ADD_REACT', post_id);
                        }
                    });
                } else {
                    this.$store.state.auth.Login_modal = true;
                }

            },
            onPostClick(post_id) {
                this.active_post_id = post_id
                this.postThreadModalOpen = true;
            },
            getNextPost() {

                this.$store.dispatch('post/getMorePosts', this.page).then(response => {
                    this.page.current_page = response.current_page + 1;
                    if (response.next_page_url == null) {
                        this.hasMore = false
                    }
                    console.log('getNextPost', response)
                })
            },
            is_my_post(post) {
                if (this.user) {
                    return post.user_id == this.user.id
                } else {
                    return false
                }
            }
        }
    }
</script>

<style>
    .theme_background {
        background-color: #F1F5F9 !important;
    }
</style>
