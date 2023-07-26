@extends("admin.adminlayout")
@section("title")
Admin | winner-Details
@endsection
@section("content")
<br>
<h1>Winner Details</h1><a href="/winner_get" class="btn btn-info">Create New</a>
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
      <th scope="col">UserName</th>
      <th scope="col">Short Desc</th>
      <th scope="col">Participated At</th>
      <th scope="col">Position</th>
      <th scope="col">Image</th>
      <th scope="col" colspan="3">Action</th>
    </tr>
  </thead>
  <br>
  <tbody class="text-center">
    @foreach($fetchwinner as $fc)
    <tr>
    <td>{{ $fc->id }}</td>
    <?php
    $user = DB::table('users')->where('id',$fc->userid)->first();
    ?>
    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
    <td> {!! html_entity_decode($fc->short_Des) !!}</td>
    <td>{{ $fc->part }}</td>
    <td>{{ $fc->position }}</td>
    <td><img src="winnerimages/{{ $fc->image }}" width="200px"; height="150px"></td>
   
    <td><a href="/edit_winner/{{$fc->id}}" class="btn btn-success text-white">Edit</a></td>
    <td><a href="/delete_winner/{{$fc->id}}" class="btn btn-danger text-white">Delete</a></td>
    <td><a href="/detail_winner/{{$fc->id}}" class="btn btn-warning text-white">Detail</a></td>
   </tr>
   @endforeach


  </tbody>
</table>

<br>
   {!! $fetchwinner->links() !!}



@endsection
