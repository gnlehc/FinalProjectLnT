<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Meksiko</title>
    <link rel="stylesheet" href="/css/payment.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- <style> @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap'); </style> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container py-5">
        @if (Auth::check())
            <div class="pay">
                <h2>Shipping</h2>
                <form id="payment" action="/user" method="POST">
                    @csrf
                    <div class="inputname">
                        <div class="input_box">
                            <input type="text" placeholder="Name" name="Name" id="name" required>
                            <i class="fa fa-user" style="color: whitesmoke;"></i>
                        </div>
                    </div>
                    <div class="inputname">
                        <div class="input_box">
                            <input type="text" placeholder="Address" name="address" id="name" required>
                            <i class="fa fa-address-book-o" style="color: whitesmoke"></i>
                        </div>
                    </div>
                    <div class="inputname">
                        <div class="input_box">
                            <input type="text" placeholder="Postal Code" name="posCode" id="name" required>
                            <i class="fa fa-map-pin" style="color: whitesmoke"></i>
                        </div>
                    </div>

                    <div id="submit">
                        <button onclick="readData()">Confirm Shipping</button>
                    </div>
            </div>
            </form>
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
        @endif
    </section>
    @if (Auth::check() == false)
        <h1> <a href="/account" style="color: pink">Login</a> to your account</h1>
        <p class="text-white items-center text-center">Do not have an account? <a href="/account"
                style="color: pink">Register Here</a></p>
    @endif
    </div>
</body>

</html>
