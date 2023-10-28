<template>
    <div>
        <router-view/>
        <!-- Cookies -->
        <div class="m-1.5">
            <!-- Start -->
            <!--            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white" aria-controls="cookies-modal"-->
            <!--                    @click.stop="openModal">Cookies</button>-->
            <ModalCookies id="cookies-modal" :modalOpen="cookiesModalOpen" @close-modal="closeModal">
                <!-- Modal content -->
                <div class="text-sm mb-5">
                    <div class="space-y-2">
                        <LoginRegisterModal/>
                    </div>
                </div>
            </ModalCookies>
            <!-- End -->
        </div>
    </div>
</template>

<script>
    import './charts/ChartjsConfig';
    import {mapActions} from 'vuex'
    import {notification} from 'ant-design-vue'
    import ModalCookies from "./components/ModalCookies";
    import LoginRegisterModal from "./components/LoginRegisterModal";

    export default {
        components: {
            LoginRegisterModal,
            ModalCookies
        },
        data() {
            return {
                cookiesModalOpen: false,
            }
        },
        computed: {
            cookiesModalOpen() {
                return this.$store.state.auth.Login_modal;
            }
        },
        methods: {
            closeModal() {
                this.$store.state.auth.Login_modal = false;
            },
            openModal() {
                this.$store.state.auth.Login_modal = true;
            },
        },
        mounted() {
            setTimeout(() => {
                let t = this.$route.query.type
                if (t == 'embed') {
                    this.$store.commit('auth/IS_EMBED', true)
                } else {
                    this.$store.commit('auth/IS_EMBED', false)
                }
                console.log("paramsss", t);
            }, 1000);


        }

    }
</script>

