const success = payload => {
    return {
        type: 'bg-success',
        icon: 'mdi mdi-check-circle',
        title: payload.title,
        body: payload.body,
        time: new Date().toLocaleTimeString()
    }
}

const primary = payload => {
    return {
        type: 'bg-primary',
        icon: 'mdi mdi-camera-timer',
        title: payload.title,
        body: payload.body,
        time: new Date().toLocaleTimeString()
    }
}

const info = payload => {
    return {
        type: 'bg-info',
        icon: 'mdi mdi-information-outline',
        title: payload.title,
        body: payload.body,
        time: new Date().toLocaleTimeString()
    }
}

const warning = payload => {
    return {
        type: 'bg-warning',
        icon: 'mdi mdi-alert-circle-outline',
        title: payload.title,
        body: payload.body,
        time: new Date().toLocaleTimeString()
    }
}

const error = payload => {
    return {
        type: 'bg-danger',
        icon: 'mdi mdi-alert-outline',
        title: payload.title,
        body: payload.body,
        time: new Date().toLocaleTimeString()
    }
}

export default {
    error,
    info,
    primary,
    success,
    warning
}
