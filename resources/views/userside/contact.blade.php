@extends("userside.userlayout")
@section("title")
<head>
    <title>Contact us | Digital Kid Zone</title>
    <meta name="description" content="Digital Kids Zone | Kids Education, Learning, Kids Stories, Quizzes, Online Tests your Skills" />
<meta name="keywords" content="digital kids zone, kids education, kids learning, kids stories, quizzes, online tests, story competitions, interactive learning, educational activities, digital learning, child development" />
</head>
@endsection
@section("content")
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Get in Touch</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Agency List Start ================================== -->
<section class="bg-light">

    <div class="container">

        <!-- row Start -->
        <div class="row">

            <div class="col-lg-8 col-md-7">
                <div class="prc_wrap">

                    <div class="prc_wrap_header">
                        <h4 class="property_block_title">Fillup The Form</h4>
                        @if(session('sent'))
                        <div class="alert alert-success " role="alert">
                            <strong style="text-align: center">{{session('sent')}}</strong>
                        </div>
                        @endif
                    </div>

                    <div class="prc_wrap-body">
                        <form action="{{URL::to('/contactuspost') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="insertname" class="form-control simple">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="insertemail" class="form-control simple">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="insertphone" class="form-control simple">
                            </div>

                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control simple" name="insertmessage"></textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-theme" type="submit">Submit Request</button>
                            </div>
                    </div>
                    </form>
                </div>

            </div>

            <div class="col-lg-4 col-md-5">

                <div class="prc_wrap">

                    <div class="prc_wrap_header">
                        <h4 class="property_block_title">Reach Us</h4>
                    </div>

                    <div class="prc_wrap-body">
                        <div class="contact-info">

                            <h2>Get In Touch</h2><br>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p> -->

                            <div class="cn-info-detail">
                                <div class="cn-info-icon">
                                    <i class="ti-home"></i>
                                </div>
                                <div class="cn-info-content">
                                    <h4 class="cn-info-title">Reach Us</h4>
                                    Ittehad Lane 3, D.H.A Phase 6 Ittehad Commercial Area Phase 6 Defence Housing
                                    Authority, Karachi.
                                </div>
                            </div>


                            <div class="cn-info-detail">
                                <div class="cn-info-icon">
                                    <i class="ti-email"></i>
                                </div>
                                <div class="cn-info-content">
                                    <h4 class="cn-info-title">Drop A Mail</h4>
                                    info@digitalkidszone.com
                                </div>
                            </div>

                            <div class="cn-info-detail">
                                <div class="cn-info-icon">
                                    <i class="ti-mobile"></i>
                                </div>
                                <div class="cn-info-content">
                                    <h4 class="cn-info-title">Call Us</h4>
                                    (0306)-2726234<br>(0331)-3833747
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /row -->

    </div>

</section>
@endsection