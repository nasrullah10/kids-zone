@extends("user.userlayout")
@section("title")
Fetch| Topic
@endsection
@section("content")
<br>
<h1>Topic List</h1><a href="/utopiccreateget" class="btn btn-info">Create New</a>
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
      <th scope="col">Topic name</th>
      <th scope="col">Skill Name</th>
     <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($fetchtest as $ft)
   <tr>
    <td>{{ $ft->id }}</td>
    <td>{{ $ft->name }}</td>
    <?php 
    $skillname = DB::table('categorytbls')->where('id',$ft->skillid)->first();
    ?>
    <td>{{ $skillname->category_name }}</td>
   <td><a href="/utopiceditget/{{$ft->id}}" class="btn btn-success text-white">Edit</a>
    <a href="/utopicdelete/{{$ft->id}}" class="btn btn-danger text-white">Delete</a></td>
   </tr>
   @endforeach

  </tbody>
</table>

{!! $fetchtest->links() !!}

@endsection
