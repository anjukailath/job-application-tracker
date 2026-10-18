
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - JATracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <h1>Job Application Tracker Dashboard</h1>

    <div class="alert alert-success mt-4">
        You have successfully logged in!
    </div>

    <h3>Welcome, {{ auth()->user()->name }}</h3>

    <p>Your email: {{ auth()->user()->email }}</p>
    
    <p>You can now manage your job applications.</p>

    <a href="{{ route('applications.index') }}"
    class="btn btn-primary mb-3">
        Manage Job Applications
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger">
            Log out
        </button>
    </form>

</div>

</body>
</html>
