<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Products | Dora's Oshopee</title>

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
    .stat-card { border-radius:12px; }
    .stat-icon { 
        width:44px; 
        height:44px; 
        border-radius:10px; 
        display:flex; 
        align-items:center; 
        justify-content:center; 
        flex-shrink: 0;
    }
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
    
    .status-active {
      color: #23b07a;
    }
    
    .status-low {
      color: #f08a24;
    }
    
    .status-out {
      color: #e05252;
    }
    
    .status-inactive {
      color: #6c757d;
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
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="fas fa-home me-2"></i> Dashboard
      </a>

      {{-- Accounts --}}
      <a class="nav-link" href="{{ route('admin.accounts.index') }}">
        <i class="fas fa-user-circle me-2"></i> Accounts
      </a>

      {{-- Records with Submenu --}}
      <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#recordsSubmenu">
        <i class="fas fa-archive me-2"></i> Records
      </a>
      
      <div class="collapse show" id="recordsSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link" href="{{ route('admin.records.suppliers.index') }}">
            <i class="fas fa-truck me-2"></i> Suppliers
          </a>
          <a class="nav-link" href="{{ route('admin.records.employees.index') }}">
            <i class="fas fa-users me-2"></i> Employees
          </a>
          <a class="nav-link active" href="{{ route('admin.records.products.index') }}">
            <i class="fas fa-box me-2"></i> Products
          </a>
        </div>
      </div>

      {{-- Transactions Dropdown --}}
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#transactionsSubmenu">
        <i class="fas fa-exchange-alt me-2"></i> Inventory
      </a>
      <div class="collapse" id="transactionsSubmenu">
        <div class="nav flex-column ms-3">
          {{-- Stock In --}}
          <a class="nav-link" href="{{ route('admin.transactions.stock-in.index') }}">
            <i class="fas fa-arrow-circle-down me-2"></i> Stock In
          </a>

          {{-- Pullouts --}}
          <a class="nav-link" href="{{ route('admin.transactions.pullouts.index') }}">
            <i class="fas fa-arrow-circle-up me-2"></i> Pullouts
          </a>
        </div>
      </div>

      {{-- Reports with Submenu --}}
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#reportsSubmenu">
        <i class="fas fa-chart-bar me-2"></i> Reports
      </a>
      <div class="collapse" id="reportsSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link" href="{{ route('admin.reports.transaction') }}">
            <i class="fas fa-file-invoice-dollar me-2"></i> Transaction 
          </a>
          <a class="nav-link" href="{{ route('admin.reports.inventory') }}">
            <i class="fas fa-clipboard-list me-2"></i> Inventory
          </a>
        </div>
      </div>
    </nav>
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

      <div class="user-section">
        <!-- User Info Section with Dropdown -->
        <div class="user-dropdown">
          <button class="user-dropdown-toggle" id="userDropdownToggle">
            <img src="{{ asset('images/logo_.png') }}" alt="avatar" class="user-avatar">
            <div class="user-details">
              <div class="user-name">Dora</div>
              <div class="user-role">Administrator</div>
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
              <input class="form-control" placeholder="Search products..." />
            </div>
            
            <!-- Relevant Filter Dropdown -->
            <div class="filter-dropdown">
              <button class="filter-toggle" id="filterToggle">
                <i class="fas fa-filter"></i>
                <i class="fas fa-chevron-down ms-1" style="font-size: 0.8rem;"></i>
              </button>
              
              <div class="filter-menu" id="filterMenu" style="display: none;">
                <!-- Stock Status Filter -->
                <div class="filter-section">
                  <div class="filter-section-title">Stock Status</div>
                  <div class="filter-options">
                    <div class="filter-option">
                      <input type="checkbox" id="status-all" checked>
                      <label for="status-all">All Status</label>
                    </div>
                    <div class="filter-option">
                      <input type="checkbox" id="status-active">
                      <label for="status-active">In Stock</label>
                    </div>
                    <div class="filter-option">
                      <input type="checkbox" id="status-low">
                      <label for="status-low">Low Stock</label>
                    </div>
                    <div class="filter-option">
                      <input type="checkbox" id="status-out">
                      <label for="status-out">Out of Stock</label>
                    </div>
                  </div>
                </div>
                
                <!-- Category Filters -->
                <div class="filter-section">
                  <div class="filter-section-title">Product Category</div>
                  <div class="filter-options">
                    <div class="filter-option">
                      <input type="checkbox" id="category-all" checked>
                      <label for="category-all">All Categories</label>
                    </div>
                    <div class="filter-option">
                      <input type="checkbox" id="category-beauty">
                      <label for="category-beauty">Beauty</label>
                    </div>
                    <div class="filter-option">
                      <input type="checkbox" id="category-clothing">
                      <label for="category-clothing">Clothing</label>
                    </div>
                    <div class="filter-option">
                      <input type="checkbox" id="category-accessories">
                      <label for="category-accessories">Accessories</label>
                    </div>
                    <div class="filter-option">
                      <input type="checkbox" id="category-gifts">
                      <label for="category-gifts">Gifts</label>
                    </div>
                  </div>
                </div>
                
                <!-- Supplier Filter -->
                <div class="filter-section">
                  <div class="filter-section-title">Supplier</div>
                  <div class="filter-options">
                    <div class="filter-option">
                      <input type="radio" name="supplier" id="supplier-all" checked>
                      <label for="supplier-all">All Suppliers</label>
                    </div>
                    <div class="filter-option">
                      <input type="radio" name="supplier" id="supplier-beauty">
                      <label for="supplier-beauty">Beauty Supplies Co.</label>
                    </div>
                    <div class="filter-option">
                      <input type="radio" name="supplier" id="supplier-fashion">
                      <label for="supplier-fashion">Fashion Trends Inc.</label>
                    </div>
                    <div class="filter-option">
                      <input type="radio" name="supplier" id="supplier-craft">
                      <label for="supplier-craft">Craft Materials Ltd.</label>
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

    {{-- Products Table --}}
    <div class="card table-card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h5 class="card-title mb-0">Product List</h5>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="fas fa-plus-circle me-2"></i>Add New Product
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
                  @php
                    $stock = $product->current_stock ?? 0;
                  @endphp

                  @if($stock <= 0)
                    <span class="status-badge status-out">Out of Stock</span>
                  @elseif($stock <= $product->ReorderLvl)
                    <span class="status-badge status-low">Low Stock</span>
                  @elseif($product->Status === 'Inactive')
                    <span class="status-badge status-inactive">Inactive</span>
                  @else
                    <span class="status-badge status-active">Active</span>
                  @endif
                </td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary">
                      <i class="fas fa-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                      <i class="fas fa-trash"></i>
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
                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>#PRD-002</td>
                <td>
                  <div class="d-flex align-items-center">
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
                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>#PRD-003</td>
                <td>
                  <div class="d-flex align-items-center">
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
                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
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
        <form action="{{ route('admin.records.products.store') }}" method="POST">
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
    // Filter functionality
    const filterToggle = document.getElementById('filterToggle');
    const filterMenu = document.getElementById('filterMenu');
    const activeFilters = document.getElementById('activeFilters');
    
    // User dropdown functionality
    const userDropdownToggle = document.getElementById('userDropdownToggle');
    const userDropdownMenu = document.getElementById('userDropdownMenu');
    
    // Store current filters
    let currentFilters = {
      stockStatus: ['All Status'],
      categories: ['All Categories'],
      supplier: 'All Suppliers'
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
    
    // Apply filters
    document.getElementById('applyFilters').addEventListener('click', function() {
      filterMenu.style.display = 'none';
      filterToggle.classList.remove('active');
      
      // Update current filters based on selections
      updateCurrentFilters();
      
      // Update active filters display
      updateActiveFilters();
      
      // Here you would typically refresh products data based on filters
      console.log('Filters applied - refreshing products data...');
    });
    
    // Clear filters
    document.getElementById('clearFilters').addEventListener('click', function() {
      // Clear all checkboxes and radios
      document.querySelectorAll('.filter-option input[type="checkbox"]').forEach(checkbox => {
        checkbox.checked = false;
      });
      
      // Set default values
      document.getElementById('status-all').checked = true;
      document.getElementById('category-all').checked = true;
      document.getElementById('supplier-all').checked = true;
      
      // Update current filters to defaults
      currentFilters = {
        stockStatus: ['All Status'],
        categories: ['All Categories'],
        supplier: 'All Suppliers'
      };
      
      // Update active filters
      updateActiveFilters();
    });
    
    function updateCurrentFilters() {
      // Update stock status
      currentFilters.stockStatus = [];
      if (document.getElementById('status-all').checked) {
        currentFilters.stockStatus.push('All Status');
      } else {
        if (document.getElementById('status-active').checked) {
          currentFilters.stockStatus.push('In Stock');
        }
        if (document.getElementById('status-low').checked) {
          currentFilters.stockStatus.push('Low Stock');
        }
        if (document.getElementById('status-out').checked) {
          currentFilters.stockStatus.push('Out of Stock');
        }
      }
      
      // Update categories
      currentFilters.categories = [];
      if (document.getElementById('category-all').checked) {
        currentFilters.categories.push('All Categories');
      } else {
        if (document.getElementById('category-beauty').checked) {
          currentFilters.categories.push('Beauty');
        }
        if (document.getElementById('category-clothing').checked) {
          currentFilters.categories.push('Clothing');
        }
        if (document.getElementById('category-accessories').checked) {
          currentFilters.categories.push('Accessories');
        }
        if (document.getElementById('category-gifts').checked) {
          currentFilters.categories.push('Gifts');
        }
      }
      
      // Update supplier
      if (document.getElementById('supplier-all').checked) {
        currentFilters.supplier = 'All Suppliers';
      } else if (document.getElementById('supplier-beauty').checked) {
        currentFilters.supplier = 'Beauty Supplies Co.';
      } else if (document.getElementById('supplier-fashion').checked) {
        currentFilters.supplier = 'Fashion Trends Inc.';
      } else if (document.getElementById('supplier-craft').checked) {
        currentFilters.supplier = 'Craft Materials Ltd.';
      }
    }
    
    function updateActiveFilters() {
      // Clear existing filter tags
      activeFilters.innerHTML = '';
      
      // Check if we have any non-default filters
      const hasCustomFilters = 
        currentFilters.stockStatus.length !== 1 || 
        currentFilters.stockStatus[0] !== 'All Status' ||
        currentFilters.categories.length !== 1 || 
        currentFilters.categories[0] !== 'All Categories' ||
        currentFilters.supplier !== 'All Suppliers';
      
      if (!hasCustomFilters) {
        // No custom filters applied, hide the active filters section
        activeFilters.classList.remove('has-filters');
        return;
      }
      
      // Show active filters section
      activeFilters.classList.add('has-filters');
      
      // Add stock status filter tags if not "All Status"
      if (currentFilters.stockStatus.length > 0 && 
          (currentFilters.stockStatus.length > 1 || currentFilters.stockStatus[0] !== 'All Status')) {
        currentFilters.stockStatus.forEach(status => {
          const statusTag = createFilterTag(`Status: ${status}`, `status-${status.toLowerCase().replace(' ', '-')}`);
          activeFilters.appendChild(statusTag);
        });
      }
      
      // Add category filter tags if not "All Categories"
      if (currentFilters.categories.length > 0 && 
          (currentFilters.categories.length > 1 || currentFilters.categories[0] !== 'All Categories')) {
        currentFilters.categories.forEach(category => {
          const categoryTag = createFilterTag(`Category: ${category}`, `category-${category.toLowerCase()}`);
          activeFilters.appendChild(categoryTag);
        });
      }
      
      // Add supplier filter tag if not default
      if (currentFilters.supplier !== 'All Suppliers') {
        const supplierTag = createFilterTag(`Supplier: ${currentFilters.supplier}`, 'supplier');
        activeFilters.appendChild(supplierTag);
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
      if (filterType.startsWith('status-')) {
        const filterName = filterType.replace('status-', '').replace('-', ' ');
        const index = currentFilters.stockStatus.indexOf(
          filterName.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ')
        );
        if (index > -1) {
          currentFilters.stockStatus.splice(index, 1);
        }
      } else if (filterType.startsWith('category-')) {
        const filterName = filterType.replace('category-', '');
        const index = currentFilters.categories.indexOf(
          filterName.charAt(0).toUpperCase() + filterName.slice(1)
        );
        if (index > -1) {
          currentFilters.categories.splice(index, 1);
        }
      } else if (filterType === 'supplier') {
        currentFilters.supplier = 'All Suppliers';
      }
      
      // Update the checkboxes/radios to reflect the change
      updateFilterInputs();
      
      // Update active filters display
      updateActiveFilters();
      
      // Here you would typically refresh products data
      console.log('Filter removed - refreshing products data...');
    }
    
    function updateFilterInputs() {
      // Update stock status checkboxes
      document.getElementById('status-all').checked = currentFilters.stockStatus.includes('All Status');
      document.getElementById('status-active').checked = currentFilters.stockStatus.includes('In Stock');
      document.getElementById('status-low').checked = currentFilters.stockStatus.includes('Low Stock');
      document.getElementById('status-out').checked = currentFilters.stockStatus.includes('Out of Stock');
      
      // Update category checkboxes
      document.getElementById('category-all').checked = currentFilters.categories.includes('All Categories');
      document.getElementById('category-beauty').checked = currentFilters.categories.includes('Beauty');
      document.getElementById('category-clothing').checked = currentFilters.categories.includes('Clothing');
      document.getElementById('category-accessories').checked = currentFilters.categories.includes('Accessories');
      document.getElementById('category-gifts').checked = currentFilters.categories.includes('Gifts');
      
      // Update supplier radio
      if (currentFilters.supplier === 'All Suppliers') {
        document.getElementById('supplier-all').checked = true;
      } else if (currentFilters.supplier === 'Beauty Supplies Co.') {
        document.getElementById('supplier-beauty').checked = true;
      } else if (currentFilters.supplier === 'Fashion Trends Inc.') {
        document.getElementById('supplier-fashion').checked = true;
      } else if (currentFilters.supplier === 'Craft Materials Ltd.') {
        document.getElementById('supplier-craft').checked = true;
      }
    }
    
    // Initialize Bootstrap collapse for submenus
    var transactionsCollapse = new bootstrap.Collapse(document.getElementById('transactionsSubmenu'), {
      toggle: false
    });
    
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