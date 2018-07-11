@if(app()->environment('production'))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.min.js"></script>
@else
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.js"></script>
@endif

<script src="https://unpkg.com/buefy"></script>

<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/commons.js') }}"></script>
