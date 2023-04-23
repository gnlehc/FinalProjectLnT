<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT. Meksiko</title>
    <link rel="stylesheet" href="/css/displayProd.css">
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
                                <a href="/Products" style="color: lightpink;">Product</a>
                                <i class="fa fa-shopping-cart text-white"></i>
                                <a href="/Cart">Cart[{{ $count }}]</a>
                                <a href="/user">Profile</a>
                                {{-- <a href="/">Category</a>
                                <a href="/payment">Payment</a> --}}
                            </li>
                        </ul>
                    </div>
                </nav>
            </section>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="grid grid-rows-3 grid-flow-col gap-4 rounded bg-white" style="width: 18rem;">
                @foreach ($products as $products)
                    <br>
                    <br>
                    <div>
                        <img class="rounded py-2 px-2 grid grid-rows-3 grid-flow-col gap-4" style="width: 150px"
                            src="{{ asset('/storage/prodImage/' . $products->image) }}">
                        <div class="py-2 px-2 rounded shadow-lg">
                            <h3 class="card-title" style="font-size: 2rem"><b>{{ $products->prodName }}</b></h3>
                            <p style="color: black; font-size: 1vw">{{ $products->categories->categoryName }}</p>
                            <p class="card-text">Rp. {{ $products->Price }}</p>
                            <form action="{{ url('addcart', $products->id) }}" method="POST">
                                @csrf
                                <input type="number" value="1" min="1" class="form-control"
                                    style="width: 125px" name="quantity">
                                <br>
                                <input type="submit" value="Add Cart" class="addcart">
                                {{-- <button type="button" value="Add Cart">Add to Cart</button> --}}
                            </form>
                        </div>

                    </div>
                @endforeach
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
        @endif
        @if (Auth::check() == false)
            <h1> <a href="/account" style="color: pink">Login</a> to your account</h1>
            <p class="text-white items-center text-center">Do not have an account? <a href="/account"
                    style="color: pink">Register Here</a></p>
        @endif
    </div>
</body>

</html>
