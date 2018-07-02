export default
    data:
        current: null
        isModalShown: false

    methods:
        openModal: (content) ->
            @current = content
            @isModalShown = true
