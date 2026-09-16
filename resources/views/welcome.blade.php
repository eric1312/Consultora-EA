@extends('layouts.app')

@section('content')
    @include('partials.header')
    @include('partials.hero')
    @include('partials.benefits')
    @include('partials.services')
    @include('partials.about')
    @include('partials.process')
    @include('partials.contact')

    <footer class="footer">
        <div class="container">© {{ date('Y') }} EA Consultora de Software. Todos los derechos reservados.</div>
    </footer>
@endsection
