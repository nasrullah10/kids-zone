@extends("userside.userlayout")
@section("title")
<head>
    <?php
    $ptitle = str_replace(' ', '%20', $fetch->Title);
    $pdes = strip_tags($fetch->long_Des);
    ?>
<title>{{$fetch->Title}} | Digital Kid Zone</title>
<meta name="description" content="{{$pdes}}" />
<meta name="keywords" content="digitalkidzone" />
@if($fetch->image!="null")
<meta property="og:image" content="http://digitalkidszone.com/storyimages/{{$fetch->image}}" />
@endif
<meta property="og:url" content="http://digitalkidszone.com/kidstorydetail/{{$ptitle}}/{{$fetch->id}}" />
<meta property="og:type" content="website" />
</head>
@endsection
@section("content")
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Kid Story</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kid Story Detail</li>
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
                           @elseif($fetch->image!="null")
                      <img class="img-fluid" src="/storyimages/{{$fetch->image}}" alt="">
                          
                            @endif
                           
                        </div>
                        
                        <div class="article_top_info">
                            <ul class="article_middle_info">
                                <li><a href="#"><span class="icons"><i class="ti-user"></i></span>{{$fetch->typefic}}</a></li>
                                <?php
                                $cat = DB::table('allcategorytbls')->where('id',$fetch->type)->first();
                                ?>
                                @if($cat)
                                <span class="post-date"><i class="ti-calendar"></i> {{$cat->category_name}}</span>
                              @endif
                            </ul>
                        </div>
                        <h2 class="post-title">{{$fetch->Title}}</h2>
                        <p>      {!! html_entity_decode($fetch->long_Des) !!}</p>
                       
                        
                    </div>
                </div>
                
              
                
                
            </div>
            
            <!-- Single blog Grid -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                
            
              
                
                <!-- Trending Posts -->
                <div class="single_widgets widget_thumb_post">
                    <h4 class="title">Related Stories</h4>
                    <ul>
                        @if(count($fetchall))
                        @foreach($fetchall as $f)
                        <li>
                            <span class="left">
                                @if($f->video_url!="null")
                                <iframe src="{{$f->video_url}}" style="width: 70px;height: 50px;" frameborder="0"></iframe>
                                @elseif($f->image!="null")
                                <a href="/kidstorydetail/{{$f->Title}}/{{$f->id}}"> <img src="/storyimages/{{$f->image}}" style="width: 70px;height: 50px;" class="img-fluid" alt="portfolio1">
                                </a>
                                @endif
                               
                            </span>
                            <span class="right">
                                <a class="feed-title" href="/kidstorydetail/{{$f->Title}}/{{$f->id}}">{{$f->Title}}</a> 
                                <?php
                                $cat = DB::table('allcategorytbls')->where('id',$f->type)->first();
                                ?>
                                @if($cat)
                                <span class="post-date"><i class="ti-calendar"></i> {{$cat->category_name}}</span>
                              @endif
                            </span>
                        </li>
                        @endforeach
                        @else
                     <hr>
                     <p>No Related stories found </p>
                     <hr>
                     @endif
                    </ul>
                </div>
                <hr>
                <span class="mr-3" style="font-size:20px">Share this post</span>
                      <?php
               $url = urlencode("http://digitalkidszone.com/kidstorydetail/$ptitle/$fetch->id");?>
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