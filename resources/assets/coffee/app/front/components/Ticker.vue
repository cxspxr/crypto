<template lang="pug">
    .ticker(v-cloak)
        .ticker-name {{ ticker.name }}
        .ticker-price(ref="price") {{ animatedPrice }}
        .ticker-change(:class='changeClass') {{ animatedChange }}%

</template>

<script lang="coffee">

import TweenMax from 'gsap/TweenMax'
import $ from 'jquery'

export default

    props: ['ticker']

    data: ->
        price: 0
        change: 0
        tweenedNumber: 0
        tweenedChange: 0
        initiated: false
        changeClass:
            'ticker-change--green': @isPositiveChange
            'ticker-change--red': !@isPositiveChange

    methods:
        animatePrice: (classname) ->
            $(@$refs.price)
                .addClass(classname)
                .delay(1000)
                .queue( (next) ->
                    $(this).removeClass(classname)
                    do next
                )

    watch:
        price: (value, oldValue) ->
            if @initiated
                TweenLite.to @$data, 1,
                    tweenedNumber: value

                if value > oldValue
                    @animatePrice 'ticker-price--green'

                else if oldValue < value
                    @animatePrice 'ticker-price--red'
            else
                @initiated = true

        change: (value) ->
            TweenLite.to @$data, 1,
                tweenedChange: value

    computed:
        isPositiveChange: -> @change >= 0
        animatedPrice: ->
            if @tweenedNumber
                @tweenedNumber.toFixed 2

        animatedChange: ->
            if @tweenedChange
                @tweenedChange.toFixed 3

    mounted: ->
        connection.addEventListener "message", (e) =>
            ary = JSON.parse e.data
            if ary[@ticker.ticker]
                @price = +ary[@ticker.ticker][6].toFixed 2
                @change = +ary[@ticker.ticker][5].toFixed 3
                @tweenedChange = @change
                @tweenedNumber = @price

        connection.addEventListener "open", () =>
            sendTicker = () =>
                if connection.readyState is connection.OPEN
                    connection.send @ticker.ticker
                    setTimeout sendTicker, 10000

            do sendTicker

</script>

<style lang="stylus" scoped>

.ticker
    display flex

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
