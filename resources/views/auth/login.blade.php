<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('template/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('template/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><h1>Avenzhore</h1><i>Website data alumni angkatan 39</i></div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" placeholder="Email" autocomplete="off">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"  type="password" placeholder="Password">
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            {{-- <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div> --}}
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{asset('template/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
</body>
 
</html>