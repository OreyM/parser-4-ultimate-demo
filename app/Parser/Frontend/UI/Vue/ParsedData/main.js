import Vue from 'vue'

import store from './store'
import ParsedData from './Index.vue'

new Vue({
    store,
    render: h => h(ParsedData)
}).$mount('#parsed-data')
