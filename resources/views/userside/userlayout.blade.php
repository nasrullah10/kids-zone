
<!-- Mirrored from templates.hibootstrap.com/inon/default/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2023 09:59:04 GMT -->

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themezhub.net/learnup-demo-2/learnup/new-home-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Apr 2023 16:13:35 GMT -->
@yield('title')
<head>
    <meta charset="utf-8" />
    <meta name="author" content="www.frebsite.nl" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    
    <!-- Custom CSS -->
    <link href="../../../../Mytemplate/assets/css/styles.css" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="../../../../Mytemplate/assets/css/colors.css" rel="stylesheet">

</head>

<body class="red-skin">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="">
        <div class=""><span></span><span></span></div>
    </div>


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        <div class="header header-light">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="" href="/"><img src="../../../../Mytemplate/assets/img/kidslogo.png"
                                style="width: 150px" class="logo mt-3" alt="" /></a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper" style="transition-property: none;">
                        <ul class="nav-menu">
                            <li ><a href="/">Home<span class="submenu-indicator"></span></a></li>
                            <li ><a href="/about">About Us<span class="submenu-indicator"></span></a></li>
                            <li><a href="/kidstory">Stories<span class="submenu-indicator"></span></a></li>
                            <li><a href="/mediacenter">Media Center<span class="submenu-indicator"></span></a></li>
                            <li><a href="/team">Our Team<span class="submenu-indicator"></span></a></li>
                            <li ><a href="/testyourskill">Test Your Skills<span class="submenu-indicator"></span></a></li>
                            <li ><a href="/certificate">Verify Certificate<span class="submenu-indicator"></span></a></li>
                          
 {{-- <li><a href="#">Contact Us<span class="submenu-indicator"></span></a></li>  --}}
                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">

                        @if(session('aid'))
                        <li class="login_click light">
                                <a href="/allcatget" style="font-size:13px">Dashboard</a>
                            </li>
                            <li class="login_click bg-green">
                                <a href="/alogout" style="font-size:13px">Logout</a>
                            </li>
                        @elseif(session('cid'))
                        <li class="login_click light">
                                <a href="/ustory" style="font-size:13px">Dashboard</a>
                            </li>
                            <li class="login_click bg-green">
                                <a href="/clogout" style="font-size:13px">Logout</a>
                            </li>
                        @else
                            <li class="login_click light">
                                <a href="/login" style="font-size:13px">Login</a>
                            </li>
                            <li class="login_click bg-green">
                                <a href="/register" style="font-size:13px">Register</a>
                            </li>
                            <br><br><br>
                           @endif
                          
                          
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        @yield('content')



        <footer class="dark-footer skin-dark-footer">
            <div>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <img src="../../../../Mytemplate/assets/img/final logo transparent.png" style="width: 500px;height: 50px;" class="img-footer" alt="" />
                                <div class="footer-add">
                                    <p>The Kids Education and Learning Website aims to provide a platform for children to learn and improve their reading and writing skills through a variety of engaging and interactive features. 
                                    </p>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <h4 class="widget-title">About Us</h4>
                                <ul class="footer-menu">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/about">About Us</a></li>
                                    <li><a href="/team">Team</a></li>
                                    <li><a href="/contact">Contact Us</a></li>
                                    <li><a href="/terms">Terms & Condition</a></li>
                                    <li><a href="/privacy">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <h4 class="widget-title">Our Services</h4>
                                <ul class="footer-menu">
                                    <li><a href="/learningtips">Learning Tips</a></li>
                                    <li><a href="/kidstory">Stories</a></li>
                                    <li><a href="/announcement">Announcements</a></li>
                                    <li><a href="/mediacenter">Media Center</a></li>
                                    <li><a href="/testyourskill">Test Your Skills</a></li>
                                    <li><a href="/certificate">Verify Your Certificate</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- <div class="col-lg-2 col-md-3">
                            <div class="footer-widget">
                                <h4 class="widget-title">Help & Support</h4>
                                <ul class="footer-menu">
                                    <li><a href="#">Documentation</a></li>
                                    <li><a href="#">Live Chat</a></li>
                                    <li><a href="#">Mail Us</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Faqs</a></li>
                                </ul>
                            </div>
                        </div> -->

                        <div class="col-lg-3 col-md-12">
                            <div class="footer-widget">
                                <h4 class="widget-title">Contact Us</h4>
                                <div div class="other-store-link">
                                    <div class="">
                                        <div>
                                           <i class="fa fa-home " aria-hidden="true"></i>
                                            <span> Ittehad Lane 3, D.H.A Phase 6 Ittehad Commercial Area Phase 6 Defence Housing Authority, Karachi.</span>
<br><br>
                                          <i class="fa fa-phone" aria-hidden="true"></i>
                                            <span> (0306)-2726234  (0331)-3833747</span><br><br>

                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <span> info@digitalkidszone.com</span><br><br>

                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-md-12">
                            <p class="mb-0">© 2023 All Rights Reserved by Digital Kids Zone.  Designed By <a href="https://growdigitalcare.com/" target="_blank">Grow Digital Care</a>.
                            </p>
                        </div>

                       
                    </div>
                </div>
            </div>
        </footer>
        <!-- ============================ Footer End ================================== -->

        <!-- Log In Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
                <div class="modal-content" id="registermodal">
                    <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                    <div class="modal-body">
                        <h4 class="modal-header-title">Log In</h4>
                        <div class="login-form">
                            <form>

                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="*******">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                                </div>

                            </form>
                        </div>

                        <div class="social-login mb-3">
                            <ul>
                                <li>
                                    <input id="reg" class="checkbox-custom" name="reg" type="checkbox">
                                    <label for="reg" class="checkbox-custom-label">Save Password</label>
                                </li>
                                <li class="right"><a href="#" class="theme-cl">Forget Password?</a></li>
                            </ul>
                        </div>

                        <div class="modal-divider"><span>Or login via</span></div>
                        <div class="social-login ntr mb-3">
                            <ul>
                                <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                                <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                            </ul>
                        </div>

                        <div class="text-center">
                            <p class="mt-2">Haven't Any Account? <a href="register.html" class="link">Click here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Sign Up Modal -->
        <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
                <div class="modal-content" id="sign-up">
                    <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                    <div class="modal-body">
                        <h4 class="modal-header-title">Sign Up</h4>
                        <div class="login-form">
                            <form>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="*******">
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-md full-width pop-login">Sign Up</button>
                                </div>

                            </form>
                        </div>

                        <div class="modal-divider"><span>Or Signup via</span></div>
                        <div class="social-login ntr mb-3">
                            <ul>
                                <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                                <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                            </ul>
                        </div>

                        <div class="text-center">
                            <p class="mt-3"><i class="ti-user mr-1"></i>Already Have An Account? <a href="#"
                                    class="link">Go For LogIn</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../../../Mytemplate/assets/js/jquery.min.js"></script>
    <script src="../../../../Mytemplate/assets/js/popper.min.js"></script>
    <script src="../../../../Mytemplate/assets/js/bootstrap.min.js"></script>
    <script src="../../../../Mytemplate/assets/js/select2.min.js"></script>
    <script src="../../../../Mytemplate/assets/js/slick.js"></script>
    <script src="../../../../Mytemplate/assets/js/jquery.counterup.min.js"></script>
    <script src="../../../../Mytemplate/assets/js/counterup.min.js"></script>
    <script src="../../../../Mytemplate/assets/js/custom.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->

</body>

<!-- Mirrored from themezhub.net/learnup-demo-2/learnup/new-home-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Apr 2023 16:13:39 GMT -->

</html>
