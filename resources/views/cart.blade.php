<!doctype html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
{{--@php $order = reset($cart['order']) @endphp--}}

{{--{{dd($order['price']['totalPrice'])}}--}}
{{--<div class="container m-5">--}}
{{--    @foreach($cart['line_items'] as $lineItem)--}}
{{--        <div class="card border-success mb-3" style="max-width: 18rem;">--}}
{{--            <div class="card-header bg-transparent border-success">{{$lineItem['product_name']}}</div>--}}
{{--            <div class="card-body text-success">--}}
{{--                <h5 class="card-title">Quantity: {{$lineItem['quantity']}}</h5>--}}
{{--                <h5 class="card-title">Price: {{$lineItem['price']['totalPrice']}}</h5>--}}
{{--                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's--}}
{{--                    content.</p>--}}
{{--            </div>--}}
{{--            <div class="card-footer bg-transparent border-success">Price: {{$lineItem['quantity']*$lineItem['price']['totalPrice']}}</div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--        <div class="card border-success mb-3" style="max-width: 18rem;">--}}
{{--            <div class="card-header bg-transparent border-success">Total Order</div>--}}
{{--            <div class="card-body text-success">--}}
{{--                <h5 class="card-title">Order number: 12323</h5>--}}
{{--                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's--}}
{{--                    content.</p>--}}
{{--            </div>--}}
{{--            <div class="card-footer bg-transparent border-success">Gross Price: {{ $order['price']['grossPrice'] }}</div>--}}
{{--            <div class="card-footer bg-transparent border-success">Tax Price: {{ $order['price']['tax'] }}</div>--}}
{{--            <div class="card-footer bg-transparent border-success">Total Price: {{ $order['price']['totalPrice'] }}</div>--}}
{{--        </div>--}}
{{--</div>--}}


{{--<h1>welcome</h1>--}}
</body>
