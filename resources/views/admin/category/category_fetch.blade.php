@extends("admin.adminlayout")
@section("title")
Admin | Fetch-Subject
@endsection
@section("content")
<br>
<h1>Category Details</h1><a href="/categoryget" class="btn btn-outline-info">Create Subject</a>
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
      <th scope="col">Subject Name</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>

  <tbody class="text-center">

  @foreach($cat_fetch as $cf)
   <tr>
   <td>{{ $cf->id }}</td>
    <td>{{ $cf->category_name }}</td>

    <td><a href="/editcategory/{{$cf->id}}" class="btn btn-outline-primary">Edit</a></td>
    <td><a href="/deletecategory/{{$cf->id}}" class="btn btn-outline-danger">Delete</a></td>
   </tr>
   @endforeach

  </tbody>
</table>
{!! $cat_fetch->links() !!}

@endsection
