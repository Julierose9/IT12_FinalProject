<aside class="sidebar">
    <h2 class="text-lg font-bold mb-4">Cashier</h2>

    {{-- Dashboard --}}
    <x-sidebar-category title="Dashboard">
        <x-sidebar-button href="{{ route('cashier.dashboard') }}" icon="home">Dashboard</x-sidebar-button>
    </x-sidebar-category>

    {{-- Transactions --}}
    <x-sidebar-category title="Transactions">
        <x-sidebar-button href="{{ route('cashier.transactions.index') }}" icon="exchange">Transactions</x-sidebar-button>
        <x-sidebar-button href="{{ route('cashier.orders.index') }}" icon="shopping-cart">Orders</x-sidebar-button>
        <x-sidebar-button href="{{ route('cashier.payments.index') }}" icon="credit-card">Payments</x-sidebar-button>
    </x-sidebar-category>

    {{-- Reports --}}
    <x-sidebar-category title="Reports">
        <x-sidebar-button href="{{ route('cashier.reports.daily-sales') }}" icon="chart-line">Daily Sales</x-sidebar-button>
    </x-sidebar-category>

    {{-- Settings --}}
    <x-sidebar-category title="Settings">
        <x-sidebar-button href="{{ route('cashier.settings') }}" icon="cog">Settings</x-sidebar-button>
    </x-sidebar-category>

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}" class="mt-6">
        @csrf
        <x-sidebar-button type="submit" icon="sign-out" class="text-red-600">Logout</x-sidebar-button>
    </form>
</aside>