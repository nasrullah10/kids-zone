@extends("userside.userlayout")
@section("title")
<head>
    <?php
    $ptitle = str_replace(' ', '%20', $fetchp->title);
    $pdes = strip_tags($fetchp->long_des);
    ?>
<title>{{$fetchp->title}} | Digital Kid Zone</title>
<meta name="description" content="{{$pdes}}" />
<meta name="keywords" content="Vaganova" />
@if($fetchp->image!="null")
<meta property="og:image" content="http://digitalkidszone.com/teamimages/{{$fetchp->image}}" />
@endif
<meta property="og:url" content="http://digitalkidszone.com/teamdetail/{{$ptitle}}/{{$fetchp->id}}" />
<meta property="og:type" content="website" />
</head>
@endsection
@section("content")

<!-- ============================ Page Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Team Detail Page</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Team Detail</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->			

<section class="pr_detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="woocommerce single_product quick_view_wrap">
                
                    <div class="woo-single-images">
                        <div class="feature-style-single">
                            <img src="/teamimages/{{$fetchp->image}}" height="400px" alt="product-book-06" width="570">
                        </div>
                    </div>
                    
                    <div class="summary entry-summary">
                        <div class="woo_inner">
                            <div class="shop_status sell"></div>
                            <h2 class="woo_product_title">
                                <a href="#">{{$fetchp->title}}</a>
                            </h2>
                           
                            <div class="woo_price_rate">
                                <div class="woo_rating">
                                   
                                </div>
                                <div class="woo_price_fix">
                                    <h3 class="mb-0 theme-cl"></h3>
                                </div>
                            </div>
                            <div class="woo_short_desc">
                                <p>  {!! html_entity_decode($fetchp->long_des) !!}</p>
                            </div>
                            <div class="quantity-button-wrapper">
                               
                               
                            </div>
                            <div class="woo_buttons">
                              
                            </div>
                        </div>
                    </div>
                
                </div>
                
                <hr>
                <span class="mr-3" style="font-size:20px">Share this post</span>
                      <?php
               $url = urlencode("http://digitalkidszone.com/teamdetail/$ptitle/$fetchp->id");?>
                <a class="mr-3"  href="https://www.facebook.com/sharer.php?u={{$url}}"><i class="fab fa-facebook-square" style='font-size:24px' ></i></a>
                <a class="mr-3" href="https://twitter.com/share?url={{$url}}"><i class="fab fa-twitter-square" style='font-size:24px'></i></a>
                <a class="mr-3" href="https://api.whatsapp.com/send?phone=&text=<?php urlencode("hi hello")?> {{$url}}"><i class="fab fa-whatsapp-square common-icon whatsap-bg" style='font-size:24px'></i></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{$url}}"><i class="fab fa-linkedin-in" style='font-size:24px'></i></a>
                   <hr>
            </div>
        </div>
    </div>
</section>
@endsection