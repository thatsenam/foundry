<template>
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <Sidebar :sidebarOpen="sidebarOpen" @close-sidebar="sidebarOpen = false"/>

        <!-- Content area -->
        <div id="contentArea" @scroll.native="handleScroll"
             ref="contentArea" class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- Site header -->
            <Header :sidebarOpen="sidebarOpen" @toggle-sidebar="sidebarOpen = !sidebarOpen"/>

            <main>
                <div class="relative flex">

                    <!-- Messages sidebar -->
                    <MessagesSidebar :msgSidebarOpen="msgSidebarOpen" @close-msgsidebar="msgSidebarOpen = false"/>
                    <router-view
                        ref="messageBody"
                        v-if="$route.params.chat_id"
                        :key="$route.params.chat_id"
                        @addmessage="scroll"
                        @onAboutModalOpen="onAboutModalOpen"
                        @onReplyModalOpen="onReplyModalOpen">
                    </router-view>


                    <MessagesDashboard v-else></MessagesDashboard>


                </div>
            </main>

        </div>


        <UserProfileModal id="postThread-modal" :modalOpen="postThreadModalOpen"
                          @close-modal="postThreadModalOpen = false"
                          title="Thread">

            <UserProfile v-if="user" :user="user" :key="user_id"></UserProfile>
            <!-- Modal footer -->
            <div class="px-5  border-t border-slate-200">
                <div class="flex flex-wrap justify-end space-x-2">
                    <button class="btn-sm border-slate-200 hover:border-slate-300 text-slate-600"
                            @click.stop="postThreadModalOpen = false">Cancel
                    </button>

                </div>
            </div>
        </UserProfileModal>

        <PostThreadModal id="postThread-modal" :modalOpen="replyThreadModalOpen"
                         @close-modal="replyThreadModalOpen = false"
                         title="Message Thread">
            <!-- Modal content -->

            <ReplyThreadContent :key="message_id" :message="message"/>

            <!-- Modal footer -->
            <div class="px-5 py-4 border-t border-slate-200">
                <div class="flex flex-wrap justify-end space-x-2">
                    <button class="btn-sm border-slate-200 hover:border-slate-300 text-slate-600"
                            @click.stop="replyThreadModalOpen = false">Cancel
                    </button>

                </div>
            </div>
        </PostThreadModal>


    </div>
</template>

<script>
    import {useStore} from 'vuex'
    import {useRoute} from 'vue-router'
    import {ref, onMounted, watch, computed} from 'vue'
    import Sidebar from '../partials/Sidebar.vue'
    import Header from '../partials/Header.vue'
    import MessagesSidebar from '../partials/messages/MessagesSidebar.vue'
    import MessagesHeader from '../partials/messages/MessagesHeader.vue'
    import MessagesBody from '../partials/messages/MessagesBody.vue'
    import MessagesFooter from '../partials/messages/MessagesFooter.vue'
    import MessagesDashboard from '../partials/messages/MessagesDashboard.vue'

    import UserProfileModal from "../components/landing/UserProfileModal";
    import ReplyThreadContent from "../partials/messages/ReplyThreadContent";
    import UserProfile from "../partials/messages/UserProfile";
    import PostThreadModal from "../components/landing/PostThreadModal";


    export default {
        name: 'Messages',
        components: {
            PostThreadModal,
            ReplyThreadContent,
            Sidebar,
            Header,
            MessagesSidebar,
            MessagesHeader,
            MessagesBody,
            MessagesDashboard,
            UserProfileModal,
            UserProfile

        },
        setup() {
            const store = useStore()
            const route = useRoute()
            const sidebarOpen = ref(false)
            const msgSidebarOpen = ref(true)
            const contentArea = ref(null)

            const handleScroll = () => {

                // alert('handleScroll')

                contentArea.value.scrollTop = 99999999
            }

            onMounted(() => {
                handleScroll()
            })

            watch(msgSidebarOpen, () => {
                handleScroll()
            })
            return {
                sidebarOpen,
                msgSidebarOpen,
                handleScroll,
                contentArea,
                activeChatId: computed(() => store.state.chat.activeChatId),
                route,
            }
        },

        data() {
            return {
                chat_id: this.$route.params.chat_id,
                postThreadModalOpen: false,
                replyThreadModalOpen: false,
                message_id: null,
                user: null,
                user_id: null,
                fetching: false
            }
        },

        methods: {
            scroll() {
                var container = this.$el.querySelector("#contentArea");
                container.scrollTop = container.scrollHeight + 99999999999;
            },
            onAboutModalOpen(user) {
                this.user = user;
                this.user_id = user.id;
                this.postThreadModalOpen = true;
            },
            onReplyModalOpen(message) {
                this.replyThreadModalOpen = true;
                this.message_id = message.id;
                this.message = message;
            },
            handleScroll(event) {
                if (event.target.scrollTop === 0) {
                    if (!this.fetching){
                        this.fetching = true
                        this.event.emit("loadMessages");
                        console.log('LoadMessages Event Called')
                        setTimeout(() => {
                            this.fetching = false
                        }, 500)
                    }
                }
                console.log('onscroll', event.target.scrollTop, event);
            },
        },
        created() {
            window.addEventListener("scroll", this.handleScroll);


        },
        destroyed() {
            window.removeEventListener("scroll", this.handleScroll);
        },
    }
</script>
