@extends("userside.userlayout")
@section("title")

<head>
    <title>About us | Engage and Empower Young Minds with Digital Kid Zone</title>
    <meta name="description" content="Discover a vibrant online platform for kids' learning! Explore captivating kids stories, exciting story competitions, interactive skill quizzes, valuable learning tips, and a media center filled with engaging content." />
<meta name="keywords" content="digital kids zone, kids learning, kids stories, story competitions, skill quizzes, learning tips, Kids education, online learning, kids story" />
</head>
@endsection
@section("content")

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Who We are?</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ========================== About Facts List Section =============================== -->
<section>
        <div class="container">
            
            <div class="row align-items-center">
            
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="list_facts_wrap">
                        <div class="sec-heading mb-3">
                            <h2>Know about <span class="theme-cl">Digital Kids Zone</span> </h2>
                        </div>
                        <div class="list_facts">
                            <div class="list_facts_icons"><i class="ti-desktop"></i></div>
                            <div class="list_facts_caption">
                                <h4>Aim:</h4>
                                <p>Our aims to provide a platform for children to learn and 
                                improve their reading and writing skills through a variety of engaging and interactive features. The 
                                website will offer an extensive library of kid-friendly stories, writing prompts, and educational 
                                resources, all aimed at helping children to enhance their literacy skills and foster a love of reading 
                                and writing</p>
                            </div>
                        </div>
                        <div class="list_facts">
                            <div class="list_facts_icons"><i class="ti-heart"></i></div>
                            <div class="list_facts_caption">
                                <h4>Purpose</h4>
                                <p>Our purpose is to provide a fun and engaging way for children to learn and improve 
                                their literacy skills. The website will cater to children of different ages and reading levels, ranging 
                                from preschoolers to early teens.</p>
                            </div>
                        </div>
                      
                        
                    </div>
                    <a href="/about" class="btn btn-modern">Know More<span><i class="ti-arrow-right"></i></span></a>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="list_facts_wrap_img">
                    
                    <img src="Mytemplate/assets/img/modern-education.png" class="img-fluid" alt="" />
                         
                    </div>
                </div>

            </div>
            
        </div>
    </section>
<!-- ========================== About Facts List Section =============================== -->

<!-- ============================ Featured Instructor Start ================================== -->
<section >
        <div class="container">
        
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        <p> <a href="/team"> View All </a></p>
                        <h2><span class="theme-cl">Our</span> Team</h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">

                    <div class="arrow_slide three_slide-dots arrow_middle">
                        @foreach($team as $f)
                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid">
                        
                                <div class="education_block_thumb">
                            
                                 
                             
                                    <a href="/teamdetail/{{$f->title}}/{{$f->id}}"> <img src="/teamimages/{{$f->image}}" style="width: 400px;height: 250px;" class="img-fluid" alt="portfolio1">
                                    </a>
                                  
                                
                                </div>
                                
                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="/teamdetail/{{$f->title}}/{{$f->id}}">{{$f->title}}</a></h4>
                                    <?php
                                    $f1 = strip_tags($f->short_Des);
                                    $f2 = Str::limit($f1,48);
                                  
                                   ?>
                                  <p>{!! html_entity_decode($f2) !!}</p>
                                </div>
                                
                               
                                
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                </div>

            </div>
            
        </div>
    </section>
<!-- ============================ Featured Instructor End ================================== -->

<!-- ============================ Testimonial Start ================================== -->

<!-- ============================ Testimonial End ================================== -->

<!-- ============================== Start Newsletter ================================== -->


@endsection