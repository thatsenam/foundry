<template>

    <div>
        <main class="bg-white relative" v-if="type == 'login'">

            <div class="relative flex">

                <LoginModal @blockChange="blockChange"/>


            </div>

        </main>

        <main class="bg-white relative" v-else>

            <RegisterModal @blockChange="blockChange"/>


        </main>

    </div>
</template>

<style scoped>
    .login-content {
        align-items: center;
        justify-content: center;
        margin-top: auto;
        margin-bottom: auto;
    }

    .login-wrapper {
        display: flex;
        flex-direction: column;
    }

    .text-da {
        color: #A7BBC8;
    }
</style>
<script>
    import {mapActions, mapGetters} from 'vuex'
    import {notification} from 'ant-design-vue';
    import router from "../router";
    import useVuelidate from '@vuelidate/core'
    import {required, email} from '@vuelidate/validators'
    import LoginModal from "./LoginModal";
    import RegisterModal from "./RegisterModal";

    export default {
        name: "login",
        components: {RegisterModal, LoginModal},

        data() {


        },
        computed:{
            type(){
                return this.$store.state.auth.type;

            }
        },
        methods: {
            blockChange(type) {
                this.$store.state.auth.type = type
            }
        },
        mounted() {


        }
    }
</script>

