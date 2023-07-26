@extends("userside.userlayout")
@section("title")
<head>
<title>Learning tips | Digital Kid Zone</title>
<meta name="description" content="Learning tip Page" />
<meta name="keywords" content="digitalkidzone" />
</head>
@endsection
@section("content")
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Learning tips</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Learning tips</li>
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
                    
            @foreach($fetchmedia as $f)
            <!-- Single Article -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="articles_grid_style">
                    <div class="articles_grid_thumb">
                    <?php
                    $username = DB::table('users')->where('id',$f->userid)->first();
                    ?>
                        @if($f->video_url!="null")
                        @if($username) <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger">
                        Posted by {{$username->firstname}}
                        </span>@endif
                        <iframe src="{{$f->video_url}}" style="width: 400px;height: 250px;" frameborder="0"></iframe>
                        @elseif($f->image!="null")
                        @if($username) <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger">
                        Posted by {{$username->firstname}}
                        </span>@endif
                        <a href="/tipdetail/{{$f->Title}}/{{$f->id}}"> <img src="/tipimages/{{$f->image}}" style="width: 400px;height: 250px;" class="img-fluid" alt="portfolio1">
                        </a>
                        @endif
                        
                    </div>
                    
                    <div class="articles_grid_caption">
                        <a href="/tipdetail/{{$f->Title}}/{{$f->id}}">   <h3>{{$f->Title}}</h3> </a>
                        <?php
                        $f1 = strip_tags($f->short_Des);
                        $f2 = Str::limit($f1,48);
                      
                       ?>
                       <h4>{!! html_entity_decode($f2) !!}</h4>
                    
                    </div>
                </div>
            </div>
       @endforeach
        
        </div>
        
        <!-- Row -->

                
    </div>
</section>
    
@endsection