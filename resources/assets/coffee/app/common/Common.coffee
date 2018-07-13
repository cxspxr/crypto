
Vue.use Buefy.default,
    defaultIconPack: 'fa',
    defaultContainerElement: '#content'

document.addEventListener 'DOMContentLoaded', () ->

    $navbarBurgers = Array.prototype.slice.call document.querySelectorAll('.navbar-burger'), 0

    if $navbarBurgers.length > 0
        $navbarBurgers.forEach ($el) =>
            $el.addEventListener 'click', () =>
                target = $el.dataset.target
                $target = document.getElementById target
                $el.classList.toggle 'is-active'
                $target.classList.toggle 'is-active'


    document.getElementById('date').innerHTML = (new Date()).getFullYear()
    if document.getElementById('status')
        new Vue
            el: '#status'
