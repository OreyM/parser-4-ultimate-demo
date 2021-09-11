import axios from './axios'

const allData = credential => {
    return axios.get('/all?page=' + credential)
}

export default {
    allData
}
