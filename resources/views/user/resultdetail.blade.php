@extends("user.userlayout")
@section("title")
Result detail
@endsection
@section("content")

<br><br>
<table class="table table-responsive">
  <thead>
    <tr>
      
      <th scope="col">Username</th>
      <th scope="col">SkillName</th>
      <th scope="col">Total Question</th>
      <th scope="col">Correct Answers</th>
      <th scope="col">Total Marks</th>
      <th scope="col">Student Marks</th>
      <th scope="col">Remarks</th>
      </tr>
  </thead>

  <tbody>
  
@if($resultc>0)
    @foreach($result as $r)
    <tr>
    <?php
    $session = session('cname');
    $course = DB::table('categorytbls')->where('id',$r->skillid)->first();
            ?>
        @if($session)
    <td>{{$session}}</td>
    @endif
    <td>
        @if($course)
        {{$course->category_name}}
        @else
        null
        @endif
    </td>
    <td>{{$r->totalquestion}}</td>
    <td>{{$r->correctanswer}}</td>
    <td>{{$r->totalmarks}}</td>
    <td>{{$r->studentmarks}}</td>
    @if($r->remarks=="PASS")
    <td style="color:green">{{$r->remarks}}</td>
    @else
    <td style="color:red">{{$r->remarks}}</td>
    @endif
    </tr>
   @endforeach
   @else
   <tr><td colspan='7'>No Data</td></tr>
   @endif


  </tbody>
</table>

@endsection