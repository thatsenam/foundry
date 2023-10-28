<template>
    <div>

        <div v-if="active_community == undefined" class="relative" style="height: 80vh">
            <div class="loading relative" v-cloak>

            </div>
        </div>
        <div v-else>
            <div v-if="active_community.style == 'reddit'">
                <forum :key="active_community.id"/>
            </div>
            <div v-if="active_community.style == 'facebook'">
                <feed :key="active_community.id"/>
            </div>
            <div v-if="active_community.style == 'slack'">
                <messages :key="active_community.id"/>
            </div>
<!--            <div v-else>-->
<!--                Community style not found {{ active_community.style }}-->
<!--            </div>-->


        </div>


    </div>

</template>

<script>


    import Inbox from "./Inbox";
    import Forum from "./community/Forum";
    import Feed from "./community/Feed";
    import Messages from "./Messages";
    import router from "../router";

    export default {
        name: 'preload',
        components: {Messages, Feed, Forum, Inbox},

        data() {
            return {
                loading: true,
                community_id: undefined,

            }
        },
        mounted() {
            this.community_id = this.$route.params.id;
            if (!this.community_id) {
                this.community_id = this.user.current_community_id;
            }
            if (!this.community_id) {
                this.redirectToCommunityPage()
            }
            this.$store.dispatch('community/loadAllCommunities')
        },
        computed: {
            active_community() {
                let ac = this.$store.state.community.browse_communities_list.find(c => c.slug == this.community_id);
                this.$store.commit('community/SET_ACTIVE_COMMUNITY_OBJ', ac);
                return ac;
            },
            user() {
                return this.$store.state.auth.user;
            }
        },
        methods: {
            redirectToCommunityPage() {
                router.push('community_browse')
            }
        },
        watch: {
            $route(to, from) {
                this.community_id = this.$route.params.id;
                if (!this.community_id) {
                    // this.redirectToCommunityPage()
                }
            }
        },

    }
</script>
