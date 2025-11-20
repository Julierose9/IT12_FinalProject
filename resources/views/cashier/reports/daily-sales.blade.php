<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daily Sales | Dora's Oshopee</title>

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
    .stats-card { border-radius:12px; padding:20px; box-shadow:0 2px 4px rgba(0,0,0,0.04); background:#fff; }
    .stats-card h3 { font-size:1.75rem; font-weight:700; margin:0; }
    .stats-card small { color:#6c757d; }
    .table-card { border-radius:12px; border:none; box-shadow:0 2px 4px rgba(0,0,0,0.04); }
    .table th { font-weight:600; color:#5b5f72; font-size:.85rem; text-transform:uppercase; letter-spacing:.5px; padding:12px 16px; }
    .table td { padding:16px; vertical-align:middle; border-color:#f1f3f4; }

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

    /* Date picker styling */
    .date-picker-container {
      display: flex;
      align-items: center;
      gap: 8px;
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
      
      .date-picker-container {
        justify-content: center;
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
      <a class="nav-link" href="{{ route('cashier.dashboard') }}">
        <i class="fas fa-home me-2"></i> Dashboard
      </a>

      {{-- Sales & Transactions Dropdown --}}
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#salesSubmenu">
        <i class="fas fa-cash-register me-2"></i> Transactions
      </a>
      <div class="collapse" id="salesSubmenu">
        <div class="nav flex-column ms-3">
          {{-- Sales (Combined Orders & Payments) --}}
          <a class="nav-link" href="{{ route('cashier.sales.index') }}">
            <i class="fas fa-shopping-bag me-2"></i> Sales
          </a>

          {{-- Transactions History --}}
          <a class="nav-link" href="{{ route('cashier.transactions.index') }}">
            <i class="fas fa-history me-2"></i> Transaction History
          </a>
        </div>
      </div>

      {{-- Reports with Submenu --}}
      <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#reportsSubmenu">
        <i class="fas fa-chart-bar me-2"></i> Reports
      </a>
      <div class="collapse show" id="reportsSubmenu">
        <div class="nav flex-column ms-3">
          <a class="nav-link active" href="{{ route('cashier.reports.daily-sales') }}">
            <i class="fas fa-chart-line me-2"></i> Daily Sales
          </a>
        </div>
      </div>
    </nav>
  </div>
</aside>

<main class="content-wrap">

  {{-- Topbar --}}
  <div class="topbar">
    <div class="d-flex align-items-center gap-3">
      <h4 class="mb-0">Daily Sales Report</h4>
      <small class="text-muted">{{ $selectedDate->format('F d, Y') }}</small>
    </div>

    <div class="user-section">
      <!-- User Info Section with Dropdown -->
      <div class="user-dropdown">
        <button class="user-dropdown-toggle" id="userDropdownToggle">
          <img src="{{ asset('images/logo_.png') }}" alt="avatar" class="user-avatar">
          <div class="user-details">
            <div class="user-name">{{ Auth::user()->name ?? 'Cashier' }}</div>
            <div class="user-role">Cashier</div>
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
            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search payments..."
                   value="{{ request('search') }}" />
          </div>
          
          <!-- Date Picker -->
          <div class="date-picker-container">
            <form method="GET" action="{{ route('cashier.reports.daily-sales') }}" class="d-inline">
              <div class="input-group">
                <input type="date"
                       name="date"
                       class="form-control"
                       value="{{ $selectedDate->format('Y-m-d') }}"
                       required>
                <button class="btn btn-outline-primary" type="submit">
                  <i class="fas fa-calendar-check"></i>
                </button>
              </div>
            </form>
          </div>
          
          <!-- Relevant Filter Dropdown -->
          <div class="filter-dropdown">
            <button class="filter-toggle" id="filterToggle">
              <i class="fas fa-filter"></i>
              <i class="fas fa-chevron-down ms-1" style="font-size: 0.8rem;"></i>
            </button>
            
            <div class="filter-menu" id="filterMenu" style="display: none;">
              <!-- Report Type Filter -->
              <div class="filter-section">
                <div class="filter-section-title">Report Type</div>
                <div class="filter-options">
                  <div class="filter-option">
                    <input type="radio" name="reportType" id="report-daily" checked>
                    <label for="report-daily">Daily Report</label>
                  </div>
                  <div class="filter-option">
                    <input type="radio" name="reportType" id="report-weekly">
                    <label for="report-weekly">Weekly Summary</label>
                  </div>
                  <div class="filter-option">
                    <input type="radio" name="reportType" id="report-monthly">
                    <label for="report-monthly">Monthly Summary</label>
                  </div>
                </div>
              </div>
              
              <!-- Payment Method Filters -->
              <div class="filter-section">
                <div class="filter-section-title">Payment Methods</div>
                <div class="filter-options">
                  <div class="filter-option">
                    <input type="checkbox" id="method-all" checked>
                    <label for="method-all">All Methods</label>
                  </div>
                  <div class="filter-option">
                    <input type="checkbox" id="method-cash">
                    <label for="method-cash">Cash</label>
                  </div>
                  <div class="filter-option">
                    <input type="checkbox" id="method-gcash">
                    <label for="method-gcash">GCash</label>
                  </div>
                  <div class="filter-option">
                    <input type="checkbox" id="method-card">
                    <label for="method-card">Card</label>
                  </div>
                </div>
              </div>
              
              <!-- Sales Range Filter -->
              <div class="filter-section">
                <div class="filter-section-title">Sales Range</div>
                <div class="filter-options">
                  <div class="filter-option">
                    <input type="radio" name="salesRange" id="range-all" checked>
                    <label for="range-all">All Sales</label>
                  </div>
                  <div class="filter-option">
                    <input type="radio" name="salesRange" id="range-high">
                    <label for="range-high">High Value (> ₱1,000)</label>
                  </div>
                  <div class="filter-option">
                    <input type="radio" name="salesRange" id="range-medium">
                    <label for="range-medium">Medium (₱500 - ₱1,000)</label>
                  </div>
                  <div class="filter-option">
                    <input type="radio" name="salesRange" id="range-low">
                    <label for="range-low">Low Value (< ₱500)</label>
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

  {{-- Breakdown Table with Export Button on Top-Left --}}
  <div class="card table-card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="card-title mb-0">Sales by Payment Method</h5>

        {{-- EXPORT BUTTON - TOP LEFT OF TABLE --}}
        <button class="btn btn-success" onclick="exportCSV()">
          <i class="fas fa-download me-1"></i>Export CSV
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
  // Filter functionality
  const filterToggle = document.getElementById('filterToggle');
  const filterMenu = document.getElementById('filterMenu');
  const activeFilters = document.getElementById('activeFilters');
  
  // User dropdown functionality
  const userDropdownToggle = document.getElementById('userDropdownToggle');
  const userDropdownMenu = document.getElementById('userDropdownMenu');
  
  // Store current filters
  let currentFilters = {
    reportType: 'Daily Report',
    paymentMethods: ['All Methods'],
    salesRange: 'All Sales'
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
    
    // Here you would typically refresh report data based on filters
    console.log('Filters applied - refreshing report data...');
  });
  
  // Clear filters
  document.getElementById('clearFilters').addEventListener('click', function() {
    // Clear all checkboxes and radios
    document.querySelectorAll('.filter-option input[type="checkbox"]').forEach(checkbox => {
      checkbox.checked = false;
    });
    
    // Set default values
    document.getElementById('report-daily').checked = true;
    document.getElementById('method-all').checked = true;
    document.getElementById('range-all').checked = true;
    
    // Update current filters to defaults
    currentFilters = {
      reportType: 'Daily Report',
      paymentMethods: ['All Methods'],
      salesRange: 'All Sales'
    };
    
    // Update active filters
    updateActiveFilters();
  });
  
  function updateCurrentFilters() {
    // Update report type
    if (document.getElementById('report-daily').checked) {
      currentFilters.reportType = 'Daily Report';
    } else if (document.getElementById('report-weekly').checked) {
      currentFilters.reportType = 'Weekly Summary';
    } else if (document.getElementById('report-monthly').checked) {
      currentFilters.reportType = 'Monthly Summary';
    }
    
    // Update payment methods
    currentFilters.paymentMethods = [];
    if (document.getElementById('method-all').checked) {
      currentFilters.paymentMethods.push('All Methods');
    } else {
      if (document.getElementById('method-cash').checked) {
        currentFilters.paymentMethods.push('Cash');
      }
      if (document.getElementById('method-gcash').checked) {
        currentFilters.paymentMethods.push('GCash');
      }
      if (document.getElementById('method-card').checked) {
        currentFilters.paymentMethods.push('Card');
      }
    }
    
    // Update sales range
    if (document.getElementById('range-all').checked) {
      currentFilters.salesRange = 'All Sales';
    } else if (document.getElementById('range-high').checked) {
      currentFilters.salesRange = 'High Value (> ₱1,000)';
    } else if (document.getElementById('range-medium').checked) {
      currentFilters.salesRange = 'Medium (₱500 - ₱1,000)';
    } else if (document.getElementById('range-low').checked) {
      currentFilters.salesRange = 'Low Value (< ₱500)';
    }
  }
  
  function updateActiveFilters() {
    // Clear existing filter tags
    activeFilters.innerHTML = '';
    
    // Check if we have any non-default filters
    const hasCustomFilters = 
      currentFilters.reportType !== 'Daily Report' ||
      currentFilters.paymentMethods.length !== 1 || 
      currentFilters.paymentMethods[0] !== 'All Methods' ||
      currentFilters.salesRange !== 'All Sales';
    
    if (!hasCustomFilters) {
      // No custom filters applied, hide the active filters section
      activeFilters.classList.remove('has-filters');
      return;
    }
    
    // Show active filters section
    activeFilters.classList.add('has-filters');
    
    // Add report type filter tag if not default
    if (currentFilters.reportType !== 'Daily Report') {
      const reportTag = createFilterTag(`Report: ${currentFilters.reportType}`, 'reportType');
      activeFilters.appendChild(reportTag);
    }
    
    // Add payment method filter tags if not "All Methods"
    if (currentFilters.paymentMethods.length > 0 && 
        (currentFilters.paymentMethods.length > 1 || currentFilters.paymentMethods[0] !== 'All Methods')) {
      currentFilters.paymentMethods.forEach(method => {
        const methodTag = createFilterTag(`Method: ${method}`, `method-${method.toLowerCase().replace(' ', '-')}`);
        activeFilters.appendChild(methodTag);
      });
    }
    
    // Add sales range filter tag if not "All Sales"
    if (currentFilters.salesRange !== 'All Sales') {
      const rangeTag = createFilterTag(`Range: ${currentFilters.salesRange}`, 'salesRange');
      activeFilters.appendChild(rangeTag);
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
    if (filterType === 'reportType') {
      document.getElementById('report-daily').checked = true;
      currentFilters.reportType = 'Daily Report';
    } else if (filterType.startsWith('method-')) {
      const filterName = filterType.replace('method-', '').replace('-', ' ');
      const index = currentFilters.paymentMethods.indexOf(
        filterName.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ')
      );
      if (index > -1) {
        currentFilters.paymentMethods.splice(index, 1);
      }
    } else if (filterType === 'salesRange') {
      document.getElementById('range-all').checked = true;
      currentFilters.salesRange = 'All Sales';
    }
    
    // Update the checkboxes/radios to reflect the change
    updateFilterInputs();
    
    // Update active filters display
    updateActiveFilters();
    
    // Here you would typically refresh report data
    console.log('Filter removed - refreshing report data...');
  }
  
  function updateFilterInputs() {
    // Update report type radio
    if (currentFilters.reportType === 'Daily Report') {
      document.getElementById('report-daily').checked = true;
    } else if (currentFilters.reportType === 'Weekly Summary') {
      document.getElementById('report-weekly').checked = true;
    } else if (currentFilters.reportType === 'Monthly Summary') {
      document.getElementById('report-monthly').checked = true;
    }
    
    // Update payment method checkboxes
    document.getElementById('method-all').checked = currentFilters.paymentMethods.includes('All Methods');
    document.getElementById('method-cash').checked = currentFilters.paymentMethods.includes('Cash');
    document.getElementById('method-gcash').checked = currentFilters.paymentMethods.includes('GCash');
    document.getElementById('method-card').checked = currentFilters.paymentMethods.includes('Card');
    
    // Update sales range radio
    if (currentFilters.salesRange === 'All Sales') {
      document.getElementById('range-all').checked = true;
    } else if (currentFilters.salesRange === 'High Value (> ₱1,000)') {
      document.getElementById('range-high').checked = true;
    } else if (currentFilters.salesRange === 'Medium (₱500 - ₱1,000)') {
      document.getElementById('range-medium').checked = true;
    } else if (currentFilters.salesRange === 'Low Value (< ₱500)') {
      document.getElementById('range-low').checked = true;
    }
  }

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