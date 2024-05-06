<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Slick Slider --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Font Awesome  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #3E3E3F;
        }

        input:checked {
            background-color: red;
        }

        .slick-slide {
            padding: 5px;
        }

        .plusminus {
            position: relative;
            width: 15px;
            height: 15px;
            cursor: pointer;

            &.active {
                &:before {
                    transform: translatey(-50%) rotate(-90deg);
                    opacity: 0;
                }

                &:after {
                    transform: translatey(-50%) rotate(0);
                }
            }

            &:before,
            &:after {
                content: "";
                display: block;
                background-color: #333;
                position: absolute;
                top: 50%;
                left: 0;
                transition: .35s;
                width: 100%;
                height: 3px;
            }

            &:before {
                transform: translatey(-50%);
            }

            &:after {
                transform: translatey(-50%) rotate(90deg);
            }

        }
    </style>
    @vite('resources/css/app.css')
</head>

<body>
    @include('layout.header_product_show')
    @yield('content')
    @include('layout.footer')
</body>

</html>
