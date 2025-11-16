<aside class="sidebar">
    <h2 class="text-lg font-bold mb-4">Admin</h2>

    {{-- Dashboard --}}
    <x-sidebar-category title="Dashboard">
        <x-sidebar-button href="{{ route('admin.dashboard') }}" icon="home">Dashboard</x-sidebar-button>
    </x-sidebar-category>

    {{-- Accounts --}}
    <x-sidebar-category title="Accounts">
        <x-sidebar-button href="{{ route('admin.accounts.index') }}" icon="person-badge">Accounts</x-sidebar-button>
    </x-sidebar-category>

    {{-- Records --}}
    <x-sidebar-category title="Records">
        <x-sidebar-button href="{{ route('admin.records.suppliers.index') }}" icon="bi-truck">Suppliers</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.records.employees.index') }}" icon="bi-people">Employees</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.records.products.index') }}" icon="box">Products</x-sidebar-button>
    </x-sidebar-category>

    {{-- Transactions --}}
    <x-sidebar-category title="Transactions">
        {{-- FIXED: Corrected route names --}}
        <x-sidebar-button href="{{ route('admin.transactions.stock-in.index') }}" icon="plus">Stock-In</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.transactions.pullouts.index') }}" icon="minus">Pullouts</x-sidebar-button>
    </x-sidebar-category>

    {{-- Reports --}}
    <x-sidebar-category title="Reports">
        <x-sidebar-button href="{{ route('admin.reports.analytics') }}" icon="bar-chart">Analytics</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.reports.daily-sales') }}" icon="currency-dollar">Daily Sales</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.reports.inventory') }}" icon="clipboard-list">Inventory</x-sidebar-button>
    </x-sidebar-category>

    {{-- Settings --}}
    <x-sidebar-category title="Settings">
        <x-sidebar-button href="{{ route('admin.settings.index') }}" icon="cog">Settings</x-sidebar-button>
    </x-sidebar-category>

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}" class="mt-6">
        @csrf
        <x-sidebar-button type="submit" icon="sign-out" class="text-red-600">Logout</x-sidebar-button>
    </form>
</aside>