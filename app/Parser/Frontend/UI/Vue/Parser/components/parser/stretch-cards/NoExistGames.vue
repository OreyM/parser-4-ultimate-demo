<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0">{{ noExistGameCount }}</h3>
                    </div>
                </div>
                <div class="col-3">
                    <div class="icon icon-box-danger">
                        <span class="mdi mdi-xbox icon-item"></span>
                    </div>
                </div>
            </div>
            <h6 class="text-muted font-weight-normal">Remote Games</h6>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
    name: 'NoExistGames',

    computed: {
        ...mapState({
            noExistGameCount: state => state.parser.noExistGameCount
        })
    }
}
</script>

<style scoped></style>
