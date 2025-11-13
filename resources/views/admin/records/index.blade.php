<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Records | Dora's Oshopee</title>

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
    
    .type-badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 500;
    }
    
    .type-stock-in {
      background: #e9fbf1;
      color: #23b07a;
    }
    
    .type-pullout {
      background: #fff0f0;
      color: #e05252;
    }
    
    .type-sale {
      background: #e0f2ff;
      color: #1a73e8;
    }
    
    .type-adjustment {
      background: #fff2e0;
      color: #f08a24;
    }

    .priority-badge {
      padding: 4px 8px;
      border-radius: 12px;
      font-size: 0.7rem;
      font-weight: 500;
    }
    
    .priority-high {
      background: #fff0f0;
      color: #e05252;
      border: 1px solid #e05252;
    }
    
    .priority-medium {
      background: #fff2e0;
      color: #f08a24;
      border: 1px solid #f08a24;
    }
    
    .priority-low {
      background: #e9fbf1;
      color: #23b07a;
      border: 1px solid #23b07a;
    }

    /* Filter section */
    .filter-section {
      background: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
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

    .record-details {
      background: #f8f9fa;
      border-radius: 8px;
      padding: 15px;
      margin-top: 10px;
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
        <a class="nav-link active" href="{{ route('admin.records.index') }}">
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
        <h4 class="mb-0">Records Management</h4>
        <small class="text-muted">Audit Trail & System Logs</small>
      </div>

      <div class="d-flex align-items-center gap-3">
        <div class="input-group search-input">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
          <input class="form-control" placeholder="Search records..." />
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
              <i class="bi bi-archive" style="color:#5a3e6b;"></i>
            </div>
            <div>
              <small class="text-muted">Total Records</small>
              <div style="font-weight:700; font-size:20px">{{ $totalRecords ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#e9fbf1;">
              <i class="bi bi-arrow-down-circle" style="color:#23b07a;"></i>
            </div>
            <div>
              <small class="text-muted">Stock Ins</small>
              <div style="font-weight:700; font-size:20px">{{ $stockInRecords ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#fff0f0;">
              <i class="bi bi-arrow-up-circle" style="color:#e05252;"></i>
            </div>
            <div>
              <small class="text-muted">Pullouts</small>
              <div style="font-weight:700; font-size:20px">{{ $pulloutRecords ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#e0f2ff;">
              <i class="bi bi-cash-coin" style="color:#1a73e8;"></i>
            </div>
            <div>
              <small class="text-muted">Sales Today</small>
              <div style="font-weight:700; font-size:20px">{{ $salesRecords ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Filter Section --}}
    <div class="filter-section">
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Record Type</label>
          <select class="form-select" id="recordTypeFilter">
            <option value="">All Types</option>
            <option value="Stock In">Stock In</option>
            <option value="Pullout">Pullout</option>
            <option value="Sale">Sale</option>
            <option value="Adjustment">Adjustment</option>
            <option value="System">System</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Date From</label>
          <input type="date" class="form-control" id="dateFromFilter">
        </div>
        <div class="col-md-3">
          <label class="form-label">Date To</label>
          <input type="date" class="form-control" id="dateToFilter">
        </div>
        <div class="col-md-3">
          <label class="form-label">Priority</label>
          <select class="form-select" id="priorityFilter">
            <option value="">All Priorities</option>
            <option value="High">High</option>
            <option value="Medium">Medium</option>
            <option value="Low">Low</option>
          </select>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12 d-flex justify-content-end gap-2">
          <button class="btn btn-outline-secondary" id="resetFilters">
            <i class="bi bi-arrow-clockwise me-2"></i>Reset Filters
          </button>
          <button class="btn btn-primary" id="applyFilters">
            <i class="bi bi-funnel me-2"></i>Apply Filters
          </button>
        </div>
      </div>
    </div>

    {{-- Records Table --}}
    <div class="card table-card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h5 class="card-title mb-0">System Records & Logs</h5>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-outline-primary">
              <i class="bi bi-download me-2"></i>Export
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="bi bi-printer me-2"></i>Print
            </button>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Record ID</th>
                <th>Type</th>
                <th>Description</th>
                <th>User</th>
                <th>Priority</th>
                <th>Timestamp</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($records as $record)
              <tr>
                <td>
                  <strong>#{{ $record->RecordID }}</strong>
                </td>
                <td>
                  @if($record->RecordType === 'Stock In')
                    <span class="type-badge type-stock-in">
                      <i class="bi bi-arrow-down-circle me-1"></i>Stock In
                    </span>
                  @elseif($record->RecordType === 'Pullout')
                    <span class="type-badge type-pullout">
                      <i class="bi bi-arrow-up-circle me-1"></i>Pullout
                    </span>
                  @elseif($record->RecordType === 'Sale')
                    <span class="type-badge type-sale">
                      <i class="bi bi-cash-coin me-1"></i>Sale
                    </span>
                  @else
                    <span class="type-badge type-adjustment">
                      <i class="bi bi-gear me-1"></i>Adjustment
                    </span>
                  @endif
                </td>
                <td>
                  <div style="font-weight:500">{{ $record->Description }}</div>
                  <small class="text-muted">Module: {{ $record->Module }}</small>
                </td>
                <td>
                  <div style="font-weight:600">{{ $record->user->Username ?? 'System' }}</div>
                  <small class="text-muted">{{ $record->user->employee->EmpFName ?? 'N/A' }} {{ $record->user->employee->EmpLName ?? '' }}</small>
                </td>
                <td>
                  @if($record->Priority === 'High')
                    <span class="priority-badge priority-high">High</span>
                  @elseif($record->Priority === 'Medium')
                    <span class="priority-badge priority-medium">Medium</span>
                  @else
                    <span class="priority-badge priority-low">Low</span>
                  @endif
                </td>
                <td>
                  <div style="font-weight:500">{{ $record->Timestamp->format('M d, Y') }}</div>
                  <small class="text-muted">{{ $record->Timestamp->format('H:i:s') }}</small>
                </td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewRecordModal" data-record-id="{{ $record->RecordID }}">
                      <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-info">
                      <i class="bi bi-file-text"></i>
                    </button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-between align-items-center mt-4">
          <div class="text-muted">
            Showing {{ count($records) }} of {{ $totalRecords ?? '0' }} records
          </div>
          <nav>
            <ul class="pagination mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#">Previous</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </main>

  {{-- View Record Modal --}}
  <div class="modal fade" id="viewRecordModal" tabindex="-1" aria-labelledby="viewRecordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewRecordModalLabel">Record Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label"><strong>Record ID</strong></label>
                <p id="detailRecordId">-</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label"><strong>Type</strong></label>
                <p id="detailRecordType">-</p>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label"><strong>Module</strong></label>
                <p id="detailModule">-</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label"><strong>Priority</strong></label>
                <p id="detailPriority">-</p>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label"><strong>Description</strong></label>
            <div class="record-details">
              <p id="detailDescription" class="mb-0">-</p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label"><strong>User</strong></label>
                <p id="detailUser">-</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label"><strong>Timestamp</strong></label>
                <p id="detailTimestamp">-</p>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label"><strong>Additional Data</strong></label>
            <div class="record-details">
              <pre id="detailAdditionalData" class="mb-0" style="font-size: 0.875rem;">-</pre>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
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

    // Set default date filters
    document.addEventListener('DOMContentLoaded', function() {
      const today = new Date();
      const oneWeekAgo = new Date();
      oneWeekAgo.setDate(today.getDate() - 7);

      document.getElementById('dateFromFilter').value = oneWeekAgo.toISOString().split('T')[0];
      document.getElementById('dateToFilter').value = today.toISOString().split('T')[0];
    });

    // Filter functionality
    document.getElementById('applyFilters').addEventListener('click', function() {
      // In a real application, this would make an API call or reload the page with filters
      alert('Filters applied! (This would refresh the data in a real application)');
    });

    document.getElementById('resetFilters').addEventListener('click', function() {
      document.getElementById('recordTypeFilter').value = '';
      document.getElementById('priorityFilter').value = '';
      
      const today = new Date();
      const oneWeekAgo = new Date();
      oneWeekAgo.setDate(today.getDate() - 7);

      document.getElementById('dateFromFilter').value = oneWeekAgo.toISOString().split('T')[0];
      document.getElementById('dateToFilter').value = today.toISOString().split('T')[0];
    });

    // View Record Modal
    const viewRecordModal = document.getElementById('viewRecordModal');
    if (viewRecordModal) {
      viewRecordModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const recordId = button.getAttribute('data-record-id');
        
        // In a real application, you would fetch the record details via AJAX
        // For now, we'll use sample data
        const sampleRecord = {
          id: recordId,
          type: 'Stock In',
          module: 'Inventory',
          priority: 'Medium',
          description: 'New stock received for product PRD-001 (Rosey Makeup Kit). Quantity: 50 units. Supplier: Beauty Supplies Co.',
          user: 'admin.maria (Maria Santos)',
          timestamp: '2024-01-15 14:30:25',
          additionalData: JSON.stringify({
            product: 'PRD-001',
            quantity: 50,
            supplier: 'SUP-001',
            reference: 'STKIN-2024-001'
          }, null, 2)
        };

        document.getElementById('detailRecordId').textContent = sampleRecord.id;
        document.getElementById('detailRecordType').textContent = sampleRecord.type;
        document.getElementById('detailModule').textContent = sampleRecord.module;
        document.getElementById('detailPriority').textContent = sampleRecord.priority;
        document.getElementById('detailDescription').textContent = sampleRecord.description;
        document.getElementById('detailUser').textContent = sampleRecord.user;
        document.getElementById('detailTimestamp').textContent = sampleRecord.timestamp;
        document.getElementById('detailAdditionalData').textContent = sampleRecord.additionalData;
      });
    }
  </script>
</body>
</html>