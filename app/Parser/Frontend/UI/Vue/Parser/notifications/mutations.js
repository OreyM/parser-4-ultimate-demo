export const noticeMutationTypes = {
    addNotice: '[notice] addNotice',
    clearNotice: '[notice] clearNotice'
}

const mutations = {
    [noticeMutationTypes.addNotice](state, payload) {
        state.notices.unshift(payload)
    },
    [noticeMutationTypes.clearNotice](state) {
        state.notices = []
    }
}

export default mutations
