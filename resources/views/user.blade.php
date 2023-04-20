<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT. Meksiko</title>
    <link rel="stylesheet" href="/css/user.css">
</head>
<body>
    <div class="container py-5">
        @if(Auth::check())
        <div class="position-relative py-2 px-2">
        <a href="{{route('logout')}}" class="py-2 px-2 rounded border-none bg-transparent text-white text-decoration-none" style="color: pink">Log Out</a>
        </div>
        @endif
        @if(Auth::check() == false)
        <h1> <a href="/account" style="color: pink">Login</a> to your account</h1>
        <p class="text-white items-center text-center">Do not have an account? <a href="/account" style="color: pink">Register Here</a></p>
        @endif
      </div>    
      <section class="footer">
        <div class="sm">
            <ul style="align-items: center;">
                <li><a href="https://twitter.com/bncc_binus?lang=en"><i class="fa fa-twitter" style="color: whitesmoke"></i></a></li>
                <li><a href="https://id-id.facebook.com/bina.nusantara.computer.club/"><i class="fa fa-facebook" style="color: whitesmoke"></i></a></li>
                <li><a href="https://www.instagram.com/technoscapebncc/"><i class="fa fa-instagram" style="color: whitesmoke"></i></a></li> 
            </ul>
            <p>
               Copyright © 2022 BNCC. All Rights Reserved
            </p>
        </div>
    </section>
</body>
</html>