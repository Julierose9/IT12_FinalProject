<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Dora’s Oshopee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body{font-family:'Poppins',sans-serif;background:#fff;display:flex;align-items:center;justify-content:center;height:100vh}
        .register-container{background:#fff;border-radius:15px;box-shadow:0 4px 15px rgba(0,0,0,.1);padding:40px;width:100%;max-width:420px;text-align:center}
        .btn-primary{background:#8D8EF6;border:none}
        .btn-primary:hover{background:#7a7bf0}
        .form-control:focus{border-color:#8D8EF6 !important;box-shadow:0 0 0 .2rem rgba(141,142,246,.4)!important}
        .text-danger{font-size:.875rem;text-align:left}
    </style>
</head>
<body>
<div class="register-container">
    <img src="{{ asset('images/logo_.png') }}" width="100" alt="Logo" class="mb-3">
    <h4 class="mb-4">Create Cashier Account</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @cultural

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3 text-start">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3 text-start">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3 text-start">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3 text-start">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3 text-start">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Create Account</button>
    </form>

    <p class="mt-3 text-muted"><a href="{{ route('login') }}">Back to Login</a></p>
</div>
</body>
</html>
