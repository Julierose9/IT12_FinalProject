{{-- resources/views/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard | Dora's Oshopee</title>

  <!-- Bootstrap + Icons + Poppins -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
    .brand img { width:42px; height:auto; }
    .sidebar .nav-link { color:#5b5f72; padding:10px 8px; border-radius:10px; }
    .sidebar .nav-link.active { background:#efeaff; color:#3b3183; font-weight:600; }
    .sidebar .nav-link:hover { background:#f8f9fa; }
    .content-wrap { margin-left:240px; padding:28px; }
    .topbar { background:transparent; display:flex; gap:16px; align-items:center; justify-content:space-between; margin-bottom:22px; }
    .search-input { max-width:520px; width:100%; }
    .stat-card { border-radius:12px; }
    .stat-icon { width:44px; height:44px; border-radius:10px; display:flex; align-items:center; justify-content:center; color:white; }
    .card-small { border-radius:12px; }
    
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
      font-size: 0.875rem;
      border-radius: 6px;
    }
    
    .sidebar-footer {
      flex-shrink: 0;
      margin-top: auto;
      padding-top: 16px;
    }

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
    }
  </style>
</head>
<body>

  {{-- Sidebar --}}
  <aside class="sidebar">
    <div class="brand">
      <img src="{{ asset('images/logo_.png') }}" alt="Logo">
      <div>
        <div style="font-weight:600">Dora's</div>
        <small class="text-muted">Gift Shop</small>
      </div>
    </div>

    {{-- Scrollable Navigation --}}
    <div class="sidebar-nav">
      <nav class="nav flex-column">
        {{-- Dashboard --}}
        <a class="nav-link active" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-house-door-fill me-2"></i> Dashboard
        </a>

        {{-- Products --}}
        <a class="nav-link" href="{{ route('admin.products.index') }}">
          <i class="bi bi-box-seam me-2"></i> Products
        </a>

        {{-- Transactions Dropdown --}}
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#transactionsSubmenu">
          <i class="bi bi-arrow-left-right me-2"></i> Transactions
        </a>
        <div class="collapse" id="transactionsSubmenu">
          <div class="nav flex-column ms-3">
            {{-- Stock In --}}
            <a class="nav-link" href="{{ route('admin.stock-in.index') }}">
              <i class="bi bi-arrow-down-circle me-2"></i> Stock In
            </a>

            {{-- Pullouts --}}
            <a class="nav-link" href="{{ route('admin.pullouts.index') }}">
              <i class="bi bi-arrow-up-circle me-2"></i> Pullouts
            </a>
          </div>
        </div>

        {{-- Suppliers --}}
        <a class="nav-link" href="{{ route('admin.suppliers.index') }}">
          <i class="bi bi-truck me-2"></i> Suppliers
        </a>

        {{-- Employees --}}
        <a class="nav-link" href="{{ route('admin.employees.index') }}">
          <i class="bi bi-people me-2"></i> Employees
        </a>

        {{-- Accounts --}}
        <a class="nav-link" href="{{ route('admin.accounts.index') }}">
          <i class="bi bi-person-badge me-2"></i> Accounts
        </a>

        {{-- Records --}}
        <a class="nav-link" href="{{ route('admin.records.index') }}">
          <i class="bi bi-archive me-2"></i> Records
        </a>

        {{-- Reports with Submenu --}}
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#reportsSubmenu">
          <i class="bi bi-file-earmark-text me-2"></i> Reports
        </a>
        <div class="collapse" id="reportsSubmenu">
          <div class="nav flex-column ms-3">
            <a class="nav-link" href="{{ route('admin.reports.analytics') }}">
              <i class="bi bi-graph-up me-2"></i> Analytics
            </a>
            <a class="nav-link" href="{{ route('admin.reports.daily-sales') }}">
              <i class="bi bi-calendar-day me-2"></i> Daily Sales
            </a>
            <a class="nav-link" href="{{ route('admin.reports.inventory') }}">
              <i class="bi bi-clipboard-data me-2"></i> Inventory
            </a>
            <a class="nav-link" href="{{ route('admin.reports.pullouts') }}">
              <i class="bi bi-box-arrow-up me-2"></i> Pullouts
            </a>
          </div>
        </div>
      </nav>
    </div>

    {{-- Fixed Footer with Logout --}}
    <div class="sidebar-footer">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-outline-secondary btn-sm w-100">
          <i class="bi bi-box-arrow-right me-1"></i> Sign Out
        </button>
      </form>
    </div>
  </aside>

  {{-- Content --}}
  <main class="content-wrap">
    {{-- Topbar --}}
    <div class="topbar">
      <div class="d-flex align-items-center gap-3">
        <h4 class="mb-0">Dashboard</h4>
        <small class="text-muted">Overview</small>
      </div>

      <div class="d-flex align-items-center gap-3">
        <div class="input-group search-input">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
          <input class="form-control" placeholder="Search here..." />
        </div>

        <div class="d-flex align-items-center gap-3">
          <div class="text-end me-2">
            <div style="font-weight:600">{{ Auth::user()->name ?? 'Admin' }}</div>
            <small class="text-muted">Administrator</small>
          </div>
          <img src="{{ asset('images/logo_.png') }}" alt="avatar" style="width:44px; border-radius:10px;">
        </div>
      </div>
    </div>

    {{-- Stats row --}}
    <div class="row g-3 mb-4">
      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#f3d6ff;">
              <i class="bi bi-box-seam" style="color:#5a3e6b;"></i>
            </div>
            <div>
              <small class="text-muted">Stock in storage</small>
              <div style="font-weight:700; font-size:20px">9k</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#fff2e0;">
              <i class="bi bi-arrow-up-right" style="color:#f08a24;"></i>
            </div>
            <div>
              <small class="text-muted">Stock out today</small>
              <div style="font-weight:700; font-size:20px">300</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#e9fbf1;">
              <i class="bi bi-people" style="color:#23b07a;"></i>
            </div>
            <div>
              <small class="text-muted">New clients</small>
              <div style="font-weight:700; font-size:20px">5</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#fff0f0;">
              <i class="bi bi-bell" style="color:#e05252;"></i>
            </div>
            <div>
              <small class="text-muted">Low stock items</small>
              <div style="font-weight:700; font-size:20px">8</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Charts + lists --}}
    <div class="row g-3">
      <div class="col-lg-7">
        <div class="card p-3 card-small mb-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <strong>Stock Movement Trend</strong>
            <small class="text-muted">This week</small>
          </div>
          <canvas id="trendChart" height="110"></canvas>
        </div>

        <div class="card p-3 card-small">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <strong>Top Moving Products</strong>
            <small class="text-muted">Today</small>
          </div>

          <ul class="list-unstyled mb-0">
            <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
              <div>
                <div style="font-weight:600">Rosey Makeup Kit</div>
                <small class="text-muted">SKU: RMK-001</small>
              </div>
              <div>
                <span class="badge bg-light text-dark">120</span>
              </div>
            </li>

            <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
              <div>
                <div style="font-weight:600">Velvet Dress</div>
                <small class="text-muted">SKU: VD-221</small>
              </div>
              <div><span class="badge bg-light text-dark">98</span></div>
            </li>

            <li class="d-flex justify-content-between align-items-center py-2">
              <div>
                <div style="font-weight:600">Gift Ribbon</div>
                <small class="text-muted">SKU: GR-07</small>
              </div>
              <div><span class="badge bg-light text-dark">76</span></div>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="card p-3 card-small mb-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <strong>Return Rate / Inventory Turnover</strong>
            <small class="text-muted">Monthly</small>
          </div>
          <canvas id="areaChart" height="140"></canvas>
        </div>

        <div class="card p-3 card-small">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <strong>Stock Discrepancy</strong>
            <small class="text-muted">vs Recorded</small>
          </div>
          <canvas id="barChart" height="140"></canvas>
        </div>
      </div>
    </div>
  </main>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Trend line chart
    new Chart(document.getElementById('trendChart'), {
      type: 'line',
      data: {
        labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
        datasets: [{
          label: 'Stock movements',
          data: [120, 150, 110, 180, 170, 210, 190],
          borderColor: '#4B50A3',
          backgroundColor: 'rgba(75,80,163,0.14)',
          tension: 0.35,
          fill: true,
          pointRadius: 3
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          y: { beginAtZero: true, ticks: { stepSize: 50 } }
        }
      }
    });

    // Area chart
    new Chart(document.getElementById('areaChart'), {
      type: 'line',
      data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun'],
        datasets: [{
          label: 'Turnover',
          data: [30,45,28,55,40,65],
          borderColor: '#23b07a',
          backgroundColor: 'rgba(35,176,122,0.12)',
          fill: true,
          tension: 0.4
        }]
      },
      options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
    });

    // Bar chart
    new Chart(document.getElementById('barChart'), {
      type: 'bar',
      data: {
        labels: ['Prod A','Prod B','Prod C','Prod D'],
        datasets: [{
          label: 'Discrepancy',
          data: [5, 12, 8, 3],
          backgroundColor: ['#ff8a8a','#ffd27a','#9ad0ff','#c7b3ff']
        }]
      },
      options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
    });

    // Initialize Bootstrap collapse for submenus
    var transactionsCollapse = new bootstrap.Collapse(document.getElementById('transactionsSubmenu'), {
      toggle: false
    });
    
    var reportsCollapse = new bootstrap.Collapse(document.getElementById('reportsSubmenu'), {
      toggle: false
    });
  </script>
</body>
</html>