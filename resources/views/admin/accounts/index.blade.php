<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Accounts | Dora's Oshopee</title>

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
    
    .status-active {
      color: #23b07a;
    }
    
    .status-inactive {
      color: #e05252;
    }
    
    .status-suspended {
      color: #f08a24;
    }

    .role-badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 500;
    }
    
    .role-admin {
      color: #3b3183;
    }
    
    .role-cashier {
      color: #1a73e8;
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

    .password-field {
      position: relative;
    }
    
    .password-toggle {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #6c757d;
      cursor: pointer;
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
      <a class="nav-link active" href="{{ route('admin.accounts.index') }}">
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
      <div class="collapse" id="transactionsSubmenu">
        <div class="nav flex-column ms-3">
          {{-- Stock In --}}
          <a class="nav-link" href="{{ route('admin.transactions.stock-in.index') }}">
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
        <h4 class="mb-0">Account Management</h4>
        <small class="text-muted">Manage User Accounts & Permissions</small>
      </div>

      <div class="d-flex align-items-center gap-3">
        <div class="input-group search-input">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
          <input class="form-control" placeholder="Search accounts..." />
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


    {{-- Accounts Table --}}
    <div class="card table-card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h5 class="card-title mb-0">User Accounts</h5>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAccountModal">
            <i class="bi bi-plus-circle me-2"></i>New Account
          </button>
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Account ID</th>
                <th>Username</th>
                <th>Employee</th>
                <th>Role</th>
                <th>Status</th>
                <th>Last Login</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($accounts as $account)
              <tr>
                <td>
                  <strong>#{{ $account->AccountID }}</strong>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    
                    <div>
                      <div style="font-weight:600">{{ $account->Username }}</div>
                      <small class="text-muted">{{ $account->Email }}</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div style="font-weight:600">{{ $account->employee->EmpFName ?? 'N/A' }} {{ $account->employee->EmpLName ?? '' }}</div>
                  <small class="text-muted">{{ $account->employee->EmpID ?? 'No Employee' }}</small>
                </td>
                <td>
                  @if($account->Role === 'Admin')
                    <span class="role-badge role-admin">Admin</span>
                  @else($account->Role === 'Cashier')
                    <span class="role-badge role-cashier">Cashier</span>
                  @endif
                </td>
                <td>
                  @if($account->Status === 'Active')
                    <span class="status-badge status-active">Active</span>
                  @elseif($account->Status === 'Inactive')
                    <span class="status-badge status-inactive">Inactive</span>
                  @else
                    <span class="status-badge status-suspended">Suspended</span>
                  @endif
                </td>
                <td>
                  @if($account->LastLogin)
                    <small class="text-muted">{{ $account->LastLogin->format('M d, Y H:i') }}</small>
                  @else
                    <small class="text-muted">Never</small>
                  @endif
                </td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Details">
                      <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-warning" data-bs-toggle="tooltip" title="Edit Account">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Delete Account">
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
            Total: {{ count($accounts) }} record(s)
          </div>
        </div>
      </div>
    </div>
  </main>

  {{-- Add Account Modal --}}
  <div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addAccountModalLabel">Create New Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.accounts.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="AccountID" class="form-label">Account ID *</label>
                  <input type="text" class="form-control" id="AccountID" name="AccountID" required>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="EmpID" class="form-label">Employee *</label>
                  <select class="form-select" id="EmpID" name="EmpID" required>
                    <option value="">Select Employee</option>
                    <option value="EMP-001">Maria R. Santos (EMP-001)</option>
                    <option value="EMP-002">John M. Dela Cruz (EMP-002)</option>
                    <option value="EMP-003">Ana S. Reyes (EMP-003)</option>
                    <option value="EMP-004">Carlos T. Gonzales (EMP-004)</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="Username" class="form-label">Username *</label>
                  <input type="text" class="form-control" id="Username" name="Username" required>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="Email" class="form-label">Email Address *</label>
                  <input type="email" class="form-control" id="Email" name="Email" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3 password-field">
                  <label for="Password" class="form-label">Password *</label>
                  <input type="password" class="form-control" id="Password" name="Password" required>
                  <button type="button" class="password-toggle" onclick="togglePassword('Password')">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3 password-field">
                  <label for="PasswordConfirmation" class="form-label">Confirm Password *</label>
                  <input type="password" class="form-control" id="PasswordConfirmation" name="PasswordConfirmation" required>
                  <button type="button" class="password-toggle" onclick="togglePassword('PasswordConfirmation')">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="Role" class="form-label">Role *</label>
                  <select class="form-select" id="Role" name="Role" required>
                    <option value="Cashier">Cashier</option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="Status" class="form-label">Status *</label>
                  <select class="form-select" id="Status" name="Status" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Suspended">Suspended</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Create Account</button>
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

    // Auto-generate Account ID
    document.addEventListener('DOMContentLoaded', function() {
      // Generate a sample ID (in a real app, this would come from the backend)
      const accountIdInput = document.getElementById('AccountID');
      if (accountIdInput && !accountIdInput.value) {
        accountIdInput.value = 'ACC-' + Math.floor(1000 + Math.random() * 9000);
      }

      // Initialize tooltips
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      });
    });

    // Password toggle function
    function togglePassword(fieldId) {
      const passwordField = document.getElementById(fieldId);
      const toggleIcon = passwordField.nextElementSibling.querySelector('i');
      
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('bi-eye');
        toggleIcon.classList.add('bi-eye-slash');
      } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('bi-eye-slash');
        toggleIcon.classList.add('bi-eye');
      }
    }
  </script>
</body>
</html>