<template>
    <div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Table</h4>
                        <p class="card-description">
                            <span>Image Problems</span> <span>Remote Games</span>
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Game</th>
                                    <th>Selling Price</th>
                                    <th>Discount</th>
                                    <th>Difference</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="game in games.data" :key="game.id">
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

<!--        <ul>-->
<!--            <li v-for="game in games.data" :key="game.id">{{ game.name }}</li>-->
<!--        </ul>-->
<!--        <pagination :data="games" @pagination-change-page="getResults"></pagination>-->
    </div>
</template>

<script>
    import { mapState } from 'vuex'
    import dataApi from './api/dataApi'

    import Pagination from 'laravel-vue-pagination'

    export default {
        name: 'ParserData',

        components: { Pagination },

        data() {
            return {
                games: {},
            }
        },

        computed: {
            ...mapState({

            })
        },

        methods: {
            getResults(page = 1) {
                dataApi.allData(page)
                    .then(response => {
                        this.games = response.data.data
                    });
            }
        },

        mounted() {
            this.getResults()
        }
    }
</script>

<style lang="scss">

</style>
