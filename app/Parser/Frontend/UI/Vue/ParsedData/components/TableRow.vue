<template>
    <tbody>
        <tr v-if="games" v-for="game in games.data" :key="game.id">
            <td class="img-tooltip">
                <a
                    :href="'https://www.microsoft.com/es-ar/p/xbox/' + game.store_id"
                    target="_blank"
                >
                    {{ game.name }}
                </a>
                <div class="tooltiptext">
                    <img :src="game.img_prewie" alt="..." class="img-thumbnail">
                </div>
            </td>

            <td>
                <a
                    :href="'/parser/parsed-data/' + game.id + '/edit'"
                    class="badge badge-success"
                    target="_blank"
                >Edit</a>
            </td>

            <td class="text-twitter">{{ game.selling_price.toFixed(2) }}</td>
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

    .table td img {
        width: auto;
        height: auto;
        border-radius: unset;
    }

    .img-tooltip {
        position: relative;
    }

    .img-tooltip .tooltiptext {
        visibility: hidden;
        width: 180px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;

        /* Position the tooltip */
        position: absolute;
        z-index: 1;
        top: -5px;
        left: 50%;
    }

    .img-tooltip:hover .tooltiptext {
        visibility: visible;
    }
</style>
