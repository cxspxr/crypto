<template lang="pug">
    .ticker(v-cloak)
        .ticker-name {{ pair }}

</template>

<script lang="coffee">

ws = require('websocket').w3cwebsocket


export default

    props: ['pair']

    mounted: ->
        w = new ws 'ws://localhost:1337/', null

        w.onmessage = (e) =>
            console.log e.data

        w.onopen = () =>
            console.log 'connected'
</script>
