<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daily Sales | Dora's Oshopee</title>

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
    .table-card { border-radius:12px; border:none; box-shadow:0 2px 4px rgba(0,0,0,0.04); }
    .table th { font-weight:600; color:#5b5f72; font-size:.85rem; text-transform:uppercase; letter-spacing:.5px; padding:12px 16px; }
    .table td { padding:16px; vertical-align:middle; border-color:#f1f3f4; }

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
      <div class="collapse" id="salesSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link" href="{{ route('cashier.sales.index') }}"><i class="bi bi-bag-check me-2"></i> Sales</a>
          <a class="nav-link" href="{{ route('cashier.transactions.index') }}"><i class="bi bi-clock-history me-2"></i> Transaction History</a>
        </div>
      </div>

      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#reportsSubmenu">
        <i class="bi bi-file-earmark-text me-2"></i> Reports
      </a>
      <div class="collapse show" id="reportsSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link active" href="{{ route('cashier.reports.daily-sales') }}"><i class="bi bi-graph-up me-2"></i> Daily Sales</a>
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
      <h4 class="mb-0">Daily Sales Report</h4>
    </div>

    <div class="d-flex align-items-center gap-3">

      {{-- SEARCH BAR --}}
      <form method="GET" action="{{ route('cashier.reports.daily-sales') }}" class="d-inline">
        <div class="input-group search-input">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
          <input type="text"
                 name="search"
                 class="form-control"
                 placeholder="Search payments..."
                 value="{{ request('search') }}" />
        </div>
      </form>

      {{-- Date picker --}}
      <form method="GET" action="{{ route('cashier.reports.daily-sales') }}" class="d-inline">
        <div class="input-group">
          <input type="date"
                 name="date"
                 class="form-control"
                 value="{{ $selectedDate->format('Y-m-d') }}"
                 required>
          <button class="btn btn-outline-primary" type="submit"><i class="bi bi-calendar-check"></i></button>
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

  {{-- Breakdown Table with Export Button on Top-Left --}}
  <div class="card table-card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="card-title mb-0">Sales by Payment Method</h5>

        {{-- EXPORT BUTTON - TOP LEFT OF TABLE --}}
        <button class="btn btn-success " onclick="exportCSV()">
          <i class="bi bi-download me-1"></i>Export CSV
        </button>
      </div>

      <div class="table-responsive">
        <table class="table table-hover" id="salesTable">
          <thead>
            <tr>
              <th>Payment Method</th>
              <th>Transactions</th>
              <th>Total Amount</th>
              <th>% of Sales</th>
            </tr>
          </thead>
          <tbody>
            @foreach($breakdown as $method => $data)
              <tr>
                <td><strong>{{ ucfirst(str_replace('_', ' ', $method)) }}</strong></td>
                <td>{{ $data['count'] }}</td>
                <td><strong class="text-success">₱{{ number_format($data['amount'], 2) }}</strong></td>
                <td>
                  <div class="progress" style="height:20px;">
                    <div class="progress-bar bg-success" data-width="{{ $data['percentage'] }}">
                      {{ number_format($data['percentage'], 1) }}%
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="text-end mt-3">
        <small class="text-muted">Generated on {{ now()->format('M d, Y h:i A') }}</small>
      </div>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function exportCSV() {
    const table = document.getElementById('salesTable');
    let csv = [];
    for (let i = 0; i < table.rows.length; i++) {
      let row = [], cols = table.rows[i].cells;
      for (let j = 0; j < cols.length; j++) {
        row.push(cols[j].innerText);
      }
      csv.push(row.join(','));
    }
    const csvFile = new Blob([csv.join('\n')], { type: 'text/csv' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(csvFile);
    link.download = `daily-sales-{{ $selectedDate->format('Y-m-d') }}.csv`;
    link.click();
  }

  // Set progress bar widths
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.progress-bar[data-width]').forEach(bar => {
      bar.style.width = bar.getAttribute('data-width') + '%';
    });
  });
</script>
</body>
</html>