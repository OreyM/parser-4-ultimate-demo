<template>
    <div class="col-md-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Parser Dashboard</h4>
                <p>
                    <strong class="text-info">Last parsed Date:</strong>
                    <span>{{ lastParsingDate }}</span>
                </p>

                <div class="text-center">
                    <CircleCounter
                        size="15rem"
                        :activeCount="parserProgress"
                        :text="parserProgress + '%'"
                    />
                </div>

                <!--                <ParserDashboardInfo-->
                <!--                    :title="'Total Games ID'"-->
                <!--                    :info="totalGamesID"-->
                <!--                />-->

                <!--                <ParserDashboardInfo-->
                <!--                    :title="'Argentina Currency (1$)'"-->
                <!--                    :info="argentinaCurrency"-->
                <!--                />-->

                <div
                    class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3"
                >
                    <div class="text-md-center text-xl-left mt-1 mb-1">
                        <button
                            v-on:click="$emit('start-parsing')"
                            :disabled="isLoading"
                            class="btn btn-primary btn-fw"
                        >
                            Start Parsing
                        </button>
                    </div>
                    <div
                        class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0"
                    >
                        <div
                            v-show="isLoading"
                            class="spinner-grow text-danger"
                            role="status"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
import moment from 'moment'
import ParserDashboardInfo from './ParserDashboardInfo'
import CircleCounter from './CircleCounter'

export default {
    name: 'ParserDashboard',

    components: { CircleCounter, ParserDashboardInfo },

    computed: {
        ...mapState({
            isLoading: state => state.parser.isLoading,

            parserProgress: state => +state.parser.parserProgress.toFixed(),

            totalGamesID: state => state.parser.allGamesID.length,
            argentinaCurrency: state => state.parser.argentinaCurrency,

            lastParsingDate: state =>
                moment(state.parser.lastParsingDate).format('DD.MM.Y HH:mm')
        })
    }
}
</script>

<style scoped></style>
