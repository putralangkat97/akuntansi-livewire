<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        {{-- Navbar --}}
        @include('partials._navbar')

        {{-- Sidebar --}}
        @include('partials._sidebar')

        {{-- Content --}}
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('page-title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item active">@yield('bread')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Main Content --}}
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    @yield('content')
                </div>
            </section>
        </div>

        {{-- Footer --}}
        @include('partials._footer')

    </div>

    <!-- REQUIRED SCRIPTS -->
    @include('partials._scripts')
    @livewireScripts
</body>
</html>
