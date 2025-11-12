<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Dora’s Oshopee Gift Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-logo {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #8D8EF6;
            border: none;
        }
        .btn-primary:hover {
            background-color: #7a7bf0;
        }
        .form-control:focus {
            border-color: #8D8EF6 !important;
            box-shadow: 0 0 0 0.2rem rgba(141, 142, 246, 0.4) !important;
            outline: none;
        }
        .alert-success {
            animation: fadeIn 0.8s ease-in-out;
            background-color: #E6E6FF;
            color: #4B50A3;
            border: 1px solid #8D8EF6;
            font-weight: 500;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .password-toggle {
            position: relative;
        }
        .toggle-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            cursor: pointer;
            color: #4B50A3;
        }
        .text-danger {
            font-size: 0.875rem;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
            <img src="{{ asset('images/logo_.png') }}" alt="Dora’s Oshopee Logo" width="120">
        </div>
        <h3 class="mb-4 fw-semibold">Welcome Back</h3>

        @if (session('success'))
            <div class="alert alert-success text-center fw-semibold">
                {{ session('success') }}
            </div>
        @endif

        <!-- Login form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3 text-start">
                <label for="username" class="form-label">Username</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" 
                       name="username" value="{{ old('username') }}" required autofocus>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 text-start password-toggle">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                <span class="toggle-icon" onclick="togglePassword('password', this)">👁</span>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-check mb-3 text-start">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Log in</button>
        </form>

        <p class="mt-3 mb-0 text-muted">Contact admin to create account.</p>
    </div>

    <script>
        function togglePassword(id, icon) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                icon.textContent = "‿";
            } else {
                input.type = "password";
                icon.textContent = "👁";
            }
        }
        setTimeout(() => {
            const alert = document.querySelector('.alert-success');
            if (alert) alert.style.display = 'none';
        }, 4000);
    </script>
</body>
</html>
