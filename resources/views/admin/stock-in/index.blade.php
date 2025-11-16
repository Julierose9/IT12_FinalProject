<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Stock In | Dora's Oshopee</title>

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
    
    /* Scrollable sidebar navigation */
    .sidebar-nav {
      flex: 1;
      overflow-y: auto;
      overflow-x: hidden;
      margin-top: 18px;
    }
    
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
    
    .status-good {
      color: #23b07a;
    }
    
    .status-damaged {
      color: #e05252;
    }
    
    .status-expired {
      color: #f08a24;
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

      {{-- Accounts --}}
      <a class="nav-link" href="{{ route('admin.accounts.index') }}">
        <i class="bi bi-person-badge me-2"></i> Accounts
      </a>

      {{-- Records with Submenu --}}
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#recordsSubmenu">
        <i class="bi bi-file-earmark-text me-2"></i> Records
      </a>
      <div class="collapse" id="recordsSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link" href="{{ route('admin.records.suppliers.index') }}">
            <i class="bi bi-truck me-2"></i> Suppliers
          </a>
          <a class="nav-link" href="{{ route('admin.records.employees.index') }}">
            <i class="bi bi-people me-2"></i> Employees
          </a>
          <a class="nav-link" href="{{ route('admin.records.products.index') }}">
            <i class="bi bi-box-seam me-2"></i> Products
          </a>
        </div>
      </div>

      {{-- Transactions Dropdown --}}
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#transactionsSubmenu">
        <i class="bi bi-arrow-left-right me-2"></i> Transactions
      </a>
      <div class="collapse show" id="transactionsSubmenu">
        <div class="nav flex-column ms-3">
          {{-- Stock In --}}
          <a class="nav-link active" href="{{ route('admin.transactions.stock-in.index') }}">
            <i class="bi bi-arrow-down-circle me-2"></i> Stock In
          </a>

          {{-- Pullouts --}}
          <a class="nav-link" href="{{ route('admin.transactions.pullouts.index') }}">
            <i class="bi bi-arrow-up-circle me-2"></i> Pullouts
          </a>
        </div>
      </div>

      {{-- Reports with Submenu --}}
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#reportsSubmenu">
        <i class="bi bi-file-earmark-text me-2"></i> Reports
      </a>
      <div class="collapse" id="reportsSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link" href="{{ route('admin.reports.transaction') }}">
            <i class="bi bi-file-earmark-arrow-down"></i> Transaction 
          </a>
          <a class="nav-link" href="{{ route('admin.reports.inventory') }}">
            <i class="bi bi-clipboard-data me-2"></i> Inventory
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
        <i class="bi bi-b
        ox-arrow-right me-1"></i> Sign Out
      </button>
    </form>
  </div>
</aside>
  {{-- Content --}}
  <main class="content-wrap">
    {{-- Topbar --}}
    <div class="topbar">
      <div class="d-flex align-items-center gap-3">
        <h4 class="mb-0">Stock In Management</h4>
        <small class="text-muted">Received Items Tracking</small>
      </div>

      <div class="d-flex align-items-center gap-3">
        <div class="input-group search-input">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
          <input class="form-control" placeholder="Search stock in records..." />
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

 

    {{-- Stock In Table --}}
    <div class="card table-card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h5 class="card-title mb-0">Stock In Records</h5>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStockInModal">
            <i class="bi bi-plus-circle me-2"></i>New Stock In
          </button>
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Stock In ID</th>
                <th>Product</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Date Received</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($stockIns as $stockIn)
              <tr>
                <td>
                  <strong>#{{ $stockIn->StockInID }}</strong>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    
                    <div>
                      <div style="font-weight:600">{{ $stockIn->product->ProdName ?? 'N/A' }}</div>
                      <small class="text-muted">{{ $stockIn->product->ProdID ?? '' }}</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div style="font-weight:600">{{ $stockIn->supplier->SupName ?? 'N/A' }}</div>
                </td>
                <td>
                  <div style="font-weight:600" class="text-success">+{{ $stockIn->Qty }}</div>
                </td>
                <td>
                  @if($stockIn->ProdStatus === 'Good')
                    <span class="status-badge status-good">Good</span>
                  @elseif($stockIn->ProdStatus === 'Damaged')
                    <span class="status-badge status-damaged">Damaged</span>
                  @else
                    <span class="status-badge status-expired">Expired</span>
                  @endif
                </td>
                <td>
                  <small class="text-muted">{{ $stockIn->DateRcvd->format('M d, Y') }}</small>
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
            Total: {{ count($stockIns) }} record(s)
          </div>
        </div>
      </div>
    </div>
  </main>

  {{-- Add Stock In Modal --}}
  <div class="modal fade" id="addStockInModal" tabindex="-1" aria-labelledby="addStockInModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addStockInModalLabel">New Stock In</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.transactions.stock-in.store') }}" method="POST">
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
                  <label for="SupID" class="form-label">Supplier *</label>
                  <select class="form-select" id="SupID" name="SupID" required>
                    <option value="">Select Supplier</option>
                    <option value="SUP-001">Beauty Supplies Co.</option>
                    <option value="SUP-002">Fashion Trends Inc.</option>
                    <option value="SUP-003">Craft Materials Ltd.</option>
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
                  <label for="ProdStatus" class="form-label">Product Status *</label>
                  <select class="form-select" id="ProdStatus" name="ProdStatus" required>
                    <option value="Good">Good</option>
                    <option value="Damaged">Damaged</option>
                    <option value="Expired">Expired</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="DateRcvd" class="form-label">Date Received *</label>
                  <input type="date" class="form-control" id="DateRcvd" name="DateRcvd" value="{{ date('Y-m-d') }}" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add Stock In</button>
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
    document.getElementById('DateRcvd').value = new Date().toISOString().split('T')[0];
  </script>
</body>
</html>