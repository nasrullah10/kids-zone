@extends("admin.adminlayout")
@section("title")
Admin | Fetch-grade
@endsection
@section("content")
<br>
<h1>grade Details</h1><a href="/gradeget" class="btn btn-outline-info">Create grade</a>
<br><br>

@if (session('mesg'))
<div class="alert alert-primary" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif


<table class="table table-responsive">
  <thead class="text-center">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">grade Name</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>

  <tbody class="text-center">

  @foreach($cat_fetch as $cf)
   <tr>
   <td>{{ $cf->id }}</td>
    <td>{{ $cf->grade }}</td>

    <td><a href="/editgrade/{{$cf->id}}" class="btn btn-outline-primary">Edit</a></td>
    <td><a href="/deletegrade/{{$cf->id}}" class="btn btn-outline-danger">Delete</a></td>
   </tr>
   @endforeach

  </tbody>
</table>
{!! $cat_fetch->links() !!}

@endsection
