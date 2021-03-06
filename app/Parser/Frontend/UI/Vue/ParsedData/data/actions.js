import { mutationTypes } from './mutations'
import dataApi from '../api/dataApi'
import alert from '../../Core/helpers/alert'
import toast from '../../Core/helpers/toast'

export const actionTypes = {
    initProblems: '[data] initProblems',

    setData: '[data] setData',
    getData: '[data] getData',
    setType: '[data] setType',
    setOrder: '[data] setOrder',
    getGoldData: '[data] getGoldData',
    setSearch: '[data] setSearch'
}

const actions = {
    [actionTypes.initProblems](context) {
        return new Promise(() => {
            context.commit(mutationTypes.initProblemStart)

            dataApi
                .checkProblem()
                .then(response => {
                    if (response.data.data.count) {
                        context.commit(
                            mutationTypes.initProblemFailure,
                            response.data
                        )
                        toast.warning(response.data.messages)
                    } else {
                        context.commit(mutationTypes.initProblemSuccess)
                        toast.info(response.data.messages)
                    }
                    resolve(response.data)
                })
                .catch(e => {
                    // console.log('Eror!', e.response.data.messages)
                })
        })
    },

    [actionTypes.setData](context, params) {
        return new Promise(() => {
            context.commit(mutationTypes.loadDataStart, params)
        })
    },

    [actionTypes.setType](context, type) {
        return new Promise(() => {
            context.commit(mutationTypes.dataSetType, type)
        })
    },

    [actionTypes.setOrder](context, order) {
        return new Promise(() => {
            context.commit(mutationTypes.dataSetOrder, order)

            if (context.state.direct === 'ASC') {
                context.commit(mutationTypes.dataSetDirect, 'DESC')
            } else {
                context.commit(mutationTypes.dataSetDirect, 'ASC')
            }
        })
    },

    [actionTypes.setSearch](context, search) {
        return new Promise(() => {
            context.commit(mutationTypes.dataSetSearch, search)
        })
    },

    [actionTypes.getData](context, params) {
        return new Promise(resolve => {
            const { page } = params

            dataApi
                .getData(
                    page,
                    context.state.type,
                    context.state.order,
                    context.state.direct,
                    context.state.search
                )
                .then(response => {
                    context.commit(mutationTypes.loadDataSuccess, response.data)
                    resolve(response.data)
                })
                .catch(e => {
                    context.commit(
                        mutationTypes.loadDataFailure,
                        e.response.data
                    )
                    alert.error(e.response.data.messages)
                    console.log('Eror!', e.response.data)
                })
        })
    }
}

export default actions
