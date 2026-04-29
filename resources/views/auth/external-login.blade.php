<!DOCTYPE html>
<html>
<head>
    <title>External Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card col-md-4 mx-auto">
        <div class="card-body">
            <h4 class="text-center">Login</h4>

            <form method="POST" action="/external-login">
                @csrf

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-primary btn-block">Login</button>

                @error('username')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror

            </form>
        </div>
    </div>
</div>

</body>
</html>