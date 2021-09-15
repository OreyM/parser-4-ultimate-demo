import axios from './axios'

const getData = (page = 1,
                 type = '',
                 order = 'name',
                 direct = 'ASC',
                 search = '') => {
    return axios.get(
        '/all?page=' + page +
        '&type=' + type +
        '&order=' + order +
        '&direct=' + direct +
        '&search=' + search)
}

const checkProblem = () => {
    return axios.get('/check-problem')
}

export default {
    getData,
    checkProblem
}
