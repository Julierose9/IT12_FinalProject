<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sales | Dora's Oshopee</title>

  <!-- Bootstrap + FontAwesome + Poppins -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; background:#f5f7fb; }
    .sidebar { 
      min-width: 220px; 
      max-width: 220px; 
      background: #fff; 
      border-right:1px solid #eef2f7; 
      height:100vh; 
      position:fixed; 
      top:0; 
      left:0; 
      padding:22px;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }
    .brand { display:flex; align-items:center; gap:10px; margin-bottom:18px; flex-shrink: 0; }
    .brand img { width:80px; height:auto; }
    .sidebar .nav-link { 
      color:#5b5f72; 
      padding:10px 8px; 
      border-radius:10px; 
      font-size: 0.95rem;
    }
    .sidebar .nav-link.active { background:#efeaff; color:#3b3183; font-weight:600; }
    .sidebar .nav-link:hover { background:#f8f9fa; }
    .content-wrap { margin-left:240px; padding:28px; }
    .topbar { 
      background:transparent; 
      display:flex; 
      gap:16px; 
      align-items:flex-start; 
      justify-content:space-between; 
      margin-bottom:22px; 
    }
    .search-input { 
      max-width: 400px; 
      width: 100%; 
      min-width: 300px;
    }
    .table-card { border-radius:12px; border:none; box-shadow:0 2px 4px rgba(0,0,0,0.04); }
    .table th { border-top:none; font-weight:600; color:#5b5f72; font-size:.85rem; text-transform:uppercase; letter-spacing:.5px; padding:12px 16px; }
    .table td { padding:16px; vertical-align:middle; border-color:#f1f3f4; }

    /* Payment Badge */
    .payment-badge { padding:6px 12px; border-radius:20px; font-size:.75rem; font-weight:500; }
    .payment-paid { color:#23b07a; }
    .payment-pending { color:#f08a24; }
    .payment-unpaid { color:#e05252; }

    /* Scrollable sidebar navigation */
    .sidebar-nav {
      flex: 1;
      overflow-y: auto;
      overflow-x: hidden;
      margin-top: 18px;
    }
    
    /* Custom scrollbar for sidebar */
    .sidebar-nav::-webkit-scrollbar {
      width: 4px;
    }
    
    .sidebar-nav::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }
    
    .sidebar-nav::-webkit-scrollbar-thumb {
      background: #c1c1c1;
      border-radius: 10px;
    }
    
    .sidebar-nav::-webkit-scrollbar-thumb:hover {
      background: #a8a8a8;
    }
    
    /* Dropdown menu styling */
    .nav .nav-link.dropdown-toggle::after {
      float: right;
      margin-top: 6px;
    }
    
    .nav .nav.flex-column.ms-3 {
      border-left: 2px solid #eef2f7;
      margin-left: 12px !important;
      padding-left: 8px;
    }
    
    /* Submenu items styling */
    .nav .nav.flex-column.ms-3 .nav-link {
      padding: 8px 12px;
      font-size: 0.95rem;
      border-radius: 6px;
    }
    
    /* Updated user info styling - Picture left, text right */
    .user-section {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 16px;
    }
    
    .user-info {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    
    .user-details {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }
    
    .user-name {
      font-weight: 600;
      font-size: 1rem;
      line-height: 1.2;
    }
    
    .user-role {
      color: #6c757d;
      font-size: 0.875rem;
      line-height: 1.2;
    }
    
    .user-avatar {
      width: 44px;
      height: 44px;
      border-radius: 10px;
      object-fit: cover;
    }
    
    /* User dropdown for sign out */
    .user-dropdown {
      position: relative;
    }
    
    .user-dropdown-toggle {
      background: none;
      border: none;
      display: flex;
      align-items: center;
      gap: 12px;
      cursor: pointer;
      padding: 8px;
      border-radius: 8px;
      transition: background 0.2s;
    }
    
    .user-dropdown-toggle:hover {
      background: #f8f9fa;
    }
    
    .user-dropdown-menu {
      position: absolute;
      top: 100%;
      right: 0;
      background: white;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      padding: 8px 0;
      min-width: 150px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      z-index: 1000;
      margin-top: 8px;
      display: none;
    }
    
    .user-dropdown-item {
      padding: 8px 16px;
      display: flex;
      align-items: center;
      gap: 8px;
      color: #5b5f72;
      text-decoration: none;
      transition: background 0.2s;
      border: none;
      background: none;
      width: 100%;
      text-align: left;
      cursor: pointer;
    }
    
    .user-dropdown-item:hover {
      background: #f8f9fa;
      color: #3b3183;
    }
    
    /* Search and filter section */
    .search-filter-section {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    
    /* Filter dropdown styling */
    .filter-dropdown {
      position: relative;
    }
    
    .filter-toggle {
      background: #fff;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      padding: 10px 12px;
      display: flex;
      align-items: center;
      gap: 6px;
      color: #5b5f72;
      transition: all 0.2s;
      cursor: pointer;
      min-width: 100px;
    }
    
    .filter-toggle:hover {
      background: #f8f9fa;
      border-color: #c1c1c1;
    }
    
    .filter-toggle.active {
      background: #3b3183;
      color: white;
      border-color: #3b3183;
    }
    
    .filter-menu {
      position: absolute;
      top: 100%;
      right: 0;
      background: white;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      padding: 16px;
      min-width: 220px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      z-index: 1000;
      margin-top: 8px;
      display: none;
    }
    
    .filter-section {
      margin-bottom: 16px;
    }
    
    .filter-section:last-child {
      margin-bottom: 0;
    }
    
    .filter-section-title {
      font-weight: 600;
      font-size: 0.875rem;
      margin-bottom: 8px;
      color: #3b3183;
    }
    
    .filter-options {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }
    
    .filter-option {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 6px 0;
      cursor: pointer;
    }
    
    .filter-option input[type="checkbox"],
    .filter-option input[type="radio"] {
      margin: 0;
    }
    
    .filter-option label {
      cursor: pointer;
      font-size: 0.875rem;
      margin: 0;
    }
    
    .date-inputs {
      display: flex;
      gap: 8px;
      margin-top: 8px;
    }
    
    .date-input {
      flex: 1;
    }
    
    .date-input input {
      width: 100%;
      padding: 6px 8px;
      border: 1px solid #dee2e6;
      border-radius: 4px;
      font-size: 0.875rem;
    }
    
    .filter-actions {
      display: flex;
      gap: 8px;
      margin-top: 12px;
      padding-top: 12px;
      border-top: 1px solid #eef2f7;
      flex-wrap: nowrap;
      justify-content: space-between;
    }

    .btn-apply, .btn-clear {
      flex: 1;
      min-width: 0;
      white-space: nowrap;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      font-size: 0.875rem;
      cursor: pointer;
      transition: background 0.2s;
    }

    .btn-apply {
      background: #3b3183;
      color: white;
    }

    .btn-apply:hover {
      background: #2a2265;
    }

    .btn-clear {
      background: #6c757d;
      color: white;
    }

    .btn-clear:hover {
      background: #5a6268;
    }

    /* Active filter indicator */
    .active-filters {
      display: none;
      align-items: center;
      gap: 8px;
      margin-bottom: 16px;
      flex-wrap: wrap;
      width: 100%;
      justify-content: flex-end;
    }
    
    .active-filters.has-filters {
      display: flex;
    }
    
    .filter-tag {
      background: #e9ecef;
      border: 1px solid #dee2e6;
      border-radius: 16px;
      padding: 4px 12px;
      font-size: 0.8rem;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    
    .filter-tag-remove {
      background: none;
      border: none;
      cursor: pointer;
      color: #6c757d;
      padding: 0;
      width: 16px;
      height: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Container for search/filter and active filters */
    .filter-container {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 8px;
      margin-top: 20px;
    }

    /* Tab styling */
    .nav-tabs { border-bottom: 2px solid #eef2f7; }
    .nav-tabs .nav-link { color: #5b5f72; border: none; border-bottom: 3px solid transparent; }
    .nav-tabs .nav-link.active { color: #3b3183; border-color: #3b3183; background: none; }

    @media (max-width: 991px) {
      .sidebar { 
        position:relative; 
        width:100%; 
        height:auto; 
        max-height: 80vh;
        border-right:none; 
        padding:12px 16px; 
        display:flex; 
        overflow:auto; 
      }
      .content-wrap { margin-left:0; padding:16px; }
      
      .topbar {
        flex-direction: column;
        align-items: stretch;
        gap: 20px;
      }
      
      .user-section {
        align-items: stretch;
      }
      
      .search-filter-section {
        justify-content: center;
        flex-wrap: wrap;
      }
      
      .search-input {
        min-width: 250px;
        max-width: 100%;
      }
      
      .filter-menu {
        right: auto;
        left: 0;
        min-width: 220px;
      }
      
      .filter-toggle {
        min-width: 90px;
      }
      
      .user-dropdown-menu {
        right: auto;
        left: 0;
      }
      
      .filter-container {
        align-items: stretch;
      }
      
      .active-filters {
        justify-content: flex-start;
      }
    }
  </style>
</head>
<body>

{{-- Sidebar --}}
<aside class="sidebar">
  <div class="brand">
    <img src="{{ asset('images/logo_.png') }}" alt="Logo">
    <div>
      <div style="font-weight:600">Dora's Oshoppe</div>
      <small class="text-muted">Gift Shop</small>
    </div>
  </div>

  {{-- Scrollable Navigation --}}
  <div class="sidebar-nav">
    <nav class="nav flex-column">
      {{-- Dashboard --}}
      <a class="nav-link" href="{{ route('cashier.dashboard') }}">
        <i class="fas fa-home me-2"></i> Dashboard
      </a>

      {{-- Sales & Transactions Dropdown --}}
      <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#salesSubmenu">
        <i class="fas fa-cash-register me-2"></i> Transactions
      </a>
      <div class="collapse show" id="salesSubmenu">
        <div class="nav flex-column ms-3">
          {{-- Sales (Combined Orders & Payments) --}}
          <a class="nav-link active" href="{{ route('cashier.sales.index') }}">
            <i class="fas fa-shopping-bag me-2"></i> Sales
          </a>

          {{-- Transactions History --}}
          <a class="nav-link" href="{{ route('cashier.transactions.index') }}">
            <i class="fas fa-history me-2"></i> Transaction History
          </a>
        </div>
      </div>

      {{-- Reports with Submenu --}}
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#reportsSubmenu">
        <i class="fas fa-chart-bar me-2"></i> Reports
      </a>
      <div class="collapse" id="reportsSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link" href="{{ route('cashier.reports.daily-sales') }}">
            <i class="fas fa-chart-line me-2"></i> Daily Sales
          </a>
        </div>
      </div>
    </nav>
  </div>
</aside>

<main class="content-wrap">

  {{-- Topbar --}}
  <div class="topbar">
    <div class="d-flex align-items-center gap-3">
      <h4 class="mb-0">Sales Management</h4>
    </div>

    <div class="user-section">
      <!-- User Info Section with Dropdown -->
      <div class="user-dropdown">
        <button class="user-dropdown-toggle" id="userDropdownToggle">
          <img src="{{ asset('images/logo_.png') }}" alt="avatar" class="user-avatar">
          <div class="user-details">
            <div class="user-name">{{ Auth::user()->name ?? 'Cashier' }}</div>
            <div class="user-role">Cashier</div>
          </div>
          <i class="fas fa-chevron-down" style="font-size: 0.8rem;"></i>
        </button>
        
        <div class="user-dropdown-menu" id="userDropdownMenu">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="user-dropdown-item">
              <i class="fas fa-sign-out-alt me-2"></i> Sign Out
            </button>
          </form>
        </div>
      </div>
      
      <!-- Filter Container with Search/Filter and Active Filters -->
      <div class="filter-container">
        <!-- Search and Filter Section -->
        <div class="search-filter-section">
          <!-- Expanded Search Bar -->
          <div class="input-group search-input">
            <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
            <input class="form-control" placeholder="Search orders, customers..." id="searchInput" />
          </div>
          
          <!-- Relevant Filter Dropdown -->
          <div class="filter-dropdown">
            <button class="filter-toggle" id="filterToggle">
              <i class="fas fa-filter"></i>
              <i class="fas fa-chevron-down ms-1" style="font-size: 0.8rem;"></i>
            </button>
            
            <div class="filter-menu" id="filterMenu" style="display: none;">
              <!-- Time Period Filter -->
              <div class="filter-section">
                <div class="filter-section-title">Time Period</div>
                <div class="filter-options">
                  <div class="filter-option">
                    <input type="radio" name="timePeriod" id="period-today">
                    <label for="period-today">Today</label>
                  </div>
                  <div class="filter-option">
                    <input type="radio" name="timePeriod" id="period-week" checked>
                    <label for="period-week">This Week</label>
                  </div>
                  <div class="filter-option">
                    <input type="radio" name="timePeriod" id="period-month">
                    <label for="period-month">This Month</label>
                  </div>
                  <div class="filter-option">
                    <input type="radio" name="timePeriod" id="period-custom">
                    <label for="period-custom">Custom Range</label>
                  </div>
                </div>
                <div class="date-inputs" id="customDateRange" style="display: none;">
                  <div class="date-input">
                    <input type="date" id="dateFrom" placeholder="From Date">
                  </div>
                  <div class="date-input">
                    <input type="date" id="dateTo" placeholder="To Date">
                  </div>
                </div>
              </div>
              
              <!-- Payment Status Filters -->
              <div class="filter-section">
                <div class="filter-section-title">Payment Status</div>
                <div class="filter-options">
                  <div class="filter-option">
                    <input type="checkbox" id="status-all" checked>
                    <label for="status-all">All Statuses</label>
                  </div>
                  <div class="filter-option">
                    <input type="checkbox" id="status-paid">
                    <label for="status-paid">Paid</label>
                  </div>
                  <div class="filter-option">
                    <input type="checkbox" id="status-pending">
                    <label for="status-pending">Pending</label>
                  </div>
                  <div class="filter-option">
                    <input type="checkbox" id="status-unpaid">
                    <label for="status-unpaid">Unpaid</label>
                  </div>
                </div>
              </div>
              
              <!-- Payment Method Filters -->
              <div class="filter-section">
                <div class="filter-section-title">Payment Methods</div>
                <div class="filter-options">
                  <div class="filter-option">
                    <input type="checkbox" id="method-all" checked>
                    <label for="method-all">All Methods</label>
                  </div>
                  <div class="filter-option">
                    <input type="checkbox" id="method-cash">
                    <label for="method-cash">Cash</label>
                  </div>
                  <div class="filter-option">
                    <input type="checkbox" id="method-card">
                    <label for="method-card">Card</label>
                  </div>
                  <div class="filter-option">
                    <input type="checkbox" id="method-digital">
                    <label for="method-digital">Digital Payment</label>
                  </div>
                </div>
              </div>
              
              <!-- Action Buttons -->
              <div class="filter-actions">
                <button class="btn-apply" id="applyFilters">Apply Filters</button>
                <button class="btn-clear" id="clearFilters">Reset Filters</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Active Filters Display -->
        <div class="active-filters" id="activeFilters">
          <!-- Filter tags will be dynamically added here -->
        </div>
      </div>
    </div>
  </div>

  {{-- Success Alert --}}
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  {{-- Tabs Navigation --}}
  <ul class="nav nav-tabs mb-4" id="salesTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab">
        <i class="fas fa-cart-check me-2"></i>Orders
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="payments-tab" data-bs-toggle="tab" data-bs-target="#payments" type="button" role="tab">
       Payments
      </button>
    </li>
  </ul>

  {{-- Tab Content --}}
  <div class="tab-content" id="salesTabContent">

    {{-- Orders Tab --}}
    <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
      <div class="card table-card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title mb-0">Order Records</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createOrderModal">
              <i class="fas fa-plus-circle me-2"></i>New Order
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <th>Date</th>
                  <th>Items</th>
                  <th>Total Amount</th>
                  <th>Payment Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($orders ?? [] as $order)
                  <tr>
                    <td><strong>#{{ $order->OrderID ?? 'N/A' }}</strong></td>
                    <td>
                      <div style="font-weight:600">{{ $order->customer->CustFName ?? 'N/A' }} {{ $order->customer->CustLName ?? '' }}</div>
                      <small class="text-muted">{{ $order->customer->CustPhone ?? '' }}</small>
                    </td>
                    <td><small class="text-muted">{{ $order->OrderDate->format('M d, Y h:i A') ?? 'N/A' }}</small></td>
                    <td>
                      <div style="font-weight:600">{{ $order->items_count ?? 0 }} item(s)</div>
                      <small class="text-muted">
                        @foreach($order->order_details ?? [] as $detail)
                          {{ $detail->ProductID }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                      </small>
                    </td>
                    <td><div style="font-weight:600" class="text-success">₱{{ number_format($order->TotalAmount ?? 0, 2) }}</div></td>
                    <td>
                      @if(($order->PaymentStatus ?? 'Unpaid') === 'Paid')
                        <span class="payment-badge payment-paid">Paid</span>
                      @elseif(($order->PaymentStatus ?? 'Unpaid') === 'Pending')
                        <span class="payment-badge payment-pending">Pending</span>
                      @else
                        <span class="payment-badge payment-unpaid">Unpaid</span>
                      @endif
                    </td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewOrderModal{{ $order->OrderID ?? '' }}">
                          <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center text-muted py-5">
                      <i class="fas fa-inbox fs-3 d-block mb-2"></i>
                      No orders found.
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
              Total: {{ count($orders ?? []) }} record(s)
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Payments Tab --}}
    <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
      <div class="card table-card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title mb-0">Payment Records</h5>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">
              <i class="fas fa-plus-circle me-2"></i>Record Payment
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Payment ID</th>
                  <th>Order</th>
                  <th>Customer</th>
                  <th>Amount</th>
                  <th>Method</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($payments ?? [] as $payment)
                  <tr>
                    <td><strong>#{{ $payment['PaymentID'] ?? 'N/A' }}</strong></td>
                    <td><a href="#" class="text-decoration-none">#{{ $payment['OrderID'] ?? 'N/A' }}</a></td>
                    <td>
                      <div style="font-weight:600">{{ $payment['CustomerName'] ?? 'N/A' }}</div>
                    </td>
                    <td><strong class="text-success">₱{{ number_format($payment['Amount'] ?? 0, 2) }}</strong></td>
                    <td><span class="text-capitalize">{{ $payment['PaymentMethod'] ?? 'N/A' }}</span></td>
                    <td>
                      @if(($payment['Status'] ?? 'Pending') === 'Paid')
                        <span class="payment-badge payment-paid">Paid</span>
                      @elseif(($payment['Status'] ?? 'Pending') === 'Pending')
                        <span class="payment-badge payment-pending">Pending</span>
                      @else
                        <span class="payment-badge payment-unpaid">Failed</span>
                      @endif
                    </td>
                    <td><small class="text-muted">{{ isset($payment['created_at']) ? $payment['created_at']->format('M d, Y h:i A') : 'N/A' }}</small></td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Receipt">
                          <i class="fas fa-file-invoice"></i>
                        </button>
                        <form action="#" method="POST" class="d-inline">
                          @csrf @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-outline-danger" 
                                  onclick="return confirm('Delete this payment?')">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="text-center text-muted py-5">
                      <i class="fas fa-inbox fs-3 d-block mb-2"></i>
                      No payments recorded yet.
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
              Total: {{ count($payments ?? []) }} payment{{ count($payments ?? []) != 1 ? 's' : '' }}
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

{{-- Create Order Modal --}}
<div class="modal fade" id="createOrderModal" tabindex="-1" aria-labelledby="createOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createOrderModalLabel">Create New Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('cashier.orders.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="CustID" class="form-label">Customer *</label>
                <select class="form-select" id="CustID" name="CustID" required>
                  <option value="">Select Customer</option>
                  <option value="CUST-001">Maria Santos (09123456789)</option>
                  <option value="CUST-002">Juan Dela Cruz (09198765432)</option>
                  <option value="CUST-003">Ana Reyes (09151234567)</option>
                  <option value="walk-in">Walk-in Customer</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="OrderDate" class="form-label">Order Date *</label>
                <input type="datetime-local" class="form-control" id="OrderDate" name="OrderDate" value="{{ date('Y-m-d\TH:i') }}" required>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Products *</label>
            <div id="products-container">
              <div class="product-row row g-2 mb-2">
                <div class="col-md-6">
                  <select class="form-select product-select" name="products[0][product_id]" required>
                    <option value="">Select Product</option>
                    <option value="PRD-001">Rosey Makeup Kit - ₱899.75</option>
                    <option value="PRD-002">Velvet Dress - ₱560.25</option>
                    <option value="PRD-003">Gift Ribbon - ₱175.50</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <input type="number" class="form-control" name="products[0][quantity]" placeholder="Qty" min="1" value="1" required>
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn btn-outline-danger btn-sm remove-product" disabled><i class="fas fa-trash"></i></button>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-product">
              <i class="fas fa-plus-circle me-1"></i>Add Product
            </button>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="PaymentMethod" class="form-label">Payment Method *</label>
                <select class="form-select" id="PaymentMethod" name="PaymentMethod" required>
                  <option value="Cash">Cash</option>
                  <option value="GCash">GCash</option>
                  <option value="Credit Card">Credit Card</option>
                  <option value="Debit Card">Debit Card</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="AmountTendered" class="form-label">Amount Tendered *</label>
                <input type="number" class="form-control" id="AmountTendered" name="AmountTendered" step="0.01" min="0" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Create Order</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Record Payment Modal --}}
<div class="modal fade" id="recordPaymentModal" tabindex="-1" aria-labelledby="recordPaymentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="recordPaymentModalLabel">Record New Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('cashier.payments.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="OrderID" class="form-label">Order ID *</label>
                <select class="form-select" id="OrderID" name="OrderID" required>
                  <option value="">Select Order</option>
                  <option value="ORD-001">#ORD-001 - Maria Santos</option>
                  <option value="ORD-002">#ORD-002 - Juan Dela Cruz</option>
                  <option value="ORD-003">#ORD-003 - Ana Reyes</option>
                  <option value="walk-in">Walk-in Customer</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="Amount" class="form-label">Amount *</label>
                <input type="number" step="0.01" class="form-control" id="Amount" name="Amount" min="0.01" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="PaymentMethod" class="form-label">Payment Method *</label>
                <select class="form-select" id="PaymentMethod" name="PaymentMethod" required>
                  <option value="Cash">Cash</option>
                  <option value="GCash">GCash</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="Status" class="form-label">Status *</label>
                <select class="form-select" id="Status" name="Status" required>
                  <option value="Paid">Paid</option>
                  <option value="Pending">Pending</option>
                  <option value="Failed">Failed</option>
                </select>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="Notes" class="form-label">Notes (Optional)</label>
            <textarea class="form-control" id="Notes" name="Notes" rows="2"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Record Payment</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Filter functionality
  const filterToggle = document.getElementById('filterToggle');
  const filterMenu = document.getElementById('filterMenu');
  const activeFilters = document.getElementById('activeFilters');
  const customDateRange = document.getElementById('customDateRange');
  
  // User dropdown functionality
  const userDropdownToggle = document.getElementById('userDropdownToggle');
  const userDropdownMenu = document.getElementById('userDropdownMenu');
  
  // Store current filters
  let currentFilters = {
    timePeriod: 'This Week',
    paymentStatus: ['All Statuses'],
    paymentMethods: ['All Methods']
  };
  
  // Filter toggle
  filterToggle.addEventListener('click', function(e) {
    e.stopPropagation();
    const isVisible = filterMenu.style.display === 'block';
    filterMenu.style.display = isVisible ? 'none' : 'block';
    filterToggle.classList.toggle('active', !isVisible);
  });
  
  // User dropdown toggle
  userDropdownToggle.addEventListener('click', function(e) {
    e.stopPropagation();
    const isVisible = userDropdownMenu.style.display === 'block';
    userDropdownMenu.style.display = isVisible ? 'none' : 'block';
  });
  
  // Close dropdowns when clicking outside
  document.addEventListener('click', function() {
    filterMenu.style.display = 'none';
    filterToggle.classList.remove('active');
    userDropdownMenu.style.display = 'none';
  });
  
  // Prevent closing when clicking inside the filter menu
  filterMenu.addEventListener('click', function(e) {
    e.stopPropagation();
  });
  
  // Prevent closing when clicking inside the user dropdown
  userDropdownMenu.addEventListener('click', function(e) {
    e.stopPropagation();
  });
  
  // Show/hide custom date range
  document.querySelectorAll('input[name="timePeriod"]').forEach(radio => {
    radio.addEventListener('change', function() {
      if (this.id === 'period-custom') {
        customDateRange.style.display = 'flex';
      } else {
        customDateRange.style.display = 'none';
      }
    });
  });
  
  // Apply filters
  document.getElementById('applyFilters').addEventListener('click', function() {
    filterMenu.style.display = 'none';
    filterToggle.classList.remove('active');
    
    // Update current filters based on selections
    updateCurrentFilters();
    
    // Update active filters display
    updateActiveFilters();
    
    // Here you would typically refresh sales data based on filters
    console.log('Filters applied - refreshing sales data...');
  });
  
  // Clear filters
  document.getElementById('clearFilters').addEventListener('click', function() {
    // Clear all checkboxes and radios
    document.querySelectorAll('.filter-option input[type="checkbox"]').forEach(checkbox => {
      checkbox.checked = false;
    });
    
    // Set default values
    document.getElementById('period-today').checked = false;
    document.getElementById('period-week').checked = true;
    document.getElementById('period-month').checked = false;
    document.getElementById('status-all').checked = true;
    document.getElementById('method-all').checked = true;
    
    // Hide custom date range
    customDateRange.style.display = 'none';
    
    // Update current filters to defaults
    currentFilters = {
      timePeriod: 'This Week',
      paymentStatus: ['All Statuses'],
      paymentMethods: ['All Methods']
    };
    
    // Update active filters
    updateActiveFilters();
  });
  
  function updateCurrentFilters() {
    // Update time period
    if (document.getElementById('period-today').checked) {
      currentFilters.timePeriod = 'Today';
    } else if (document.getElementById('period-week').checked) {
      currentFilters.timePeriod = 'This Week';
    } else if (document.getElementById('period-month').checked) {
      currentFilters.timePeriod = 'This Month';
    } else if (document.getElementById('period-custom').checked) {
      const fromDate = document.getElementById('dateFrom').value;
      const toDate = document.getElementById('dateTo').value;
      currentFilters.timePeriod = `Custom: ${fromDate} to ${toDate}`;
    }
    
    // Update payment status
    currentFilters.paymentStatus = [];
    if (document.getElementById('status-all').checked) {
      currentFilters.paymentStatus.push('All Statuses');
    } else {
      if (document.getElementById('status-paid').checked) {
        currentFilters.paymentStatus.push('Paid');
      }
      if (document.getElementById('status-pending').checked) {
        currentFilters.paymentStatus.push('Pending');
      }
      if (document.getElementById('status-unpaid').checked) {
        currentFilters.paymentStatus.push('Unpaid');
      }
    }
    
    // Update payment methods
    currentFilters.paymentMethods = [];
    if (document.getElementById('method-all').checked) {
      currentFilters.paymentMethods.push('All Methods');
    } else {
      if (document.getElementById('method-cash').checked) {
        currentFilters.paymentMethods.push('Cash');
      }
      if (document.getElementById('method-card').checked) {
        currentFilters.paymentMethods.push('Card');
      }
      if (document.getElementById('method-digital').checked) {
        currentFilters.paymentMethods.push('Digital Payment');
      }
    }
  }
  
  function updateActiveFilters() {
    // Clear existing filter tags
    activeFilters.innerHTML = '';
    
    // Check if we have any non-default filters
    const hasCustomFilters = 
      currentFilters.timePeriod !== 'This Week' ||
      currentFilters.paymentStatus.length !== 1 || 
      currentFilters.paymentStatus[0] !== 'All Statuses' ||
      currentFilters.paymentMethods.length !== 1 || 
      currentFilters.paymentMethods[0] !== 'All Methods';
    
    if (!hasCustomFilters) {
      // No custom filters applied, hide the active filters section
      activeFilters.classList.remove('has-filters');
      return;
    }
    
    // Show active filters section
    activeFilters.classList.add('has-filters');
    
    // Add time period filter tag if not default
    if (currentFilters.timePeriod !== 'This Week') {
      const timeTag = createFilterTag(`Time: ${currentFilters.timePeriod}`, 'timePeriod');
      activeFilters.appendChild(timeTag);
    }
    
    // Add payment status filter tags if not "All Statuses"
    if (currentFilters.paymentStatus.length > 0 && 
        (currentFilters.paymentStatus.length > 1 || currentFilters.paymentStatus[0] !== 'All Statuses')) {
      currentFilters.paymentStatus.forEach(status => {
        const statusTag = createFilterTag(status, `status-${status.toLowerCase().replace(' ', '-')}`);
        activeFilters.appendChild(statusTag);
      });
    }
    
    // Add payment method filter tags if not "All Methods"
    if (currentFilters.paymentMethods.length > 0 && 
        (currentFilters.paymentMethods.length > 1 || currentFilters.paymentMethods[0] !== 'All Methods')) {
      currentFilters.paymentMethods.forEach(method => {
        const methodTag = createFilterTag(method, `method-${method.toLowerCase().replace(' ', '-')}`);
        activeFilters.appendChild(methodTag);
      });
    }
  }
  
  function createFilterTag(text, filterType) {
    const tag = document.createElement('div');
    tag.className = 'filter-tag';
    
    const span = document.createElement('span');
    span.textContent = text;
    
    const removeBtn = document.createElement('button');
    removeBtn.className = 'filter-tag-remove';
    removeBtn.setAttribute('data-filter', filterType);
    removeBtn.innerHTML = '×';
    removeBtn.addEventListener('click', function() {
      removeFilter(filterType);
    });
    
    tag.appendChild(span);
    tag.appendChild(removeBtn);
    
    return tag;
  }
  
  function removeFilter(filterType) {
    // Remove the specific filter and update the UI
    if (filterType === 'timePeriod') {
      document.getElementById('period-week').checked = true;
      currentFilters.timePeriod = 'This Week';
    } else if (filterType.startsWith('status-')) {
      const filterName = filterType.replace('status-', '').replace('-', ' ');
      const index = currentFilters.paymentStatus.indexOf(
        filterName.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ')
      );
      if (index > -1) {
        currentFilters.paymentStatus.splice(index, 1);
      }
    } else if (filterType.startsWith('method-')) {
      const filterName = filterType.replace('method-', '').replace('-', ' ');
      const index = currentFilters.paymentMethods.indexOf(
        filterName.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ')
      );
      if (index > -1) {
        currentFilters.paymentMethods.splice(index, 1);
      }
    }
    
    // Update the checkboxes/radios to reflect the change
    updateFilterInputs();
    
    // Update active filters display
    updateActiveFilters();
    
    // Here you would typically refresh sales data
    console.log('Filter removed - refreshing sales data...');
  }
  
  function updateFilterInputs() {
    // Update time period radio
    if (currentFilters.timePeriod === 'Today') {
      document.getElementById('period-today').checked = true;
    } else if (currentFilters.timePeriod === 'This Week') {
      document.getElementById('period-week').checked = true;
    } else if (currentFilters.timePeriod === 'This Month') {
      document.getElementById('period-month').checked = true;
    }
    
    // Update payment status checkboxes
    document.getElementById('status-all').checked = currentFilters.paymentStatus.includes('All Statuses');
    document.getElementById('status-paid').checked = currentFilters.paymentStatus.includes('Paid');
    document.getElementById('status-pending').checked = currentFilters.paymentStatus.includes('Pending');
    document.getElementById('status-unpaid').checked = currentFilters.paymentStatus.includes('Unpaid');
    
    // Update payment method checkboxes
    document.getElementById('method-all').checked = currentFilters.paymentMethods.includes('All Methods');
    document.getElementById('method-cash').checked = currentFilters.paymentMethods.includes('Cash');
    document.getElementById('method-card').checked = currentFilters.paymentMethods.includes('Card');
    document.getElementById('method-digital').checked = currentFilters.paymentMethods.includes('Digital Payment');
  }

  // Set current datetime
  document.getElementById('OrderDate').value = new Date().toISOString().slice(0, 16);

  // Add product row
  let productCount = 1;
  document.getElementById('add-product').addEventListener('click', function() {
    const container = document.getElementById('products-container');
    const newRow = document.createElement('div');
    newRow.className = 'product-row row g-2 mb-2';
    newRow.innerHTML = `
      <div class="col-md-6">
        <select class="form-select product-select" name="products[${productCount}][product_id]" required>
          <option value="">Select Product</option>
          <option value="PRD-001">Rosey Makeup Kit - ₱899.75</option>
          <option value="PRD-002">Velvet Dress - ₱560.25</option>
          <option value="PRD-003">Gift Ribbon - ₱175.50</option>
        </select>
      </div>
      <div class="col-md-4">
        <input type="number" class="form-control" name="products[${productCount}][quantity]" placeholder="Qty" min="1" value="1" required>
      </div>
      <div class="col-md-2">
        <button type="button" class="btn btn-outline-danger btn-sm remove-product">
          <i class="fas fa-trash"></i>
        </button>
      </div>
    `;
    container.appendChild(newRow);
    productCount++;
    updateRemoveButtons();
  });

  function updateRemoveButtons() {
    const removeButtons = document.querySelectorAll('.remove-product');
    removeButtons.forEach((button, index) => {
      if (index === 0) {
        button.disabled = true;
      } else {
        button.disabled = false;
        button.onclick = function() {
          this.closest('.product-row').remove();
          updateRemoveButtons();
        };
      }
    });
  }

  updateRemoveButtons();

  // Initialize tooltips
  document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  });
</script>
</body>
</html>