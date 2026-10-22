<!DOCTYPE html>
<html>
<head>
    <title>Login BI-KANTIN WEB</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="text-center mb-4">Login BI-KANTIN</h3>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>
</body>
</html>