export const mutationTypes = {
    loadDataStart:   '[data] loadDataStart',
    loadDataSuccess: '[data] loadDataSuccess',
    loadDataFailure: '[data] loadDataFailure',
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
}

export default mutations
