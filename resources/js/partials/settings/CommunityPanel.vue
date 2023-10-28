<template>
    <div class="grow">

        <!-- Panel body -->
        <div class="p-6 space-y-6" v-if="community != null">
            <div>
                <h2 class="text-2xl text-slate-800 font-bold mb-4">{{ community.name }} Settings</h2>
                <!-- With Underline -->
                <div>

                    <a-tabs v-model:activeKey="activeKey" :key="community_id">
                        <a-tab-pane key="1" tab="General Settings">

                            <section style="min-height: 400px">
                                <!-- Picture -->
                                <section>
                                    <div class="flex items-center justify-center ">
                                        <div class="flex items-center justify-between">
                                            <div class="mr-4">
                                                <img class="w-20 h-20 rounded-full" :src="avatar_preview"
                                                     width="80" height="80" alt="User upload"/>
                                            </div>
                                            <button onclick="document.getElementById('pickAvatarImageButton').click()"
                                                    class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Pick
                                                Avatar
                                            </button>

                                            <input id="pickAvatarImageButton" hidden type="file" accept="image/*"
                                                   @change="previewImage"
                                                   class="form-control-file">
                                        </div>
                                    </div>

                                </section>
                                <section>

                                    <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                                        <div class="sm:w-1/3">
                                            <label class="block text-sm font-medium mb-1">Community
                                                Name</label>
                                            <input v-model="community.name" class="form-input w-full" type="text"/>
                                        </div>

                                    </div>
                                    <div class="">
                                        <label class="block text-sm font-medium mb-1">Description</label>
                                        <textarea v-model="community.description"
                                                  class="form-textarea w-full h-16 focus:border-slate-300"
                                                  type="text"/>
                                    </div>
                                </section>

                                <div class="flex align-item-center gap-5">
                                    <section class="mr-4">
                                        <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1 mt-4">Community
                                            Style</h3>

                                        <div class="flex flex-wrap items-center -m-3 mt-4">
                                            <div class=" m-3"><!-- Start -->
                                                <label class="flex items-center">
                                                    <input type="radio" name="radio-buttons" v-model="community.style"
                                                           value="slack" class="form-radio h-10 w-10"><span
                                                    class="text-xl text-slate-800 italic ml-2">Chat Style</span>
                                                </label><!-- End --></div>
                                            <div class="m-3"><!-- Start -->
                                                <label class="flex items-center"><input
                                                    type="radio" name="radio-buttons" v-model="community.style"
                                                    value="facebook" class="form-radio h-10 w-10"><span
                                                    class="text-xl text-slate-800 italic ml-2">Feed Style</span>
                                                </label><!-- End -->
                                            </div>
                                            <div class="m-3"><!-- Start -->
                                                <label class="flex items-center">
                                                    <input
                                                        type="radio" name="radio-buttons" v-model="community.style"
                                                        value="reddit" class="form-radio h-10 w-10"><span
                                                    class="text-xl text-slate-800 italic ml-2">Forum Style</span>
                                                </label><!-- End -->
                                            </div>

                                        </div>
                                    </section>
                                    <section class="ml-4">
                                        <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1 mt-4">Brand
                                            Color</h3>

                                        <div class="flex flex-wrap items-center -m-3 mt-1 ">
                                            <div class="border flex gap-6 items-center m-3 p-1.5 rounded"><!-- Start -->
                                                <span class="text-xl mr-2 text-slate-800">Choose HEX</span>
                                                <label class="flex items-center">
                                                    <input type="color" name="radio-buttons" v-model="community.color"
                                                           class=" h-10 w-10">
                                                </label><!-- End --></div>


                                        </div>
                                    </section>
                                </div>

                            </section>
                            <footer>
                                <div class="flex flex-col px-6 py-5 border-t border-slate-200">
                                    <div class="flex self-end">
                                        <button class="btn border-slate-200 hover:border-slate-300 text-slate-600">
                                            Cancel
                                        </button>
                                        <button @click="updateCommunity"
                                                class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-3">Save
                                            Changes
                                        </button>
                                    </div>
                                </div>
                            </footer>


                        </a-tab-pane>
                        <a-tab-pane key="2" tab="Members" force-render>
                            <CommunityMember/>
                        </a-tab-pane>
                        <a-tab-pane key="3" tab="Channels & Categories">
                            <CommunityChannelCategory :key="community_id"/>
                        </a-tab-pane>
                        <a-tab-pane key="4" tab="Embed Link">
                            <CommunityEmbed :key="community_id"/>
                        </a-tab-pane>
                    </a-tabs>
                    <!-- End -->
                </div>
            </div>

        </div>

        <!-- Panel footer -->


    </div>
</template>

<script>

import CommunityMember from "./CommunityMember";
import CommunityChannelCategory from "./CommunityChannelCategory";
import CommunityEmbed from "./CommunityEmbed";

export default {
    name: 'CommunityPanel',
    components: {CommunityEmbed, CommunityChannelCategory, CommunityMember},
    data() {
        return {
            community_id: this.$route.params.id,
            activeKey: '1',
            avatar_preview: "images/user-avatar-80.png",
            avatar_file: null,
        }
    },
    computed: {
        community() {
            let _community = this.$store.state.community.communities.find((c) => c.id == this.community_id)
            console.log(_community, 'bbbb', this.community_id)
            this.avatar_preview = _community.avatar_url;
            return {..._community};
        }
    },

    methods: {
        updateCommunity() {
            const that = this
            if (this.avatar_file != null) {
                // form_data.append('avatar', that.avatar_file);
                this.community.avatar = that.avatar_file;
            } else {
                this.community.avatar = null;
            }
            var form_data = new FormData();

            for (var key in this.community) {
                form_data.append(key, that.community[key]);
            }


            var community_id = that.community.id

            this.$store.dispatch('community/updateCommunity', {form_data, community_id}).then(response => {

            })
        },

        previewImage: function (event) {
            this.avatar_file = event.target.files[0];
            var input = event.target;
            if (input.files) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    this.avatar_preview = e.target.result;
                }
                // this.image = input.files[0];
                reader.readAsDataURL(input.files[0]);
            }
        }
    },

    watch: {
        $route(to, from) {
            this.community_id = this.$route.params.id;
            this.activeKey = '1'
        }
    },
}
</script>
<style>


</style>
