@include('_header')

<body class="g-sidenav-show  bg-gray-100">
    @include('_sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @yield('navbar')
        <div class="container-fluid py-4">
            @yield('content')
            @include('_footer')
        </div>
    </main>
</body>
