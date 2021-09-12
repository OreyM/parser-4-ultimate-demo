import { mutationTypes } from './mutations'
import dataApi from '../api/dataApi'
import alert from '../../Core/helpers/alert'

export const actionTypes = {
    setData: '[data] setData',
    getData: '[data] getData',
    setType: '[data] setType',
    setOrder: '[data] setOrder',
    getGoldData: '[data] getGoldData'
}

const actions = {

    [actionTypes.setData](context, params) {
        return new Promise(() => {
            context.commit(mutationTypes.loadDataStart, params)
        })
    },

    [actionTypes.setType](context, type) {
        return new Promise(() => {
            context.state.type = type
        })
    },

    [actionTypes.setOrder](context, order) {
        return new Promise(() => {
            context.state.order = order

            if (context.state.direct === 'ASC') {
                context.state.direct = 'DESC'
            } else {
                context.state.direct = 'ASC'
            }
        })
    },


    [actionTypes.getData](context, params) {
        return new Promise(resolve => {

            const {page} = params
            //
            // context.commit(mutationTypes.loadDataStart, params)
            //
            // console.log(params, page, type, search)

            dataApi.getData(
                page,
                context.state.type,
                context.state.order,
                context.state.direct,
                context.state.search
            ).then(response => {
                context.commit(mutationTypes.loadDataSuccess, response.data)
                resolve(response.data)
            }).catch(e => {
                context.commit(mutationTypes.loadDataFailure, e.response.data)
                alert.error(e.response.data.messages)
                console.log('Eror!', e.response.data)
            })
        })
    },





    // [actionTypes.setData](context, params) {
    //     return new Promise(resolve => {
    //
    //         const {page, type, order, direct, search} = params
    //
    //         context.commit(mutationTypes.loadDataStart, params)
    //
    //         console.log(params, page, type, search)
    //
    //         dataApi.getData(page, type, search).then(response => {
    //             context.commit(mutationTypes.loadDataSuccess, response.data)
    //             resolve(response.data)
    //         }).catch(e => {
    //             context.commit(mutationTypes.loadDataFailure, e.response.data)
    //             alert.error(e.response.data.messages)
    //             console.log(e.response.data)
    //         })
    //     })
    // },
}

export default actions
