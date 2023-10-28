import router from '../router'
import {notification} from 'ant-design-vue';

export default {
    namespaced: true,
    state: {
        activeChatId: null,
        messages: [],
        page: 1
    },
    mutations: {
        PUSH_MESSAGES(state, value) {

            state.messages = [...value, ...state.messages]
        },
        SET_PAGE(state, value) {
            state.page = value
        },
        RESET_MESSAGES(state, value) {
            state.messages = [];
        },
        UPDATE_MESSAGE(state, value) {
            let indexOfMessage = state.messages.findIndex(message => message.id == value.id)
            state.messages[indexOfMessage] = value;
            console.log(value)

        },
        UPDATE_MESSAGE_BY_BODY(state, value) {

            let indexOfMessage = state.messages.findIndex(message => {
                return !message.hasOwnProperty('id') && message.body === value.body;
            })
            state.messages[indexOfMessage] = value;
            // alert(indexOfMessage)

        }
    },

    getters: {
        messages(state) {
            return state.messages;
        }
    },
    actions: {
        loadMessages({commit}, data) {
            return axios.get('/api/fetchMessages/', {params: data}).then((response) => {
                // this.users = data
                let data = response.data
                commit('PUSH_MESSAGES', data.data)
                commit('SET_PAGE', ++data.current_page)
                return response
            })
        },
        markAsSeen({commit}, data) {
            return axios.get('/api/markAsSeen/', {params: data}).then((response) => {
                console.log(response)
            })
        },
        loadReplies({commit}, data) {
            return axios.get('/api/loadReplies/', {params: data}).then((response) => {
                return response;
            })
        },
    }
}
