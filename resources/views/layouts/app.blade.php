
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'JATracker')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            JobApplicationTracker
        </a>

        <div class="d-flex gap-3 align-items-center">

            <a class="text-white"
               href="{{ route('applications.index') }}">
                Applications
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-sm btn-outline-light">
                    Log out
                </button>
            </form>

        </div>
    </div>
</nav>

<main class="container py-4">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</main>

</body>
</html>
