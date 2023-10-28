import router from '../router'
import {notification} from 'ant-design-vue';

export default {
    namespaced: true,
    state: {
        communities: [],
        browse_communities_list: [],
        communityList: [],
        community_logo_file: null,
        active_community: null,
        members: [],
        _members: [],
        invite: null,
    },
    mutations: {
        SET_COMMUNITIES(state, value) {
            state.communities = value
        },
        SET_COMMUNITY_LIST(state, value) {
            state.communityList = value
        },
        SEARCH_MEMBER(state, value) {
            state._members = state.members;
            if (value) {
                state.members = state.members.filter(c => c.name.toLowerCase().includes(value.toLocaleLowerCase()))
            } else {
                state.members = state._members;
            }
        },
        BROWSE_COMMUNITIES_LIST(state, value) {
            state.browse_communities_list = value
        },


        SET_MEMBERS(state, value) {

            if (state.members !== value) {
                state.members = value
                console.log('not equals to ')
            } else {
                console.log(' equals to ')

            }

        },
        SET_COMMUNITY_LOGO_FILE(state, value) {
            state.community_logo_file = value
        },
        SET_ACTIVE_COMMUNITY(state, value) {
            state.active_community = state.communities.find((obj => obj.id == value));
        },
        SET_ACTIVE_COMMUNITY_OBJ(state, value) {
            state.active_community = value;
        },
        ADD_COMMUNITY(state, value) {
            state.communities.push(value)
        },
        UPDATE_COMMUNITY(state, value) {
            state.communities = state.communities.map(c => {
                if (c.id == value.id) {
                    c = value;
                }
                return c;
            })
        },
        UPDATE_COMMUNITY_JOIN(state, value) {
            state.browse_communities_list = state.browse_communities_list.map(p =>
                p.id === value ? {...p, join_community: true} : p
            );
            state.communities.push(state.browse_communities_list.find((obj => obj.id == value)))

        },
        UPDATE_COMMUNITY_LEAVE(state, value) {
            state.browse_communities_list = state.browse_communities_list.map(p =>
                p.id === value ? {...p, join_community: false} : p
            );
            state.communities = state.communities.filter(function (c) {
                return c.id != value;
            });

        },
        UPDATE_MEMBER(state, value) {
            let member = state.members.find(m => value.to_id == m.id)
            // alert('updating....')
            // console.log(member,value)
            if (member) {
                member.last_message_date = value.created_at
                member.last_message = value
                state.members = state.members.sort((a, b) => new Date(b.last_message_date) - new Date(a.last_message_date))
            }

        }

    },

    getters: {
        communityList(state, getters) {
            if (Array.isArray(state.communities)) {
                return state.communities;

            }
            return [];
        },
        communities(state, getters) {
            if (Array.isArray(state.communities)) {
                return state.communities;

            }
            return [];
        },
        browse_communities_list(state, getters) {
            return state.browse_communities_list;
        },
        invite(state, getters) {
            return state.invite;
        },


        active_community(state, getters) {
            return state.active_community;
        },
        members(state, getters) {
            return state.members.sort((a, b) => new Date(b.last_message_date) - new Date(a.last_message_date));
        }
    },
    actions: {
        loadCommunities({commit}) {
            return axios.get('/api/communities').then(({data}) => {
                commit('SET_COMMUNITIES', data)
                return data;
            }).catch(err => {
                commit('SET_COMMUNITIES', [])
                return err;
            })
        },
        loadAllCommunities({commit}) {
            return axios.get('/api/browse_communities').then(({data}) => {
                commit('BROWSE_COMMUNITIES_LIST', data)
            })
        },


        addCommunity({commit}, form_data) {
            return axios.post('/api/communities', form_data).then(({data}) => {
                commit('ADD_COMMUNITY', data)
                return data;
            })
        },
        loadMembers({commit}, form_data) {
            return axios.get('/api/getContacts/', {params: form_data}).then(({data}) => {
                // this.users = data
                commit('SET_MEMBERS', data)

            })
        },

        updateCommunity({commit}, data) {
            console.log(data.community_id)
            return axios.post('/api/communities/update/' + data.community_id, data.form_data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(({data}) => {
                console.log('updateCommunity', data)
                commit('UPDATE_COMMUNITY', data)
                notification['success']({
                    message: 'Community Setting Update!!',
                    description: "You have update the settings."
                });
                return data;
            })
        },

        joinCommunity({commit}, community_id) {
            return axios.post('/api/joinCommunity/' + community_id).then(({data}) => {
                console.log('join community----------',data)
                commit('UPDATE_COMMUNITY_JOIN', community_id)
                return data;
            })
        },
        acceptInvitation({commit}, data) {
            return axios.post('/api/acceptInvitation', data).then(({data}) => {

                console.log('invite accept', data)
                return data;
            })
        },

        leaveCommunity({commit}, community_id) {
            return axios.post('/api/leaveCommunity/' + community_id).then(({data}) => {
                commit('UPDATE_COMMUNITY_LEAVE', community_id)
                return data;
            })
        },
        inviteMember({commit}, data) {
            return axios.post('/api/inviteMember/', data).then(({data}) => {

                return data;
            })
        },


    }
}
