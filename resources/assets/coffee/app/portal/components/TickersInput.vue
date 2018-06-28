<template lang="pug">
    .tickers-input
        b-field(:label="labelvalue")
            b-autocomplete(
                rounded,
                v-model="ticker",
                :data="filteredTickers",
                :placeholder="placeholdervalue",
                icon="search",
                @select="option => selected = option",
                :open-on-focus="true",
                field="name"
            )
                template(slot="empty") Ничего не найдено

        input(type="hidden", name="ticker", :value="selectedId")
</template>

<script lang="coffee">
    export default
        props: ['currencies', 'placeholdervalue', 'labelvalue']

        data: ->
            selected: null
            ticker: ''

        computed:
            filteredTickers: ->
                @currencies.filter (option) =>
                    option.name
                        .toString()
                        .toLowerCase()
                        .indexOf(@ticker.toLowerCase()) >= 0

            selectedId: ->
                if @selected
                    @selected.id
</script>
