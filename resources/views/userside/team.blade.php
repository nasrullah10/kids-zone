@extends("userside.userlayout")
@section("title")
<head>
<title>Team | Digital Kid Zone</title>
<meta name="description" content="Team Page" />
<meta name="keywords" content="digitalkidzone" />
</head>
@endsection
@section("content")
<!-- ============================ Page Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Team</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Team</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->			


<!-- ============================ Full Width Shop  ================================== -->
<section class="pt-0">
    <div class="container">
        
        <!-- Onclick Sidebar -->
        <div class="row">
            <div class="col-md-12 col-lg-12">

            </div>
        </div>
        
        <!-- Row -->
        <div class="row">	
            
            <div class="col-lg-12 col-md-12 col-sm-12">
                
                <!-- Row -->
              
                <!-- /Row -->
                
                <div class="row">
            @foreach($fetch as $f)
                    
                    <!-- Single Product -->
                    <div class="col-lg-4 col-md-4 col-sm-6">
                
                        <div class="shop_grid" style="height: 400px">
                            <div class="shop_grid_thumb">
                                <a href="/teamdetail/{{$f->title}}/{{$f->id}}"><img src="/teamimages/{{$f->image}}" class="img-fluid" alt="" /></a>
                            </div>
                            <div class="shop_grid_caption">
                                <h4 class="sg_rate_title"><a href="#">{{$f->title}}</a></h4>
                              
                                <span class="sg_rate theme-cl">
                                    <?php
                                    $f1 = strip_tags($f->short_Des);
                                    $f2 = Str::limit($f1,48);
                                  
                                   ?>
                                  {!! html_entity_decode($f2) !!}
                                </span>
                            </div>
                            <div class="shop_grid_action">
                               
                                <a href="/teamdetail/{{$f->title}}/{{$f->id}}" class="btn btn-shop" data-toggle="tooltip" data-placement="top" title="view detail"><i class="ti-search"></i></a>
                            </div>
                        </div>
                        
                    </div>
                  
                @endforeach    
                 
                </div>
        
                <!-- Row -->
              
                <!-- /Row -->
                
            </div>
        
        </div>
        <!-- Row -->
        
    </div>
</section>
@endsection