<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
<div class="container">
    <div class="container m-4 ">
        @foreach ($products as $product)
            @if ($loop->first || $loop->iteration % 3 == 1)
                <div class="row">
                    @endif
                    <div class="col-sm-4">
                        <div class="card mb-3">
                            <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/a/ac/IOS-Emblem.jpg">
                            <div class="card-body">
{{--                                {{ dd($product['id']) }}--}}
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">iOS is a mobile operating system developed by Apple Inc. exclusively for its hardware. It is the operating system that powers many of the company's mobile devices, including the iPhone</p>
                                <p class="card-text">${{ $product->price }}</p>
                                <a href="{{route('products.frontend', ['name'=>$product->name,'productId' => $product->id,'price'=>$product->price])}}" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    @if ($loop->iteration % 3 == 0 || $loop->last)
                </div>
            @endif
        @endforeach
    </div>

</div>
</body>
