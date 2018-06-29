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

document.getElementById('date').innerHTML = (new Date()).getFullYear()
