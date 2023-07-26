@extends("admin.adminlayout")
@section("title")
Admin | Fetch-Announcement
@endsection
@section("content")
<br>
<h1>Fetch Announcement</h1><a href="/announce" class="btn btn-info">Create New</a>
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
      <th scope="col">Type</th>
      <th scope="col">Headline</th>
      <th scope="col">Media_date</th>
      <th scope="col">Video Link</th>
      <th scope="col">Image</th>
      <th scope="col" colspan="3">Action</th>
    </tr>
  </thead>
  <br>
  <tbody>
    @foreach($fetchann as $fm)
   <tr>
    <?php
    $topic = DB::table('allcategorytbls')->where('id',$fm->type)->first();
     ?>
    <td>{{ $topic->category_name }}</td>
    <td>{{ $fm->headline }}</td>
    <td>{{ $fm->a_date }}</td>
    <td>{{ $fm->video_url }}</td>
    <td>
    @if($fm->image!="null")
    <img src="annimages/{{ $fm->image }}" width="100px";>
      @else
      null
      @endif
    </td>
    
    <td><a href="/editann/{{$fm->id}}" class="btn btn-success text-white">Edit</a></td>
    <td><a href="/deleteann/{{$fm->id}}" class="btn btn-danger text-white">Delete</a></td>
    <td><a href="/detailann/{{$fm->id}}" class="btn btn-warning text-white">Detail</a></td>
   </tr>
   @endforeach


  </tbody>
</table>

<br>
   {!! $fetchann->links() !!}
@endsection
