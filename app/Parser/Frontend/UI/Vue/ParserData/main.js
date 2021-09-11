import Vue from 'vue'

import store from './store'
import ParserData from './Index.vue'


new Vue({
    store,
    render: h => h(ParserData)
}).$mount('#parser-data')
