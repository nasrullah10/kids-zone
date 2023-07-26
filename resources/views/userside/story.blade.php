@extends("userside.userlayout")
@section("title")
<head>
<title>Kid Story | Digital Kid Zone</title>
<meta name="description" content="Kid Story Page" />
<meta name="keywords" content="digitalkidzone" />
</head>
@endsection
@section("content")
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Kid Stories</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kid Stories</li>
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
    @if(count($fetchfic)) 
            <hr>
            <h4 style="text-align:center">Fiction</h4> 
            <hr>
        <div class="row">
          
            @foreach($fetchfic as $f)
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
                        <a href="/kidstorydetail/{{$f->Title}}/{{$f->id}}"> <img src="/storyimages/{{$f->image}}" style="width: 400px;height: 250px;" class="img-fluid" alt="portfolio1">
                        </a>
                        @endif
                        
                    </div>
                    
                    <div class="articles_grid_caption">
                        <a href="/kidstorydetail/{{$f->Title}}/{{$f->id}}">   <h3>{{$f->Title}}</h3> </a>
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
        @else
        <hr>
            <h4 style="text-align:center">No story found</h4> 
            <hr>
        @endif

        @if(count($fetchnfic)) 
            <hr>
            <h4 style="text-align:center">Non-Fiction</h4> 
            <hr>
        <div class="row">
           
            @foreach($fetchnfic as $f)
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
                        <a href="/kidstorydetail/{{$f->Title}}/{{$f->id}}"> <img src="/storyimages/{{$f->image}}" style="width: 400px;height: 250px;" class="img-fluid" alt="portfolio1">
                        </a>
                        @endif
                        
                    </div>
                    
                    <div class="articles_grid_caption">
                        <a href="/kidstorydetail/{{$f->Title}}/{{$f->id}}">   <h3>{{$f->Title}}</h3> </a>
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
        @else
        <hr>
            <h4 style="text-align:center">No story found</h4> 
            <hr>
        @endif
                
    </div>
</section>
    
@endsection