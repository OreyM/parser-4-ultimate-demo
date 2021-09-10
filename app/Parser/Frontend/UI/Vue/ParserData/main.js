import Vue from 'vue'

import store from './store'
import ParserData from './ParserData.vue'


new Vue({
    store,
    render: h => h(ParserData)
}).$mount('#parser-data')
