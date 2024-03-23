<link rel="stylesheet" href="{{ asset('all.min.css') }}">
<link rel="stylesheet" href="{{ asset('app.css') }}">
<script defer src="{{ asset('add.js') }}"></script>
@role(['super-admin','admin'])

@yield('content')
@endrole
