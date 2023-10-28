<template>
    <div>
        <div class="relative inline-flex" v-if="is_login && user">
            <button
                ref="trigger"
                class="inline-flex justify-center items-center group"
                aria-haspopup="true"
                @click.prevent="dropdownOpen = !dropdownOpen"
                :aria-expanded="dropdownOpen"
            >
                <img class="w-8 h-8 rounded-full" :src="user.avatar_url" width="32" height="32" alt="User"/>
                <div class="flex items-center truncate">
                    <span class="truncate ml-2 text-sm font-medium group-hover:text-slate-800">{{ user.name }}</span>
                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" viewBox="0 0 12 12">
                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                    </svg>
                </div>
            </button>
            <transition
                enter-active-class="transition ease-out duration-200 transform"
                enter-from-class="opacity-0 -translate-y-2"
                enter-to-class="opacity-100 translate-y-0"
                leave-active-class="transition ease-out duration-200"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div v-show="dropdownOpen"
                     class="origin-top-right z-10 absolute top-full min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                     :class="align === 'right' ? 'right-0' : 'left-0'">
                    <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200" v-if="$store.state.auth.authenticated">
                        <div class="font-medium text-slate-800">{{ user.name }}</div>
                        <div class="text-xs text-slate-500 italic">{{ user.email }}</div>
                    </div>
                    <ul
                        ref="dropdown"
                        @focusin="dropdownOpen = true"
                        @focusout="dropdownOpen = false"
                    >
                        <li>
                            <router-link
                                class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3"
                                to="/settings/account" @click="dropdownOpen = false">Settings
                            </router-link>
                        </li>
                        <li>
                            <button
                                class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3"
                                to="/signin" @click="logout">Sign Out
                            </button>
                        </li>
                    </ul>
                </div>
            </transition>
        </div>
        <div v-else class="">
            <button class="btn border-indigo-200 hover:border-indigo-900 text-indigo-500" @click.stop="login_modal">
                Login
            </button>

            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-3" @click.stop="register_modal">Register
            </button>
        </div>
    </div>
</template>

<script>
    import {ref, onMounted, onUnmounted} from 'vue'
    import UserAvatar from '../images/user-avatar-32.png'
    import {mapActions, mapGetters} from 'vuex'

    export default {
        name: 'DropdownProfile',
        props: ['align'],
        data() {
            return {
                UserAvatar: UserAvatar,
                user: this.$store.state.auth.user

            }
        },

        computed: {
            ...mapGetters({authenticated: 'auth/authenticated'}), // -> this['some/nested/module/someGetter']])

            is_login() {
                return this.$store.state.auth.authenticated
            },
            user() {
                return this.$store.state.auth.user
            }
        },
        setup() {

            const dropdownOpen = ref(false)
            const trigger = ref(null)
            const dropdown = ref(null)

            // close on click outside
            const clickHandler = ({target}) => {
                if (!dropdownOpen.value || dropdown.value.contains(target) || trigger.value.contains(target)) return
                dropdownOpen.value = false
            }

            // close if the esc key is pressed
            const keyHandler = ({keyCode}) => {
                if (!dropdownOpen.value || keyCode !== 27) return
                dropdownOpen.value = false
            }

            onMounted(() => {
                document.addEventListener('click', clickHandler)
                document.addEventListener('keydown', keyHandler)
            })

            onUnmounted(() => {
                document.removeEventListener('click', clickHandler)
                document.removeEventListener('keydown', keyHandler)
            })

            return {
                dropdownOpen,
                trigger,
                dropdown,
            }
        },
        methods: {
            ...mapActions({
                signOut: "auth/logout"
            }),
            async logout() {
                this.dropdownOpen = false
                await axios.post('logout').then(({data}) => {
                    this.signOut()
                    this.$store.commit('community/SET_COMMUNITIES', [])
                    this.$store.commit('community/SET_COMMUNITY_LIST', [])
                    this.$store.state.community.communities = [];
                    // this.$router.push({name: "login"})
                })
            },
            login_modal() {
                this.$store.state.auth.Login_modal = true;

                this.$store.state.auth.type = "login";

            },
            register_modal() {
                this.$store.state.auth.Login_modal = true;
                this.$store.state.auth.type = "register";
            }
        }
    }
</script>
