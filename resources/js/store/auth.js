import router from '../router'
import {notification} from 'ant-design-vue';
import store from './index'

export default {
    namespaced: true,
    state: {
        is_embed: false,
        Login_modal: false,
        authenticated: false,
        user: {},
        type: 'login',
        onboarding: {
            community_style: "ssssss",
            account_type: "",
            monetize_community: true,
            banner: '',
            company_name: '',
            company_city: '',
            company_address: '',
            company_postal_code: '',
            street_address: '',
            company_country: '',
            avatar: '',
            skip: false

        },

    },
    getters: {
        authenticated(state) {
            return state.authenticated

        },
        user(state) {
            return state.user
        },
        is_embed(state) {
            return state.is_embed
        },
        type(state) {
            return state.type
        }
    },
    mutations: {

        IS_EMBED(state, value) {
            console.log('state changing ', value)
            state.is_embed = value
        },
        SET_AUTHENTICATED(state, value) {
            console.log('SET_AUTHENTICATED', value)

            state.authenticated = value
            state.Login_modal = false
            if (value) {
                notification['success']({
                    message: 'Login Successful!'
                });
                // alert('marie aunty'+state.user.on_boarding)


            } else {
                notification['warning']({
                    message: 'You are logged out!'
                });
                router.push({name: 'login'})

            }
        },

        SET_USER(state, value) {
            console.log('SET_USER', value)
            state.user = value
            if (state.authenticated) {
                if (state.user.current_community_id == null) {
                    state.user.current_community_id = state.user.current_community.id;
                }
            }
        },
        UPDATE_CURRENT_COMMUNITY(state, value) {
            state.user.current_community_id = value.id;
            state.user.current_community = value;
        },
        UPDATE_PROFILE(state, value) {
            state.user.user = value;
        },

        UPDATE_ONBOARDING01(state, value) {
            state.onboarding.community_style = value.community_style
        },
        UPDATE_ONBOARDING02(state, value) {
            state.onboarding.account_type = value.account_type
            state.onboarding.monetize_community = value.community
            if (value.account_type == 'individual') {
                state.onboarding.skip = true
            } else {
                state.onboarding.skip = false
            }
        },
        SKIP_ONBOARDING(state, value) {
            state.onboarding.skip = true
        },
        SET_PRE_CREATE_COMMUNITY(state, value) {
            state.onboarding.community = value
        },
        UPDATE_ONBOARDING03(state, value) {
            state.onboarding.banner = value.banner
            state.onboarding.company_name = value.company_name
            state.onboarding.company_city = value.company_city
            state.onboarding.company_address = value.company_address
            state.onboarding.company_postal_code = value.company_postal_code
            state.onboarding.street_address = value.street_address
            state.onboarding.company_country = value.company_country
            state.onboarding.avatar = value.avatar
        }


    },
    actions: {
        updateOnboarding({commit, state}) {

            if (!state.onboarding.skip) {
                var community_form_data = state.onboarding.community;
                store.dispatch('community/addCommunity', community_form_data, {root: true})

            }
            state.onboarding.community = '';

            var form_data = new FormData();
            for (var key in state.onboarding) {
                form_data.append(key, state.onboarding[key]);
            }

            return axios.post('/api/onboarding/update', form_data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(({data}) => {
                commit('SET_USER', data)
                console.log(this.onboarding);
                commit('SET_AUTHENTICATED', true)

            }).catch((error) => {
                notification['error']({
                    message: error.response
                });
            })
        },
        login({commit}) {
            return axios.get('/api/user').then(({data}) => {
                commit('SET_USER', data)
                commit('SET_AUTHENTICATED', true)
                return data
            }).catch(({response: {data}}) => {
                commit('SET_USER', {})
                commit('SET_AUTHENTICATED', false)
            })
        },
        updateProfile({commit}, form_data) {

            return axios.post('/api/auth/updateProfile', form_data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(({data}) => {
                commit('SET_USER', data);
            })
        },


        logout({commit}) {
            commit('SET_AUTHENTICATED', false)
            commit('SET_USER', {})
        }
    }
}
