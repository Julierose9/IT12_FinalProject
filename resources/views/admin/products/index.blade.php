{{-- resources/views/admin/products/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Products | Dora's Oshopee</title>

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
      background: #e9fbf1;
      color: #23b07a;
    }
    
    .status-damaged {
      background: #fff0f0;
      color: #e05252;
    }
    
    .status-expired {
      background: #fff2e0;
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

      {{-- Products --}}
      <a class="nav-link active" href="{{ route('admin.products.index') }}">
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

      {{-- Settings --}}
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
        <h4 class="mb-0">Products Management</h4>
        <small class="text-muted">All Products Inventory</small>
      </div>

      <div class="d-flex align-items-center gap-3">
        <div class="input-group search-input">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
          <input class="form-control" placeholder="Search products..." />
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
              <i class="bi bi-box-seam" style="color:#5a3e6b;"></i>
            </div>
            <div>
              <small class="text-muted">Total Products</small>
              <div style="font-weight:700; font-size:20px">{{ $totalProducts ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#e9fbf1;">
              <i class="bi bi-check-circle" style="color:#23b07a;"></i>
            </div>
            <div>
              <small class="text-muted">Active Products</small>
              <div style="font-weight:700; font-size:20px">{{ $activeProducts ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#fff0f0;">
              <i class="bi bi-exclamation-triangle" style="color:#e05252;"></i>
            </div>
            <div>
              <small class="text-muted">Low Stock</small>
              <div style="font-weight:700; font-size:20px">{{ $lowStockProducts ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#fff2e0;">
              <i class="bi bi-tags" style="color:#f08a24;"></i>
            </div>
            <div>
              <small class="text-muted">Categories</small>
              <div style="font-weight:700; font-size:20px">{{ $totalCategories ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Products Table --}}
    <div class="card table-card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h5 class="card-title mb-0">Product List</h5>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="bi bi-plus-circle me-2"></i>Add New Product
          </button>
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Current Stock</th>
                <th>Reorder Level</th>
                <th>Supplier</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr>
                <td>
                  <strong>#{{ $product->ProdID }}</strong>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="bg-light rounded p-2 me-3">
                      <i class="bi bi-box text-muted"></i>
                    </div>
                    <div>
                      <div style="font-weight:600">{{ $product->ProdName }}</div>
                      <small class="text-muted">{{ Str::limit($product->ProdDescription, 30) }}</small>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="badge bg-light text-dark">{{ $product->category->CategoryName ?? 'Uncategorized' }}</span>
                </td>
                <td>
                  <div style="font-weight:600">{{ $product->current_stock ?? '0' }}</div>
                </td>
                <td>
                  <span class="text-muted">{{ $product->ReorderLvl }}</span>
                </td>
                <td>
                  <small class="text-muted">{{ $product->supplier->SupName ?? 'N/A' }}</small>
                </td>
                <td>
                  @if(($product->current_stock ?? 0) <= $product->ReorderLvl)
                    <span class="status-badge status-low">Low Stock</span>
                  @elseif($product->Status === 'Active')
                    <span class="status-badge status-active">Active</span>
                  @else
                    <span class="status-badge status-inactive">Inactive</span>
                  @endif
                </td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
              @endforeach
              
              {{-- Sample Data --}}
              @if(!isset($products) || count($products) === 0)
              <tr>
                <td>#PRD-001</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="bg-light rounded p-2 me-3">
                      <i class="bi bi-box text-muted"></i>
                    </div>
                    <div>
                      <div style="font-weight:600">Rosey Makeup Kit</div>
                      <small class="text-muted">Premium makeup set with brushes</small>
                    </div>
                  </div>
                </td>
                <td><span class="badge bg-light text-dark">Beauty</span></td>
                <td><div style="font-weight:600">45</div></td>
                <td><span class="text-muted">20</span></td>
                <td><small class="text-muted">Beauty Supplies Co.</small></td>
                <td><span class="status-badge status-active">Active</span></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>#PRD-002</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="bg-light rounded p-2 me-3">
                      <i class="bi bi-box text-muted"></i>
                    </div>
                    <div>
                      <div style="font-weight:600">Velvet Dress</div>
                      <small class="text-muted">Elegant evening dress</small>
                    </div>
                  </div>
                </td>
                <td><span class="badge bg-light text-dark">Clothing</span></td>
                <td><div style="font-weight:600">8</div></td>
                <td><span class="text-muted">15</span></td>
                <td><small class="text-muted">Fashion Trends Inc.</small></td>
                <td><span class="status-badge status-low">Low Stock</span></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>#PRD-003</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="bg-light rounded p-2 me-3">
                      <i class="bi bi-box text-muted"></i>
                    </div>
                    <div>
                      <div style="font-weight:600">Gift Ribbon</div>
                      <small class="text-muted">Decorative gift wrapping</small>
                    </div>
                  </div>
                </td>
                <td><span class="badge bg-light text-dark">Accessories</span></td>
                <td><div style="font-weight:600">120</div></td>
                <td><span class="text-muted">25</span></td>
                <td><small class="text-muted">Craft Materials Ltd.</small></td>
                <td><span class="status-badge status-active">Active</span></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                  </div>
                </td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>

        {{-- Simple product count --}}
        <div class="d-flex justify-content-between align-items-center mt-4">
          <div class="text-muted">
            Total: {{ count($products) }} product(s)
          </div>
        </div>
      </div>
    </div>
  </main>

  {{-- Add Product Modal --}}
  <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.products.store') }}" method="POST">
          @csrf
          <div class="modal-body">
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Create Product</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Initialize Bootstrap collapse for reports submenu
    var reportsCollapse = new bootstrap.Collapse(document.getElementById('reportsSubmenu'), {
      toggle: false
    });

    // Auto-generate Product ID when Product Name is entered
    document.getElementById('ProdName').addEventListener('input', function(e) {
      const productIdField = document.getElementById('ProdID');
      if (!productIdField.value) {
        const name = e.target.value;
        if (name.length > 0) {
          // Generate a simple ID from the first 3 letters and random numbers
          const prefix = name.substring(0, 3).toUpperCase();
          const random = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
          productIdField.value = `PRD-${random}`;
        }
      }
    });
  </script>
</body>
</html>