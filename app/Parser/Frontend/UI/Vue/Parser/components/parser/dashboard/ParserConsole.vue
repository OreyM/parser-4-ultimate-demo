<template>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title mb-1">Parser Console</h4>
                </div>

                <div
                    class="d-flex flex-row justify-content-between border-bottom mt-2"
                >
                    <p class="card-title text-info mb-1">
                        <strong>Actions | Results</strong>
                    </p>
                    <p class="text-muted mb-1">Your time</p>
                </div>

                <div class="row">
                    <div class="col-12">
                        <notice
                            v-for="(notice, index) in notices"
                            :key="index"
                            :type="notice.type"
                            :icon="notice.icon"
                            :title="notice.title"
                            :body="notice.body"
                            :time="notice.time"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
import Notice from '../../notices/Notice'

export default {
    name: 'ParserConsole',

    components: { Notice },

    computed: {
        ...mapState({
            notices: state => state.notifications.notices
        })
    }
}
</script>

<style scoped></style>
