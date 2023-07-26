@extends("userside.userlayout")
@section("title")
<head>
<title>Quiz result | Digital Kid Zone</title>
<meta name="description" content="Quiz result Page" />
<meta name="keywords" content="digitalkidzone" />
</head>
@endsection
@section("content")
<!-- ============================ Page Title Start================================== -->
<section class="page-title" style="background-color:grey">
    <div class="container">
       
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Quiz result</h1>
                    <br>
                    <nav aria-label="breadcrumb"  >
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Quiz result</li>
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
    
    <div class="container">
    <?php

    // dd($finalResult);
    // $username = DB::table('users')->where('id',$result->userid)->first();
    // $skillname = DB::table('categorytbls')->where('id',$result->skillid)->first();
    // $percent = ($result->studentmarks/$result->totalmarks)*100;
    ?>
    <hr  style="background-color:brown">
    <div  style="background-color:brown" class="row">
        <div class="col-xl-5 col-md-3 col-lg-5 col-sm-12">
       
        </div>
        <div  class="col-xl-4 col-md-5 col-lg-4 col-sm-12">
        <h4 style="background-color:brown">Result:</h4>
        </div>
        <div class="col-xl-3 col-md-4 col-lg-3 col-sm-12">
       
       </div>
    </div>
   
    <hr  style="background-color:brown">
   
    <!-- <div class="row">

        <div class="col-md-12 col-lg-12 col-sm-12">
        <table class="table tale-stripped">
            <tr  style="background-color:grey">
            <th  style="color:white">Student Name</th>
            <th style="color:white">Skill Name:</th>
            </tr>
            <tr>
            </tr>
        </table>
        </div>
      
    </div> -->
    <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <table class="table table-striped">
            <tr style="background-color: grey">
                <th style="color: white">Total Attempts</th>
                <th style="color: white">Correct Attempts</th>
                <th style="color: white">Wrong Attempts</th>
                <th style="color: white">Total Marks</th>
            </tr>
            <tr>
                <td>{{ $totalAttempts }}</td>
                <td>{{ $correctAttempts }}</td>
                <td>{{ $wrongAttempts }}</td>
                <td>{{ $marks }}</td>
            </tr>
        </table>
    </div>
</div>

     <!-- <div class="row">
     <div class="col-md-12 col-lg-12 col-sm-12">
        <table class="table tale-stripped">
            <tr style="background-color:grey">
            <th style="color:white">Total Marks</th>
            <th style="color:white">Student Marks:</th>
            </tr>
            <tr>
                
            </tr>
        </table>
        </div>
       
     </div> -->
     <div class="row">
     <div class="col-md-12 col-lg-12 col-sm-12">
        <!-- <table class="table tale-stripped">
            <tr style="background-color:grey">
            <th style="color:white">Percentage:</th>
            <th style="color:white">Remarks:</th>
            </tr>
            <tr>
                
            </tr>
        </table> -->
        <a href="/" class="btn btn-info">Back</a>
        </div>
       
     </div>
</div>
    <br><br><br>
</section>
@endsection