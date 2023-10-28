<template>
    <div class="flex w-full">
        <div class="flex-1 md:ml-8 xl:mx-4 2xl:mx-8 " style="min-width: 20%">
            <div class="md:py-8">

                <!-- Blocks -->
                <div class="space-y-4">

                    <!-- Post Block -->
                    <form action="" v-on:submit.prevent="CreatePost">
                        <div class="bg-white shadow-md rounded border border-slate-200 p-5">
                            <div class="flex items-center space-x-3 mb-5">
                                <img class="rounded-full shrink-0" v-if="is_login" :src="user.avatar_url"
                                     width="40" height="40" alt="User 02"
                                     style="width: 40px;height:40px"/>
                                <div class="grow">
                                    <label for="status-input" class="sr-only">What's happening,
                                        Mark? </label>
                                    <div>
                                        <input v-model="post.body" id="status-input" class="form-input w-full bg-slate-100 border-transparent focus:bg-white focus:border-slate-300
                                                                placeholder-slate-500" type="text"
                                               placeholder="What's happening, Mark?">
                                        <div class="flex gap-4 mt-4">

                                            <div v-for="(file,index) in preview_files"
                                                 class="relative">
                                                <img :src="file" class="h-16 w-16" alt=""
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
                                    </div>

                                </div>

                            </div>

                            <div class="flex justify-between items-center">
                                <div class="grow flex space-x-5">
                                    <button type="button"
                                            onclick="document.getElementById('pickFileInput').click()"
                                            class="inline-flex items-center text-sm font-medium text-slate-600 hover:text-slate-700">
                                        <svg class="w-4 h-4 fill-indigo-400 mr-2"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0 0h2v16H0V0Zm14 0h2v16h-2V0Zm-3 7H5c-.6 0-1-.4-1-1V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1v5c0 .6-.4 1-1 1ZM6 5h4V2H6v3Zm5 11H5c-.6 0-1-.4-1-1v-5c0-.6.4-1 1-1h6c.6 0 1 .4 1 1v5c0 .6-.4 1-1 1Zm-5-2h4v-3H6v3Z"/>
                                        </svg>
                                        <input type="file" hidden id="pickFileInput"
                                               @change="onFilePick" multiple>
                                        <span>Media</span>
                                    </button>
                                    <button type="button"
                                            class="inline-flex hidden items-center text-sm font-medium text-slate-600 hover:text-slate-700">
                                        <svg class="w-4 h-4 fill-indigo-400 mr-2"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.974 14c-.3 0-.7-.2-.9-.5l-2.2-3.7-2.1 2.8c-.3.4-1 .5-1.4.2-.4-.3-.5-1-.2-1.4l3-4c.2-.3.5-.4.9-.4.3 0 .6.2.8.5l2 3.3 3.3-8.1c0-.4.4-.7.8-.7s.8.2.9.6l4 8c.2.5 0 1.1-.4 1.3-.5.2-1.1 0-1.3-.4l-3-6-3.2 7.9c-.2.4-.6.6-1 .6Z"/>
                                        </svg>
                                        <span>GIF</span>
                                    </button>
                                    <button
                                        class="inline-flex items-center text-sm font-medium text-slate-600 hover:text-slate-700">
                                        <svg class="w-4 h-4 fill-indigo-400 mr-2"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.793 10.002a.5.5 0 0 1 .353.853l-1.792 1.793a.5.5 0 0 1-.708 0l-1.792-1.793a.5.5 0 0 1 .353-.853h3.586Zm5.014-4.63c1.178 2.497 1.833 5.647.258 7.928-1.238 1.793-3.615 2.702-7.065 2.702S2.173 15.092.935 13.3c-1.575-2.28-.92-5.431.258-7.927A2.962 2.962 0 0 1 0 3.002a3 3 0 0 1 3-3c.787 0 1.496.309 2.029.806a5.866 5.866 0 0 1 5.942 0A2.96 2.96 0 0 1 13 .002a3 3 0 0 1 3 3c0 .974-.472 1.827-1.193 2.37Zm-1.387 6.79c1.05-1.522.417-3.835-.055-5.078C12.915 5.89 11.192 2.002 8 2.002s-4.914 3.89-5.365 5.082c-.472 1.243-1.106 3.556-.055 5.079.843 1.22 2.666 1.839 5.42 1.839s4.577-.62 5.42-1.84ZM6.67 6.62c.113.443.102.68-.433 1.442-.535.761-1.06 1.297-1.658 1.297-.597 0-1.08-.772-1.07-1.483.01-.71.916-2.306 1.997-2.306.784 0 1.05.607 1.163 1.05Zm3.824-1.05c1.08 0 1.987 1.596 1.997 2.306.01.71-.473 1.483-1.07 1.483-.598 0-1.123-.536-1.658-1.297-.535-.762-.546-1-.432-1.442.113-.443.38-1.05 1.163-1.05Z"/>
                                        </svg>
                                        <span>Emoji</span>
                                    </button>
                                </div>

                                <div>
                                    <select v-model="post.category_id" class="form-select mr-4">
                                        <option disabled value="">-- Category --</option>
                                        <option v-for="category in categories" :value="category.id">{{ category.name
                                            }}
                                        </option>
                                    </select>
                                    <button type="submit"
                                            class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">
                                        Send -&gt;
                                    </button>
                                </div>
                            </div>


                        </div>

                    </form>
                    <!-- Posts -->
                    <div v-if="category_id">
                        <span class="text-lg text-slate-500 flex items-center justify-between">
                            <div class="flex items-center">
                                 <span>Post showing for category</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="d-inline inline-block fill-current"
                                 width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                  <line x1="5" y1="12" x2="19" y2="12"/>
                                  <line x1="15" y1="16" x2="19" y2="12"/>
                                  <line x1="15" y1="8" x2="19" y2="12"/>
                                </svg>  <span class=" text-indigo-500 font-bold">{{ category.name }}</span>
                            </div>
                            <div>
                                  <router-link exact :to="{name:'CommunityPost'}" class="flex text-rose-300">

                                      <svg xmlns="http://www.w3.org/2000/svg"
                                           class="icon icon-tabler icon-tabler-clear-all mr-4" width="24" height="24"
                                           viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                           stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <path d="M8 6h12"/>
                                          <path d="M6 12h12"/>
                                          <path d="M4 18h12"/>
                                        </svg>
                                      CLEAR FILTER</router-link>
                            </div>

                        </span>

                    </div>
                    <FeedPosts :key="category_id"/>

                </div>

            </div>
        </div>

        <div>
            <FeedRightContent/>
        </div>
    </div>
</template>

<script>


    import {ref} from "vue";
    import {notification} from "ant-design-vue";
    import Sidebar from "../../partials/Sidebar";
    import Header from "../../partials/Header";
    import FeedLeftContent from "../../partials/community/FeedLeftContent";
    import FeedPosts from "../../partials/community/FeedPosts";
    import FeedRightContent from "../../partials/community/FeedRightContent";


    export default {
        name: 'CommunityPost',
        components: {
            Sidebar,
            Header,
            FeedLeftContent,
            FeedPosts,
            FeedRightContent,
        },
        data() {
            return {
                post: {
                    name: "",
                    body: "",
                    medai: "",
                    community_id: "",
                    user_id: "",
                    category_id: this.$route.query.category || "",
                    files: []
                },
                preview_files: [],
                category_id: this.$route.query.category || ""
            }
        },
        mounted() {

            this.community_id = this.$route.params.id;

            console.log('Mounted CommunityPost', this.community_id)

            let ac = this.$store.state.community.browse_communities_list.find(c => c.slug == this.community_id);
            this.post.community_id = ac.id;
            this.category_id = this.$route.query.category_id;

            this.$store.commit('community/SET_ACTIVE_COMMUNITY', this.post.community_id)
        },

        setup() {

            const sidebarOpen = ref(false)

            return {
                sidebarOpen,
            }
        },

        computed: {
            user() {
                return this.$store.state.auth.user;
            },

            is_login() {
                return this.$store.state.auth.authenticated
            },

            categories() {
                return this.$store.state.post.categories;
            },
            category() {
                return this.categories.find((c) => c.id == this.category_id)
            }
        },

        watch: {
            // $route(to, from) {
            //     this.community_id = this.$route.params.id;
            //
            //
            //     let ac = this.$store.state.community.browse_communities_list.find(c => c.slug == this.community_id);
            //     // if (!ac) return
            //
            //     this.post.community_id = ac.id;
            //
            //     this.category_id = this.$route.query.category_id;
            //
            //
            //     this.$store.commit('community/SET_ACTIVE_COMMUNITY', this.post.community_id)
            // }
        },


        methods: {
            CreatePost() {

                if (this.$store.state.auth.authenticated) {
                    this.post.user_id = this.user.id;
                    var form_data = new FormData();
                    for (let key in this.post) {
                        form_data.append(key, this.post[key]);
                    }

                    for (let i = 0; i < this.post.files.length; i++) {
                        form_data.append('media[]', this.post.files[i])
                    }

                    this.$store.dispatch('post/addPost', form_data).then((response) => {
                        notification['success']({
                            message: 'Post Created!!',
                            description: "You have created a new Post."
                        });
                        this.post.body = "";
                        this.post.files = [];
                        this.preview_files = [];
                    });
                } else {
                    this.$store.state.auth.Login_modal = true;
                }

            },
            removeFile(index) {
                this.post.files.splice(index, 1)
                this.preview_files.splice(index, 1)
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
                        this.post.files.push(input.files[index]);
                        reader.readAsDataURL(input.files[index]);
                        index++;
                    }
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
