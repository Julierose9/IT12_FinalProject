<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Add New Product | Dora's Oshopee</title>

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
    .card { border-radius:12px; border:none; box-shadow:0 2px 4px rgba(0,0,0,0.04); }
    
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
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-house-door-fill me-2"></i> Dashboard
        </a>

        <a class="nav-link" href="{{ route('admin.products.index') }}">
          <i class="bi bi-box-seam me-2"></i> Products
        </a>

        <a class="nav-link" href="{{ route('admin.stock-in.index') }}">
          <i class="bi bi-arrow-down-circle me-2"></i> Stock In
        </a>

        <a class="nav-link" href="{{ route('admin.pullouts.index') }}">
          <i class="bi bi-arrow-up-circle me-2"></i> Pullouts
        </a>

        <a class="nav-link" href="{{ route('admin.suppliers.index') }}">
          <i class="bi bi-truck me-2"></i> Suppliers
        </a>

        <a class="nav-link" href="{{ route('admin.employees.index') }}">
          <i class="bi bi-people me-2"></i> Employees
        </a>

        <a class="nav-link" href="{{ route('admin.accounts.index') }}">
          <i class="bi bi-person-badge me-2"></i> Accounts
        </a>

        <a class="nav-link" href="{{ route('admin.records.index') }}">
          <i class="bi bi-archive me-2"></i> Records
        </a>

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

        <a class="nav-link" href="{{ route('admin.settings.index') }}">
          <i class="bi bi-gear me-2"></i> Settings
        </a>
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
        <h4 class="mb-0">Add New Product</h4>
        <small class="text-muted">Create a new product entry</small>
      </div>

      <div class="d-flex align-items-center gap-3">
        <div class="text-end me-2">
          <div style="font-weight:600">{{ Auth::user()->name ?? 'Admin' }}</div>
          <small class="text-muted">Administrator</small>
        </div>
        <img src="{{ asset('images/logo_.png') }}" alt="avatar" style="width:44px; border-radius:10px;">
      </div>
    </div>

    {{-- Product Form --}}
    <div class="card">
      <div class="card-body">
        <form action="{{ route('admin.products.store') }}" method="POST">
          @csrf
          
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ProdName" class="form-label">Product Name *</label>
                <input type="text" class="form-control" id="ProdName" name="ProdName" required>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ProdID" class="form-label">Product ID *</label>
                <input type="text" class="form-control" id="ProdID" name="ProdID" required>
                <small class="text-muted">e.g., PRD-001</small>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="ProdDescription" class="form-label">Description</label>
            <textarea class="form-control" id="ProdDescription" name="ProdDescription" rows="3"></textarea>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label for="CategoryID" class="form-label">Category</label>
                <select class="form-select" id="CategoryID" name="CategoryID">
                  <option value="">Select Category</option>
                  <option value="1">Beauty</option>
                  <option value="2">Clothing</option>
                  <option value="3">Accessories</option>
                  <option value="4">Gifts</option>
                </select>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="mb-3">
                <label for="ReorderLvl" class="form-label">Reorder Level *</label>
                <input type="number" class="form-control" id="ReorderLvl" name="ReorderLvl" min="0" required>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="mb-3">
                <label for="Status" class="form-label">Status</label>
                <select class="form-select" id="Status" name="Status">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="SupID" class="form-label">Supplier</label>
            <select class="form-select" id="SupID" name="SupID">
              <option value="">Select Supplier</option>
              <option value="1">Beauty Supplies Co.</option>
              <option value="2">Fashion Trends Inc.</option>
              <option value="3">Craft Materials Ltd.</option>
            </select>
          </div>

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-check-circle me-2"></i>Create Product
            </button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-left me-2"></i>Cancel
            </a>
          </div>
        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Initialize Bootstrap collapse for reports submenu
    var reportsCollapse = new bootstrap.Collapse(document.getElementById('reportsSubmenu'), {
      toggle: false
    });
  </script>
</body>
</html>