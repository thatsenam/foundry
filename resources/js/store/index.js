import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from './auth'
import community from './community'
import post from './post'
import member from "./member";
import chat from "./chat";

// alert(typeof window.localStorage)
export default new Vuex.Store({
    plugins: [
        createPersistedState()
    ],
    modules: {
        auth,
        community,
        post,
        member,
        chat,
    }
})
