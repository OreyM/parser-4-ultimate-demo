import Vue from 'vue'

import store from './store'
import ParserStart from './ParserStart.vue'

new Vue({
    store,
    render: h => h(ParserStart)
}).$mount('#parser-start')
