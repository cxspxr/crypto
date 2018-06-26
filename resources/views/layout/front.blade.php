@extends('layout.master')

@section('navbar')
    <section class="hero is-dark is-bold is-fullheight">
        <div class="particles-filter mobile--hidden"></div>
        <div id="particles" class="mobile--hidden">
            <vue-particles
                :particles-number="10"
            ></vue-particles>
        </div>
    @include('layout.navbar')
@endsection


@section('footer')
        <section class="hero-footer">
            <footer>
                Cryptovault &copy; <span id="date"></span>
            </footer>
        </section>
    </section>
@endsection

@section('foot')

    <script src="{{ asset('js/front.js') }}"></script>

    @yield('scripts')

@endsection
