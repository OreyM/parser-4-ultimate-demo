<template>
    <div class="preview-list">
        <div class="preview-item border-bottom">
            <div class="preview-thumbnail">
                <div :class="type" class="preview-icon">
                    <i :class="icon"></i>
                </div>
            </div>
            <div class="preview-item-content d-sm-flex flex-grow">
                <div class="flex-grow">
                    <h6 class="preview-subject">{{ title }}</h6>
                    <p v-html="body" class="text-muted mb-0"></p>
                </div>
                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                    <p class="text-muted">{{ time }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Notice',

        props: ['type', 'icon', 'title', 'body', 'time']
    }
</script>

<style scoped>

</style>
