@extends("userside.userlayout")
@section("title")
<head>
<title>Login | LearnDigital</title>
<meta name="description" content="Login Page" />
<meta name="keywords" content="learndigital" />
</head>
@endsection
@section("content")
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<section class="page-title">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 col-md-12">
              
              <div class="breadcrumbs-wrap">
                  <h1 class="breadcrumb-title">Forget Password</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Forget Password</li>
                      </ol>
                  </nav>
              </div>
              
          </div>
      </div>
  </div>
</section>
    <section>
      <div class="container">
        <div class="row">
             <div class=" col-md-12">
            
          <div class="wrapper" style="text-align: center">
            <div class="title-set pt-0">
              <label>Reset Password</label>
              <h3>Reset Your Password Here</h3>
           
            <hr>
          </div>

                    <form action="{{ route('reset.password.post') }}" method="POST">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">

                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required autofocus>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                  @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                              </div>
                          </div>
                          <br>
                          <div class="clear text-center pt-10">
                              <button type="submit" class="btn btn-danger">
                                  Reset Password
                              </button>
                          </div>
                      </form>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
