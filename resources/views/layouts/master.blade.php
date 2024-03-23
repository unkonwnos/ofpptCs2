<link rel="stylesheet" href="{{ asset('all.min.css') }}">
<link rel="stylesheet" href="{{ asset('app.css') }}">
<script defer type="text/javascript"  src="{{ asset('app.js') }}"></script>

<div class="grid grid-cols-[auto,1fr] gap-4">
    <x-navigation />
    @yield('content')
</div>
