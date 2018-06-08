<template lang="pug">
    .ticker(v-cloak)
        .ticker-name {{ pair }}

</template>

<script lang="coffee">

export default

    props: ['pair']

    mounted: ->

        connection.onmessage = (e) =>
            console.log e.data

        connection.onopen = () =>
            console.log 'connected'
            sendTicker = () =>
                connection.send 'tBTCUSD'
                setTimeout(sendTicker, 10000);

            do sendTicker

</script>
