<template>
    <div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Table</h4>
                        <p class="float-right">
                            <button
                                class="btn btn-primary"
                                :disabled="!canUpload"
                                :title="unbootableReason"
                            >
                                Upload data to PlayoneClub
                            </button>
                        </p>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <select
                                    @change="getGamesByType($event)"
                                    :disabled="isLoading"
                                    class="form-control"
                                >
                                    <option value="">All Games</option>
                                    <option value="image"
                                        >Image Problems</option
                                    >
                                    <option value="discount"
                                        >Discount Games</option
                                    >
                                    <option value="gold">Gold Games</option>
                                    <option value="gold-free"
                                        >Free Gold Games</option
                                    >
                                    <option value="game-pass"
                                        >GamePass Games</option
                                    >
                                    <option value="ea">EA Games</option>
                                    <option value="free">Free Games</option>
                                    <option value="remote">Remote Games</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input
                                    v-model.lazy="search"
                                    :disabled="isLoading"
                                    autofocus
                                    type="text"
                                    class="form-control"
                                    placeholder="Search games"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="card-body" :class="isLoading ? 'loading' : ''">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th @click="sort('name')">Game</th>
                                        <th>Edit</th>
                                        <th @click="sort('selling_price')">
                                            Selling Price
                                        </th>
                                        <th @click="sort('old_price')">
                                            Old Price
                                        </th>
                                        <th @click="sort('difference')">
                                            Difference
                                        </th>
                                        <th @click="sort('discount')">
                                            Discount
                                        </th>
                                        <th>Status</th>
                                        <th @click="sort('created_at')">
                                            Created
                                        </th>
                                    </tr>
                                </thead>
                                <table-row :games="games" />
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <pagination
                            :data="games"
                            :limit="2"
                            @pagination-change-page="getResults"
                        ></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
import { actionTypes } from './data/actions'

import TableRow from './components/TableRow'
import Pagination from 'laravel-vue-pagination'

export default {
    name: 'ParsedData',

    components: { Pagination, TableRow },

    data() {
        return {
            search: ''
        }
    },

    computed: {
        ...mapState({
            isLoading: state => state.data.isLoading,
            games: state => state.data.games,
            canUpload: state => state.data.canUpload,
            unbootableReason: state => state.data.unbootableReason
        })
    },

    watch: {
        search: function(value) {
            this.$store.dispatch(actionTypes.setSearch, value)
            this.getResults()
        }
    },

    methods: {
        getResults(page = 1) {
            this.$store.dispatch(actionTypes.getData, { page: page })
        },

        getGamesByType(event) {
            this.$store.dispatch(actionTypes.setType, event.target.value)
            this.getResults()
        },

        sort(order = 'name') {
            this.$store.dispatch(actionTypes.setOrder, order)
            this.getResults()
        }
    },

    mounted() {
        this.$store.dispatch(actionTypes.initProblems)
        this.$store.dispatch(actionTypes.setData, {
            type: '',
            order: 'name',
            direct: 'ASC',
            search: ''
        })
        this.$store.dispatch(actionTypes.getData, { page: 1 })
    }
}
</script>

<style lang="scss">
.card-body {
    &.loading {
        position: relative;
        &:before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            background: #000;
            opacity: 0.6;
        }
    }
}
</style>
