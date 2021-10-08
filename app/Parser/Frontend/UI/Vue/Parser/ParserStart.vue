<template>
    <div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <Empty v-if="isLoadStretchCards" />
                <ParsedTime v-else />
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <Empty v-if="isLoadStretchCards" />
                <TotalGames v-else />
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <Empty v-if="isLoadStretchCards" />
                <NewGames v-else />
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <Empty v-if="isLoadStretchCards" />
                <NoExistGames v-else />
            </div>
        </div>
        <div class="row">
            <ParserDashboard v-on:start-parsing="startParcing()" />
            <ParserConsole />
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
import { actionTypes } from './parser/actions'

import {
    Empty,
    NoExistGames,
    NewGames,
    ParsedTime,
    TotalGames
} from './components/parser/stretch-cards'
import ParserDashboard from './components/parser/dashboard/ParserDashboard'
import ParserConsole from './components/parser/dashboard/ParserConsole'

export default {
    name: 'ParserStart',

    components: {
        Empty,
        NewGames,
        NoExistGames,
        ParsedTime,
        ParserConsole,
        ParserDashboard,
        TotalGames
    },

    computed: {
        ...mapState({
            isLoadStretchCards: state => state.parser.isLoadStretchCards,
            exchangeRate: state => state.parser.exchangeRate
        })
    },

    methods: {
        startParcing() {
            this.$store.dispatch(actionTypes.start).then(() => {
                this.$store.dispatch(actionTypes.getRuGamesID).then(() => {
                    this.$store.dispatch(actionTypes.getArGamesID).then(() => {
                        this.$store
                            .dispatch(actionTypes.filterGamesID)
                            .then(() => {
                                this.$store
                                    .dispatch(
                                        actionTypes.changeGamesTableProperties
                                    )
                                    .then(() => {
                                        this.$store
                                            .dispatch(actionTypes.savedGames)
                                            .then(() => {
                                                this.$store
                                                    .dispatch(
                                                        actionTypes.storeNewGames
                                                    )
                                                    .then(() => {
                                                        this.$store
                                                            .dispatch(
                                                                actionTypes.updateOldGames
                                                            )
                                                            .then(() => {
                                                                this.$store.dispatch(
                                                                    actionTypes.finish
                                                                )
                                                            })
                                                    })
                                            })
                                    })
                            })
                    })
                })
            })
        }
    },

    mounted() {
        this.$store.dispatch(actionTypes.init)
    }
}
</script>

<style lang="scss"></style>
