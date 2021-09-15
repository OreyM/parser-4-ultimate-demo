<template>
    <tbody>
        <tr v-if="games" v-for="game in games.data" :key="game.id">
            <td>
                <a
                    :href="'https://www.microsoft.com/es-ar/p/xbox/' + game.store_id"
                    target="_blank"
                >
                    {{ game.name }}
                </a>
            </td>

            <td>
                <a
                    :href="'/parser/parsed-data/' + game.id + '/edit'"
                    class="badge badge-success"
                >Edit</a>
            </td>

            <td>{{ game.selling_price.toFixed(2) }}</td>
            <td>{{ game.old_price.toFixed(2) }}</td>
            <td>{{ game.difference.toFixed(2) }}</td>
            <td>
                <div v-if="game.discount" class="icon icon-box-success ">
                    <span class="mdi mdi-check-circle-outline icon-item"></span>
                </div>
                <div v-else class="icon icon-box-danger">
                    <span class="mdi mdi-close-circle-outline icon-item"></span>
                </div>
            </td>
            <td>
                <label v-if="game.is_gold" class="badge badge-warning">G</label>
                <label v-if="game.is_game_pass" class="badge badge-info">GP</label>
                <label v-if="game.is_ea" class="badge badge-primary">EA</label>
                <label v-if="game.is_free" class="badge badge-success">FR</label>
            </td>
            <td>
                {{ game.created }}
            </td>
        </tr>
    </tbody>
</template>

<script>
    export default {
        name: 'TableRow',

        props: ['games'],
    }
</script>

<style scoped>

</style>
