<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Orders | Dora's Oshopee</title>

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
    
    .status-completed {
      background: #e9fbf1;
      color: #23b07a;
    }
    
    .status-processing {
      background: #fff2e0;
      color: #f08a24;
    }
    
    .status-pending {
      background: #fff0f0;
      color: #e05252;
    }
    
    .payment-badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 500;
    }
    
    .payment-paid {
      background: #e9fbf1;
      color: #23b07a;
    }
    
    .payment-pending {
      background: #fff2e0;
      color: #f08a24;
    }
    
    .payment-unpaid {
      background: #fff0f0;
      color: #e05252;
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
        <a class="nav-link" href="{{ route('cashier.dashboard') }}">
          <i class="bi bi-house-door-fill me-2"></i> Dashboard
        </a>

        <a class="nav-link active" href="{{ route('cashier.orders.index') }}">
          <i class="bi bi-cart-check me-2"></i> Orders
        </a>

        <a class="nav-link" href="#">
          <i class="bi bi-credit-card me-2"></i> Payments
        </a>

        <a class="nav-link" href="#">
          <i class="bi bi-receipt me-2"></i> Transactions
        </a>

        <a class="nav-link" href="#">
          <i class="bi bi-file-earmark-text me-2"></i> Reports
        </a>

        <a class="nav-link" href="#">
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
        <h4 class="mb-0">Orders Management</h4>
        <small class="text-muted">Customer Orders & Transactions</small>
      </div>

      <div class="d-flex align-items-center gap-3">
        <div class="input-group search-input">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
          <input class="form-control" placeholder="Search orders..." />
        </div>

        <div class="d-flex align-items-center gap-3">
          <div class="text-end me-2">
            <div style="font-weight:600">{{ Auth::user()->name ?? 'Cashier' }}</div>
            <small class="text-muted">Cashier</small>
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
              <i class="bi bi-cart-check" style="color:#5a3e6b;"></i>
            </div>
            <div>
              <small class="text-muted">Total Orders</small>
              <div style="font-weight:700; font-size:20px">{{ $totalOrders ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#fff0f0;">
              <i class="bi bi-clock-history" style="color:#e05252;"></i>
            </div>
            <div>
              <small class="text-muted">Pending Orders</small>
              <div style="font-weight:700; font-size:20px">{{ $pendingOrders ?? '0' }}</div>
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
              <small class="text-muted">Completed Orders</small>
              <div style="font-weight:700; font-size:20px">{{ $completedOrders ?? '0' }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3 stat-card">
          <div class="d-flex align-items-center">
            <div class="stat-icon me-3" style="background:#fff2e0;">
              <i class="bi bi-currency-dollar" style="color:#f08a24;"></i>
            </div>
            <div>
              <small class="text-muted">Total Revenue</small>
              <div style="font-weight:700; font-size:20px">₱{{ number_format($totalRevenue ?? 0, 2) }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Orders Table --}}
    <div class="card table-card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h5 class="card-title mb-0">Order Records</h5>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createOrderModal">
            <i class="bi bi-plus-circle me-2"></i>New Order
          </button>
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Items</th>
                <th>Total Amount</th>
                <th>Order Status</th>
                <th>Payment Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <tr>
                <td>
                  <strong>#{{ $order->OrderID }}</strong>
                </td>
                <td>
                  <div style="font-weight:600">{{ $order->customer->CustFName ?? 'N/A' }} {{ $order->customer->CustLName ?? '' }}</div>
                  <small class="text-muted">{{ $order->customer->CustPhone ?? '' }}</small>
                </td>
                <td>
                  <small class="text-muted">{{ $order->OrderDate->format('M d, Y h:i A') }}</small>
                </td>
                <td>
                  <div style="font-weight:600">{{ $order->items_count }} item(s)</div>
                  <small class="text-muted">
                    @foreach($order->order_details as $detail)
                      {{ $detail->ProductID }}{{ !$loop->last ? ',' : '' }}
                    @endforeach
                  </small>
                </td>
                <td>
                  <div style="font-weight:600" class="text-success">₱{{ number_format($order->TotalAmount, 2) }}</div>
                </td>
                <td>
                  @if($order->OrderStatus === 'Completed')
                    <span class="status-badge status-completed">Completed</span>
                  @elseif($order->OrderStatus === 'Processing')
                    <span class="status-badge status-processing">Processing</span>
                  @else
                    <span class="status-badge status-pending">Pending</span>
                  @endif
                </td>
                <td>
                  @if($order->PaymentStatus === 'Paid')
                    <span class="payment-badge payment-paid">Paid</span>
                  @elseif($order->PaymentStatus === 'Pending')
                    <span class="payment-badge payment-pending">Pending</span>
                  @else
                    <span class="payment-badge payment-unpaid">Unpaid</span>
                  @endif
                </td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewOrderModal{{ $order->OrderID }}">
                      <i class="bi bi-eye"></i>
                    </button>
                    @if($order->PaymentStatus !== 'Paid')
                    <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#processPaymentModal{{ $order->OrderID }}">
                      <i class="bi bi-credit-card"></i>
                    </button>
                    @endif
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
            Total: {{ count($orders) }} record(s)
          </div>
        </div>
      </div>
    </div>
  </main>

  {{-- Create Order Modal --}}
  <div class="modal fade" id="createOrderModal" tabindex="-1" aria-labelledby="createOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createOrderModalLabel">Create New Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('cashier.orders.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="CustID" class="form-label">Customer *</label>
                  <select class="form-select" id="CustID" name="CustID" required>
                    <option value="">Select Customer</option>
                    <option value="CUST-001">Maria Santos (09123456789)</option>
                    <option value="CUST-002">Juan Dela Cruz (09198765432)</option>
                    <option value="CUST-003">Ana Reyes (09151234567)</option>
                    <option value="walk-in">Walk-in Customer</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="OrderDate" class="form-label">Order Date *</label>
                  <input type="datetime-local" class="form-control" id="OrderDate" name="OrderDate" value="{{ date('Y-m-d\TH:i') }}" required>
                </div>
              </div>
            </div>

            {{-- Product Selection --}}
            <div class="mb-3">
              <label class="form-label">Products *</label>
              <div id="products-container">
                <div class="product-row row g-2 mb-2">
                  <div class="col-md-6">
                    <select class="form-select product-select" name="products[0][product_id]" required>
                      <option value="">Select Product</option>
                      <option value="PRD-001">Rosey Makeup Kit - ₱899.75</option>
                      <option value="PRD-002">Velvet Dress - ₱560.25</option>
                      <option value="PRD-003">Gift Ribbon - ₱175.50</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <input type="number" class="form-control" name="products[0][quantity]" placeholder="Qty" min="1" value="1" required>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-outline-danger btn-sm remove-product" disabled>
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-product">
                <i class="bi bi-plus-circle me-1"></i>Add Product
              </button>
            </div>

            {{-- Payment Information --}}
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="PaymentMethod" class="form-label">Payment Method *</label>
                  <select class="form-select" id="PaymentMethod" name="PaymentMethod" required>
                    <option value="Cash">Cash</option>
                    <option value="GCash">GCash</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="AmountTendered" class="form-label">Amount Tendered *</label>
                  <input type="number" class="form-control" id="AmountTendered" name="AmountTendered" step="0.01" min="0" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Create Order</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Auto-set current datetime
    document.getElementById('OrderDate').value = new Date().toISOString().slice(0, 16);

    // Add product row functionality
    let productCount = 1;
    document.getElementById('add-product').addEventListener('click', function() {
      const container = document.getElementById('products-container');
      const newRow = document.createElement('div');
      newRow.className = 'product-row row g-2 mb-2';
      newRow.innerHTML = `
        <div class="col-md-6">
          <select class="form-select product-select" name="products[${productCount}][product_id]" required>
            <option value="">Select Product</option>
            <option value="PRD-001">Rosey Makeup Kit - ₱899.75</option>
            <option value="PRD-002">Velvet Dress - ₱560.25</option>
            <option value="PRD-003">Gift Ribbon - ₱175.50</option>
          </select>
        </div>
        <div class="col-md-4">
          <input type="number" class="form-control" name="products[${productCount}][quantity]" placeholder="Qty" min="1" value="1" required>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-outline-danger btn-sm remove-product">
            <i class="bi bi-trash"></i>
          </button>
        </div>
      `;
      container.appendChild(newRow);
      productCount++;

      // Enable remove buttons for all rows except the first one
      updateRemoveButtons();
    });

    function updateRemoveButtons() {
      const removeButtons = document.querySelectorAll('.remove-product');
      removeButtons.forEach((button, index) => {
        if (index === 0) {
          button.disabled = true;
        } else {
          button.disabled = false;
          button.onclick = function() {
            this.closest('.product-row').remove();
            updateRemoveButtons();
          };
        }
      });
    }

    // Initialize remove buttons
    updateRemoveButtons();
  </script>
</body>
</html>