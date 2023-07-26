@extends("user.userlayout")
@section("title")
Story competition
@endsection

@section("content")
<div class="container">
    <br>
    <hr>
    <h4 style="color:teal;text-align:center">Story Competition</h4>
    <hr>
    <div class="row" style="border:2px solid black;width:100%">
        <div class="col-md-5 col-sm-12 col-lg-5 col-xl-5 col-xs-12" style="background-color:grey;text-color:white;font-size:20px;text-align:center;"><h5 style="margin-top:100px">Round 1</h5></div>
        <div class="col-md-7 col-lg-7 col-xl-7 col-sm-12 col-xs-12">
            <h4>Title: <span style="color:teal">{{$f->title}}</span></h4>
            <input type="hidden" name="" id="datevalue" value="{{$f->date}}">
            <br>
            <h5>Apply before: <span style="color:teal">{{$f->date}}</span></h5>
            <?php
            $desc = strip_tags($f->description);
            ?>
           <p>{{$desc}}</p>
            
           <p style="color:red" id="demo"></p>

          
            <?php
              $checkround2 = DB::table('round1storytbls')->where('userid',session('cid'))->first();
            ?>
              @if($checkround2)
          <a href="/round1story" id="round1" class="btn btn-info">Round1</a>
          @else
          <a href="/round1story_get" id="round1" class="btn btn-info">Round1</a>

          <button id="round1show" style="display:none" class="btn btn-info" onclick="alert('round1 ended')">Round1</button>
          
          <p></p>
           @endif
           
        </div>
        <hr>
        <div class="col-md-5 col-sm-12 col-lg-5 col-xl-5 col-xs-12" style="background-color:grey;text-color:white;font-size:20px;text-align:center;"><h5 style="margin-top:40px">Round 2</h5></div>
        <div class="col-md-7 col-sm-12  col-lg-7 col-xl-7  col-xs-12">
           <h5>Note:</h5>
           <p></p><p>After qualifying first round title and term and condition for second round will display on your dashboard</p>
           
        </div>
        <hr>
        <div class="col-md-5 col-sm-12 col-lg-5 col-xl-5  col-xs-12" style="background-color:grey;text-color:white;font-size:20px;text-align:center;"><h5 style="margin-top:40px">Round 3</h5></div>
        <div class="col-md-7 col-sm-12 col-lg-7 col-xl-7  col-xs-12">
        <h5>Note:</h5> <p></p> <p>After qualifying Second round title and term and condition for third round will display on your dashboard</p>
       
        </div>
    </div>
</div>
<br>

<script>
// Set the date we're counting down to
var datevalue =  document.getElementById("datevalue").value;
var countDownDate = new Date(datevalue+" 12:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
    document.getElementById("round1").style.display = "hide";
    document.getElementById("round1show").style.display = "show";
  }
}, 1000);
</script>
@endsection