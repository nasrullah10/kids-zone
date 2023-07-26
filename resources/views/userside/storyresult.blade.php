@extends("userside.userlayout")
@section("title")

<head>
    <title>Result | Digital Kid Zone</title>
    <meta name="description" content="Result Page" />
<meta name="keywords" content="digitalkidzone" />
</head>
@endsection
@section("content")


<link rel="stylesheet" href="../View_template/assets/css/style.min.css">
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Winners of Story Competition</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Story Competition</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
</section>

<div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
    <div class="container">
        <ul class="nav tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Round 1</a>
            </li>
            <li class="nav-item " role="presentation">
                <a id="additional-info-tab" data-bs-toggle="tab" href="#additional-info" role="tab" aria-controls="additional-info" aria-selected="false">Round 2</a>
            </li>
            <li class="nav-item" role="presentation">
                <a id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Round 3</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <div class="product-additional-info">
                    <div class="table-responsive">
                       
                        <table>
                            <thead>
                                <tr>
                                  <th scope="col">Posted by</th>
                                 
                                  <th scope="col">Title</th>
                                 
                                  <th scope="col">Image</th>
                                  <th scope="col">Status</th>
                                  <th scope="col" colspan="3">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if (count($round1) > 0)
                                @foreach($round1 as $fs)
                               <tr>
                                <?php
                                $topic = DB::table('allcategorytbls')->where('id',$fs->type)->first();
                                   $user = DB::table('users')->where('id',$fs->userid)->first();
                                ?>
                                 <td>
                                  @if($user)
                                  {{ $user->firstname }}
                                @else
                                null
                                @endif
                                </td>
                               
                                </td>
                                <td>{{ $fs->Title }}</td>
                               
                                <td>
                                @if($fs->image!="null")
                                  <img src="storyimages/{{ $fs->image }}" width="100px">
                                  @else
                                  null
                                  @endif
                                </td>
                               
                                <td><button class="btn btn-success" disabled>Selected</button></td>
                               
                               <td><button data-toggle="modal" data-id="{{$fs->id}}" data-target="#modelId{{$fs->id}}" class="btn btn-warning text-white">Detail</button></td>
                               </tr>
                               <div class="modal fade" id="modelId{{$fs->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" style="color:teal">Story Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                                    <div class="modal-body">
                                                  
                                        <dt style="color:teal">
                                        Type
                                        </dt>
                                        <dd>
                                            <?php
                                            $topic = DB::table('allcategorytbls')->where('id',$fs->type)->first();
                                             ?>
                                         {{ $topic->category_name }}
                                        </dd>
                                        <br>
                                        <dt style="color:teal">
                                        Title
                                        </dt>
                                        <dd>
                                        {{$fs->Title}}
                                        </dd>
                                        <br>
                                        <dt style="color:teal">
                                        Short Description
                                        </dt>
                                        <dd>
                                            {!! html_entity_decode($fs->short_Des) !!}
                                        </dd>
                                        <br>
                                        <dt style="color:teal">
                                        Long Description
                                        </dt>
                                        <dd>
                                            {!! html_entity_decode($fs->long_Des) !!}
                                        </dd>
                                        <br>
                                       
                            
                                        <dt style="color:teal">
                                        Video Link
                                        </dt>
                                        <dd>
                                        {{$fs->video_url}}
                                        </dd>
                                        <br>
                            
                                        @if($fs->image!="null")
                                        <dt style="color:teal">
                                        Image
                                        </dt>
                                        <dd>
                                        <img src="/storyimages/{{$fs->image}}" alt="storyimages" style="height:100px">
                                        </dd>
                                        @endif
                                        <br>
                                        <hr/>
                            
                            
                                                   </div>
                            
                                               
                            
                                               
                                            </div>
                                            <hr>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                
                               @endforeach
                               @else
                               <tr>
                                   <td colspan="4" class="text-dark font-weight-bold">Result hasn't been annouced yet</td>
                               </tr>
                               @endif
                              </tbody>
                        </table>

                    </div>
                </div>
                <!-- End .product-desc-wrapper -->
            </div>
            <div class="tab-pane fade" id="additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
                <div class="product-additional-info">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                  <th scope="col">Posted by</th>
                                 
                                  <th scope="col">Title</th>
                                 
                                  <th scope="col">Image</th>
                                  <th scope="col">Status</th>
                                  <th scope="col" colspan="3">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if (count($round2) > 0)
                                @foreach($round2 as $fs)
                               <tr>
                                <?php
                                $topic = DB::table('allcategorytbls')->where('id',$fs->type)->first();
                                   $user = DB::table('users')->where('id',$fs->userid)->first();
                                ?>
                                 <td>
                                  @if($user)
                                  {{ $user->firstname }}
                                @else
                                null
                                @endif
                                </td>
                               
                                </td>
                                <td>{{ $fs->Title }}</td>
                               
                                <td>
                                @if($fs->image!="null")
                                  <img src="storyimages/{{ $fs->image }}" width="100px">
                                  @else
                                  null
                                  @endif
                                </td>
                               
                                <td><button class="btn btn-success" disabled>Selected</button></td>
                               
                               <td><button data-toggle="modal" data-id="{{$fs->id}}" data-target="#modelId{{$fs->id}}" class="btn btn-warning text-white">Detail</button></td>
                               </tr>
                               <div class="modal fade" id="modelId{{$fs->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" style="color:teal">Story Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                                    <div class="modal-body">
                                                  
                                        <dt style="color:teal">
                                        Type
                                        </dt>
                                        <dd>
                                            <?php
                                            $topic = DB::table('allcategorytbls')->where('id',$fs->type)->first();
                                             ?>
                                         {{ $topic->category_name }}
                                        </dd>
                                        <br>
                                        <dt style="color:teal">
                                        Title
                                        </dt>
                                        <dd>
                                        {{$fs->Title}}
                                        </dd>
                                        <br>
                                        <dt style="color:teal">
                                        Short Description
                                        </dt>
                                        <dd>
                                            {!! html_entity_decode($fs->short_Des) !!}
                                        </dd>
                                        <br>
                                        <dt style="color:teal">
                                        Long Description
                                        </dt>
                                        <dd>
                                            {!! html_entity_decode($fs->long_Des) !!}
                                        </dd>
                                        <br>
                                       
                            
                                        <dt style="color:teal">
                                        Video Link
                                        </dt>
                                        <dd>
                                        {{$fs->video_url}}
                                        </dd>
                                        <br>
                            
                                        @if($fs->image!="null")
                                        <dt style="color:teal">
                                        Image
                                        </dt>
                                        <dd>
                                        <img src="/storyimages/{{$fs->image}}" alt="storyimages" style="height:100px">
                                        </dd>
                                        @endif
                                        <br>
                                        <hr/>
                            
                            
                                                   </div>
                            
                                               
                            
                                               
                                            </div>
                                            <hr>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                
                               @endforeach
                               @else
                               <tr>
                                   <td colspan="4" class="text-dark font-weight-bold">Result hasn't been annouced yet</td>
                               </tr>
                               @endif
                              </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="product-additional-info">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                  <th scope="col">Posted by</th>
                                 
                                  <th scope="col">Title</th>
                                 
                                  <th scope="col">Image</th>
                                  <th scope="col">Status</th>
                                  <th scope="col" colspan="3">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if (count($round3) > 0)
                                @foreach($round3 as $fs)
                               <tr>
                                <?php
                                $topic = DB::table('allcategorytbls')->where('id',$fs->type)->first();
                                   $user = DB::table('users')->where('id',$fs->userid)->first();
                                ?>
                                 <td>
                                  @if($user)
                                  {{ $user->firstname }}
                                @else
                                null
                                @endif
                                </td>
                               
                                </td>
                                <td>{{ $fs->Title }}</td>
                               
                                <td>
                                @if($fs->image!="null")
                                  <img src="storyimages/{{ $fs->image }}" width="100px">
                                  @else
                                  null
                                  @endif
                                </td>
                               
                                <td><button class="btn btn-success" disabled>Selected</button></td>
                               
                               <td><button data-toggle="modal" data-id="{{$fs->id}}" data-target="#modelId{{$fs->id}}" class="btn btn-warning text-white">Detail</button></td>
                               </tr>
                               <div class="modal fade" id="modelId{{$fs->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" style="color:teal">Story Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                                    <div class="modal-body">
                                                  
                                        <dt style="color:teal">
                                        Type
                                        </dt>
                                        <dd>
                                            <?php
                                            $topic = DB::table('allcategorytbls')->where('id',$fs->type)->first();
                                             ?>
                                         {{ $topic->category_name }}
                                        </dd>
                                        <br>
                                        <dt style="color:teal">
                                        Title
                                        </dt>
                                        <dd>
                                        {{$fs->Title}}
                                        </dd>
                                        <br>
                                        <dt style="color:teal">
                                        Short Description
                                        </dt>
                                        <dd>
                                            {!! html_entity_decode($fs->short_Des) !!}
                                        </dd>
                                        <br>
                                        <dt style="color:teal">
                                        Long Description
                                        </dt>
                                        <dd>
                                            {!! html_entity_decode($fs->long_Des) !!}
                                        </dd>
                                        <br>
                                       
                            
                                        <dt style="color:teal">
                                        Video Link
                                        </dt>
                                        <dd>
                                        {{$fs->video_url}}
                                        </dd>
                                        <br>
                            
                                        @if($fs->image!="null")
                                        <dt style="color:teal">
                                        Image
                                        </dt>
                                        <dd>
                                        <img src="/storyimages/{{$fs->image}}" alt="storyimages" style="height:100px">
                                        </dd>
                                        @endif
                                        <br>
                                        <hr/>
                            
                            
                                                   </div>
                            
                                               
                            
                                               
                                            </div>
                                            <hr>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                
                               @endforeach
                               @else
                               <tr>
                                   <td colspan="4" class="text-dark font-weight-bold">Result hasn't been annouced yet</td>
                               </tr>
                               @endif
                              </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../View_template/assets/js/vendor/bootstrap.min.js"></script>


@endsection