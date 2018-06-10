@if($mode == 'hero')
    <section class="hero-footer">
@endif
<footer>
    Cryptovault &copy; <span id="date"></span>
</footer>

@if($mode == 'hero')
    </section>
</section> <!-- end of hero -->
@endif

@if(app()->environment('production'))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.min.js"></script>
@else
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.js"></script>
@endif

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>

<script src="{{ asset('js/common.js') }}"></script>

@yield('foot')

</body>
