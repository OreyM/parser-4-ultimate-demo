const hours = payload => {
    const d = Number(payload)

    const h = Math.floor(d / 3600)
    const m = Math.floor((d % 3600) / 60)
    const s = Math.floor((d % 3600) % 60)

    return (
        ('0' + h).slice(-2) +
        ':' +
        ('0' + m).slice(-2) +
        ':' +
        ('0' + s).slice(-2)
    )
}

const minutes = payload => {
    const d = Number(payload)

    const m = Math.floor((d % 3600) / 60)
    const s = Math.floor((d % 3600) % 60)

    return ('0' + m).slice(-2) + ':' + ('0' + s).slice(-2)
}

export default {
    hours,
    minutes
}
