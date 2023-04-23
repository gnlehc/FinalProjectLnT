<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Meksiko</title>
    <link rel="stylesheet" href="/css/register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- <style> @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap'); </style> -->
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css” />
</head>

<body>
    <section>
        <nav>
            <!-- <a href=""><img src="tlogo.png" alt=""></a> -->
            <div class="Logo">
                <ul>
                    <li>
                        <a href="/">Home</a>
                        <a href="/register" style="color: lightpink;">Register</a>
                        <a href="/login">Login</a>
                    </li>
                    <!-- <li>
                        <a href="login.html">Login</a>
                    </li> -->
                </ul>
            </div>
        </nav>
    </section>
    <section class="regist">
        <div class="regist">
            <h2>Personal Information</h2>
            <form action="/create" method="POST">
                @csrf
                <div class="inputname">
                    <div class="input_box">
                        <input type="text" placeholder="Name" name="Name" value="{{ Session::get('Name') }}"
                            id="Name" minlength=3 maxlength=40 required>
                        <i class="fa fa-user icon" style="color: whitesmoke;"></i>
                        <div class="alert-danger">{{$error->first('Name')}}</div>
                    </div>
                </div>
                <div class="inputemail">
                    <div class="input_box">
                        <input type="email" placeholder="Email" name="Email" value="{{ Session::get('Email') }}"
                            id="Email" min=20 required>
                        <i class="fa fa-envelope-o" style="color: whitesmoke;"></i>
                    </div>
                </div>
                <div class="inputAdd">
                    <div class="input_box">
                        <input type="password" placeholder="Password" name="password" id="password" minlength=6
                            maxlength=12 required>
                        <i class="fa fa-eye" aria-hidden="true" id="show-password" style="color: whitesmoke;"></i>
                    </div>
                    <script>
                        const showPassword = document.querySelector('#show-password');
                        const PasswordField = document.querySelector('#Password');
                        showPassword.addEventListener("click", function() {
                            this.classList.toggle("fa-eye-slash");
                            const type = PasswordField.getAttribute("type") === "password" ? "text" : "password";
                            PasswordField.setAttribute("type", type);
                        });
                    </script>
                </div>
                <div class="inputTLP">
                    <div class="input_box">
                        <input type="tel" placeholder="Telephone Number" name="TLP" id="TLP" required onchange="validate()">
                        <i class="fa fa-phone" aria-hidden="true" style="color: whitesmoke;"></i>
                        <script>
                            function validate() {
                                var x = document.getElementById("TLP").value;
                                if (x.startsWith("08") && (x.length >= 9 && x.length <= 12)) {
                                    return true;
                                } else {
                                    alert("Invalid phone number, please enter a valid number starts with 08 and contain 9-12 digits");
                                    return false;
                                }
                            }
                        </script>
                    </div>
                </div>
                <div id="submit">
                    <button onclick="readData()">Register</button>
                </div>
                <div class="login">
                    Already have an account? <a href="/login" style="color: pink">Login</a> now!
                </div>
            </form>
        </div>
    </section>

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
</body>

</html>
