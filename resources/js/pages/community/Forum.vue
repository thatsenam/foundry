<template>
    <div class="flex h-screen overflow-hidden theme_background">

        <!-- Sidebar -->
        <Sidebar :sidebarOpen="sidebarOpen" @close-sidebar="sidebarOpen = false"/>

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- Site header -->
            <Header :sidebarOpen="sidebarOpen" @toggle-sidebar="sidebarOpen = !sidebarOpen"/>

            <main>
                <div class="px-4 sm:px-6 lg:px-8 py-8 md:py-0 w-full max-w-9xl mx-auto">
                    <div class="xl:flex">
                        <!-- Left + Middle content -->
                        <div class="md:flex flex-1">
                            <!-- Left content -->
                            <ForumLeftContent/>


                            <router-view :key="$route.fullPath"></router-view>
                        </div>
                        <!-- Right content -->

                    </div>

                </div>
            </main>

        </div>

    </div>
</template>

<script>
import {ref} from 'vue'
import Sidebar from '../../partials/Sidebar.vue'
import Header from '../../partials/Header.vue'
import CreatePost from '../../partials/CreatePost.vue'
import ForumLeftContent from '../../partials/community/ForumLeftContent.vue'
import ForumEntries from '../../partials/community/ForumEntries.vue'
import ForumRightContent from '../../partials/community/ForumRightContent.vue'

export default {
    name: 'Forum',
    components: {
        Sidebar,
        Header,
        CreatePost,
        ForumLeftContent,
        ForumEntries,
        ForumRightContent,
    },
    setup() {

        const sidebarOpen = ref(false)

        return {
            sidebarOpen,
        }
    },

    posts() {

        return this.$store.state.post.posts;
    },
    data() {
        return {}
    },
    methods: {
        getPreviousPost() {
            alert('pppp')
        },
        getNextPost() {

            this.$store.dispatch('post/getMorePosts', this.page).then(response => {
                this.page.current_page = response.current_page + 1;
                if (response.next_page_url == null) {
                    this.hasMore = false
                }
                console.log('getNextPost', response)
            })
        }

    },

}
</script>

<style>
.theme_background {
    background-color: #F1F5F9;
}
</style>
