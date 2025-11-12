<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pullouts | Dora's Oshopee</title>

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

    /* Table styling */
    .table-card {
      border-radius: 12px;
      border: none;
      box-shadow: 0 2px 4px rgba(0,0,0,0.04);
    }
    
    .table th {
      border-top: none;
      font-weight: 600;
      color: #5b5f72;
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      padding: 12px 16px;
    }
    
    .table td {
      padding: 16px;
      vertical-align: middle;
      border-color: #f1f3f4;
    }
    
    .status-badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 500;
    }
    
    .status-damaged {
      background: #fff0f0;
      color: #e05252;
    }
    
    .status-expired {
      background: #fff2e0;
      color: #f08a24;
    }
    
    .status-return {
      background: #e9fbf1;
      color: #23b07a;
    }

    /* Modal styling */
    .modal-header {
      border-bottom: 1px solid #eef2f7;
      padding: 20px 24px;
    }
    
    .modal-footer {
      border-top: 1px solid #eef2f7;
      padding: 16px 24px;
    }
    
    .modal-title {
      font-weight: 600;
      color: #3b3183;
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
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-house-door-fill me-2"></i> Dashboard
        </a>

        {{-- Products --}}
        <a class="nav-link" href="{{ route('admin.products.index') }}">
          <i class="bi bi-box-seam me-2"></i> Products
        </a>

        {{-- Transactions Dropdown --}}
        <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#transactionsSubmenu">
          <i class="bi bi-arrow-left-right me-2"></i> Transactions
        </a>
        <div class="collapse show" id="transactionsSubmenu">
          <div class="nav flex-column ms-3">
            {{-- Stock In --}}
            <a class="nav-link" href="{{ route('admin.stock-in.index') }}">
              <i class="bi bi-arrow-down-circle me-2"></i> Stock In
            </a>

            {{-- Pullouts --}}
            <a class="nav-link active" href="{{ route('admin.pullouts.index') }}">
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
        <h4 class="mb-0">Pullouts Management</h4>
        <small class="text-muted">Removed Items Tracking</small>
      </div>

      <div class="d-flex align-items-center gap-3">
        <div class="input-group search-input">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
          <input class="form-control" placeholder="Search pullout records..." />
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

    {{-- Quick Stats --}}
    <div class="row g-3 mb-4">
      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#f3d6ff;">
              <i class="bi bi-arrow-up-circle" style="color:#5a3e6b;"></i>
            </div>
            <div>
              <small class="text-muted">Total Pullouts</small>
              <div style="font-weight:700; font-size:20px">{{ $totalPullOuts ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#fff0f0;">
              <i class="bi bi-box-seam" style="color:#e05252;"></i>
            </div>
            <div>
              <small class="text-muted">Items Pulled</small>
              <div style="font-weight:700; font-size:20px">{{ $totalItemsPulled ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#fff2e0;">
              <i class="bi bi-exclamation-triangle" style="color:#f08a24;"></i>
            </div>
            <div>
              <small class="text-muted">Damaged Items</small>
              <div style="font-weight:700; font-size:20px">{{ $damagedItems ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#e9fbf1;">
              <i class="bi bi-arrow-return-right" style="color:#23b07a;"></i>
            </div>
            <div>
              <small class="text-muted">Customer Returns</small>
              <div style="font-weight:700; font-size:20px">{{ $returnItems ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Pullouts Table --}}
    <div class="card table-card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h5 class="card-title mb-0">Pullout Records</h5>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPulloutModal">
            <i class="bi bi-plus-circle me-2"></i>New Pullout
          </button>
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Pullout ID</th>
                <th>Product</th>
                <th>Employee</th>
                <th>Quantity</th>
                <th>Reason</th>
                <th>Date Pulled Out</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pullOuts as $pullOut)
              <tr>
                <td>
                  <strong>#{{ $pullOut->PullOutID }}</strong>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="bg-light rounded p-2 me-3">
                      <i class="bi bi-box text-muted"></i>
                    </div>
                    <div>
                      <div style="font-weight:600">{{ $pullOut->product->ProdName ?? 'N/A' }}</div>
                      <small class="text-muted">{{ $pullOut->product->ProdID ?? '' }}</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div style="font-weight:600">{{ $pullOut->employee->EmpFName ?? 'N/A' }} {{ $pullOut->employee->EmpLName ?? '' }}</div>
                  <small class="text-muted">{{ $pullOut->employee->EmpID ?? '' }}</small>
                </td>
                <td>
                  <div style="font-weight:600" class="text-danger">-{{ $pullOut->Qty }}</div>
                </td>
                <td>
                  @if($pullOut->Reason === 'Damaged during handling')
                    <span class="status-badge status-damaged">Damaged</span>
                  @elseif($pullOut->Reason === 'Expired products')
                    <span class="status-badge status-expired">Expired</span>
                  @else
                    <span class="status-badge status-return">Return</span>
                  @endif
                </td>
                <td>
                  <small class="text-muted">{{ $pullOut->DatePullOut->format('M d, Y') }}</small>
                </td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary">
                      <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{-- Simple count --}}
        <div class="d-flex justify-content-between align-items-center mt-4">
          <div class="text-muted">
            Total: {{ count($pullOuts) }} record(s)
          </div>
        </div>
      </div>
    </div>
  </main>

  {{-- Add Pullout Modal --}}
  <div class="modal fade" id="addPulloutModal" tabindex="-1" aria-labelledby="addPulloutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPulloutModalLabel">New Pullout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.pullouts.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="ProdID" class="form-label">Product *</label>
                  <select class="form-select" id="ProdID" name="ProdID" required>
                    <option value="">Select Product</option>
                    <option value="PRD-001">Rosey Makeup Kit (PRD-001)</option>
                    <option value="PRD-002">Velvet Dress (PRD-002)</option>
                    <option value="PRD-003">Gift Ribbon (PRD-003)</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="EmpID" class="form-label">Employee *</label>
                  <select class="form-select" id="EmpID" name="EmpID" required>
                    <option value="">Select Employee</option>
                    <option value="EMP-001">Juan Dela Cruz</option>
                    <option value="EMP-002">Maria Santos</option>
                    <option value="EMP-003">Pedro Reyes</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="Qty" class="form-label">Quantity *</label>
                  <input type="number" class="form-control" id="Qty" name="Qty" min="1" required>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="Reason" class="form-label">Reason *</label>
                  <select class="form-select" id="Reason" name="Reason" required>
                    <option value="Damaged during handling">Damaged</option>
                    <option value="Expired products">Expired</option>
                    <option value="Customer return - defective">Customer Return</option>
                    <option value="Quality control rejection">Quality Control</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="DatePullOut" class="form-label">Date Pulled Out *</label>
                  <input type="date" class="form-control" id="DatePullOut" name="DatePullOut" value="{{ date('Y-m-d') }}" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add Pullout</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Initialize Bootstrap collapse for submenus
    var transactionsCollapse = new bootstrap.Collapse(document.getElementById('transactionsSubmenu'), {
      toggle: false
    });
    
    var reportsCollapse = new bootstrap.Collapse(document.getElementById('reportsSubmenu'), {
      toggle: false
    });

    // Auto-set today's date
    document.getElementById('DatePullOut').value = new Date().toISOString().split('T')[0];
  </script>
</body>
</html>