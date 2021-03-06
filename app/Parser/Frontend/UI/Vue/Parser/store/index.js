import Vue from 'vue'
import Vuex from 'vuex'

import parser from '../parser'
import notifications from '../notifications'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        notifications,
        parser
    }
})
