@extends("userside.userlayout")
@section("title")
<head>
    <?php
    $ptitle = str_replace(' ', '%20', $fetch->title);
    $pdes = strip_tags($fetch->long_Des);
    ?>
<title>{{$fetch->title}} | Digital Kid Zone</title>
<meta name="description" content="{{$pdes}}" />
<meta name="keywords" content="digitalkidzone" />
@if($fetch->image!="null")
<meta property="og:image" content="http://digitalkidszone.com/collabimages/{{$fetch->image}}" />
@endif
<meta property="og:url" content="http://digitalkidszone.com/collabdetail/{{$ptitle}}/{{$fetch->id}}" />
<meta property="og:type" content="website" />
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
                            <li class="breadcrumb-item active" aria-current="page">Collaboration Detail</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->	

<!-- ============================ Agency List Start ================================== -->
<section class="gray">

    <div class="container">
    
        <!-- row Start -->
        <div class="row">
        
            <!-- Blog Detail -->
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="article_detail_wrapss single_article_wrap format-standard">
                    <div class="article_body_wrap">
                    
                        <div class="article_featured_image">
                        
                            <a href="/collabdetail/{{$fetch->title}}/{{$fetch->id}}">  <img class="img-fluid" src="/collabimages/{{$fetch->image}}" alt="">
                            </a>
                          
                        </div>
                        
                        <div class="article_top_info">
                            <ul class="article_middle_info">
                                
                                <?php
                                $cat = DB::table('allcategorytbls')->where('id',$fetch->type)->first();
                                ?>
                                @if($cat)
                                <span class="post-date"><i class="ti-calendar"></i> {{$cat->category_name}}</span>
                              @endif
                            </ul>
                        </div>
                        <h2 class="post-title">{{$fetch->title}}</h2>
                        <p>      {!! html_entity_decode($fetch->long_Des) !!}</p>
                       
                        
                    </div>
                </div>
                
              
                
                
            </div>
            
            <!-- Single blog Grid -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                
            
              
                
                <!-- Trending Posts -->
                <div class="single_widgets widget_thumb_post">
                    <h4 class="title">Related Blogs</h4>
                    <ul>
                        @if(count($fetchall))
                        @foreach($fetchall as $f)
                        <li>
                            <span class="left">
                               
                                <a href="/collabdetail/{{$f->title}}/{{$f->id}}"> <img src="/collabimages/{{$f->image}}" style="width: 70px;height: 50px;" class="img-fluid" alt="portfolio1">
                                </a>
                               
                               
                            </span>
                            <span class="right">
                                <a class="feed-title" href="/collabdetail/{{$f->title}}/{{$f->id}}">{{$f->title}}</a> 
                                <span class="post-date"><i class="ti-calendar"></i>{{$f->media_date}}</span>
                            </span>
                        </li>
                        @endforeach
                        @else
                        <hr>
                        <p>No related blogs found</p>
                        <hr>
                        @endif
                    </ul>
                </div>
                <hr>
                <span class="mr-3" style="font-size:20px">Share this post</span>
                      <?php
               $url = urlencode("http://digitalkidszone.com/collabdetail/$ptitle/$fetch->id");?>
                <a class="mr-3"  href="https://www.facebook.com/sharer.php?u={{$url}}"><i class="fab fa-facebook-square" style='font-size:24px' ></i></a>
                <a class="mr-3" href="https://twitter.com/share?url={{$url}}"><i class="fab fa-twitter-square" style='font-size:24px'></i></a>
                <a class="mr-3" href="https://api.whatsapp.com/send?phone=&text=<?php urlencode("hi hello")?> {{$url}}"><i class="fab fa-whatsapp-square common-icon whatsap-bg" style='font-size:24px'></i></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{$url}}"><i class="fab fa-linkedin-in" style='font-size:24px'></i></a>
                   <hr>
                <!-- Tags Cloud -->
              
            </div>
            
        </div>
        <!-- /row -->					
        
    </div>
            
</section>
<!-- ============================ Agency List End ================================== -->

<!-- ============================== Start Newsletter ================================== -->

@endsection