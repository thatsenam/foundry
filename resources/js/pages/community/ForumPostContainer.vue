<template>
    <div class="flex justify-between w-full">
        <div class="flex-1 md:ml-8 xl:mx-4 2xl:mx-8">
            <CreatePost></CreatePost>
            <div class="md:py-8">


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
                                  <router-link exact :to="{name:'ForumPostContainer'}" class="flex text-rose-300">

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

                <div class="space-y-2">
                    <ForumEntries :key="category_id"/>
                </div>
            </div>
        </div>
        <FeedRightContent/>
    </div>

</template>

<script>


    import Sidebar from "../../partials/Sidebar";
    import Header from "../../partials/Header";
    import CreatePost from "../../partials/CreatePost";
    import ForumLeftContent from "../../partials/community/ForumLeftContent";
    import ForumEntries from "../../partials/community/ForumEntries";
    import ForumRightContent from "../../partials/community/ForumRightContent";
    import FeedRightContent from "../../partials/community/FeedRightContent";

    export default {
        name: 'ForumPostContainer',
        components: {
            FeedRightContent,
            Sidebar,
            Header,
            CreatePost,
            ForumLeftContent,
            ForumEntries,
            ForumRightContent,
        },
        data() {
            return {
                category_id: this.$route.query.category || ""
            }
        },
        computed: {

            categories() {
                return this.$store.state.post.categories;
            },
            category() {
                return this.categories.find((c) => c.id == this.category_id)
            }
        }

    }
</script>

<style>
    .theme_background {
        background-color: #F1F5F9 !important;
    }


</style>
