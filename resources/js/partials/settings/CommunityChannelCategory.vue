<template>
    <div class="CommunityMember">

        <div class="overflow-x-auto">
            <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1">Categories and Channels</h3>
            <div class="text-sm">It’s easy to add Category or Channel or make modifications.</div>
            <div class="category-section">
                <div class="py-3">
                    <div class="text-slate-800 font-semibold">Category Changes</div>
                    <div class="text-sm">Categories are added by the admin or moderator to help divide community into
                        specific categories. You can change the name or add a new Category below.
                    </div>
                </div>

                <!-- Add Category button -->
                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white" @click.stop="onCreateNewCategory">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"/>
                    </svg>
                    <span class="ml-2">Add a New Category</span>
                </button>

                <div
                    class="flex flex-nowrap overflow-x-scroll no-scrollbar md:block md:overflow-auto px-4 md:space-y-3 -mx-4 py-3">

                    <ul class="flex flex-nowrap md:block mr-3 md:mr-0">
                        <li v-for="category in categories"
                            class="mr-0.5 mt-2 md:mr-0 md:mb-0.5 border flex items-center justify-between"
                            :key="category.name">
                            <span @click.stop="onCategoryEdit(category.id)"
                                  class="cursor-pointer flex hover:text-indigo-500 font-bold items-center px-2.5 py-2 rounded whitespace-nowrap text-slate-500  "
                                  href="#0">
                                <svg class="w-4 h-4 shrink-0 fill-current text-slate-500 mr-2" viewBox="0 0 16 16">
                                    <path
                                        d="M5 9h11v2H5V9zM0 9h3v2H0V9zm5 4h6v2H5v-2zm-5 0h3v2H0v-2zm5-8h7v2H5V5zM0 5h3v2H0V5zm5-4h11v2H5V1zM0 1h3v2H0V1z"/>
                                </svg>
                                <span class="text-sm font-medium">{{ category.name }}</span>
                            </span>

                            <span class="flex items-center gap-4">
                                   <button @click.stop="onCategoryEdit(category.id)"
                                           class="btn border-slate-200 hover:bg-slate-200  hover:border-indigo-300 text-slate-600">
                                          <svg class="w-4 h-4 fill-current text-slate-500 shrink-0" viewBox="0 0 16 16">
                                              <path
                                                  d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z"/>
                                          </svg>
                                          <span class="ml-2">Edit</span>
                                     </button>
                                 <button @click.stop="onCategoryDelete(category.id)"
                                         class="btn border-slate-200 hover:border-slate-300 hover:bg-rose-500 text-rose-500">
                                      <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 16 16">
                                        <path
                                            d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z"/>
                                      </svg>
                                        <span class="ml-2">Delete</span>
                                    </button>
                            </span>
                        </li>
                        <li v-if="categories.length == 0" class="mr-0.5 mt-2 md:mr-0 md:mb-0.5 border"> No category yet.</li>

                    </ul>


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

                <div class="channel-section">
                    <div class="py-3">
                        <div class="text-slate-800 font-semibold">Channel Changes</div>
                        <div class="text-sm">
                            Categories are added by any member to help divide community into specific channels. You can
                            change
                            the name or add. Use the Toggle to only allow admins or moderators to add Channels
                        </div>
                    </div>

                    <div class="channel-content flex gap-4 items-center ">
                        <!-- Add Channel button -->
                        <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white"
                                @click.stop="onCreateNewChannel">
                            <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                                <path
                                    d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"/>
                            </svg>
                            <span class="hidden xs:block ml-2">Add a New Channel</span>
                        </button>
                        <div class="flex items-center ">
                            <div class="form-switch">
                                <input type="checkbox" id="toggle" class="sr-only" v-model="sync" true-value="On"
                                       false-value="Off"/>
                                <label class="bg-slate-400" for="toggle">
                                    <span class="bg-white shadow-sm" aria-hidden="true"></span>
                                    <span class="sr-only">Enable smart sync</span>
                                </label>
                            </div>
                            <div class="text-sm text-slate-400 italic ml-2">If On, Only Admin or Moderators can add a
                                Channel
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex flex-nowrap overflow-x-scroll no-scrollbar md:block md:overflow-auto px-4 md:space-y-3 -mx-4 py-3">

                        <ul class="flex flex-nowrap md:block mr-3 md:mr-0">
                            <li v-for="channel in channels"
                                class="mr-0.5 mt-2 md:mr-0 md:mb-0.5 border flex items-center justify-between"
                                :key="channel.name">
                            <span @click.stop="onChannelEdit(channel.id)"
                                  class="cursor-pointer flex hover:text-indigo-500 font-bold items-center px-2.5 py-2 rounded whitespace-nowrap text-slate-500  "
                                  href="#0">
                                <svg class="w-4 h-4 shrink-0 fill-current text-slate-500 mr-2" viewBox="0 0 16 16">
                                    <path
                                        d="M5 9h11v2H5V9zM0 9h3v2H0V9zm5 4h6v2H5v-2zm-5 0h3v2H0v-2zm5-8h7v2H5V5zM0 5h3v2H0V5zm5-4h11v2H5V1zM0 1h3v2H0V1z"/>
                                </svg>
                                <span class="text-sm font-medium">{{ channel.name }}</span>
                            </span>

                                <span class="flex items-center gap-4">
                                   <button @click.stop="onChannelEdit(channel.id)"
                                           class="btn border-slate-200 hover:bg-slate-200  hover:border-indigo-300 text-slate-600">
                                          <svg class="w-4 h-4 fill-current text-slate-500 shrink-0" viewBox="0 0 16 16">
                                              <path
                                                  d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z"/>
                                          </svg>
                                          <span class="ml-2">Edit</span>
                                     </button>
                                 <button @click.stop="onChannelDelete(channel.id)"
                                         class="btn border-slate-200 hover:border-slate-300 hover:bg-rose-500 text-rose-500">
                                      <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 16 16">
                                        <path
                                            d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z"/>
                                      </svg>
                                        <span class="ml-2">Delete</span>
                                    </button>
                            </span>
                            </li>
                            <li v-if="channels.length == 0" class="mr-0.5 mt-2 md:mr-0 md:mb-0.5 border"> No channels yet.</li>
                        </ul>




                    </div>
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
            </div>
        </div>

    </div>
</template>

<script>


    import ModalBasic from "../../components/ModalBasic";
    import {getCurrentInstance} from 'vue'
    import {notification} from 'ant-design-vue';

    export default {
        name: 'CommunityChannelCategory',
        components: {
            ModalBasic
        },
        data() {
            let community_id = getCurrentInstance().vnode.key;
            return {
                community_id,
                tempCategory: {
                    id: undefined,
                    name: '',
                    community_id: community_id
                },
                tempChannel: {
                    id: undefined,
                    name: '',
                    community_id: community_id
                },
                categories: [],
                channels: [],
                categoryModalOpen: false,
                channelModalOpen: false,
            }
        },
        methods: {
            onCreateNewCategory() {
                this.categoryModalOpen = true;
            },
            onCategoryFormSubmit() {

                if (this.tempCategory.id != undefined) {
                    this.$store.dispatch('post/updateCategory', this.tempCategory)
                        .then((response) => {
                            this.categoryModalOpen = false;
                            let updatedCategory = this.categories.find(c => c.id == response.data.id);
                            updatedCategory.name = response.data.name;
                            this.tempCategory = {id: undefined, name: '', community_id: this.community_id};
                            this.toast('Category updated.')
                        })
                } else {
                    this.$store.dispatch('post/addCategory', this.tempCategory)
                        .then((response) => {
                            this.categories.push(response.data);
                            this.tempCategory = {id: undefined, name: '', community_id: this.community_id};
                            this.categoryModalOpen = false;
                            this.toast('New category added.')

                        })
                }
            },
            onCategoryEdit(id) {
                this.categoryModalOpen = true;
                this.tempCategory = {...this.categories.find(c => c.id == id)}


            },
            onCategoryDelete(id) {
                if (confirm('Are you sure?')) {
                    this.$store.dispatch('post/deleteCategory', id)
                        .then((response) => {
                            this.categories = this.categories.filter(c => c.id != id)
                            this.toast('Category deleted.')

                        })
                }
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
            onChannelEdit(id) {
                this.channelModalOpen = true;
                this.tempChannel = {...this.channels.find(c => c.id == id)}


            },
            onChannelDelete(id) {
                if (confirm('Are you sure?')) {
                    this.$store.dispatch('post/deleteChannel', id)
                        .then((response) => {
                            this.channels = this.channels.filter(c => c.id != id)
                            this.toast('Channel deleted.')
                        })
                }
            },
            toast(msg) {
                notification['success']({
                    message: msg
                });
            }
        },
        mounted() {
            this.$store.dispatch('post/loadCategories', this.community_id)
                .then((response) => {
                    this.categories = response.data;
                })
            this.$store.dispatch('post/loadChannels', this.community_id)
                .then((response) => {
                    this.channels = response.data;
                })

        }
    };
</script>
