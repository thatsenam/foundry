<template>
    <div>
        <div class="space-y-4 mt-2"><!-- Post Block -->
            <form action="">
                <div class="bg-white shadow-md rounded border border-slate-200 p-5">
                    <div class="flex items-start space-x-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M0 12C0 5.37258 5.37258 0 12 0C18.6194 0.0192227 23.9808 5.38056 24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12ZM13 13H18V11H13V6H11V11H6V13H11V18H13V13Z"
                                  fill="#94A3B8"/>
                        </svg>

                        <div class="grow">
                            <label for="status-input" class="sr-only">What's happening, Mark?</label>
                            <div>
                                <input v-model="post.name" id="status-input"
                                       class="form-input w-full bg-slate-100 border-transparent focus:bg-white focus:border-slate-300 placeholder-slate-500"
                                       type="text" placeholder="title">
                                <div class="flex gap-4 mt-4">

                                </div>
                            </div>
                            <div>
                                <input
                                    v-model="post.body"
                                    class="form-input w-full bg-slate-100 border-transparent focus:bg-white focus:border-slate-300
                                            placeholder-slate-500"
                                    type="text" placeholder="Description">
                                <div class="flex gap-4 mt-4">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="grow flex space-x-5 pr-4">


                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">

                            </svg>
                            <div class="flex-1">
                                <label class="text-slate-500">Category</label> <br>
                                <select v-model="post.category_id" class="form-select mr-4">
                                    <option disabled value="">-- Category --</option>
                                    <option v-for="category in categories" :value="category.id">{{ category.name
                                        }}
                                    </option>
                                </select>
                            </div>
                            <div class="flex-1">
                                <label for="channels" class="text-slate-500">Channels</label>
                                <a-select
                                    id="channels"
                                    v-model:value="value"
                                    mode="multiple"
                                    style="width: 100%"
                                    placeholder="Tags Mode"
                                    :options="channel_options"
                                    @change="handleChannelsChange"
                                ></a-select>
                            </div>
                        </div>
                        <div class="mt-5">
                            <button type="button" @click.stop="onPostSubmit"
                                    class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap"> Send
                                -&gt;
                            </button>
                        </div>
                    </div>
                </div>
            </form><!-- Posts --><!-- Post 1 -->
        </div>
    </div>
</template>

<script>


    import {notification} from "ant-design-vue";
    import post from "../store/post";

    export default {
        name: 'create Post',
        components: {},

        data() {
            return {

                post: {
                    name: '',
                    body: '',
                    categories: [],
                    channels: [],
                    category_id: this.$route.query.category || "",                },

                category_options: [],
                channel_options: []
            }
        },
        methods: {
            handleCategoryChange(e) {
                this.post.categories = e;
            },
            handleChannelsChange(e) {
                this.post.channels = e;
            },
            onPostSubmit() {

                if (this.$store.state.auth.authenticated) {
                    var form_data = new FormData();

                    for (let key in this.post) {
                        form_data.append(key, this.post[key]);
                    }
                    this.$store.dispatch('post/addPost', form_data).then((response) => {
                        notification['success']({
                            message: 'Post Created!!',
                            description: "You have created a new Post."
                        });
                        this.post.body = "";
                        this.post.name = "";
                        this.post.categories = [];
                        this.post.channels = [];
                    });
                } else {
                    this.$store.state.auth.Login_modal = true;
                }


            }
        },
        computed: {

            user() {
                return this.$store.state.auth.user;
            },
            community() {
                return this.$store.state.community.active_community;
            }, categories() {
                return this.$store.state.post.categories;
            },
            category() {
                return this.categories.find((c) => c.id == this.category_id)
            }
        },

        mounted() {
            this.post.community_id = this.$store.state.community.active_community.id;

            this.$store.dispatch('post/loadChannels', this.community.id).then(response => {
                this.channel_options = response.data.map(c => {
                    return {value: c.name, id: c.id}
                });

                // this.channel_options = ['Sisir','Enam']
            })
            this.$store.dispatch('post/loadCategories', this.community.id).then(response => {
                this.category_options = response.data.map(c => {
                    return {value: c.name, id: c.id}
                });

            })
        }
    }
</script>

<style>
    .ant-select-selection-item {
        background-color: #6366f1 !important;
        color: white !important;
        border-radius: 4px;

    }

    .ant-select-selection-item-remove {
        color: white !important;
    }
</style>
