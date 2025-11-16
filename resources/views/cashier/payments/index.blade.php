<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Payments | Dora's Oshopee</title>

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
    .table-card { border-radius:12px; border:none; box-shadow:0 2px 4px rgba(0,0,0,0.04); }
    .table th { border-top:none; font-weight:600; color:#5b5f72; font-size:.85rem; text-transform:uppercase; letter-spacing:.5px; padding:12px 16px; }
    .table td { padding:16px; vertical-align:middle; border-color:#f1f3f4; }

    /* Payment Status Badge */
    .payment-badge { padding:6px 12px; border-radius:20px; font-size:.75rem; font-weight:500; }
    .payment-paid {  color:#23b07a; }
    .payment-pending {  color:#f08a24; }
    .payment-failed {  color:#e05252; }

    .sidebar-nav { flex:1; overflow-y:auto; overflow-x:hidden; margin-top:18px; }
    .sidebar-nav::-webkit-scrollbar { width:4px; }
    .sidebar-nav::-webkit-scrollbar-track { background:#f1f1f1; border-radius:10px; }
    .sidebar-nav::-webkit-scrollbar-thumb { background:#c1c1c1; border-radius:10px; }
    .nav .nav-link.dropdown-toggle::after { float:right; margin-top:6px; }
    .nav .nav.flex-column.ms-3 { border-left:2px solid #eef2f7; margin-left:12px !important; padding-left:8px; }
    .sidebar-footer { flex-shrink:0; margin-top:auto; padding-top:16px; }

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
      <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-house-door-fill me-2"></i> Dashboard</a>

      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#salesSubmenu">
        <i class="bi bi-cash-stack me-2"></i> Transactions
      </a>
      <div class="collapse show" id="salesSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link" href="{{ route('cashier.orders.index') }}"><i class="bi bi-cart-check me-2"></i> Orders</a>
          <a class="nav-link active" href="{{ route('cashier.payments.index') }}"><i class="bi bi-credit-card me-2"></i> Payments</a>
          <a class="nav-link" href="{{ route('cashier.transactions.index') }}"><i class="bi bi-clock-history me-2"></i> Transaction History</a>
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
      <h4 class="mb-0">Payments Management</h4>
      <small class="text-muted">Track customer payments</small>
    </div>

    <div class="d-flex align-items-center gap-3">
      <form method="GET" action="{{ route('cashier.payments.index') }}" class="d-inline">
        <div class="input-group search-input">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
          <input type="text" name="search" class="form-control" placeholder="Search payments..." value="{{ request('search') }}" />
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

  {{-- Success Alert --}}
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  {{-- Payments Table --}}
  <div class="card table-card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="card-title mb-0">Payment Records</h5>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">
          <i class="bi bi-plus-circle me-2"></i>Record Payment
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
            @forelse($payments as $payment)
              <tr>
                <td><strong>#{{ $payment['PaymentID'] }}</strong></td>
                <td><a href="#" class="text-decoration-none">#{{ $payment['OrderID'] }}</a></td>
                <td>
                  <div style="font-weight:600">{{ $payment['CustomerName'] }}</div>
                </td>
                <td><strong class="text-success">₱{{ number_format($payment['Amount'], 2) }}</strong></td>
                <td><span class="text-capitalize">{{ $payment['PaymentMethod'] }}</span></td>
                <td>
                  @if($payment['Status'] === 'Paid')
                    <span class="payment-badge payment-paid">Paid</span>
                  @elseif($payment['Status'] === 'Pending')
                    <span class="payment-badge payment-pending">Pending</span>
                  @else
                    <span class="payment-badge payment-failed">Failed</span>
                  @endif
                </td>
                <td><small class="text-muted">{{ $payment['created_at']->format('M d, Y h:i A') }}</small></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Receipt">
                      <i class="bi bi-file-earmark-text"></i>
                    </button>
                    <form action="#" method="POST" class="d-inline">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-danger" 
                              onclick="return confirm('Delete this payment?')">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center text-muted py-5">
                  <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                  No payments recorded yet.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-between align-items-center mt-4">
        <div class="text-muted">
          Total: {{ $payments->count() }} payment{{ $payments->count() != 1 ? 's' : '' }}
        </div>
      </div>
    </div>
  </div>
</main>

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