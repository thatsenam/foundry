const {default: Echo} = require('laravel-echo');

require('./bootstrap');

import {createApp} from 'vue'

const app = createApp(App)
app.config.devtools = true;
app.config.debug = true;
app.config.silent = false;
import 'nprogress/nprogress.css';
// window.loading = app.$loading
// app.$loading.show()
import router from './router'
import App from './App.vue'
import Vuex from 'vuex'
import axios from "axios";
import Antd from 'ant-design-vue';
import 'ant-design-vue/dist/antd.css';

import 'viewerjs/dist/viewer.css'
import VueViewer from 'v-viewer'
import './css/style.scss'
import store from './store'
import MasonryWall from '@yeger/vue-masonry-wall'
import moment from 'moment'
import mitt from 'mitt';

const emitter = mitt();

/**
 * @params {date} date to be converted to timeago
 * @returns returns timeAgo
 */
app.config.globalProperties.$filters = {
    timeAgo(date) {
        return moment(date).fromNow()
    },
}

app.config.globalProperties.event = emitter;


app.use(store)
app.use(MasonryWall)
app.use(VueViewer)
app.use(router)
app.use(Vuex)
app.use(Antd)
app.mount('#app')


