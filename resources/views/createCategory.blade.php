<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Meksiko</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <section class="payment">
        <div class="pay">
            <h2>Product Category</h2>
            <h4>Create Product Category</h4>
            <form action="/store-category" method="POST">
                @csrf
            <div class="category">
                <div class="input_box">
                    <input type="text" id="categoryName" name="categoryName" placeholder="Category" required>
                </div>
            </div>
            <div id="submit">
                <button onclick="readData()">Create</button>
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