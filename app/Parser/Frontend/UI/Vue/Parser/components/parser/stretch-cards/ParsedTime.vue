<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0">{{ total }}</h3>
                        <p
                            :class="
                                parsedTime.isBetter
                                    ? 'text-success'
                                    : 'text-danger'
                            "
                            class=" ml-2 mb-0 font-weight-medium"
                        >
                            {{ parsedTime.difference }}s
                        </p>
                    </div>
                </div>
                <div class="col-3">
                    <div
                        class="icon icon-box-success"
                        :class="
                            parsedTime.isBetter
                                ? 'icon-box-success'
                                : 'icon-box-danger'
                        "
                    >
                        <span
                            class="icon-item mdi"
                            :class="
                                parsedTime.isBetter
                                    ? 'mdi-arrow-top-right'
                                    : 'mdi-arrow-bottom-left'
                            "
                        ></span>
                    </div>
                </div>
            </div>
            <h6 class="text-muted font-weight-normal">Parsed Time</h6>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
import times from '../../../helpers/times'

export default {
    name: 'ParsedTime',

    computed: {
        ...mapState({
            parsedTime: state => state.parser.parsedTime,
            total: state => times.minutes(state.parser.parsedTime.total)
        })
    }
}
</script>

<style scoped></style>
