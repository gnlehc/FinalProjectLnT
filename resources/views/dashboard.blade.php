<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Meksiko</title>
    <link rel="stylesheet" href="/css/user.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- <style> @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap'); </style> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="container py-5">
      @if(Auth::check())
      <div class="position-relative py-2 px-2">
      <a href="{{route('logout')}}" class="py-2 px-2 rounded border-none bg-transparent text-white text-decoration-none">Log Out</a>
      </div>
      <section>
        <div class="hello">
            <h1><b>Welcome!</b></h1>
              <table class="table table-striped table-dark">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Telephone Number</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @csrf
                    @method('patch')
                    @foreach($users as $users)
                  <tr>
                    <td>{{$users->Name}}</td>
                    <td>{{$users->Email}}</td>
                    <td>{{Str::limit ($users->password, 20)}}</td>  {{-- limit the display --}}
                    <td>{{$users->TLP}}</td>
                    <td><a href="{{route('editData', $users->id)}}" class="btn btn-success">Edit</a></td>
                    {{-- <td><button class="btn btn-success">Edit</button></td>
                    <td><button class="btn btn-danger">Delete</button></td> --}}
                    <form action="{{route('delete', $users->id)}}" method="POST">
                      @csrf
                      @method('delete')
                      <td><button class="btn btn-danger">Delete</button></td>
                    </form>
                  </tr>
                  @endforeach
              </table>
        </div>
    </section>
      @endif
      @if(Auth::check() == false)
      <h1> <a href="/login" style="color: pink">Login</a> to your account</h1>
      <p class="text-white items-center text-center">Do not have an account? <a href="/register" style="color: pink">Register Here</a></p>
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