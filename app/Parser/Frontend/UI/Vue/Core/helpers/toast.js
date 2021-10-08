const timer = 5000

const success = payload => {
    cuteToast({
        type: 'success',
        message: payload,
        timer: timer
    })
}

const info = payload => {
    cuteToast({
        type: 'info',
        message: payload,
        timer: timer
    })
}

const warning = payload => {
    cuteToast({
        type: 'warning',
        message: payload,
        timer: timer
    })
}

const error = payload => {
    cuteToast({
        type: 'error',
        message: payload,
        timer: timer
    })
}

export default {
    error,
    info,
    success,
    warning
}
