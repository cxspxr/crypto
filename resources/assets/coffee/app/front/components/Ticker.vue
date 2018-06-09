<template lang="pug">
    .ticker(v-cloak)
        .ticker-circle(ref="circle")
        .ticker-name {{ ticker.name }}
        .ticker-price(ref="price") {{ animatedPrice }}
        .ticker-change(:class='changeClass') {{ animatedChange }}%
        input.ticker-input(type="text", v-model="amountToSell")
        .ticker-approx(v-if="tweenedApprox < 10000000000", ref="approx") {{ tweenedApprox }}
        .ticker-approx(v-else) JACKPOT

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
        amountToSell: (Math.random() * 5).toFixed 2
        config: config
        tweenedApprox: 0
        changeClass:
            'ticker-change--green': @isPositiveChange
            'ticker-change--red': !@isPositiveChange

    methods:
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
            @price -= Math.floor(@price * @config.comission).toFixed 0

            @change = +(@ws[5] * 100).toFixed 2
            if !@initiated
                @tweenedChange = @change
                @tweenedPrice = @price
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
                    @animate 'price', 'ticker-price--green'
                    @animate 'approx', 'ticker-price--green'
                    @animate 'circle', 'ticker-circle--green'

                else if oldValue > value
                    @animate 'price', 'ticker-price--red'
                    @animate 'approx', 'ticker-price--red'
                    @animate 'circle', 'ticker-circle--red'

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
    display flex

    &-circle
        border-radius 100%
        margin-top 3px
        height 10px
        width 10px
        opacity 0
        background-color white
        transition all 1s ease
        margin-right 10px

        &--red
            background-color red
            opacity 1

        &--green
            background-color green
            opacity 1

    &-name
    &-price
        margin-right 20px

    &-change
    &-price
        transition color 1s ease

        &--red
            color red

        &--green
            color green

</style>
