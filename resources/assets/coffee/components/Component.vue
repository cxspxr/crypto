<template lang="pug">
    .component {{ variable }}
</template>

<script lang="coffee">

import Mixin from 'Mixins/Mixin'

export default
    props: ['variable']

    mixins: [Mixin]

</script>
