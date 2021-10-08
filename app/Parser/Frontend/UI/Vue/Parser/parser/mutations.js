export const mutationTypes = {
    parserInitStart: '[parser] parserInitStart',
    parserInitSuccess: '[parser] parserInitSuccess',
    parserInitFailure: '[parser] parserInitFailure',

    parserStart: '[parser] parserStart',
    parserFinish: '[parser] parserFinish',

    parserRuGamesIDStart: '[parser] parserRuGamesIDStart',
    parserRuGamesIDSuccess: '[parser] parserRuGamesIDSuccess',
    parserRuGamesIDFailure: '[parser] parserRuGamesIDFailure',

    parserArGamesIDStart: '[parser] parserArGamesIDStart',
    parserArGamesIDSuccess: '[parser] parserArGamesIDSuccess',
    parserArGamesIDFailure: '[parser] parserArGamesIDFailure',

    parserFilterGamesID: '[parser] parserFilterGamesID',

    parserProgressPercent: '[parser] parserProgressPercent',

    parserChangeGamesPropertiesTable:
        '[parser] parserChangeGamesPropertiesTable',

    parserUnionAllGamesID: '[parser] parserUnionAllGamesID',

    parserSavedGamesIDStart: '[parser] parserSavedGamesIDStart',
    parserSavedGamesIDSuccess: '[parser] parserSavedGamesIDSuccess',
    parserSavedGamesIDFailure: '[parser] parserSavedGamesIDFailure',
    parserNewGamesID: '[parser] parserNewGamesID',
    parserOldGamesID: '[parser] parserOldGamesID',

    parserStoreNewGamesStart: '[parser] parserStoreNewGamesStart',
    parserStoreNewGamesPackComplete: '[parser] parserStoreNewGamesPackComplete',
    parserStoreNewGamesFailure: '[parser] parserStoreNewGamesFailure',

    parserUpdateOldGamesStart: '[parser] parserUpdateOldGamesStart',
    parserUpdateOldGamesPackComplete:
        '[parser] parserUpdateOldGamesPackComplete',
    parserUpdateOldGamesFailure: '[parser] parserUpdateOldGamesFailure'
}

const mutations = {
    [mutationTypes.parserInitStart](state) {
        state.isLoading = true
        state.isLoadStretchCards = true
        state.error = null
        state.parserProgress = 0
        state.exchangeRate = null
        state.parsedTime = {
            difference: 0,
            isBetter: false,
            total: 0
        }
        state.totalGamesCount = 0
        state.newGamesCount = 0
        state.noExistGameCount = 0
        state.lastParsingDate = null
    },
    [mutationTypes.parserInitSuccess](state, payload) {
        state.isLoading = false
        state.isLoadStretchCards = false
        state.parsedTime = payload.data.stretchCards.parsedTime
        state.totalGamesCount = payload.data.stretchCards.totalGamesCount
        state.newGamesCount = payload.data.stretchCards.newGamesCount
        state.noExistGameCount = payload.data.stretchCards.noExistGameCount
        state.lastParsingDate = payload.data.lastParsingTime
        state.exchangeRate = payload.data.currentExchangeRate
        state.argentinaCurrency = payload.data.currentExchangeRate.rates.ARS
    },
    [mutationTypes.parserInitFailure](state, payload) {
        state.isError = true
        state.error = payload
    },

    [mutationTypes.parserStart](state) {
        state.startTime = Date.now()
        state.isLoading = true
        state.isLoadStretchCards = true
        state.error = null
        state.parserProgress = 0
    },
    [mutationTypes.parserFinish](state, payload) {
        state.parsedTime = payload.data.stretchCards.parsedTime
        state.totalGamesCount = payload.data.stretchCards.totalGamesCount
        state.newGamesCount = payload.data.stretchCards.newGamesCount
        state.noExistGameCount = payload.data.stretchCards.noExistGameCount
        state.lastParsingDate = payload.data.lastParsingTime
        state.isLoadStretchCards = false
        state.isLoading = false
        state.parserProgress = 100
    },

    [mutationTypes.parserRuGamesIDStart](state) {
        state.ruGamesID = []
    },
    [mutationTypes.parserRuGamesIDSuccess](state, payload) {
        state.ruGamesID = payload.data
        state.parserProgress += 5
    },
    [mutationTypes.parserRuGamesIDFailure](state, payload) {
        state.isLoading = false
        state.isError = true
        state.error = payload
    },

    [mutationTypes.parserArGamesIDStart](state) {
        state.arGamesID = []
    },
    [mutationTypes.parserArGamesIDSuccess](state, payload) {
        state.arGamesID = payload.data
        state.parserProgress += 5
    },
    [mutationTypes.parserArGamesIDFailure](state, payload) {
        state.isLoading = false
        state.isError = true
        state.error = payload
    },

    [mutationTypes.parserFilterGamesID](state, payload) {
        state.allGamesID = payload
        state.parserProgress += 3
    },
    [mutationTypes.parserProgressPercent](state, payload) {
        state.progressPercent = payload
    },

    [mutationTypes.parserChangeGamesPropertiesTable](state) {
        state.parserProgress += 2
    },

    [mutationTypes.parserSavedGamesIDStart](state) {
        state.savedGamesID = []
    },
    [mutationTypes.parserSavedGamesIDSuccess](state, payload) {
        state.savedGamesID = payload.data
        state.parserProgress += 3
    },

    [mutationTypes.parserNewGamesID](state, payload) {
        state.newGamesID = payload
        state.parserProgress += 1
    },
    [mutationTypes.parserOldGamesID](state, payload) {
        state.oldGamesID = payload
        state.parserProgress += 1
    },

    [mutationTypes.parserSavedGamesIDFailure](state, payload) {
        state.isLoading = false
        state.isError = true
        state.error = payload
    },

    [mutationTypes.parserStoreNewGamesStart](state) {
        state.leftGames = 0
        state.leftGames = state.newGamesID.length
    },
    [mutationTypes.parserStoreNewGamesPackComplete](state, payload) {
        state.parserProgress += state.progressPercent
        state.leftGames -= payload
    },
    [mutationTypes.parserStoreNewGamesFailure](state, payload) {
        state.isLoading = false
        state.isError = true
        state.error = payload
    },

    [mutationTypes.parserUpdateOldGamesStart](state) {
        state.leftGames = 0
        state.leftGames = state.oldGamesID.length
    },
    [mutationTypes.parserUpdateOldGamesPackComplete](state, payload) {
        state.parserProgress += state.progressPercent
        state.leftGames -= payload
    },
    [mutationTypes.parserUpdateOldGamesFailure](state, payload) {
        state.isLoading = false
        state.isError = true
        state.error = payload
    }
}

export default mutations
