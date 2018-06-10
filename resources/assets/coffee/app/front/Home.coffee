import Ticker from 'Front/Ticker'
import WebSocket from 'Mixins/WebSocket'
import Particles from 'Common/particles'

new Vue
    components:
        ticker: Ticker

    data:
        tickers: {}
        mounted: false

    beforeCreate: ->
        onmessage = (e) =>
            @tickers = JSON.parse e.data

            if !@mounted
                @$mount '#tickers'
                @mounted = true


        ws = WebSocket(onmessage)

document.addEventListener 'DOMContentLoaded', () ->
    document.getElementById('date').innerHTML = (new Date()).getFullYear()

    $navbarBurgers = Array.prototype.slice.call document.querySelectorAll('.navbar-burger'), 0

    if $navbarBurgers.length > 0
        $navbarBurgers.forEach ($el) =>
            $el.addEventListener 'click', () =>
                target = $el.dataset.target
                $target = document.getElementById target
                $el.classList.toggle 'is-active'
                $target.classList.toggle 'is-active'
