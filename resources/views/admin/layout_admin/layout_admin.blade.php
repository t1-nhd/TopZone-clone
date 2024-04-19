<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        form label {
            font-weight: bold;
        }

        dt {
            font-weight: bold;
        }
    </style>
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>

<body>
    @include('admin.layout_admin.header')
    <div class="pt-[50px]">
        @yield('content')
    </div>
</body>

</html>
