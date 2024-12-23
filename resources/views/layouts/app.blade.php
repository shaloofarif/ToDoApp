<!DOCTYPE html>
<html>
<head>
    <title>ToDo WebApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('tasks') }}">ToDo WebApp</a>
        </div>
        @if($loggedInUser)
        <span><div class="user-name-box">
        {{ $loggedInUser->name }}
    </div></span>
        @endif
    </nav>
    <div class="py-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
