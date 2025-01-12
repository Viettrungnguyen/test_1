<!DOCTYPE html>
<html>

<head>
    <title>Authentication</title>
</head>

<body>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @yield('content')
</body>

</html>
