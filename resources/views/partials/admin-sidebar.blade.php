<aside class="sidebar">
    <h2 class="text-lg font-bold mb-4">Admin</h2>

    {{-- Dashboard --}}
    <x-sidebar-category title="Dashboard">
        <x-sidebar-button href="{{ route('admin.dashboard') }}" icon="home">Dashboard</x-sidebar-button>
    </x-sidebar-category>

    {{-- Transactions --}}
    <x-sidebar-category title="Transactions">
        <x-sidebar-button href="{{ route('admin.transactions.index') }}" icon="exchange">Transactions</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.stock-in.index') }}" icon="plus">Stock-In</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.pullouts.index') }}" icon="minus">Pullouts</x-sidebar-button>
    </x-sidebar-category>

    {{-- Records --}}
    <x-sidebar-category title="Records">
        <x-sidebar-button href="{{ route('admin.records.index') }}" icon="book">Records</x-sidebar-button>
    </x-sidebar-category>

    {{-- Products & Suppliers --}}
    <x-sidebar-category title="Products & Suppliers">
        <x-sidebar-button href="{{ route('admin.products.index') }}" icon="box">Products</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.suppliers.index') }}" icon="truck">Suppliers</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.employees.index') }}" icon="users">Employees</x-sidebar-button>
    </x-sidebar-category>

    {{-- Reports --}}
    <x-sidebar-category title="Reports">
        <x-sidebar-button href="{{ route('admin.reports.daily-sales') }}" icon="chart-line">Daily Sales</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.reports.inventory') }}" icon="warehouse">Inventory</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.reports.pullouts') }}" icon="arrow-down">Pullouts</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.reports.analytics') }}" icon="chart-pie">Analytics</x-sidebar-button>
    </x-sidebar-category>

    {{-- Settings --}}
    <x-sidebar-category title="Settings">
        <x-sidebar-button href="{{ route('admin.settings') }}" icon="cog">Settings</x-sidebar-button>
        <x-sidebar-button href="{{ route('admin.accounts') }}" icon="user-cog">Manage Accounts</x-sidebar-button>
    </x-sidebar-category>

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}" class="mt-6">
        @csrf
        <x-sidebar-button type="submit" icon="sign-out" class="text-red-600">Logout</x-sidebar-button>
    </form>
</aside>
