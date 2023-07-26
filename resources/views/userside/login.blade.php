@extends("userside.userlayout")
@section("title")

<head>
<title>Login | Digital Kid Zone</title>
    <meta name="description" content="Login Page" />
<meta name="keywords" content="digitalkidzone" />
</head>
@endsection
@section("content")
<br>
<div id="main-wrapper">
		
    <!-- ========================== SignUp Elements ============================= -->
    <section class="log-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-md-11">
                
                    <div class="row no-gutters position-relative log_rads">
                        <div class="col-lg-6 col-md-5 bg-cover" style="background:#1f2431 url(Mytemplate/assets/img/log.png)no-repeat;">
                            <div class="lui_9okt6">
                                <div class="_loh_revu97">
                                   
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-7 position-static p-4">
                            <div class="log_wraps">
                                <a href="index.html" class="log-logo_head"><img src="Mytemplate/assets/img/final logo transparent.png" style="width: 200px" class="img-fluid"  alt="" /></a>
                                <div class="log__heads">
                                    <h4 class="mt-0 logs_title">Sign <span class="theme-cl">In</span></h4>
                                </div>
                                
                                @if(session('message'))
                    <div class="alert alert-info " role="alert">
                        <strong style="text-align: center">{{session('message')}}</strong>
                    </div>
                    @endif
                    <form method="POST" action="{{ URL::to('Login_post') }}">
                        @csrf
                        
                        @if(session('loginfailed'))
                        <p style="color: red">{{ session('loginfailed') }}</p>
                        @endif

                        <div class="form-group">
                            <label class="control-label">Email:</label>
                            <input type="email" class="form-control" required name="loginemail"/>
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password:</label>
                            <input type="password" type="password" class="form-control" required name="loginpass"/>
                            <span  class="text-danger"></span>
                        </div>
                        <div class="container">
                            <div class="row">
                       <div class="col-sm">
                        <div class="form-group">
                        <div class="checkbox" style="text-align: left">
                            <label>
                                <a class="" style="font-weight: bold;text-decoration: underline; " href="/register">SIGN UP</a>
                            </label>
                        </div>
                </div>
            </div>

                       <div class="col-sm"></div>
                       <div class="col-sm"><div class="form-group">
                            
                        <div class="checkbox" style="text-align: right">
                            <label>
                                <a class="" style="font-weight: bold;text-decoration: underline; " href="/forget-password">RESET PASSWORD?</a>
                            </label>
                        </div>
                        
                   
                </div></div>
            </div>
                        </div>

                        <div class="form-group" style="text-align:center">
                            <input type="submit" value="Login" class="btn btn-danger" />
                        </div>
                    </form>
                                
                               
                                
                                <div class="form-group text-center mb-0 mt-3">
                                    You Have't Any Account? <a href="/register" class="theme-cl">SignUp</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== Login Elements ============================= -->
    

</div>
@endsection