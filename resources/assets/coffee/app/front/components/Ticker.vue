<template lang="pug">
    tr.ticker
        td.ticker-circle-td.has-text-centered
            figure.ticker-circle(ref="circle")
        td.ticker-name {{ ticker.name }}
        td.ticker-price(ref="price") {{ spacesInPrice(animatedPrice) }} руб.
        td.mobile--hidden.ticker-change(:class='changeClass') {{ animatedChange }}%
        td.mobile--hidden
            input.ticker-input.input.is-primary(type="text", v-model="amountToSell")
        td.mobile--hidden.ticker-approx(v-if="tweenedApprox < 100000000", ref="approx")
            | {{ spacesInPrice(tweenedApprox) }} руб.
        td.mobile--hidden.ticker-approx(v-else) JACKPOT

</template>

<script lang="coffee">

import TweenMax from 'gsap/TweenMax'
import $ from 'jquery'

export default

    props: ['ticker', 'ws']

    data: ->
        price: 0
        change: 0
        tweenedPrice: 0
        tweenedChange: 0
        initiated: false
        amountToSell: 1
        config: config
        tweenedApprox: 0
        changeClass:
            'has-text-success': @isPositiveChange
            'has-text-danger': !@isPositiveChange

    methods:
        spacesInPrice: (s) ->
            if s
                s.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")

        animate: (ref, classname) ->
            $(@$refs[ref])
                .addClass(classname)
                .delay(1000)
                .queue( (next) ->
                    $(this).removeClass(classname)
                    do next
                )

        reflectWS: ->
            @price = @ws[6] * @config.currency_rate
            @price -= @price * @config.comission
            @price = Math.floor(@price).toFixed 0

            @change = +(@ws[5] * 100).toFixed 2
            if !@initiated
                @tweenedChange = @change
                @tweenedPrice = @price
                @amountToSell = (1000 / @price).toPrecision 8
            @tweenedApprox = (@price * @amountToSell).toFixed 2

        tweenIt: (k, v) ->
            obj = {}
            obj[k] = v
            time = 1
            TweenLite.to @$data, time, obj

    watch:
        ws: () -> do @reflectWS

        price: (value, oldValue) ->
            if @initiated
                @tweenIt 'tweenedPrice', value
                @tweenIt 'tweenedApprox', (value * @amountToSell).toFixed 2

                if value > oldValue
                    @animate 'price', 'has-text-success'
                    @animate 'approx', 'has-text-success'
                    @animate 'circle', 'has-background-success'

                else if oldValue > value
                    @animate 'price', 'has-text-danger'
                    @animate 'approx', 'has-text-danger'
                    @animate 'circle', 'has-background-danger'

            else
                @initiated = true

        change: (value) ->
            @tweenIt 'change', value

        amountToSell: (value, oldValue) ->
            @amountToSell = @amountToSell.toString().replace /[^0-9.]/g, ''
            @tweenedApprox = (value * @price).toFixed 2

    computed:
        isPositiveChange: -> @change >= 0

        animatedPrice: ->
            if @tweenedPrice
                Math.floor(@tweenedPrice).toFixed 0

        animatedChange: ->
            if @tweenedChange
                @tweenedChange.toFixed 2

    mounted: -> do @reflectWS

</script>

<style lang="stylus" scoped>

.ticker
    td
        vertical-align middle

    &-input
        width 200px
        background-color transparent
        color white

    &-circle
        border-radius 100%
        height 13px
        width 13px
        background-color none
        transition all 1s ease
        margin auto

        &-td
            padding 0

    &-change
    &-price
        transition color 1s ease

        &--red
            color red

        &--green
            color green

</style>
