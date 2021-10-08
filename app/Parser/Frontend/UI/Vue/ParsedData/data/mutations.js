export const mutationTypes = {
    initProblemStart: '[data] initProblemStart',
    initProblemSuccess: '[data] initProblemSuccess',
    initProblemFailure: '[data] initProblemFailure',

    loadDataStart: '[data] loadDataStart',
    loadDataSuccess: '[data] loadDataSuccess',
    loadDataFailure: '[data] loadDataFailure',

    dataSetType: '[data] dataSetType',
    dataSetOrder: '[data] dataSetOrder',
    dataSetDirect: '[data] dataSetDirect',
    dataSetSearch: '[data] dataSetSearch'
}

const mutations = {
    [mutationTypes.initProblemStart](state) {
        state.canUpload = false
        state.unbootableReason = ''
    },
    [mutationTypes.initProblemSuccess](state) {
        state.canUpload = true
        state.unbootableReason = ''
    },
    [mutationTypes.initProblemFailure](state, payload) {
        state.canUpload = false
        state.unbootableReason = payload.messages
    },

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

    [mutationTypes.dataSetType](state, payload) {
        state.isLoading = true
        state.type = payload
    },
    [mutationTypes.dataSetOrder](state, payload) {
        state.isLoading = true
        state.order = payload
    },
    [mutationTypes.dataSetDirect](state, payload) {
        state.isLoading = true
        state.direct = payload
    },
    [mutationTypes.dataSetSearch](state, payload) {
        state.isLoading = true
        state.search = payload
    }
}

export default mutations
