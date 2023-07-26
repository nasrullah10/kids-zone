@extends("admin.adminlayout")
@section("title")
Admin | team-Details
@endsection
@section("content")
<br>
<h1>team Details</h1><a href="/team_get" class="btn btn-info">Create New</a>
<br><br>

@if (session('mesg'))
<div class="alert alert-danger" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif

@if (session('created'))
<div class="alert alert-info" role="alert">
    <strong>{{session('created')}}</strong>
</div>
@endif

@if (session('edit'))
<div class="alert alert-success" role="alert">
    <strong>{{session('edit')}}</strong>
</div>
@endif


<table class="table table-striped table-inverse table-responsive">

  <thead class="thead-inverse">
    <tr class="text-center">
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col" colspan="3">Action</th>
    </tr>
  </thead>
  <br>
  <tbody class="text-center">
    @foreach($fetchteam as $fc)
    <tr>
    <td>{{ $fc->id }}</td>
    <td>{{ $fc->title }}</td>
    <td><img src="teamimages/{{ $fc->image }}" width="200px"; height="150px"></td>

    <td><a href="/edit_team/{{$fc->id}}" class="btn btn-success text-white">Edit</a></td>
    <td><a href="/delete_team/{{$fc->id}}" class="btn btn-danger text-white">Delete</a></td>
    <td><a href="/detail_team/{{$fc->id}}" class="btn btn-warning text-white">Detail</a></td>
   </tr>
   @endforeach


  </tbody>
</table>

<br>
   {!! $fetchteam->links() !!}



@endsection
