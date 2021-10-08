import parserApi from '../api/parserApi'
import { mutationTypes } from './mutations'
import { noticeActionTypes } from '../notifications/actions'
import { noticeMutationTypes } from '../notifications/mutations'

import alert from '../../Core/helpers/alert'
import notifications from '../helpers/notifications'
import toast from '../../Core/helpers/toast'

export const actionTypes = {
    init: '[parser] init',

    start: '[parser] start',
    finish: '[parser] finish',

    getRuGamesID: '[parser] getRuGamesID',
    getArGamesID: '[parser] getArGamesID',

    filterGamesID: '[parser] filterGamesID',

    changeGamesTableProperties: '[parser] changeGamesTableProperties',
    savedGames: '[parser] savedGames',

    storeNewGames: '[parser] storeNewGames',
    updateOldGames: '[parser] updateOldGames'
}

const actions = {
    [actionTypes.init](context) {
        return new Promise(() => {
            context.commit(mutationTypes.parserInitStart)
            parserApi
                .initParser()
                .then(response => {
                    context.commit(
                        mutationTypes.parserInitSuccess,
                        response.data
                    )
                    toast.info(response.data.messages)
                })
                .catch(e => {
                    context.commit(
                        mutationTypes.parserInitFailure,
                        e.response.data
                    )
                    alert.error(e.response.data.messages)
                })
        })
    },

    [actionTypes.start](context) {
        return new Promise(resolve => {
            context.commit(noticeMutationTypes.clearNotice)
            context.commit(mutationTypes.parserStart)
            parserApi
                .startParser()
                .then(response => {
                    context.dispatch(
                        noticeActionTypes.add,
                        notifications.primary(response.data.messages)
                    )
                    resolve(response.data)
                })
                .catch(e => {
                    alert.error(e.response.data.messages)
                })
        })
    },

    [actionTypes.getRuGamesID](context) {
        return new Promise(resolve => {
            context.commit(mutationTypes.parserRuGamesIDStart)
            context.dispatch(
                noticeActionTypes.add,
                notifications.info({
                    title: 'Parsing Games ID',
                    body:
                        'Start parsing Games ID of <strong>RU</strong> region from Microsoft Store'
                })
            )

            parserApi
                .getRuGamesID({ region: 'ru' })
                .then(response => {
                    context.commit(
                        mutationTypes.parserRuGamesIDSuccess,
                        response.data
                    )
                    context.dispatch(
                        noticeActionTypes.add,
                        notifications.success(response.data.messages)
                    )
                    resolve(response.data)
                })
                .catch(e => {
                    context.commit(
                        mutationTypes.parserRuGamesIDFailure,
                        e.response.data
                    )
                    context.dispatch(
                        noticeActionTypes.add,
                        notifications.error(e.response.data.messages)
                    )
                    alert.error(e.response.data.messages)
                })
        })
    },

    [actionTypes.getArGamesID](context) {
        return new Promise(resolve => {
            context.commit(mutationTypes.parserArGamesIDStart)
            context.dispatch(
                noticeActionTypes.add,
                notifications.info({
                    title: 'Parsing Games ID',
                    body:
                        'Start parsing Games ID of <strong>AR</strong> region from Microsoft Store'
                })
            )

            parserApi
                .getArGamesID({ region: 'ar' })
                .then(response => {
                    context.commit(
                        mutationTypes.parserArGamesIDSuccess,
                        response.data
                    )
                    context.dispatch(
                        noticeActionTypes.add,
                        notifications.success(response.data.messages)
                    )
                    resolve(response.data)
                })
                .catch(e => {
                    context.commit(
                        mutationTypes.parserArGamesIDFailure,
                        e.response.data
                    )
                    context.dispatch(
                        noticeActionTypes.add,
                        notifications.error(e.response.data.messages)
                    )
                    alert.error(e.response.data.messages)
                })
        })
    },

    [actionTypes.filterGamesID](context) {
        context.dispatch(
            noticeActionTypes.add,
            notifications.info({
                title: 'Filter games ID',
                body:
                    'Remove from the <strong>RU array games</strong> that are not in the AR region.'
            })
        )

        return new Promise(resolve => {
            const allGamesID = context.state.ruGamesID.filter(gamesID =>
                context.state.arGamesID.includes(gamesID)
            )

            context.commit(mutationTypes.parserFilterGamesID, allGamesID)

            // Calculate gradation implementation progress in the processing of data from all games
            const progressPrecent = +(75 / (allGamesID.length / 20)).toFixed(1)
            context.commit(mutationTypes.parserProgressPercent, progressPrecent)

            context.dispatch(
                noticeActionTypes.add,
                notifications.success({
                    title: 'Filter games ID',
                    body:
                        '<strong>RU region games</strong> that are not in the <strong>AR region</strong> are filtered out.'
                })
            )
            resolve(allGamesID)
        })
    },

    [actionTypes.changeGamesTableProperties](context) {
        context.dispatch(
            noticeActionTypes.add,
            notifications.info({
                title: 'Change properties in Games table',
                body: "Change 'is_new' & 'is_exist' properties in Games table."
            })
        )

        return new Promise(resolve => {
            parserApi
                .changeGamesProperties()
                .then(response => {
                    context.commit(
                        mutationTypes.parserChangeGamesPropertiesTable
                    )
                    context.dispatch(
                        noticeActionTypes.add,
                        notifications.success(response.data.messages)
                    )
                    resolve(response.data)
                })
                .catch(e => {
                    context.dispatch(
                        noticeActionTypes.add,
                        notifications.error(e.response.data.messages)
                    )
                    alert.error(e.response.data.messages)
                })
        })
    },

    [actionTypes.savedGames](context) {
        return new Promise(resolve => {
            context.commit(mutationTypes.parserSavedGamesIDStart)
            context.dispatch(
                noticeActionTypes.add,
                notifications.info({
                    title: 'Get saved games ID',
                    body: 'Get the games ID saved in the database.'
                })
            )

            parserApi
                .savedGames()
                .then(response => {
                    context.commit(
                        mutationTypes.parserSavedGamesIDSuccess,
                        response.data
                    )

                    if (response.data.data) {
                        const newGamesID = context.state.allGamesID.filter(
                            id => !context.state.savedGamesID.includes(id)
                        )
                        context.commit(
                            mutationTypes.parserNewGamesID,
                            newGamesID
                        )

                        const oldGamesIS = context.state.allGamesID.filter(
                            id => !newGamesID.includes(id)
                        )
                        context.commit(
                            mutationTypes.parserOldGamesID,
                            oldGamesIS
                        )
                    } else {
                        context.commit(
                            mutationTypes.parserNewGamesID,
                            context.state.allGamesID
                        )
                    }

                    context.dispatch(
                        noticeActionTypes.add,
                        notifications.success(response.data.messages)
                    )
                    resolve(response.data)
                })
                .catch(e => {
                    context.commit(
                        mutationTypes.parserSavedGamesIDFailure,
                        e.response.data
                    )
                    context.dispatch(
                        noticeActionTypes.add,
                        notifications.error(e.response.data.messages)
                    )
                    alert.error(e.response.data.messages)
                })
        })
    },

    [actionTypes.storeNewGames](context) {
        return new Promise(resolve => {
            context.commit(mutationTypes.parserStoreNewGamesStart)
            context.dispatch(
                noticeActionTypes.add,
                notifications.info({
                    title: 'Store new games',
                    body:
                        'Start store <strong>NEW</strong> game in DB & download new game images.'
                })
            )

            const gamesId = context.state.newGamesID

            if (gamesId.length === 0) {
                context.dispatch(
                    noticeActionTypes.add,
                    notifications.warning({
                        title: 'Store new games',
                        body: 'We have no new games today.'
                    })
                )
                resolve()
            }

            while (gamesId.length) {
                const pack = gamesId.splice(0, 20)

                parserApi
                    .storeNewGames({
                        gamesId: pack,
                        currency: context.state.argentinaCurrency
                    })
                    .then(() => {
                        context.commit(
                            mutationTypes.parserStoreNewGamesPackComplete,
                            pack.length
                        )
                        context.dispatch(
                            noticeActionTypes.add,
                            notifications.info({
                                title: 'Store new games',
                                body: `Data for <strong>${pack.length}</strong> games has been received. <strong>${context.state.leftGames}</strong> games left.`
                            })
                        )
                        if (context.state.leftGames === 0) resolve()
                    })
                    .catch(e => {
                        context.commit(
                            mutationTypes.parserStoreNewGamesFailure,
                            e.response.data
                        )
                        context.dispatch(
                            noticeActionTypes.add,
                            notifications.error(e.response.data.messages)
                        )
                        alert.error(e.response.data.messages)
                        console.log(e.response.data)
                    })

                if (context.state.error) break
            }
        })
    },

    [actionTypes.updateOldGames](context) {
        return new Promise(resolve => {
            context.commit(mutationTypes.parserUpdateOldGamesStart)
            context.dispatch(
                noticeActionTypes.add,
                notifications.info({
                    title: 'Update old games',
                    body:
                        'Start updating prices and statuses of <strong>OLD</strong> games.'
                })
            )

            const gamesId = context.state.oldGamesID

            if (gamesId.length === 0) {
                context.dispatch(
                    noticeActionTypes.add,
                    notifications.warning({
                        title: 'Store old games',
                        body: 'We have no old games today.'
                    })
                )
                resolve()
            }

            while (gamesId.length) {
                const pack = gamesId.splice(0, 20)

                parserApi
                    .updateOldGames({
                        gamesId: pack,
                        currency: context.state.argentinaCurrency
                    })
                    .then(() => {
                        context.commit(
                            mutationTypes.parserUpdateOldGamesPackComplete,
                            pack.length
                        )
                        context.dispatch(
                            noticeActionTypes.add,
                            notifications.info({
                                title: 'Update old games',
                                body: `Data for <strong>${pack.length}</strong> games has been received. <strong>${context.state.leftGames}</strong> games left.`
                            })
                        )
                        if (context.state.leftGames === 0) resolve()
                    })
                    .catch(e => {
                        context.commit(
                            mutationTypes.parserUpdateOldGamesFailure,
                            e.response.data
                        )
                        context.dispatch(
                            noticeActionTypes.add,
                            notifications.error(e.response.data.messages)
                        )
                        alert.error(e.response.data.messages)
                        console.log(e.response.data)
                    })

                if (context.state.error) break
            }
        })
    },

    [actionTypes.finish](context) {
        context.dispatch(
            noticeActionTypes.add,
            notifications.warning({
                title: 'Finishing the parser',
                body:
                    'The parser is almost done. We process the resulting data. Wait a couple of seconds.'
            })
        )

        return new Promise(() => {
            const finishTime = Math.round(
                (Date.now() - context.state.startTime) / 1000
            )
            parserApi
                .finishParser({ finish: finishTime })
                .then(response => {
                    context.commit(mutationTypes.parserFinish, response.data)
                    context.dispatch(
                        noticeActionTypes.add,
                        notifications.primary(response.data.messages)
                    )
                    alert.success(response.data.messages)
                })
                .catch(e => {
                    alert.error(e.response.data.messages)
                })
        })
    }
}

export default actions
