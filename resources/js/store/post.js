import router from '../router'
import {notification} from 'ant-design-vue';

export default {
    namespaced: true,
    state: {
        posts: [],
        bookmarksPosts: [],
        channels: [],
        categories: []
    },
    mutations: {
        SET_POSTS(state, value) {
            state.posts = value;
        },
        SET_BOOKMARKS_POSTS(state, value) {
            state.bookmarksPosts = value;
        },
        SET_CHANNELS(state, value) {
            state.channels = value;
        },
        SET_CATEGORIES(state, value) {
            state.categories = value;
        },
        PUSH_POSTS(state, value) {
            state.posts = [...state.posts, ...value]
        },
        PUSH_POST(state, value) {
            state.posts = [value, ...state.posts]
        },
        ADD_REACT(state, post_id) {

            let objIndex;
            objIndex = state.posts.findIndex((obj => obj.id === post_id));
            state.posts[objIndex].is_react = true;
            state.posts[objIndex].react += 1;

        },
        REMOVE_REACT(state, post_id) {
            let objIndex;
            objIndex = state.posts.findIndex((obj => obj.id === post_id));
            state.posts[objIndex].is_react = false;
            state.posts[objIndex].react -= 1;
        },
        BOOKMARK_POST(state, post_id) {
            let index = state.posts.findIndex((obj => obj.id == post_id))
            if (state.posts[index].is_bookmark) {
                state.posts[index].is_bookmark = false;
            } else {
                state.posts[index].is_bookmark = true;
            }
        },
        REMOVE_POST(state, post_id) {
            // let index = state.posts.findIndex((obj =>obj.id == post_id ))
            // state.posts[index]
            state.posts = state.posts.filter(item => item.id != post_id)
        },

    },

    getters: {
        posts(state) {
            return state.posts
        },
        bookmarksPosts(state) {
            return state.bookmarksPosts
        }
    },
    actions: {
        loadPosts({commit}, data) {
            let community_id = data.community_id;
            let category_id = data.category_id;
            fetch('/api/posts/' + community_id + '?category_id=' + category_id || '')
                .then(response => response.json())
                .then(response => {
                    commit('SET_POSTS', response.data)
                });
        },
        bookmarksPosts({commit}, data) {
            let community_id = data.community_id;
            let category_id = data.category_id;

            return axios.get('/api/bookmarksPosts/' + community_id).then((data) => {
                        commit('SET_BOOKMARKS_POSTS', data.data)
                        console.log('SET_BOOKMARKS_POSTS',data.data)
                return data
            })
        },


        getMorePosts({commit}, data) {
            return fetch('/api/posts/' + data.community_id + '?page=' + data.current_page)
                .then(response => response.json())
                .then(response => {
                    commit('PUSH_POSTS', response.data)
                    return response
                });
        },

        addPost({commit}, form_data) {
            return axios.post('/api/posts/', form_data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(({data}) => {
                console.log('returned post', data)
                commit('PUSH_POST', data)
            })
        },
        loadComments({commit}, post_id) {
            return axios.post('/api/comments/' + post_id)
        },

        addComment({commit}, comment) {
            return axios.post('/api/comment', comment)
        },


        addCategory({commit}, category) {
            return axios.post('/api/category', category)
        },
        updateCategory({commit}, category) {
            return axios.post('/api/category/' + category.id, category)
        },
        deleteCategory({commit}, category_id) {
            return axios.post('/api/category/delete/' + category_id)
        },
        loadCategories({commit}, community_id) {
            return axios.get('/api/category/' + community_id).then((response) => {
                commit('SET_CATEGORIES', response.data)
                return response
            })
        },


        loadChannels({commit}, community_id) {
            let channelsPromise = axios.get('/api/channel/' + community_id);
            channelsPromise.then(function (res) {
                commit('SET_CHANNELS', res.data)
                return res
            });
            return channelsPromise;


        },
        addChannel({commit}, channel) {
            return axios.post('/api/channel', channel)
        },
        updateChannel({commit}, channel) {
            return axios.post('/api/channel/' + channel.id, channel)
        },
        deleteChannel({commit}, channel_id) {
            return axios.post('/api/channel/delete/' + channel_id)
        },

        bookmark_post({commit}, post_id) {
            return axios.post('api/bookmark_post/' + post_id)
                .then(({data}) => {
                    commit('BOOKMARK_POST', post_id)
                })
        },
        remove_post({commit}, post_id) {
            return axios.post('api/remove_post/' + post_id)
                .then(({data}) => {
                    commit('REMOVE_POST', post_id)
                    notification['success']({
                        message: 'Post Delete!!',
                        description: "Your Post has been delete."
                    });
                })
        },
    }
}
