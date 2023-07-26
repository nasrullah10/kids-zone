@extends("user.userlayout")
@section("title")
Fetch-Story
@endsection
@section("content")
<br>
<h1>Fetch Story</h1><a href="/ustory_get" class="btn btn-info">Create New</a>
<br><br>

@if (session('mesg'))
<div class="alert alert-danger" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif
@if (session('mesgs'))
<div class="alert alert-success" role="alert">
    <strong>{{session('mesgs')}}</strong>
</div>
@endif



<table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">Subject</th>
      <th scope="col">Title</th>
      <th scope="col">Type</th>
      <th scope="col">Video Link</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="3">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($fetchstory as $fs)
   <tr>
    <?php
    $topic = DB::table('allcategorytbls')->where('id',$fs->type)->first();
     ?>
 <td>{{ $topic->category_name }}</td>
    <td>{{ $fs->Title }}</td>
    <td>{{ $fs->typefic }}</td>
   <td>{{ $fs->video_url }}</td>
    <td>
    @if($fs->image!="null")
      <img src="storyimages/{{ $fs->image }}" width="100px">
      @else
      null
      @endif
    </td>
   
    @if($fs->status==1)
      <td style="color:green">Approved</td>
      @else
      <td style="color:red">Waiting</td>
      @endif
   
    
    <td><a href="/ueditstory/{{$fs->id}}" class="btn btn-success text-white">Upate</a></td>
    <td><a href="/udeletestory/{{$fs->id}}" class="btn btn-danger text-white">Delete</a></td>
    <td><a href="/ustorydetail/{{$fs->id}}" class="btn btn-warning text-white">Detail</a></td>
   </tr>
   @endforeach
  </tbody>
</table>

{!! $fetchstory->links() !!}

  @endsection
