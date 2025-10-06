<!doctype html>
<html lang="en">
<!--begin::Head-->
<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? 'AdminLTE | Dashboard v2' }}</title>

    <!-- Accessibility Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />

    <!-- Primary Meta Tags -->
    <meta name="author" content="ColorlibHQ" />
    <meta name="description"
          content="AdminLTE is a Free Bootstrap 5 Admin Dashboard. Fully accessible with WCAG 2.1 AA compliance." />
    <meta name="keywords"
          content="bootstrap 5, admin dashboard, charts, datatable, colorlibhq, WCAG compliant" />

    <!-- Fonts -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
          integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
          crossorigin="anonymous"
          media="print"
          onload="this.media='all'">

    <!-- Third Party Plugins -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
          crossorigin="anonymous">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
          crossorigin="anonymous">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/css/adminlte.css') }}">

    <!-- ApexCharts -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
          integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
          crossorigin="anonymous">

    @livewireStyles
    @stack('styles')
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">

    <div class="app-wrapper">
        <!-- Navbar -->
        @livewire('admin.layouts.navbar')
        
        <!-- Sidebar -->
        @livewire('admin.layouts.sidebar')
        
        <!-- Main -->
        <main class="app-main">
            <div class="app-content pt-3 p-md-3 p-lg-4">
            {{ $slot }}
            </div>
        </main>
        
        <!-- Footer -->
        @livewire('admin.layouts.footer')
    </div>

    <!-- Core JS -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
            crossorigin="anonymous"></script>

    <!-- AdminLTE -->
    <script src="{{ asset('build/assets/js/adminlte.js') }}"></script>

    <script>
        // OverlayScrollbars Config
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarWrapper = document.querySelector('.sidebar-wrapper');
            const isMobile = window.innerWidth <= 992;
            if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars && !isMobile) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: 'os-theme-light',
                        autoHide: 'leave',
                        clickScroll: true,
                    },
                });
            }
        });
    </script>

    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
            integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
            crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="{{ asset('build/assets/js/custom.js') }}"></script>

    @livewireScripts
    @stack('scripts')
</body>
</html>
