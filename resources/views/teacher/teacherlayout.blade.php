<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>@yield('title')</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
      <!-- site icon -->
      <link rel="icon" href="../AdminDashboard/images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../AdminDashboard/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="../AdminDashboard/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="../AdminDashboard/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="../AdminDashboard/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="../AdminDashboard/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="../AdminDashboard/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="../AdminDashboard/css/custom.css" />
      <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
      <script src="../assets/js/bootstrap.min.js"></script> -->
    <script src="../assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="../assets/js/plugins/chart.js"></script>
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
.dropbtn {
  color: white;
  padding: 16px;
  margin-top : 5px;
  font-size: 20px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="../AdminDashboard/images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">


                        <div class="user_info">
                            <h6>{{ session('tname') }}</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#"><i class="fa fa-dashboard orange_color"></i> <span>Dashboard</span></a>

                     </li>
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle app-menu__item"><i class="fa fa-user orange_color"></i> <span>Courses</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                        <li><a class="app-menu__item {{'teacher-create-course'==request()->path()?'active':''}}" href="/teacher-create-course"><i class="fa fa-shopping-bag orange_color"></i> <span>Create Course</span></a></li>
                        <li><a class="app-menu__item {{'courses-list'==request()->path()?'active':''}}" href="/courses-list"><i class="fa fa-shopping-bag orange_color"></i> <span>Courses List</span></a></li>
                        

                     </ul>
                     </li>
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle app-menu__item"><i class="fa fa-user orange_color"></i> <span>Students List</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                        <li><a class="app-menu__item {{'student-list'==request()->path()?'active':''}}" href="/student-list"><i class="fa fa-shopping-bag orange_color"></i> <span>Students</span></a></li>
                        

                     </ul>
                     </li>

                     
                     <li class="active"><a href="/alogout"><i class="fa fa-dashboard orange_color"></i> <span>Logout</span></a></li>


                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul class="app-nav">

                                 <div class="dropdown">
                                 <i class="dropbtn fa fa-bell-o" aria-hidden="true"></i><span class="badge"  style="margin-top: 16px"></span>
                                 <div class="dropdown-content" style="margin-left: -85px;">
                                 <a href="#">No Notification</a>
                                 </div>
                                 </div>


                              </ul>
                              
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">



                       @yield("content")




               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->

      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

      <!-- <script src="../AdminDashboard/js/jquery.min.js"></script> -->
      <script src="../AdminDashboard/js/popper.min.js"></script>
      <script src="../AdminDashboard/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="../AdminDashboard/js/animate.js"></script>
      <!-- select country -->
      <script src="../AdminDashboard/js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="../AdminDashboard/js/owl.carousel.js"></script>
      <!-- chart js -->
      <script src="../AdminDashboard/js/Chart.min.js"></script>
      <script src="../AdminDashboard/js/Chart.bundle.min.js"></script>
      <script src="../AdminDashboard/js/utils.js"></script>
      <script src="../AdminDashboard/js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="../AdminDashboard/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="../AdminDashboard/js/custom.js"></script>
      <script src="../AdminDashboard/js/chart_custom_style1.js"></script>
   </body>
</html>
