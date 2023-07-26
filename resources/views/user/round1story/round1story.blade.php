@extends("user.userlayout")
@section("title")
Fetch-Round1Story
@endsection
@section("content")
<br>


@if (session('mesg'))
<div class="alert alert-danger" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif
@if (session('mesgs'))
<div class="alert alert-success" role="alert">
    <strong>{{session('mesgs')}}</strong>
</div>
@endif

@if($fs->status==0)
<h4>Round 1 :   <p style="color:red" id="demo1"></p></h4>
@endif

<table class="table table-responsive">
  <thead>
    <tr>
    <th scope="col">Round</th>
      <th scope="col">Subject</th>
      <th scope="col">Title</th>
      <th scope="col">Type</th>
      <th scope="col">Video Link</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="4">Action</th>
    </tr>
  </thead>

  <tbody>
   
   <tr>
    <?php
    $topic = DB::table('allcategorytbls')->where('id',$fs->type)->first();
     ?>
 <td>{{ $topic->category_name }}</td>
    <td>{{ $firstround->title }}</td>
    <td>{{ $firstround->round }}</td>
    <td>{{ $fs->typefic }}</td>
   <td>{{ $fs->video_url }}</td>
    <td>
    @if($fs->image!="null")
      <img src="storyimages/{{ $fs->image }}" width="100px">
      @else
      null
      @endif
    </td>
   
    @if($fs->status==1)
      <td style="color:green">Congatulations!!you are selected for round2</td>
      @elseif($fs->status==2)
      <td style="color:yellow">You did'nt qualify for second round2</td>
      @else
      <td style="color:red">Wait for the result</td>
      @endif
   
      @if($fs->status==1)
      <?php
        $checkround2 = DB::table('round2storytbls')->where('userid',session('cid'))->first();
       ?>
       @if($checkround2)
      <td><a href="/round2story" class="btn btn-outline-secondary text-black">Round2</a></td>
      @else
      <td><button type="button" id="hidebutton" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
      Round2
</button>
 </td>
    

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Round 2</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Title:</h5>
        <p>{{$secondround->title}}</p>
        
        <h5>Last Date:</h5>
        <p>{{$secondround->date}}</p>
        <p style="color:red" id="demo"></p>
        <hr>
        <h5>Terms And Conditions</h5>
            <?php
            $desc = strip_tags($secondround->description);
            ?>
            {{$desc}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a id="round2" href="/round2story_get" class="btn btn-outline-secondary text-black">Write Story</a>
        <button id="round2show" style="display:none" class="btn btn-outline-secondary text-black" onclick="alert('round2 ended')">Write Story</button>
      </div>
    </div>
  </div>
</div>
      @endif

      @endif
      <?php
        $checkuser = DB::table('round1storytbls')->where('userid',session('cid'))->first();
       ?>
       @if($checkuser)
       @if($fs->status==1)
    <td><button disabled class="btn btn-success text-white">Update</button></td>
    <td><button disabled class="btn btn-danger text-white">Delete</button></td>
    <td><button disabled class="btn btn-warning text-white">Detail</button></td>
   @else
   <td><a href="/editround1story/{{$fs->id}}" class="btn btn-success text-white">Update</a></td>
    <td><a href="/deleteround1story/{{$fs->id}}" class="btn btn-danger text-white">Delete</a></td>
    <td><a href="/round1storydetail/{{$fs->id}}" class="btn btn-warning text-white">Detail</a></td>
    @endif
    @endif
  </tr>
  </tbody>
</table>

<input type="hidden" name="" id="datevalue1" value="{{$firstround->date}}">
<input type="hidden" name="" id="datevalue" value="{{$secondround->date}}">

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
    document.getElementById("round2").style.display = "hide";
    document.getElementById("round2show").style.display = "show";
  }
}, 1000);

</script>

<script>
  var datevalue1 =  document.getElementById("datevalue1").value;
var countDownDate1 = new Date(datevalue1+" 12:00:00").getTime();

// Update the count down every 1 second
var x1 = setInterval(function() {

  // Get today's date and time
  var now1 = new Date().getTime();

  // Find the distance between now and the count down date
  var distance1 = countDownDate1 - now1;

  // Time calculations for days, hours, minutes and seconds
  var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
  var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
  var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo1").innerHTML = days1 + "d " + hours1 + "h "
  + minutes1 + "m " + seconds1 + "s ";

  // If the count down is finished, write some text
  if (distance1 < 0) {
    clearInterval(x1);
    document.getElementById("demo1").innerHTML = "EXPIRED";
 
  }
}, 1000);
</script>

  @endsection
