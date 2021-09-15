const state = {
    isLoading: false,
    canUpload: false,
    unbootableReason: '',
    error: null,

    currentPage: 1,

    page: 1,
    type: '',
    order: '',
    direct: '',
    search: '',

    games: {
        data: {}
    }
}

export default state
