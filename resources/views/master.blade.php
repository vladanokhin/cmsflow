@include('layouts._header')

<body class="g-sidenav-show  bg-gray-100">
    @include('layouts._sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts._navbar')
        <div class="container-fluid py-4">
            @yield('content')
            @include('layouts._footer')
        </div>
    </main>
</body>
