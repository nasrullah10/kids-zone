@extends("userside.userlayout")
@section("title")
<head>
<title>Test Your Skills | Digital Kid Zone</title>
<meta name="description" content="Test Your Skills Page" />
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
                    <h1 class="breadcrumb-title">Test your skills</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Test your skills</li>
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
    <hr>
    <div class="row">
        
        <div class="col-md-5"></div>
        <div class="col-md-4"><h4>Select any one skill</h4></div>
        <div class="col-md-3"></div>
    </div>
    <hr>
    <br><br>
  
        @foreach($grade as $g)

        <?php
        $checkgrade = DB::table('admintesttbls')->where('grade',$g->id)->first();
        $checkcat = DB::table('admintesttbls')->select('skillid')->where('grade',$g->id)->where('status',1)->distinct()->get();
        $checkcatc = DB::table('admintesttbls')->select('skillid')->where('grade',$g->id)->where('status',1)->distinct()->count();
        ?>
        @if($checkcatc>0)
        @if($checkgrade)
        <div class="row">
            <div class="col-md-12">
                <hr>
            <h4 style="text-align:center">Grade {{$g->grade}}</h4>
            <hr>
            </div>
        </div>
      
        @endif
        <div class="row">
        @foreach($checkcat as $c)

        <?php
         $cat = DB::table('categorytbls')->where('id',$c->skillid)->first();
         ?>
        <div class="col-md-3">
            @if(session('cid'))
            <button data-toggle="modal" data-id="{{$cat->id}}{{$g->grade}}" data-target="#modelId{{$cat->id}}{{$g->grade}}" class="btn btn-outline-danger " style="width:100%;color:black">{{$cat->category_name}}</button>
            <!-- <a href="/skilltest/{{$cat->category_name}}/{{$g->grade}}" class="btn btn-outline-danger" style="width:100%;color:black" >{{$cat->category_name}}</a> -->
            <div class="modal fade" id="modelId{{$cat->id}}{{$g->grade}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" style="color:teal">{{$cat->category_name}} Topic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>
                        <div class="modal-body">
                      
            <dt style="color:teal">
            Topics
            </dt>
            <?php
            $check11 = DB::table('admintesttbls')->where('grade',$g->id)->where('skillid',$c->skillid)->get();
            foreach($check11 as $ch)
            {
                $topic = DB::table('topictbls')->where('id',$ch->topicid)->first();
                ?>
                 <dd>
                
                <a href="/skilltest/{{$cat->category_name}}/{{$cat->id}}/{{$g->id}}/{{$topic->id}}" class="btn btn-success" style="width:50%;color:black" > {{ $topic->name }}</a>
                            
                            </dd>
                            <br>
                            <?php
            }
                 ?>
                
           
           
                       </div>

                   

                   
                </div>
                <hr>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <hr>
            </div>
        </div>
            @else
            <a href="#" class="btn btn-outline-danger" style="width:100%;color:black" onclick="alert('please login first')">{{$cat->category_name}}</a>
            @endif
        </div>
        @endforeach
        </div>
        @endif
        @endforeach
   
    <br><br><br>
</section>
@endsection