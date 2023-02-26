@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<main class="py-4">
    @yield('dashboard')
</main>
<main class="py-2">
    @yield('kategori')
</main>
@include('layouts.footer')
