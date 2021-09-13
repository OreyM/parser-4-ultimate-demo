export const mutationTypes = {
    loadDataStart:   '[data] loadDataStart',
    loadDataSuccess: '[data] loadDataSuccess',
    loadDataFailure: '[data] loadDataFailure',

    dataSetSearch: '[data] dataSetSearch'
}

const mutations = {
    [mutationTypes.loadDataStart](state, payload) {
        state.isLoading = true
        state.type = payload.type
        state.order = payload.order
        state.direct = payload.direct
        state.search = payload.search
    },
    [mutationTypes.loadDataSuccess](state, payload) {
        state.isLoading = false
        state.games = payload.data
    },
    [mutationTypes.loadDataFailure](state, payload) {
        state.isLoading = false
        state.error = payload.data
    },

    [mutationTypes.dataSetSearch](state, payload) {
        state.isLoading = true
        state.search = payload
    },
}

export default mutations
