@extends("userside.userlayout")
@section("title")
<head>
<title>Accelerate Business Success through Collaborative| Digital Kid Zone</title>
<meta name="description" content="Drive growth and achieve a competitive advantage with effective business collaboration solutions. Our platform offers secure communication, real-time collaboration, and streamlined workflows for enhanced productivity. Unlock the full potential of your team and propel your business forward." />
<meta name="keywords" content="digital kids zone, business collaboration, collaborative solutions, secure communication, real-time collaboration, streamlined workflows, productivity, team collaboration, competitive advantage, business growth" />
</head>
@endsection
@section("content")
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Collaboration</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Collaboration</li>
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
                    
            @foreach($fetchcollab as $c)
            <!-- Single Article -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="articles_grid_style">
                    <div class="articles_grid_thumb">
                        
                     
                        <a href="/collabdetail/{{$c->title}}/{{$c->id}}"> <img src="/collabimages/{{$c->image}}" style="width: 400px;height: 250px;" class="img-fluid" alt="portfolio1">
                        </a>
                       
                        
                    </div>
                    
                    <div class="articles_grid_caption">
                        <a href="/collabdetail/{{$c->title}}/{{$c->id}}">   <h3>{{$c->title}}</h3> </a>
                        <?php
                        $c1 = strip_tags($c->long_Des);
                        $c2 = Str::limit($c1,48);
                      
                       ?>
                       <h4>{!! html_entity_decode($c2) !!}</h4>
                    
                    </div>
                </div>
            </div>
       @endforeach
        
        </div>
        
     
                
    </div>
</section>
    
@endsection