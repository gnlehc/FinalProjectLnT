<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT. Meksiko</title>
    <link rel="stylesheet" href="/css/Cart.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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
                                <i class="fa fa-shopping-cart text-white"></i>
                                <a href="/Cart" style="color: lightpink;">Cart[{{ $count }}]</a>
                                {{-- <a href="/">Category</a>
                        <a href="/payment">Payment</a> --}}
                            </li>
                        </ul>
                    </div>
                </nav>
            </section>
            <div class="container-fluid">
                <div class="row">
                    <aside class="col-lg-9">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-borderless table-shopping-cart">
                                    <thead class="text-muted">
                                        <tr class="small text-uppercase">
                                            <th scope="col">Product</th>
                                            <th scope="col" width="120">Quantity</th>
                                            <th scope="col" width="120">Price</th>
                                            <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td>
                                                    <figure class="itemside align-items-center">
                                                        <div class="aside"><img
                                                                src="{{ asset('/storage/prodImage/' . $cart->products->image) }}"
                                                                class="img-sm"></div>
                                                        <figcaption class="info"> <a href="#"
                                                                class="title text-dark"
                                                                data-abc="true"><b>{{ $cart->prodName }}</b></a>
                                                            <p class="text-muted small">Category:
                                                                {{ $cart->products->categories->categoryName }}<br></p>
                                                        </figcaption>
                                                    </figure>
                                                </td>
                                                <td>
                                                    <var class="Quantity">
                                                        {{ $cart->quantity }}</var>
                                                </td>
                                                <td>
                                                    <div class="price-wrap"> <var class="price">Rp.
                                                            {{ $cart->products->Price * $cart->quantity }}</var> <small
                                                            class="text-muted">
                                                            {{ $cart->products->Price }} each </small> </div>
                                                </td>
                                                <td class="text-right d-none d-md-block">
                                                    <a data-original-title="Save to Wishlist" title=""
                                                        href="" class="btn btn-danger" data-toggle="tooltip"
                                                        data-abc="true">
                                                        <i class="fa fa-heart"></i></a>
                                                    <a
                                                        href="{{ url('delete', $cart->id) }}"class="btn btn-outline-danger">Remove</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </aside>
                    <aside class="col-lg-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <form>
                                    <div class="form-group"> <label>Have coupon?</label>
                                        <div class="input-group"> <input type="text" class="form-control coupon"
                                                name="" placeholder="Coupon code"> <span
                                                class="input-group-append">
                                                <button class="btn btn-primary btn-apply coupon">Apply</button> </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
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
                            <div class="card-body">
                                <dl class="dlist-align">
                                    <dt>Total price: Rp. {{ $total }}</dt>
                                </dl>
                                {{-- <dl class="dlist-align">
                                    <dt>Discount:</dt>
                                    <dd class="text-right text-danger ml-3">- $10.00</dd>
                                </dl> --}}
                                <dl class="dlist-align">
                                    <dt>Total Items: {{ $items }}</dt>
                                    {{-- <dd class="text-right text-dark b ml-3"><strong>$59.97</strong></dd> --}}
                                </dl>
                                <hr> <a href="/order" class="btn btn-out btn-primary btn-square btn-main"
                                    data-abc="true">
                                    Make Purchase </a> <a href="/Products"
                                    class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue
                                    Shopping</a>
                            </div>

                        </div>
                    </aside>
                </div>
            </div>
        @endif
    </div>
    <div class="container py-5"></div>
    <section class="footer">
        <div class="sm">
            <ul style="align-items: center;">
                <li><a href="https://twitter.com/bncc_binus?lang=en"><i class="fa fa-twitter"
                            style="color: whitesmoke"></i></a></li>
                <li><a href="https://id-id.facebook.com/bina.nusantara.computer.club/"><i class="fa fa-facebook"
                            style="color: whitesmoke"></i></a></li>
                <li><a href="https://www.instagram.com/technoscapebncc/"><i class="fa fa-instagram"
                            style="color: whitesmoke"></i></a></li>
            </ul>
            <p>
                Copyright © 2022 BNCC. All Rights Reserved
            </p>
        </div>
    </section>
    @if (Auth::check() == false)
        <h1> <a href="/account" style="color: pink">Login</a> to your account</h1>
        <p class="text-white items-center text-center">Do not have an account? <a href="/account"
                style="color: pink">Register Here</a></p>
    @endif
    </div>
</body>

</html>
