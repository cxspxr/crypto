window.WebSocket = window.WebSocket || window.MozWebSocket

connect = (onmessage) ->
    connection = new WebSocket websocket
    connection.onopen = () =>
        if connection.readyState is connection.OPEN
            connection.send 'hello'

    connection.onclose = () =>
        setTimeout () =>
            do connect(onmessage)
        , 500

    connection.onmessage = onmessage

    connection

export default connect
