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
                                <a href="/user">dashboard</a>
                                <a href="/Products" style="color: lightpink;">Product</a>
                                {{-- <a href="/">Category</a>
                                <a href="/payment">Payment</a> --}}
                            </li>
                        </ul>
                    </div>
                </nav>
            </section>

            <section>
                <div class="hello">
                    <h1><b>Welcome!</b></h1>
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Category ID</th>
                                <th scope="col">Category</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total Stock</th>
                                <th scope="col">Image Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @csrf
                            @method('patch')
                            @foreach ($products as $products)
                                <tr>
                                    <td>{{ $products->category_id }}</td>
                                    <td>{{ $products->categories->categoryName }}</td>
                                    <td>{{ $products->prodName }}</td>
                                    <td>{{ $products->Price }}</td>
                                    <td>{{ $products->Total }}</td>
                                    <td>{{ $products->image }}</td>
                                    <td>
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top"
                                                src="{{ asset('/storage/prodImage/' . $products->image) }}">
                                        </div>
                                    </td>

                                    <td><a href="{{ route('editProd', $products->id) }}"
                                            class="btn btn-success">Edit</a>
                                    </td>
                                    <form action="{{ route('deleteProd', $products->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <td><button class="btn btn-danger">Delete</button></td>
                                    </form>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </section>
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
