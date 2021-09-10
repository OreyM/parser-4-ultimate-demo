import axios from './axios'

const initParser = () => {
    return axios.get('/init')
}
const startParser = () => {
    return axios.get('/start')
}
const finishParser = credentials => {
    return axios.post('/finish', credentials)
}
const getRuGamesID = credentials => {
    return axios.post('/games-id-ru', credentials)
}
const getArGamesID = credentials => {
    return axios.post('/games-id-ar', credentials)
}
const changeGamesProperties = () => {
    return axios.get('/change-properties')
}
const savedGames = () => {
    return axios.get('/saved-games')
}
const storeNewGames = credentials => {
    return axios.post('/store-new-games', credentials)
}
const updateOldGames = credentials => {
    return axios.post('/update-old-games', credentials)
}

export default {
    initParser,
    startParser,
    finishParser,
    getRuGamesID,
    getArGamesID,
    changeGamesProperties,
    savedGames,
    storeNewGames,
    updateOldGames
}
