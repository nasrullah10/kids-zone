@extends("user.userlayout")
@section("title")
Fetch-round3Story
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
<h4>Round 3 :  <p style="color:red" id="demo"></p></h4>
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
      <td style="color:green">Congatulations!!</td>
      @elseif($fs->status==2)
      <td style="color:yellow">You did'nt Win.</td>
      @else
      <td style="color:red">Wait for the result</td>
      @endif

   
      <?php
        $checkuser = DB::table('round3storytbls')->where('userid',session('cid'))->first();
       ?>
       @if($checkuser)
       @if($fs->status==1)
    <td><button disabled class="btn btn-success text-white">Update</button></td>
    <td><button disabled class="btn btn-danger text-white">Delete</button></td>
    <td><button disabled class="btn btn-warning text-white">Detail</button></td>
   @else
    <td><a href="/editround3story/{{$fs->id}}" class="btn btn-success text-white">Update</a></td>
    <td><a href="/deleteround3story/{{$fs->id}}" class="btn btn-danger text-white">Delete</a></td>
    <td><a href="/round3storydetail/{{$fs->id}}" class="btn btn-warning text-white">Detail</a></td>
   @endif
   @endif
  </tr>
  </tbody>
</table>

<input type="hidden" name="" id="datevalue" value="{{$firstround->date}}">


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
    document.getElementById("round3").style.display = "hide";
    document.getElementById("round3show").style.display = "show";
  }
}, 1000);
</script>
  @endsection
