<template>
    <div class="m-1.5 ">

        <button @click.stop="newsletterModalOpen = true" class="flex items-center justify-between w-full">
            <slot></slot>
        </button>
        <!-- Start -->
        <ModalAction id="newsletter-modal" :modalOpen="newsletterModalOpen"
                     @close-modal="newsletterModalOpen = false">
            <!-- Modal header -->
            <div class="mb-2 text-center">
                <!-- Icon -->
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="20"
                         height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <line x1="9" y1="12" x2="15" y2="12"></line>
                        <line x1="12" y1="9" x2="12" y2="15"></line>
                    </svg>
                </div>
                <div class="text-lg font-semibold text-slate-800">Invite Member To Community!</div>
            </div>
            <!-- Modal content -->
            <div class="text-center">
                <div class="text-sm mb-6">
                    Semper eget duis at tellus at urna condimentum mattis pellentesque lacus suspendisse faucibus
                    interdum.
                </div>
                <!-- Submit form -->
                <form class="flex max-w-sm m-auto" @submit.prevent="inviteMember">
                    <div class="grow mr-2">
                        <label for="subscribe-form" class="sr-only">Email</label>
                        <input id="subscribe-form" v-model="community.email" class="form-input w-full px-2 py-1"
                               type="email"/>
                    </div>
                    <button type="submit" class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap ">
                        Invite
                    </button>
                </form>
                <div class="text-xs text-slate-500 italic mt-3">
                    mattis pellentesque lacus suspendisse faucibus interdum.
                </div>
            </div>
        </ModalAction>
        <!-- End -->
    </div>
</template>


<script>

    import Sidebar from "../../partials/Sidebar";
    import Header from "../../partials/Header";
    import ModalBasic from "../ModalBasic";
    import ModalCookies from "../ModalCookies";
    import ModalBlank from "../ModalBlank";
    import ModalAction from "../ModalAction";
    import ModalSearch from "../ModalSearch";
    import {notification} from "ant-design-vue";

    export default {
        name: 'InviteMember',
        components: {
            Sidebar,
            Header,
            ModalBasic,
            ModalCookies,
            ModalBlank,
            ModalAction,
            ModalSearch,
        },
        props: ['text'],
        data() {
            return {
                newsletterModalOpen: false,
                community: {
                    email: "",
                    current_community: this.$store.state.community.active_community.id
                }

            }
        },
        methods: {
            inviteMember() {
                this.$store.dispatch('community/inviteMember', this.community).then(({data}) => {
                    notification['success']({
                        message: 'An email with invitation link has been sent to ' + this.community.email
                    });

                    this.newsletterModalOpen = false;
                    this.community.email = "";
                });
                this.$store.dispatch('member/get_member', this.$store.state.community.active_community.id)
            }
        }

    }
</script>
