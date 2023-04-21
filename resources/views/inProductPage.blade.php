<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token-inside-product-page" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'DropShopping') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CDN Links -->
{{--    <link rel="stylesheet"--}}
{{--          href=--}}
{{--              "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}

    <!-- Tailwind CSS CDN Links -->
{{--    <link href=--}}
{{--              "https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"--}}
{{--          rel="stylesheet">--}}
</head>
<body>
<div>
    <div id="app">
        <in-product-page :data="{{ json_encode($productData) }}"></in-product-page>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>



