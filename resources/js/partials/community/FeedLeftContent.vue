<template>
    <div class="w-full md:w-60 min-w-60 mb-8 md:mb-0">
        <div class=" md:top-16 md:h-[calc(100vh-64px)] md:overflow-x-hidden md:overflow-y-auto no-scrollbar">
            <div class="md:py-8">

                <!-- Title -->
                <header class="mb-6 flex items-center justify-between">
                    <h3 class="text-lg md:text-2xl text-slate-800 font-bold" v-if="community">
                        {{ community.name }} ✨
                    </h3>

                    <div class="flex">


                        <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white" @click.stop="onCreateNewCategory">
                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.1983 9.17307H8.23972V12.1731H6.76041V9.17307H3.80179V7.67307H6.76041V4.67307H8.23972V7.67307H11.1983V9.17307ZM7.50007 0.923065C6.52874 0.923065 5.56692 1.11706 4.66953 1.49397C3.77214 1.87088 2.95675 2.42332 2.26992 3.11976C0.882793 4.52629 0.103516 6.43394 0.103516 8.42307C0.103516 10.4122 0.882793 12.3198 2.26992 13.7264C2.95675 14.4228 3.77214 14.9753 4.66953 15.3522C5.56692 15.7291 6.52874 15.9231 7.50007 15.9231C9.46175 15.9231 11.3431 15.1329 12.7302 13.7264C14.1173 12.3198 14.8966 10.4122 14.8966 8.42307C14.8966 7.43815 14.7053 6.46288 14.3336 5.55294C13.9619 4.643 13.4171 3.8162 12.7302 3.11976C12.0434 2.42332 11.228 1.87088 10.3306 1.49397C9.43322 1.11706 8.4714 0.923065 7.50007 0.923065Z" fill="white"/>
                            </svg>

                        </button>


                    </div>
                </header>


                <div
                    class="flex flex-nowrap overflow-x-scroll no-scrollbar md:block md:overflow-auto px-4 md:space-y-3 -mx-4">
                    <!-- Group 1 -->
                    <div>
                        <div class="text-xs font-semibold text-slate-400 uppercase mb-3 md:sr-only">Menu</div>
                        <ul class="flex flex-nowrap md:block mr-3 md:mr-0">
                            <router-link exact :to="{name:'CommunityPost'}" key="home"
                                         v-slot="{ href, navigate, isExactActive,route }">
                                <li class="mr-0.5 md:mr-0 md:mb-0.5 text-slate-600"
                                    :class="$route.fullPath == route.fullPath  && 'bg-white text-indigo-500'">
                                <span class="flex items-center px-2.5 py-2 rounded whitespace-nowrap "
                                      href="#0">
                                    <svg class="w-4 h-4 shrink-0 fill-current  mr-2" viewBox="0 0 16 16">
                                        <path
                                            d="M10 16h4c.6 0 1-.4 1-.998V6.016c0-.3-.1-.6-.4-.8L8.6.226c-.4-.3-.9-.3-1.3 0l-6 4.992c-.2.2-.3.5-.3.799v8.986C1 15.6 1.4 16 2 16h4c.6 0 1-.4 1-.998v-2.996h2v2.996c0 .599.4.998 1 .998Zm-4-5.99c-.6 0-1 .399-1 .998v2.995H3V6.515L8 2.32l5 4.194v7.488h-2v-2.995c0-.6-.4-.999-1-.999H6Z"/>
                                    </svg>
                                    <span class="text-sm font-medium "
                                          :class="$route.fullPath == route.fullPath  && 'text-indigo-500'">Home</span>
                                </span>
                                </li>
                            </router-link>

                            <router-link :to="{name : 'communityExplore'}" v-slot="{ href, navigate, isExactActive }">
                                <li class="mr-0.5 md:mr-0 md:mb-0.5 text-slate-600 hidden"
                                    :class="isExactActive && 'bg-white text-indigo-500'">

                                        <span class="flex items-center px-2.5 py-2 rounded whitespace-nowrap dev">

                                           <svg class="w-4 h-4 shrink-0 fill-current  mr-2" viewBox="0 0 16 16">
                                        <path
                                            d="M14.14 9.585h-.002a2.5 2.5 0 0 1-2 4.547 6.91 6.91 0 0 1-6.9 1.165 4.436 4.436 0 0 0 1.343-1.682c.365.087.738.132 1.113.135a4.906 4.906 0 0 0 2.924-.971 2.5 2.5 0 0 1 3.522-3.194Zm-4.015-7.397a7.023 7.023 0 0 1 4.47 5.396 4.5 4.5 0 0 0-1.7-.334c-.15.002-.299.012-.447.03a5.027 5.027 0 0 0-2.723-3.078 2.5 2.5 0 1 1 .4-2.014ZM4.663 10.5a2.5 2.5 0 1 1-3.859-.584 6.888 6.888 0 0 1-.11-1.166c0-2.095.94-4.08 2.56-5.407.093.727.364 1.419.788 2.016A4.97 4.97 0 0 0 2.694 8.75c.003.173.015.345.037.516A2.49 2.49 0 0 1 4.663 10.5Z"/>
                                    </svg>
                                    <span class="text-sm font-medium" :class="isExactActive && 'text-indigo-500'">Explore</span>
                                </span>

                                </li>
                            </router-link>
                            <router-link :to="{name : 'following'}" v-slot="{ href, navigate, isExactActive }">
                                <li class="mr-0.5 md:mr-0 md:mb-0.5 text-slate-600"
                                    :class="isExactActive && 'bg-white text-indigo-500'">

                                        <span class="flex items-center px-2.5 py-2 rounded whitespace-nowrap dev"
                                              href="#0">

                                             <svg xmlns="http://www.w3.org/2000/svg"
                                                  class="w-4 h-4 shrink-0 fill-current  mr-2" width="24" height="24"
                                                  viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                                  stroke-linecap="round" stroke-linejoin="round">
                                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                  <circle cx="9" cy="7" r="4"/>
                                                  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                                                  <path d="M16 11h6m-3 -3v6"/>
                                                </svg>

                                    <span class="text-sm font-medium" :class="isExactActive && 'text-indigo-500'">Following</span>
                                </span>

                                </li>
                            </router-link>


                            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                                <router-link :to="{name : 'communityBookmarks'}"
                                             v-slot="{ href, navigate, isExactActive }">
                                <span class="flex items-center px-2.5 py-2 rounded whitespace-nowrap text-slate-600"
                                      href="#0" :class="isExactActive && 'bg-white text-indigo-500'">
                                    <svg class="w-4 h-4 shrink-0 fill-current  mr-2" viewBox="0 0 16 16">
                                        <path
                                            d="M10.59 7.658 8 5.5 5.41 7.658A.25.25 0 0 1 5 7.466V0h6v7.466a.25.25 0 0 1-.41.192Z"/>
                                        <path
                                            d="M14 16H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2v2H2v12h12V2h-2V0h2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2Z"/>
                                    </svg>
                                    <span class="text-sm font-medium text-slate-600">Bookmarks</span>
                                </span>
                                </router-link>
                            </li>
                            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                                <router-link :to="{name : 'communityProfile'}"
                                             v-slot="{ href, navigate, isExactActive }">
                                    <span class="flex items-center px-2.5 py-2 rounded whitespace-nowrap text-slate-600"
                                          href="#0" :class="isExactActive && 'bg-white text-indigo-500'">
                                        <svg class="w-4 h-4 shrink-0 fill-current  mr-2" viewBox="0 0 16 16">
                                            <path
                                                d="M12.311 9.527c-1.161-.393-1.85-.825-2.143-1.175A3.991 3.991 0 0012 5V4c0-2.206-1.794-4-4-4S4 1.794 4 4v1c0 1.406.732 2.639 1.832 3.352-.292.35-.981.782-2.142 1.175A3.942 3.942 0 001 13.26V16h14v-2.74c0-1.69-1.081-3.19-2.689-3.733zM6 4c0-1.103.897-2 2-2s2 .897 2 2v1c0 1.103-.897 2-2 2s-2-.897-2-2V4zm7 10H3v-.74c0-.831.534-1.569 1.33-1.838 1.845-.624 3-1.436 3.452-2.422h.436c.452.986 1.607 1.798 3.453 2.422A1.943 1.943 0 0113 13.26V14z"/>
                                        </svg>
                                        <span class="text-sm font-medium ">Profile</span>
                                    </span>
                                </router-link>
                            </li>

                            <li class="mr-0.5 md:mr-0 md:mb-0.5" v-for="category in categories" :key="category.id">
                                <router-link exact :to="{name : 'CommunityPost',query:{category:category.id}}"
                                             :key="category.id"
                                             v-slot="{ href, navigate, isExactActive,isActive,route }">
                                    <span class="flex items-center px-2.5 py-2 rounded whitespace-nowrap text-slate-600"
                                          :class="$route.fullPath == route.fullPath ? 'bg-white text-indigo-500':''">

                                        <svg class="w-4 h-4 shrink-0 fill-current  mr-2" width="18" height="14"
                                             viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path
    d="M2.99906 14C2.59497 13.9999 2.23071 13.7566 2.07608 13.3836C1.92145 13.0106 2.0069 12.5812 2.29259 12.2956L6.78919 7.80254C7.17939 7.41276 7.81191 7.41276 8.20211 7.80254L11.4926 11.0905L16.282 6.30484C16.5329 6.04529 16.9044 5.94119 17.2538 6.03257C17.6031 6.12394 17.876 6.39657 17.9674 6.74566C18.0589 7.09475 17.9547 7.46598 17.6949 7.71667L12.1991 13.2082C11.8089 13.598 11.1764 13.598 10.7862 13.2082L7.49565 9.92028L3.70552 13.7075C3.51817 13.8947 3.26405 13.9999 2.99906 14Z"
    fill="#94A3B8"/>
</svg>

                                        <span class="text-sm font-medium ">{{ category.name }}</span>
                                    </span>
                                </router-link>
                            </li>


                            <li class="mr-0.5 md:mr-0 md:mb-0.5" v-if="user && community.user_id == user.id">
                                <router-link :to="{name:'community-settings',params:{id:community.id}}"
                                             class="flex items-center px-2.5 py-2 rounded whitespace-nowrap hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon icon-tabler icon-tabler-settings shrink-0 fill-current text-slate-100 mr-1"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path
                                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                    <span class="text-sm font-medium text-slate-600 hover:text-indigo-500">Community Settings</span>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                                    <!-- Group 2 -->
                    <!-- Group body -->
                    <div class="px-5 py-4">
                        <Channels :channels="channels" @close-msgsidebar="$emit('close-msgsidebar')"/>


                        <!-- Search form -->
                        <!-- Direct messages -->
                        <DirectMessages @close-msgsidebar="$emit('close-msgsidebar')"/>

                        <!-- Channels -->
                    </div>
                </div>

            </div>
        </div>
        <ModalBasic id="category-modal" :modalOpen="categoryModalOpen"
                    @close-modal="categoryModalOpen = false"
                    :title="tempCategory.id === undefined?'Create a New Category':'Edit Category'">


            <form @submit.prevent="onCategoryFormSubmit">
                <!-- Modal content -->
                <div class="px-5 py-4">

                    <div class="space-y-3">

                        <div>
                            <label class="block text-sm font-medium mb-1" for="name">Category Name <span
                                class="text-rose-500">*</span></label>
                            <input required id="name" v-model="tempCategory.name"
                                   class="form-input w-full px-2 py-1"
                                   type="text"/>

                        </div>


                    </div>
                </div>
                <!-- Modal footer -->
                <div class="px-5 py-4 border-t border-slate-200">
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button class="btn-sm border-slate-200 hover:border-slate-300 text-slate-600"
                                @click.stop="categoryModalOpen = false">Cancel
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
    import {notification} from "ant-design-vue";
    import ModalBasic from "../../components/ModalBasic";
    import Channels from "../messages/Channels";
    import DirectMessages from "../messages/DirectMessages";

    export default {
        name: 'FeedLeftContent',
        components: {DirectMessages, Channels, ModalBasic},
        data() {
            return {
                channels: [],
                categoryModalOpen: false,
                tempCategory: {
                    id: undefined,
                    name: '',
                    community_id: undefined
                },
            }
        },
        computed: {
            user() {
                return this.$store.state.auth.user;
            },
            community() {
                return this.$store.state.community.active_community;
            },
            categories() {
                return this.$store.state.post.categories;
            },

        },
        methods: {
            onTagClick(tag) {
                notification['success']({
                    message: 'Under Development'
                });
            },
            onCategoryFormSubmit() {


                this.$store.dispatch('post/addCategory', this.tempCategory)
                    .then((response) => {
                        this.categories.push(response.data);
                        this.tempCategory = {id: undefined, name: '', community_id: this.community.id};
                        this.categoryModalOpen = false;
                        this.toast('New category added.')
                    })

            },
            onCreateNewCategory() {
                this.categoryModalOpen = true;
                this.tempCategory.community_id = this.community.id
            },
        },
        mounted() {
            this.$store.dispatch('post/loadChannels', this.community.id)
                .then((response) => {
                    this.channels = response.data;
                })
            this.$store.dispatch('post/loadCategories', this.community.id)
        }
    }
</script>

<style scoped>
    .router-link-exact-active {
        background-color: white !important;
    }
</style>
