<template>
    <div>
        <ProfileBody :profileSidebarOpen="profileSidebarOpen" @toggle-profilesidebar="profileSidebarOpen = !profileSidebarOpen" />
    </div>
</template>

<script>

import Sidebar from '../../partials/Sidebar.vue'
import Header from '../../partials/Header.vue'
import {ref} from "vue";
import ProfileBody from "../../partials/community/ProfileBody";


export default {
    name: 'communityNotifications',

    components: {
        Sidebar,
        Header,
        ProfileBody,
    },
    setup() {

        const sidebarOpen = ref(false)
        const profileSidebarOpen = ref(false)

        return {
            sidebarOpen,
            profileSidebarOpen,
        }
    }
}
</script>

<style>
    .theme_background {
        background-color: #F1F5F9 !important;
    }
</style>
