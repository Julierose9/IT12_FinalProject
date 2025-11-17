<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Transaction History | Dora's Oshopee</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; background:#f5f7fb; }
    .sidebar { min-width:220px; max-width:220px; background:#fff; border-right:1px solid #eef2f7; height:100vh; position:fixed; top:0; left:0; padding:22px; display:flex; flex-direction:column; overflow:hidden; }
    .brand { display:flex; align-items:center; gap:10px; margin-bottom:18px; flex-shrink:0; }
    .brand img { width:42px; height:auto; }
    .sidebar .nav-link { color:#5b5f72; padding:10px 8px; border-radius:10px; }
    .sidebar .nav-link.active { background:#efeaff; color:#3b3183; font-weight:600; }
    .sidebar .nav-link:hover { background:#f8f9fa; }
    .content-wrap { margin-left:240px; padding:28px; }
    .topbar { display:flex; gap:16px; align-items:center; justify-content:space-between; margin-bottom:22px; }
    .search-input { max-width:520px; width:100%; }
    .stats-card { border-radius:12px; padding:20px; box-shadow:0 2px 4px rgba(0,0,0,0.04); background:#fff; }
    .stats-card h3 { font-size:1.75rem; font-weight:700; margin:0; }
    .stats-card small { color:#6c757d; }
    
    /* Removed card styling */
    .table-card { border-radius:0; border:none; box-shadow:none; background:transparent; padding:0; }
    .table { border:none; background:transparent; }
    .table th { font-weight:600; color:#5b5f72; font-size:.85rem; text-transform:uppercase; letter-spacing:.5px; padding:12px 16px; border:none; }
    .table td { padding:16px; vertical-align:middle; border:none; }
    .table tbody tr { background:transparent; }

    /* Status badges - removed backgrounds, kept text colors */
    .status-badge { padding:6px 12px; border-radius:20px; font-size:0.75rem; font-weight:500; background:transparent; }
    .status-completed { color:#23b07a; }
    .status-pending { color:#f08a24; }
    .status-cancelled { color:#e05252; }
    .status-paid { color:#23b07a; }
    .status-unpaid { color:#e05252; }

    /* Payment method badges - removed backgrounds, kept text colors */
    .method-badge { padding:6px 12px; border-radius:20px; font-size:0.75rem; font-weight:500; background:transparent; }
    .method-cash { color:#23b07a; }
    .method-gcash { color:#1a73e8; }
    .method-card { color:#f57c00; }

    .sidebar-nav { flex:1; overflow-y:auto; overflow-x:hidden; margin-top:18px; }
    .sidebar-nav::-webkit-scrollbar { width:4px; }
    .sidebar-nav::-webkit-scrollbar-track { background:#f1f1f1; border-radius:10px; }
    .sidebar-nav::-webkit-scrollbar-thumb { background:#c1c1c1; border-radius:10px; }
    .nav .nav-link.dropdown-toggle::after { float:right; margin-top:6px; }
    .nav .nav.flex-column.ms-3 { border-left:2px solid #eef2f7; margin-left:12px !important; padding-left:8px; }
    .sidebar-footer { flex-shrink:0; margin-top:auto; padding-top:16px; }

    /* Filter section */
    .filter-section { background:#f8f9fa; border-radius:10px; padding:20px; margin-bottom:20px; }

    /* Removed action buttons */
    .action-buttons { display: none; }

    @media (max-width:991px) {
      .sidebar { position:relative; width:100%; height:auto; max-height:80vh; border-right:none; padding:12px 16px; overflow:auto; }
      .content-wrap { margin-left:0; padding:16px; }
    }
  </style>
</head>
<body>

{{-- Sidebar --}}
<aside class="sidebar">
  <div class="brand">
    <img src="{{ asset('images/logo_.png') }}" alt="Logo">
    <div><div style="font-weight:600">Dora's</div><small class="text-muted">Gift Shop</small></div>
  </div>

  <div class="sidebar-nav">
    <nav class="nav flex-column">
      <a class="nav-link" href="{{ route('cashier.dashboard') }}"><i class="bi bi-house-door-fill me-2"></i> Dashboard</a>

      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#salesSubmenu">
        <i class="bi bi-cash-stack me-2"></i> Transactions
      </a>
      <div class="collapse show" id="salesSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link" href="{{ route('cashier.orders.index') }}"><i class="bi bi-cart-check me-2"></i> Orders</a>
          <a class="nav-link" href="{{ route('cashier.payments.index') }}"><i class="bi bi-credit-card me-2"></i> Payments</a>
          <a class="nav-link active" href="{{ route('cashier.transactions.index') }}"><i class="bi bi-clock-history me-2"></i> Transaction History</a>
        </div>
      </div>

      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#reportsSubmenu">
        <i class="bi bi-file-earmark-text me-2"></i> Reports
      </a>
      <div class="collapse" id="reportsSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link" href="{{ route('cashier.reports.daily-sales') }}"><i class="bi bi-graph-up me-2"></i> Daily Sales</a>
        </div>
      </div>
    </nav>
  </div>

  <div class="sidebar-footer">
    <form method="POST" action="{{ route('logout') }}">@csrf
      <button class="btn btn-outline-secondary btn-sm w-100"><i class="bi bi-box-arrow-right me-1"></i> Sign Out</button>
    </form>
  </div>
</aside>

<main class="content-wrap">

  {{-- Topbar --}}
  <div class="topbar">
    <div class="d-flex align-items-center gap-3">
      <h4 class="mb-0">Transaction History</h4>
      <small class="text-muted">Complete order and payment records</small>
    </div>

    <div class="d-flex align-items-center gap-3">
      {{-- Search --}}
      <form method="GET" action="{{ route('cashier.transactions.index') }}" class="d-inline">
        <div class="input-group search-input">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
          <input type="text"
                 name="search"
                 class="form-control"
                 placeholder="Search transactions..."
                 value="{{ request('search') }}" />
        </div>
      </form>

      <div class="d-flex align-items-center gap-3">
        <div class="text-end me-2">
          <div style="font-weight:600">{{ Auth::user()->name ?? 'Cashier' }}</div>
          <small class="text-muted">Cashier</small>
        </div>
        <img src="{{ asset('images/logo_.png') }}" alt="avatar" style="width:44px; border-radius:10px;">
      </div>
    </div>
  </div>

  
  {{-- Filter Section --}}
  <div class="filter-section">
    <div class="row g-3">
      <div class="col-md-3">
        <label class="form-label">Date From</label>
        <input type="date" class="form-control" id="dateFrom" value="2025-10-11">
      </div>
      <div class="col-md-3">
        <label class="form-label">Date To</label>
        <input type="date" class="form-control" id="dateTo" value="2025-11-17">
      </div>
      <div class="col-md-3">
        <label class="form-label">Status</label>
        <select class="form-select" id="statusFilter">
          <option value="">All Status</option>
          <option value="completed">Completed</option>
          <option value="pending">Pending</option>
          <option value="cancelled">Cancelled</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Payment Method</label>
        <select class="form-select" id="paymentMethodFilter">
          <option value="">All Methods</option>
          <option value="cash">Cash</option>
          <option value="gcash">GCash</option>
          <option value="card">Card</option>
        </select>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12 d-flex justify-content-end gap-2">
        <button class="btn btn-outline-secondary" id="resetFilters">
          <i class="bi bi-arrow-clockwise me-2"></i>Reset Filters
        </button>
        <button class="btn btn-primary" id="applyFilters">
          <i class="bi bi-funnel me-2"></i>Apply Filters
        </button>
      </div>
    </div>
  </div>

  {{-- Transaction History Table --}}
  <div class="table-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h5 class="mb-0">Transaction Records</h5>
      <!-- Removed Print and Export CSV buttons -->
    </div>

    <div class="table-responsive">
      <table class="table table-hover" id="transactionsTable">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Items</th>
            <th>Total Amount</th>
            <th>Payment Method</th>
            <th>Payment Status</th>
            <th>Order Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <strong>#001</strong>
              <br><small class="text-muted">Payment: PAY001</small>
            </td>
            <td>
              <div style="font-weight:600">Walk-in Customer</div>
              <small class="text-muted">N/A</small>
            </td>
            <td>
              <div style="font-weight:500">Nov 15, 2025</div>
              <small class="text-muted">10:30 AM</small>
            </td>
            <td>
              <div style="font-weight:500">3 items</div>
              <small class="text-muted">Various items</small>
            </td>
            <td>
              <strong class="text-success">₱2,499.00</strong>
            </td>
            <td>
              <span class="method-badge method-cash">Cash</span>
            </td>
            <td>
              <span class="status-badge status-paid">Paid</span>
            </td>
            <td>
              <span class="status-badge status-completed">Completed</span>
            </td>
          </tr>
          <tr>
            <td>
              <strong>#002</strong>
              <br><small class="text-muted">Payment: PAY002</small>
            </td>
            <td>
              <div style="font-weight:600">Walk-in Customer</div>
              <small class="text-muted">N/A</small>
            </td>
            <td>
              <div style="font-weight:500">Nov 14, 2025</div>
              <small class="text-muted">02:15 PM</small>
            </td>
            <td>
              <div style="font-weight:500">2 items</div>
              <small class="text-muted">Various items</small>
            </td>
            <td>
              <strong class="text-success">₱1,800.00</strong>
            </td>
            <td>
              <span class="method-badge method-gcash">GCash</span>
            </td>
            <td>
              <span class="status-badge status-paid">Paid</span>
            </td>
            <td>
              <span class="status-badge status-completed">Completed</span>
            </td>
          </tr>
          <tr>
            <td>
              <strong>#003</strong>
              <br><small class="text-muted">Payment: PAY003</small>
            </td>
            <td>
              <div style="font-weight:600">Walk-in Customer</div>
              <small class="text-muted">N/A</small>
            </td>
            <td>
              <div style="font-weight:500">Nov 13, 2025</div>
              <small class="text-muted">11:45 AM</small>
            </td>
            <td>
              <div style="font-weight:500">1 item</div>
              <small class="text-muted">Various items</small>
            </td>
            <td>
              <strong class="text-success">₱2,800.00</strong>
            </td>
            <td>
              <span class="method-badge method-card">Card</span>
            </td>
            <td>
              <span class="status-badge status-unpaid">Unpaid</span>
            </td>
            <td>
              <span class="status-badge status-pending">Pending</span>
            </td>
          </tr>
          <tr>
            <td>
              <strong>#004</strong>
              <br><small class="text-muted">Payment: PAY004</small>
            </td>
            <td>
              <div style="font-weight:600">Walk-in Customer</div>
              <small class="text-muted">N/A</small>
            </td>
            <td>
              <div style="font-weight:500">Nov 12, 2025</div>
              <small class="text-muted">04:20 PM</small>
            </td>
            <td>
              <div style="font-weight:500">2 items</div>
              <small class="text-muted">Various items</small>
            </td>
            <td>
              <strong class="text-success">₱1,000.00</strong>
            </td>
            <td>
              <span class="method-badge method-cash">Cash</span>
            </td>
            <td>
              <span class="status-badge status-paid">Paid</span>
            </td>
            <td>
              <span class="status-badge status-completed">Completed</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Filter functionality
  document.getElementById('applyFilters').addEventListener('click', function() {
    const dateFrom = document.getElementById('dateFrom').value;
    const dateTo = document.getElementById('dateTo').value;
    const status = document.getElementById('statusFilter').value;
    const paymentMethod = document.getElementById('paymentMethodFilter').value;
    
    // In a real application, this would make an API call or reload the page with filters
    alert('Filters applied! (This would refresh the data in a real application)');
  });

  document.getElementById('resetFilters').addEventListener('click', function() {
    document.getElementById('dateFrom').value = '2025-10-11';
    document.getElementById('dateTo').value = '2025-11-17';
    document.getElementById('statusFilter').value = '';
    document.getElementById('paymentMethodFilter').value = '';
  });
</script>
</body>
</html>