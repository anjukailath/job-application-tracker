<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login-JATracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5" style="max-width:480px">

    <h1 class="mb-4">Job Application Tracker</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <label class="form-label">Email</label>
        <input class="form-control mb-3"
               type="email"
               name="email"
               value="{{ old('email') }}"
               required>

        <label class="form-label">Password</label>
        <input class="form-control mb-3"
               type="password"
               name="password"
               required>

        <button class="btn btn-primary w-100">
            Log in
        </button>
    </form>

    <p class="mt-3">
        New here?
        <a href="{{ route('register') }}">
            Create an account
        </a>
    </p>

</div>
</body>
</html>