<!doctype html>
<html lang="en">
<head>
  <title>PT.Meksiko</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/account.css">
</head>
<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
                                            <form action="/Products" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="email" class="form-style" placeholder="Email" name="Email" value="{{Session::get('Email')}}">
                                                    <i class="input-icon uil uil-at"></i>
                                                    <div class="alert-danger">{{$errors->first('Email')}}</div>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" class="form-style" placeholder="Password" name="password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                    <div class="alert-danger">{{$errors->first('password')}}</div>
                                                </div>
                                                <div class="mb-4 pb-3"></div>
                                                <div id="submit">
                                                    <button class="bg-transparent text-white font-bold py-2 px-4 rounded" onclick="readData()">Login</button>
                                                </div>
                                            </form>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back" id="sign-up">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-3 pb-3">Sign Up</h4>
                                            <form action="/create" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-style" placeholder="Full Name" name="Name" value="{{Session::get('Name')}}">
                                                    <i class="input-icon uil uil-user"></i>
                                                    <div class="alert-danger">{{$errors->first('Name')}}</div>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" class="form-style" placeholder="Email" name="Email" value="{{Session::get('Email')}}">
                                                    <i class="input-icon uil uil-at"></i>
                                                    <div class="alert-danger">{{$errors->first('Email')}}</div>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="tel" class="form-style" placeholder="Phone Number" name="TLP" value="{{Session::get('TLP')}}">
                                                    <i class="input-icon uil uil-phone"></i>
                                                    <div class="alert-danger">{{$errors->first('TLP')}}</div>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" class="form-style" placeholder="Password" name="password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                    <div class="alert-danger">{{$errors->first('password')}}</div>
                                                </div>
                                                <div class="mb-2 pb-3"></div>
                                                <div id="submit">
                                                    <button class="py-2 px-2 rounded bg-transparent text-white" onclick="readData()">Sign Up</button>
                                                </div>
                                            </form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
</body>
</html>
