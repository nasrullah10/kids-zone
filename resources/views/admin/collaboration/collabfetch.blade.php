@extends("admin.adminlayout")
@section("title")
Admin | Fetch-Collaboration
@endsection
@section("content")
<br>
<h1>Fetch Collaboration</h1><a href="/collab" class="btn btn-info">Create New</a>
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


<table class="table table-responsive">

  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Long Description</th> 
      <th scope="col">URL</th>
      <th scope="col">Image</th>
      <th scope="col" colspan="3">Action</th>
    </tr>
  </thead>
  <br>
  <tbody>
    @foreach($fetchcollab as $fm)
   <tr>
  
    <td>{{ $fm->title }}</td>
    <td>{{ $fm->long_Des }}</td>
    <td>{{ $fm->video_url }}</td>
    <td><img src="collabimages/{{ $fm->image }}" width="200px"; height="150px"></td>

    <td><a href="/editcollab/{{$fm->id}}" class="btn btn-success text-white">Edit</a></td>
    <td><a href="/deletecollab/{{$fm->id}}" class="btn btn-danger text-white">Delete</a></td>
   </tr>
   @endforeach

   
  </tbody>
</table>

<br>
   {!! $fetchcollab->links() !!}
@endsection
