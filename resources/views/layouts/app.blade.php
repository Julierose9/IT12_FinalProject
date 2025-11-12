<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'POS System')</title>
    
    <!-- Load CSS directly -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Basic fallback styles -->
    <style>
        body { margin: 0; font-family: 'Segoe UI', sans-serif; background: #f8f9fa; }
        .layout { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: #1f2937; color: white; }
        .main-content { flex: 1; padding: 20px; }
        .content-box { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .page-title { font-size: 24px; font-weight: bold; margin-bottom: 20px; color: #1f2937; }
    </style>
</head>
<body>
    <div class="layout">
        @auth
            @if(auth()->user()->isAdmin())
                @include('partials.admin-sidebar')
            @elseif(auth()->user()->isCashier())
                @include('partials.cashier-sidebar')
            @endif
        @endauth

        <main class="main-content">
            <div class="content-box">
                <h1 class="page-title">@yield('title')</h1>
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Load JavaScript directly -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>