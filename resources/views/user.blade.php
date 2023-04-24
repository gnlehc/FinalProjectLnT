<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT. Meksiko</title>
    <link rel="stylesheet" href="/css/user.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>
    <div class="container py-5">
        @if (Auth::check())
            <section>
                <nav>
                    <div class="logo">
                        <ul>
                            <li>
                                <a href="/Products">Product</a>
                                <i class="fa fa-shopping-cart"></i>
                                <a href="/Cart">Cart[{{ $count }}]</a>
                                {{-- <a href="/">Category</a>
                                <a href="/payment">Payment</a> --}}
                                <button type="button" onclick="location.href='{{ route('logout') }}'">LogOut</button>
                            </li>
                        </ul>
                    </div>
                </nav>
            </section>

            <div class="p-10" style="color: lightcoral">
                {{ __("Hello, $user->Name!") }}
            </div>
            @php
                $total = 0;
                $items = 0;
            @endphp
            @foreach ($carts as $cart)
                @php
                    $total += $cart->products->Price * $cart->quantity;
                    $items += $cart->quantity;
                @endphp
            @endforeach
            <div style="padding-top: 5rem"></div>
            <div class="card">
                <div class="card-body mx-4">
                    <div class="container">
                        <p class="my-5 mx-5" style="font-size: 30px;"><b>Thank for your purchase</b></p>
                        <div class="row">
                            <ul class="list-unstyled">
                                <li>{{ $order->Name }}</li>
                                <li class="text-muted mt-1"><span>Invoice</span> #{{ $order->payment_id }}</li>
                                <li class="mt-1">April 17 2021</li>
                            </ul>
                            @foreach ($carts as $cart)
                                <hr>
                                <div class="col-xl-10">
                                    <p>{{ $cart->prodName }}</p>
                                </div>
                                <div class="col-xl-2">
                                    <p class="float-end">Price: Rp. {{ $cart->price }}
                                    </p>
                                    <hr style="width: 40%">
                                    <p class="float-end">Qty: {{ $cart->quantity }}
                                    </p>
                                </div>
                                <hr>
                            @endforeach
                            <div class="col-xl-12">
                                <p class="float-end fw-bold">Total: Rp. {{$total}}
                                </p>
                            </div>
                            <hr style="border: 2px solid;">
                        </div>
                        <div class="text-center" style="margin-top: 90px;">
                            <p>Your package will be deliver soon!</p>
                        </div>

                    </div>
                </div>
        @endif
    </div>
</body>

</div>
@if (Auth::check() == false)
    <h1> <a href="/account" style="color: red">Login</a> to your account</h1>
    <p class="items-center text-center" style="color: palevioletred">Do not have an account? <a href="/account"
            style="color: red">Register Here</a></p>
@endif
</div>
<section class="footer">
    <div class="sm">
        <ul style="align-items: center;">
            <li><a href="https://twitter.com/bncc_binus?lang=en"><i class="fa fa-twitter"
                        style="color: palevioletred"></i></a></li>
            <li><a href="https://id-id.facebook.com/bina.nusantara.computer.club/"><i class="fa fa-facebook"
                        style="color: palevioletred"></i></a></li>
            <li><a href="https://www.instagram.com/technoscapebncc/"><i class="fa fa-instagram"
                        style="color: palevioletred"></i></a></li>
        </ul>
        <p>
            Copyright © 2022 BNCC. All Rights Reserved
        </p>
    </div>
</section>
</body>

</html>
