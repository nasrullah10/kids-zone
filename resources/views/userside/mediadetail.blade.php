@extends("userside.userlayout")
@section("title")
<head>
    <?php
    $ptitle = str_replace(' ', '%20', $fetch->headline);
    $pdes = strip_tags($fetch->long_des);
    ?>
<title>{{$fetch->headline}} | Digital Kid Zone</title>
<meta name="description" content="{{$pdes}}" />
<meta name="keywords" content="digitalkidzone" />
@if($fetch->image_video!="null")
<meta property="og:image" content="http://digitalkidszone.com/mediaimages/{{$fetch->image_video}}" />
@endif
<meta property="og:url" content="http://digitalkidszone.com/mediadetail/{{$ptitle}}/{{$fetch->id}}" />
<meta property="og:type" content="website" />
</head>
@endsection
@section("content")
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Media center</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Media Detail</li>
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
                            @if($fetch->video_url!="null")
                            <iframe src="{{$fetch->video_url}}" style="width: 725px;height: 350px;" frameborder="0"></iframe>
                           @else
                            <a href="/mediadetail/{{$fetch->headline}}/{{$fetch->id}}">  <img class="img-fluid" src="/mediaimages/{{$fetch->image_video}}" alt="">
                            </a>
                            @endif
                           
                        </div>
                        
                        <div class="article_top_info">
                            <ul class="article_middle_info">
                                <li><a href="#"><span class="icons"><i class="ti-user"></i></span>{{$fetch->media_date}}</a></li>
                                <?php
                                $cat = DB::table('allcategorytbls')->where('id',$fetch->type)->first();
                                ?>
                                @if($cat)
                                <span class="post-date"><i class="ti-calendar"></i> {{$cat->category_name}}</span>
                              @endif
                            </ul>
                        </div>
                        <h2 class="post-title">{{$fetch->headline}}</h2>
                        <p>      {!! html_entity_decode($fetch->long_des) !!}</p>
                       
                        
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
                                @if($f->video_url!="null")
                                <iframe src="{{$f->video_url}}" style="width: 70px;height: 50px;" frameborder="0"></iframe>
                                @elseif($f->image_video!="null")
                                <a href="/mediadetail/{{$f->headline}}/{{$f->id}}"> <img src="/mediaimages/{{$f->image_video}}" style="width: 70px;height: 50px;" class="img-fluid" alt="portfolio1">
                                </a>
                                @endif
                               
                            </span>
                            <span class="right">
                                <a class="feed-title" href="/mediadetail/{{$f->headline}}/{{$f->id}}">{{$f->headline}}</a> 
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
               $url = urlencode("http://digitalkidszone.com/mediadetail/$ptitle/$fetch->id");?>
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