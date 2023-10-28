import router from '../router'
import {notification} from 'ant-design-vue';
import axios from "axios";

export default {
    namespaced: true,
    state: {
        members: [],
        following: [],
        newMember: []
    },
    mutations: {
        PUSH_MEMBERS(state, value) {
            state.members = value
        },
        PUSH_FOLLOWING(state, value) {
            state.following = value
        },
        NEW_MEMBERS(state, value) {
            state.newMember = value
        },

    },

    getters: {},
    actions: {

        get_member({commit}, community_id) {
            return axios.post('/api/member/' + community_id).then(({data}) => {
                console.log('returned member', data)
                commit('PUSH_MEMBERS', data)
            })
        },



        remove_member({commit}, data) {
            return axios.post('/api/remove_member/' ,data).then(({data}) => {
            })
        },
        removeInvite({commit}, data) {
            return axios.post('/api/removeInvite/' ,data).then(({data}) => {
            })
        },


        get_following({commit}, user_id) {
            return axios.post('/api/following/' + user_id).then(({data}) => {
                commit('PUSH_FOLLOWING', data)
            })
        },
        follow({commit}, data) {
            return axios.post('/api/follow/', data)
        },
        unfollow({commit}, data) {
            return axios.post('/api/unfollow/', data)
        },

        verifyToken({commit},token){
            return axios.post('/api/verifyToken/'+ token)
        }

    }
}
