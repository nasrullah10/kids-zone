@extends("user.userlayout")
@section("title")
Fetch| test
@endsection
@section("content")
<br>
<h1>Test List</h1><a href="/utestcreateget" class="btn btn-info">Create New</a>
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
      <th scope="col">Duration</th>
      <th scope="col">Skill Name</th>
      <th scope="col">Topic</th>
      <th scope="col">Total Mcqs</th>
      <th scope="col">Total Marks</th>
      <th scope="col">Passing Marks</th>
      <th scope="col">Status </th>
     <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($fetchtest as $ft)
   <tr>
    <td>{{ $ft->id }}</td>
    <td>{{ $ft->time_dur }}</td>
    <?php 
    $skillname = DB::table('categorytbls')->where('id',$ft->skillid)->first();
    $topicname = DB::table('topictbls')->where('id',$ft->topicid)->first();
    ?>
    <td>{{ $skillname->category_name ?? ""}}</td>
    <td>{{ $topicname->name ?? ""}}</td>
    <td>{{ $ft->total_mcq }}</td>
    <td>{{ $ft->total_marks }}</td>
    <td>{{ $ft->pass_marks }}</td>
    @if($ft->status==0)
    <td><button class="btn btn-danger text-white" disabled>Waiting...</button></td>
    @else
    <td><button class="btn btn-warning text-white" disabled>Approved</button></td>
    @endif
    <td><a href="/utesteditget/{{$ft->id}}" class="btn btn-success text-white">Edit</a>
    <a href="/utestdelete/{{$ft->id}}" class="btn btn-danger text-white">Delete</a></td>
   </tr>
   @endforeach

  </tbody>
</table>

{!! $fetchtest->links() !!}

@endsection
