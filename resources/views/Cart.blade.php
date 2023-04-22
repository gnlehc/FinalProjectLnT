<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT. Meksiko</title>
    <link rel="stylesheet" href="/css/Cart.css">
</head>

<body>
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
                                                <figcaption class="info"> <a href="#" class="title text-dark"
                                                        data-abc="true">{{ $cart->prodName }}</a>
                                                    {{-- <p class="text-muted small">SIZE: L <br> Brand: MAXTRA</p> --}}
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <var class="Quantity">
                                                {{ $cart->quantity }}</var>
                                        </td>
                                        <td>
                                            <div class="price-wrap"> <var class="price">Rp.
                                                    {{ $cart->price }}</var> <small class="text-muted">
                                                    {{ $cart->price }} each </small> </div>
                                        </td>
                                        <td class="text-right d-none d-md-block">
                                            <a data-original-title="Save to Wishlist" title="" href=""
                                                class="btn btn-light" data-toggle="tooltip" data-abc="true">
                                                <i class="fa fa-heart"></i></a>
                                            <a href="{{url('delete', $cart->id)}}"class="btn btn-light">Remove</a>
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
                                        name="" placeholder="Coupon code"> <span class="input-group-append">
                                        <button class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right ml-3">$69.97</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger ml-3">- $10.00</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right text-dark b ml-3"><strong>$59.97</strong></dd>
                        </dl>
                        <hr> <a href="#" class="btn btn-out btn-primary btn-square btn-main" data-abc="true">
                            Make Purchase </a> <a href="#"
                            class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue
                            Shopping</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</body>

</html>
