@extends("userside.userlayout")
@section("title")

<head>
<title>Register | Digital Kid Zone</title>
    <meta name="description" content="Register Page" />
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
                                <a href="index.html" class="log-logo_head"><img src="Mytemplate/assets/img/final logo transparent.png" class="img-fluid" width="200px" alt="" /></a>
                                <div class="log__heads">
                                    <h4 class="mt-0 logs_title">Create An <span class="theme-cl">Account</span></h4>
                                </div>
                                
                    <form method="POST"  action="{{ route('user.save') }}" id="main_form">
                        @csrf
                        <div class="text-danger"></div>
                        <div class="form-group">
                        <div class="row">
                        <div class="col-md-12">
                            <input type="file" name="insertimage">
                                <img width="180" height="180px"  class="rounded-circle"  src="Mytemplate/assets/images/user.png" alt="Add Your Profile Picture" />
                                <br>
                        </div>
                    </div>
                        </div>
                        <div class="form-group">
                            <label  class="control-label">First Name:</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" value="{{ old('firstname') }}"/>
                            <span class="text-danger error-text firstname_error"></span>
                          
                        </div>
                        <div class="form-group">
                            <label class="control-label">Last Name:</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname') }}"/>
                            <span class="text-danger error-text lastname_error"></span>
                           
                        </div>
                        <div class="form-group">
                            <label class="control-label">Age:</label>
                            <input type="number" class="form-control" name="age" id="age" value="{{ old('age') }}"/>
                            <span class="text-danger error-text age_error"></span>
                           
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"/>
                            <span class="text-danger error-text email_error"></span>
                          
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password:</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}"/>
                            <span class="text-danger error-text password_error"></span>
                           
                        </div>
                        
                        <div class="form-group">
                            <div class="checkbox" style="text-align: left">
                                <label>
                                    <a class="" style="font-weight: bold;text-decoration: underline; " href="/login">SIGN IN</a>
                                </label>
                            </div>
                            </div>
                        <div class="form-group" style="text-align:center">
                            <input type="submit" value="Register" class="btn btn-danger" />
                        </div>
                     
                      
                    </form>
                                
                              
                                <div class="form-group text-center mb-0 mt-3">
                                    Have You Already An Account? <a href="/login" class="theme-cl">LogIn</a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
   <script>


$(document).ready(function(){
              
              $("#main_form").on('submit', function(e){
                  e.preventDefault();
          
                  $.ajax({
                    url:$(this).attr('action'),
                      method:$(this).attr('method'),
                      data:new FormData(this),
                      processData:false,
                      dataType:'json',
                      contentType:false,
                      beforeSend:function(){
                          $(document).find('span.error-text').text('');
                      },
                      success:function(data){
                          if(data.status == 0){
                              $.each(data.error, function(prefix, val){
                                  $('span.'+prefix+'_error').text(val[0]);
                              });
                          }else{
                              $('#main_form')[0].reset();
                              alert(data.msg);
                          }
                      }
                  });
              });
          });


</script>