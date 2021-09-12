<template>
    <div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Table</h4>
                        <p class="card-description">
                            <span>Image Problems</span> |
                            <span @click="getGamesByType('discount')">Discount</span> |
                            <span @click="getGamesByType('gold')">Gold Games</span> |
                            <span @click="getGamesByType('gold-free')">Free Gold Games</span> |
                            <span @click="getGamesByType('game-pass')">GamePass Games</span> |
                            <span @click="getGamesByType('ea')">EA Game</span> |
                            <span @click="getGamesByType('free')">Free Game</span> |
                            <span>Remote Games</span>
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th @click="sort('name')">Game</th>
                                    <th @click="sort('selling_price')">Selling Price</th>
                                    <th @click="sort('discount')">Discount</th>
                                    <th @click="sort('difference')">Difference</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-if="games" v-for="game in games.data" :key="game.id">
                                    <td>{{ game.name }}</td>
                                    <td>{{ game.selling_price.toFixed(2) }}</td>
                                    <td>
                                        <div v-if="game.discount" class="icon icon-box-success ">
                                            <span class="mdi mdi-check-circle-outline icon-item"></span>
                                        </div>
                                        <div v-else class="icon icon-box-danger">
                                            <span class="mdi mdi-close-circle-outline icon-item"></span>
                                        </div>
                                    </td>
                                    <td>{{ game.difference.toFixed(2) }}</td>
                                    <td><label class="badge badge-danger">View</label></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <pagination :data="games" :limit="2" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex'
    import dataApi from './api/dataApi'
    import { actionTypes } from './data/actions'

    import Pagination from 'laravel-vue-pagination'

    export default {
        name: 'ParsedData',

        components: { Pagination },

        data() {
            return {
                // games: {},
            }
        },

        computed: {
            ...mapState({
                games: state => state.data.games,
            }),
        },

        methods: {
            getResults(page = 1) {
                this.$store.dispatch(actionTypes.getData, {page: page})
            },

            getGamesByType(type = '') {
                this.$store.dispatch(actionTypes.setType, type)
                this.getResults()
            },

            sort(order = 'name') {
                this.$store.dispatch(actionTypes.setOrder, order)
                this.getResults()
            }
        },

        mounted() {
            this.$store.dispatch(actionTypes.setData, {
                type: '',
                order: 'name',
                direct: 'ASC',
                search: ''
            })
            this.$store.dispatch(actionTypes.getData, {page: 1})
        }
    }
</script>

<style lang="scss">

</style>
