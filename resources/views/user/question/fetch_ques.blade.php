@extends("user.userlayout")
@section("title")
Fetch| question
@endsection
@section("content")
<br>
<h1>Questions</h1><a href="/uquescreateget" class="btn btn-info">Create New</a>
<br><br>

@if (session('mesg'))
<div class="alert alert-danger" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif

@if (session('createc'))
<div class="alert alert-info" role="alert">
    <strong>{{session('createc')}}</strong>
</div>
@endif

@if (session('editc'))
<div class="alert alert-success" role="alert">
    <strong>{{session('editc')}}</strong>
</div>
@endif


<table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Test Id</th>
      <th scope="col">Skill</th>
      <th scope="col">Question</th>
      <th scope="col">Option A</th>
      <th scope="col">Option B</th>
      <th scope="col">Option C</th>
      <th scope="col">Option D</th>
      <th scope="col">Correct Option</th>
      <th scope="col">Marks</th>
     <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($fetchques as $fq)
   <tr>
    <td>{{ $fq->id }}</td>
    <td>{{ $fq->testid }}</td>
    <?php 
    $testname = DB::table('admintesttbls')->where('id',$fq->testid)->first();
    $fa = DB::table('answertbls')->where('quesid',$fq->id)->first();
    if($testname)
    {
    $skillname = DB::table('categorytbls')->where('id',$testname->skillid)->first();
    $skill = $skillname->category_name;
     }
     else
     {
      $skill = "null";
     }
    ?>
    <td>{{ $skill}}</td>
    <td>{{ $fq->question }}</td>
    <td>{{ $fa->optionA ?? "" }}</td>
    <td>{{ $fa->optionB ?? "" }}</td>
    <td>{{ $fa->optionC ?? "" }}</td>
    <td>{{ $fa->optionD ?? "" }}</td>
    <td>{{ $fa->correct_opt ?? "" }}</td>
    <td>{{ $fq->marks }}</td>
    <td><a href="/uqueseditget/{{$fq->id}}" class="btn btn-success text-white">Edit</a>
    <a href="/uquesdelete/{{$fq->id}}" class="btn btn-danger text-white">Delete</a></td>
   </tr>
   @endforeach

  </tbody>
</table>

{!! $fetchques->links() !!}

@endsection
