import { noticeMutationTypes } from './mutations'

export const noticeActionTypes = {
    add: '[notice] add'
}

const actions = {
    [noticeActionTypes.add](context, options) {
        context.commit(noticeMutationTypes.addNotice, options)
    }
}

export default actions
