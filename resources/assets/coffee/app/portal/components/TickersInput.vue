<template lang="pug">
    .tickers-input
        b-field(:label="labelvalue")
            b-autocomplete(
                v-model="ticker",
                :data="filteredTickers",
                :placeholder="placeholdervalue",
                icon="search",
                @select="option => selected = option",
                :open-on-focus="true",
                field="name"
            )
                template(slot="empty") Ничего не найдено

        input(type="hidden", name="ticker_id", :value="selectedId")
        b-taglist(attached)
            .wallet(@click="copy", v-if="selectedWallet")
                b-tag(type="is-dark") Адрес
                b-tag(type="is-primary") {{ selectedWallet.substring(0, 15) }}...
        p.help.has-text-centered(v-if="selectedWallet")
            | Кликни на адрес, чтобы скопировать его, и перешли на него криптовалюту.
            | Затем укажи ID транзакции из блокчейн и нажми "подать заявку".
</template>

<script lang="coffee">

    import Copy from 'Mixins/Copy'

    export default
        props: ['currencies', 'placeholdervalue', 'labelvalue']
        mixins: [Copy]

        data: ->
            selected: null
            ticker: ''

        methods:
            copy: -> @copyToClipboard @selectedWallet

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

            selectedWallet: ->
                if @selected
                    @selected.wallet
</script>

<style scoped lang="stylus">

.wallet
    cursor pointer
    transition all .3s ease
    word-break break-all
    max-width 100%

.tags
    display flex
    justify-content center

</style>
