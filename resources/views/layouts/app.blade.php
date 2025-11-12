<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'POS System')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen bg-gray-100">
    @auth
        @if(auth()->user()->isAdmin())
            @include('partials.admin-sidebar')
        @elseif(auth()->user()->isCashier())
            @include('partials.cashier-sidebar')
        @endif
    @endauth

    <main class="flex-1 p-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h1 class="text-2xl font-bold mb-4">@yield('title')</h1>
            @yield('content')
        </div>
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'POS')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex">
    @auth
        @if(auth()->user()->isAdmin())
            @include('partials.admin-sidebar')
        @elseif(auth()->user()->isCashier())
            @include('partials.cashier-sidebar')
        @endif
    @endauth

    <main class="flex-1 p-6">
        @yield('content')
    </main>
</body>
</html>