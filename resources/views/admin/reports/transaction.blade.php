<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Transaction Report | Dora's Oshopee</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {font-family:'Poppins',sans-serif;background:#f5f7fb;}
    .sidebar{min-width:220px;max-width:220px;background:#fff;border-right:1px solid #eef2f7;height:100vh;position:fixed;top:0;left:0;padding:22px;display:flex;flex-direction:column;overflow:hidden;}
    .brand{display:flex;align-items:center;gap:10px;margin-bottom:18px;flex-shrink:0;}
    .brand img{width:42px;height:auto;}
    .sidebar .nav-link{color:#5b5f72;padding:10px 8px;border-radius:10px;}
    .sidebar .nav-link.active{background:#efeaff;color:#3b3183;font-weight:600;}
    .sidebar .nav-link:hover{background:#f8f9fa;}
    .content-wrap{margin-left:240px;padding:28px;}
    .topbar{display:flex;gap:16px;align-items:center;justify-content:space-between;margin-bottom:22px;}
    .table-card{border-radius:12px;border:none;box-shadow:0 2px 4px rgba(0,0,0,0.04);}
    .table th{border-top:none;font-weight:600;color:#5b5f72;font-size:.85rem;text-transform:uppercase;letter-spacing:.5px;padding:12px 16px;}
    .table td{padding:16px;vertical-align:middle;border-color:#f1f3f4;}
    
    /* Status Badges */
    .status-badge{padding:6px 12px;border-radius:20px;font-size:.75rem;font-weight:500;}
    .status-completed{background:#d4edda;color:#23b07a;}
    .status-cancelled{background:#f8d7da;color:#e05252;}

    /* Stats Cards */
    .stat-card{background:#fff;border-radius:12px;padding:1.2rem;box-shadow:0 2px 4px rgba(0,0,0,0.05);}

    .sidebar-nav{flex:1;overflow-y:auto;overflow-x:hidden;margin-top:18px;}
    .sidebar-nav::-webkit-scrollbar{width:4px;}
    .sidebar-nav::-webkit-scrollbar-track{background:#f1f1f1;border-radius:10px;}
    .sidebar-nav::-webkit-scrollbar-thumb{background:#c1c1c1;border-radius:10px;}
    .nav .nav-link.dropdown-toggle::after{float:right;margin-top:6px;}
    .nav .nav.flex-column.ms-3{border-left:2px solid #eef2f7;margin-left:12px !important;padding-left:8px;}
    .nav .nav.flex-column.ms-3 .nav-link{padding:8px 12px;font-size:.875rem;border-radius:6px;}
    .sidebar-footer{flex-shrink:0;margin-top:auto;padding-top:16px;}

    @media (max-width:991px){
      .sidebar{position:relative;width:100%;height:auto;max-height:80vh;border-right:none;padding:12px 16px;overflow:auto;}
      .content-wrap{margin-left:0;padding:16px;}
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
      <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-house-door-fill me-2"></i> Dashboard</a>
      <a class="nav-link" href="{{ route('admin.accounts.index') }}"><i class="bi bi-person-badge me-2"></i> Accounts</a>

      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#recordsSubmenu"><i class="bi bi-file-earmark-text me-2"></i> Records</a>
      <div class="collapse" id="recordsSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link" href="{{ route('admin.records.suppliers.index') }}"><i class="bi bi-truck me-2"></i> Suppliers</a>
          <a class="nav-link" href="{{ route('admin.records.employees.index') }}"><i class="bi bi-people me-2"></i> Employees</a>
          <a class="nav-link" href="{{ route('admin.records.products.index') }}"><i class="bi bi-box-seam me-2"></i> Products</a>
        </div>
      </div>

      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#transactionsSubmenu"><i class="bi bi-arrow-left-right me-2"></i> Transactions</a>
      <div class="collapse" id="transactionsSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link" href="{{ route('admin.transactions.stock-in.index') }}"><i class="bi bi-arrow-down-circle me-2"></i> Stock In</a>
          <a class="nav-link" href="{{ route('admin.transactions.pullouts.index') }}"><i class="bi bi-arrow-up-circle me-2"></i> Pullouts</a>
        </div>
      </div>

      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#reportsSubmenu"><i class="bi bi-file-earmark-text me-2"></i> Reports</a>
      <div class="collapse show" id="reportsSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link active" href="{{ route('admin.reports.transaction') }}"><i class="bi bi-file-earmark-arrow-down me-2"></i> Transaction</a>
          <a class="nav-link" href="{{ route('admin.reports.inventory') }}"><i class="bi bi-clipboard-data me-2"></i> Inventory</a>
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
    <div>
      <h4 class="mb-0">Transaction Report</h4>
      <small class="text-muted">View completed and cancelled sales</small>
    </div>

    <div class="d-flex align-items-center gap-3">
      {{-- Period Filter --}}
      <form method="GET" action="{{ route('admin.reports.transaction') }}" class="d-inline">
        <select name="period" onchange="this.form.submit()" class="form-select form-select-sm" style="width:auto;">
          <option value="daily"   {{ $period == 'daily'   ? 'selected' : '' }}>Today</option>
          <option value="monthly" {{ $period == 'monthly' ? 'selected' : '' }}>This Month</option>
          <option value="yearly"  {{ $period == 'yearly'  ? 'selected' : '' }}>This Year</option>
        </select>
      </form>

      <div class="d-flex align-items-center gap-3">
        <div class="text-end">
          <div style="font-weight:600">{{ Auth::user()->name }}</div>
          <small class="text-muted">Administrator</small>
        </div>
        <img src="{{ asset('images/logo_.png') }}" style="width:44px;border-radius:10px;">
      </div>
    </div>
  </div>

  

  {{-- Transaction Table --}}
  <div class="card table-card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="card-title mb-0">Transaction History</h5>
        <a href="{{ route('admin.reports.transaction') }}?period={{ $period }}&export=csv" class="btn btn-success">
          <i class="bi bi-file-earmark-excel me-2"></i> Export
        </a>
      </div>

      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Transaction ID</th>
              <th>Cashier</th>
              <th>Items</th>
              <th>Total Amount</th>
              <th>Payment</th>
              <th>Status</th>
              <th>Date & Time</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($paginator as $t)
              <tr>
                <td><strong>#{{ $t->id }}</strong></td>
                <td>
                  <div class="d-flex align-items-center">
                   
                    <div class="flex-grow-1">
                      <div style="font-weight:600">{{ $t->cashier->EmpFName }} {{ $t->cashier->EmpLName }}</div>
                      <small class="text-muted">Cashier</small>
                    </div>
                  </div>
                </td>
                <td>{{ $t->total_items }}</td>
                <td><strong>₱{{ number_format($t->amount, 2) }}</strong></td>
                <td>{{ $t->payment_method }}</td>
                <td>
                  @if($t->status === 'Completed')
                    <span class="status-badge status-completed">Completed</span>
                  @elseif($t->status === 'Cancelled')
                    <span class="status-badge status-cancelled">Cancelled</span>
                  @else
                    <span class="status-badge bg-secondary">{{ $t->status }}</span>
                  @endif
                </td>
                <td><small class="text-muted">{{ $t->created_at->format('M d, Y H:i') }}</small></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Details">
                      <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Delete Transaction">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center text-muted py-5">
                  <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                  No transactions found for the selected period.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-between align-items-center mt-4">
        <div class="text-muted">
          Total: {{ $paginator->total() }} record{{ $paginator->total() != 1 ? 's' : '' }}
        </div>
        {{ $paginator->appends(request()->query())->links() }}
      </div>
    </div>
  </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
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