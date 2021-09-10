const success = (payload) => {
    cuteAlert({
        type: 'success',
        title: payload.title,
        message: payload.body,
        buttonText: 'Yep!'
    })
}

const info = (payload) => {
    cuteAlert({
        type: 'info',
        title: payload.title,
        message: payload.body,
        buttonText: 'Oki-Doki'
    })
}

const warning = (payload) => {
    cuteAlert({
        type: 'warning',
        title: payload.title,
        message: payload.body,
        buttonText: 'I understand'
    })
}

const error = (payload) => {
    cuteAlert({
        type: 'error',
        title: payload.title,
        message: payload.body,
        buttonText: 'Fuck!'
    })
}

export default {
    error,
    info,
    success,
    warning
}
