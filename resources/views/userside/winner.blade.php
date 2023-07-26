@extends("userside.userlayout")
@section("title")
<head>
<title>Winners | Digital Kid Zone</title>
<meta name="description" content="Winners Page" />
<meta name="keywords" content="digitalkidzone" />
</head>
@endsection
@section("content")
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Winners Of Our Website</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Winners</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->	

<!-- ========================== Articles Section =============================== -->
<section class="pt-0">
    <div class="container">
        
        <div class="row">
                    
            @foreach($result as $f)
            <!-- Single Article -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="articles_grid_style" style="height: 460px">
                    <div class="articles_grid_thumb">
                    <?php
                    $username = DB::table('users')->where('id',$f->userid)->first();
                    ?>
                       
                         <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger">
                            {{$f->part}} Winner
                        </span>
                        <a href="{{$f->link}}"> <img src="/winnerimages/{{$f->image}}" style="width: 400px;height: 250px;" class="img-fluid" alt="portfolio1">
                        </a>
                       
                        
                    </div>
                    
                    <div class="articles_grid_caption" >
                        <a href="{{$f->link}}">   <h3 style="font-size: 15px;color: deepskyblue"> <span style="color: gold">({{$f->position}})</span> {{$username->firstname}} {{$username->firstname}} {{$username->lastname}}</h3> </a>
                        <?php
                        $f1 = strip_tags($f->short_Des);
                        $f2 = Str::limit($f1,200);
                      
                       ?>
                       <h4 style="font-size: 15px">{!! html_entity_decode($f2) !!}</h4>
                    
                    </div>
                </div>
            </div>
       @endforeach
        
        </div>
        
        <!-- Row -->

                
    </div>
</section>
    
@endsection