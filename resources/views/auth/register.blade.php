<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5" style="max-width:480px">

    <h1 class="mb-4">Create your account</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <label class="form-label">Name</label>
        <input class="form-control mb-3"
               name="name"
               value="{{ old('name') }}"
               required>

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

        <label class="form-label">Confirm password</label>
        <input class="form-control mb-3"
               type="password"
               name="password_confirmation"
               required>

        <button class="btn btn-primary w-100">
            Register
        </button>
    </form>