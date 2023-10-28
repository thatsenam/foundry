<template>
    <!-- Post 1 -->
    <div v-if="posts.length>0">

        <div class="mb-4">
            <div class="w-full flex flex-wrap -space-x-px hidden">
                <button
                    class="btn grow bg-white border-slate-200 text-indigo-500 rounded-none first:rounded-l last:rounded-r">
                    Popular
                </button>
                <button
                    class="btn grow bg-white border-slate-200 hover:bg-slate-50 text-slate-600 rounded-none first:rounded-l last:rounded-r">
                    Newest
                </button>
                <button
                    class="btn grow bg-white border-slate-200 hover:bg-slate-50 text-slate-600 rounded-none first:rounded-l last:rounded-r">
                    Following
                </button>
            </div>
        </div>
        <article class="bg-white shadow-md rounded border border-slate-200 p-5 mb-4"
                 :class="is_my_post(post)? 'bg-indigo-500 text-white':''" v-for="post in posts">
            <div class="flex flex-start space-x-4 ">
                <!-- Avatar -->
                <div class="shrink-0 mt-1.5">
                    <!--                    <img class="w-8 h-8 rounded-full" v-if="post.user != null"  :src="post.user.avatar_url" width="32" height="32" alt="User avatar" />-->
                </div>
                <!-- Content -->
                <div class="grow cursor-pointer" @click.stop="onPostClick(post.id)">
                    <!-- Title -->
                    <h2 class="font-semibold   mb-2" :class="is_my_post(post)? 'text-white':'text-slate-800'"
                        v-if="post.name != null">
                        <span>{{post.name}}</span>
                    </h2>
                    <h2 class="font-semibold text-slate-800 mb-2" v-else>
                        <span :class="is_my_post(post)? 'text-white':'text-slate-800'"
                              v-if="post.body.length<100">{{ post.body }}</span>
                        <span :class="is_my_post(post)? 'text-white':'text-slate-800'" v-else> {{ post.body.substring(0,100)+"...." }}</span>
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
        <!-- Pagination -->
        <div class="mt-6 text-right">
            <nav class="inline-flex" role="navigation" aria-label="Navigation">
                <ul class="flex justify-center">

                    <li class="ml-3 first:ml-0" @click="getNextPost">
                        <button :hidden="!hasMore"
                                :class="!hasMore?'cursor-not-allowed':''"
                                class="btn bg-white border-slate-200 hover:border-slate-300 text-indigo-500 "
                        >Load More -&gt;
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
        <PostThreadModal id="postThread-modal" :modalOpen="postThreadModalOpen"
                         @close-modal="postThreadModalOpen = false"
                         title="Thread">
            <!-- Modal content -->
            <div class="px-5 py-4" v-if="active_post_id != -1">
                <thread-page :key="active_post_id"/>
            </div>
            <!-- Modal footer -->
            <div class="px-5 py-4 border-t border-slate-200">
                <div class="flex flex-wrap justify-end space-x-2">
                    <button class="btn-sm border-slate-200 hover:border-slate-300 text-slate-600"
                            @click.stop="postThreadModalOpen = false">Cancel
                    </button>

                </div>
            </div>
        </PostThreadModal>
    </div>
    <div v-else>
        <div class=" bg-slate-50 items-center flex justify-center" style="height: 300px">
                <span class="text-xl text-center text-slate-600 font-bold">

                    <img src="images/no items.png" alt="">
                    <span>
                        Add your First Post
                    </span>

                </span>
        </div>

    </div>

</template>

<script>
    import {computed} from "vue";
    import PostThreadModal from "../../components/landing/PostThreadModal";
    import ThreadPage from "../../pages/component/ThreadPage";
    import {getCurrentInstance} from 'vue'


    export default {
        name: 'ForumEntries',
        components: {
            PostThreadModal,
            ThreadPage,
        },

        data() {
            let category_id = getCurrentInstance().vnode.key;

            return {
                loading: true,
                postThreadModalOpen: false,
                active_post_id: -1,
                active_post: null,
                page: {
                    current_page: 1,
                    // community_id: this.$route.params.id,
                }
                , hasMore: true,
                category_id
            }
        },
        computed: {
            posts() {
                return this.$store.state.post.posts;
            },
            user() {
                return this.$store.state.auth.user;
            },
            community() {
                return this.$store.state.community.active_community;
            },
        },


        mounted() {

            this.community_id = this.$route.params.id;

            console.log('Mounted ForumEntries', this.community_id)

            this.loadPosts()
        },
        watch: {
            $route(to, from) {
                // alert(this.community_id)
                //
                // this.loadPosts()

            }
        },

        methods: {


            loadPosts() {
                this.$store.dispatch('post/loadPosts', {
                    category_id: this.category_id,
                    community_id: this.community.id
                })
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
