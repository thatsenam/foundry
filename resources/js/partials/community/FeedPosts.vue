<template>
    <!-- Post 1 -->
    <div>
        <div v-if="posts.length>0">
            <div class="bg-white shadow-md rounded border border-slate-200 p-5 mt-3" v-for="post in posts"
                 :key="post.id">


                <!-- Header -->
                <header class="flex justify-between items-start space-x-3 mb-3">
                    <!-- User -->
                    <div class="flex items-start space-x-3">
                        <img class="rounded-full shrink-0" v-if="post.user" :src="post.user.avatar_url"
                             alt="User 03" style="width: 40px;height: 40px"/>
                        <div>
                            <div class="leading-tight">
                                <a class="text-sm font-semibold text-slate-800" v-if="post.user" href="#">{{post.user.name}}</a>
                            </div>
                            <div class="text-xs text-slate-500">{{post.post_date}}</div>
                        </div>
                    </div>
                    <!-- Menu button -->
                    <div class="relative">
                        <div class="absolute top-0 right-0 inline-flex">
                            <span v-if="post.is_bookmark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star"
                                     width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                  <path
                                      d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>
                                </svg>
                            </span>
                            <EditMenu align="right" :key="post.id">
                                <li>
                                    <button
                                        class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3"
                                        @click="bookmark(post.id)"
                                    >
                                        <span v-if="!post.is_bookmark">Bookmarks</span>
                                        <span v-else>Remove Bookmark</span>
                                    </button>
                                </li>
                                <li v-if="post.user_id === user.id">
                                    <button
                                        class="font-medium text-sm text-rose-500 hover:text-rose-600 flex py-1 px-3"
                                        @click.stop="removePost(post.id)">Remove
                                    </button>
                                </li>
                            </EditMenu>
                        </div>
                    </div>
                </header>
                <!-- Body -->
                <div class="text-sm text-slate-800 space-y-2 mb-5 cursor-pointer" @click.stop="onPostClick(post.id)">
                    <h2 class="text-md font-bold">{{post.name}}</h2>
                    <p>{{post.body}}</p>


                    <masonry-wall :items="post.post_media" :ssr-columns="1" :column-width="300" :gap="10">
                        <template #default="{ item, index }">
                            <div class="border-indigo-500 shadow-lg">
                                <img :src="item.file_url" alt="" style="width: 100%;">
                            </div>
                        </template>
                    </masonry-wall>
                    <!--                    v-for="media in post.post_media"-->

                </div>
                <!-- Footer -->
                <footer class="flex items-center justify-between">
                    <div class="flex items-center space-x-4 ">
                        <!-- Like button -->
                        <button class="flex items-center text-slate-400 hover:text-indigo-500"
                                @click.stop="react_post(post.id)">
                            <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16"
                                 :class="post.is_react ? 'fill-rose-500' : ''">
                                <path
                                    d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z"/>
                            </svg>
                            <div class="text-sm text-slate-500">{{post.react}}</div>
                        </button>
                        <!-- Share button -->
                        <button class="flex items-center text-slate-400 hover:text-indigo-500 hidden">
                            <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                                <path
                                    d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z"/>
                            </svg>
                            <div class="text-sm text-slate-500"></div>
                        </button>
                        <!-- Replies button -->
                        <button class="flex items-center text-slate-400 hover:text-indigo-500"
                                @click.stop="onPostClick(post.id)">
                            <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"/>
                            </svg>
                            <div class="text-sm text-slate-500">{{post.comment.length}}</div>
                        </button>
                    </div>
                    <router-link v-if="post.category" exact
                                 :to="{name : 'CommunityPost',query:{category:post.category.id}}"
                    >
                        <div
                            class="text-xs inline-flex font-medium bg-indigo-100 text-indigo-600 rounded-full text-center px-2.5 py-1">
                            {{ post.category.name }}
                        </div>

                    </router-link>


                </footer>
            </div>

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

        <!-- Post 2 -->
        <div class="bg-white shadow-md rounded border border-slate-200 p-5 hidden">
            <!-- Header -->
            <header class="flex justify-between items-start space-x-3 mb-3">
                <!-- User -->
                <div class="flex items-start space-x-3">
                    <img class="rounded-full shrink-0" src="../../images/user-40-06.jpg" width="40" height="40"
                         alt="User 06"/>
                    <div>
                        <div class="leading-tight">
                            <a class="text-sm font-semibold text-slate-800" href="#0">Mark Karimani</a>
                        </div>
                        <div class="inline-flex items-center">
                            <svg class="w-3 h-3 shrink-0 fill-yellow-500 mr-1" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.953 4.29a.5.5 0 0 0-.454-.29H6.14L6.984.62A.5.5 0 0 0 6.12.174l-6 7A.5.5 0 0 0 .499 8h5.359l-.844 3.38a.5.5 0 0 0 .864.445l6-7a.5.5 0 0 0 .075-.534Z"/>
                            </svg>
                            <div class="text-xs text-slate-500">Sponsored</div>
                        </div>
                    </div>
                </div>
                <!-- Menu button -->
                <div class="relative">
                    <EditMenu align="right" class="absolute top-0 right-0 inline-flex">
                        <li>
                            <router-link class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3"
                                         to="#0">Option 1
                            </router-link>
                        </li>
                        <li>
                            <router-link class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3"
                                         to="#0">Option 2
                            </router-link>
                        </li>
                        <li>
                            <router-link class="font-medium text-sm text-rose-500 hover:text-rose-600 flex py-1 px-3"
                                         to="#0">Remove
                            </router-link>
                        </li>
                    </EditMenu>
                </div>
            </header>
            <!-- Body -->
            <div class="text-sm text-slate-800 space-y-2 mb-5">
                <p>Designing an Earth-positive future, together 🌿</p>
                <div class="relative !my-4">
                    <img class="block w-full" src="../../images/feed-image-01.jpg" width="590" height="332"
                         alt="Feed 01"/>
                    <div class="absolute left-0 right-0 bottom-0 p-4 bg-black bg-opacity-25 backdrop-blur-md">
                        <div class="flex items-center justify-between">
                            <div class="text-xs font-medium text-slate-300">togethernature.com</div>
                            <a class="text-xs font-medium text-indigo-400 hover:text-indigo-300" href="#0">Learn More -&gt;</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="flex items-center space-x-4">
                <!-- Like button -->
                <button class="flex items-center text-slate-400 hover:text-indigo-500"
                        @click.stop="react_post(post.id)">
                    <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                        <path d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182
                        7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5
                        2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z"/>
                    </svg>
                    <div class="text-sm text-slate-500">4</div>
                </button>
                <!-- Share button -->
                <button class="flex items-center text-slate-400 hover:text-indigo-500">
                    <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                        <path
                            d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z"/>
                    </svg>
                    <div class="text-sm text-slate-500">44</div>
                </button>
                <!-- Replies button -->
                <button class="flex items-center text-slate-400 hover:text-indigo-500">
                    <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                        <path
                            d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"/>
                    </svg>
                    <div class="text-sm text-slate-500">7</div>
                </button>
            </footer>
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
</template>

<script>
    import EditMenu from '../../components/DropdownEditMenu.vue'
    import {mapGetters, useStore} from 'vuex'
    import PostThreadModal from "../../components/landing/PostThreadModal";
    import ThreadPage from "../../pages/component/ThreadPage";
    import {computed} from 'vue'
    import 'ant-design-vue/dist/antd.css';

    import {getCurrentInstance} from 'vue'
    import community from "../../store/community";

    const contentStyle = {
        height: '160px',
        color: '#fff',
        lineHeight: '160px',
        textAlign: 'center',
        background: '#364d79',
    };


    export default {
        name: 'FeedPosts',
        components: {
            EditMenu,
            PostThreadModal,
            ThreadPage,

        },

        data() {
            let category_id = getCurrentInstance().vnode.key;

            return {
                loading: true,
                posts: computed(() => this.$store.state.post.posts),
                user: computed(() => this.$store.state.auth.user),
                postThreadModalOpen: false,
                active_post_id: -1,
                active_post: null,
                category_id
            }
        },

        computed: {
            community() {
                return this.$store.state.community.active_community;
            },
        },
        mounted() {
            this.loadPosts()
        },
        watch: {
            $route(to, from) {
                // if(this.community){
                //     this.loadPosts()
                // }
            }
        },

        methods: {


            loadPosts() {

                if (this.category_id == null) {
                    // alert('Null Found')
                } else {
                    this.$store.dispatch('post/loadPosts', {
                        category_id: this.category_id,
                        community_id: this.community.id
                    })
                }

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

            bookmark(post_id) {
                if (this.$store.state.auth.authenticated) {
                    this.event.emit('closePop', 1)
                    this.$store.dispatch('post/bookmark_post', post_id);
                } else {
                    this.$store.state.auth.Login_modal = true;
                }
            },
            removePost(post_id) {
                this.event.emit('closePop', 1)

                if (confirm('Are You Sure ? This Post Will Remove')) {
                    this.event.emit('closePop', 1)
                    this.$store.dispatch('post/remove_post', post_id).then(({data}) => {
                    });
                }

            },
        }

    }
</script>

<style scoped>
    /* For demo */
    .ant-carousel {
        max-width: 700px;
    }

    .slick-slide {
        height: 500px;
    }

    .ant-carousel :deep(.slick-slide) {
        text-align: center;
        width: 100%;
        background: #364d79;
        overflow: hidden;
    }

    .ant-carousel :deep(.slick-slide h3) {
        color: #ff1512;
    }
</style>
