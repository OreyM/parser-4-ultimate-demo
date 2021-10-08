const state = {
    startTime: null,
    finishTime: null,

    isLoading: false,
    isError: false,

    error: null,

    parserProgress: 0,
    progressPercent: 0,

    isLoadStretchCards: false,
    parsedTime: {
        difference: 0,
        isBetter: false,
        total: 0
    },
    totalGamesCount: 0,
    newGamesCount: 0,
    noExistGameCount: 0,
    lastParsingDate: null,

    exchangeRate: null,
    argentinaCurrency: null,

    ruGamesID: [],
    arGamesID: [],
    allGamesID: [],
    savedGamesID: [],
    newGamesID: [],
    oldGamesID: [],

    leftGames: 0 // how many new or old games are left to process
}

export default state
