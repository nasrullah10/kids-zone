@extends("admin.adminlayout")
@section("title")
Admin | Learning tips
@endsection
@section("content")
<br>
<h1>Learning tips</h1><a href="/admintip_get" class="btn btn-info">Create New</a>
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
      <th scope="col">Video Link</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="3">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($fetchtip as $fs)
   <tr>
    <?php
    $topic = DB::table('allcategorytbls')->where('id',$fs->type)->first();
       $user = DB::table('users')->where('id',$fs->userid)->first();
    ?>
     <td>
      @if($user)
      {{ $user->firstname }}
    @else
    null
    @endif
    </td>
    <td>
    @if($topic)
      {{ $topic->category_name }}
    @else
    null
    @endif
    </td>

    <td>{{ $fs->Title }}</td>
    <td>{{ $fs->video_url }}</td>
    <td>
    @if($fs->image!="null")
      <img src="tipimages/{{ $fs->image }}" width="100px">
      @else
      null
      @endif
    </td>
    @if($fs->status ==0)
    <td><a href="/approvetip/{{$fs->id}}" class="btn btn-outline-danger">Waiting..</a></td>
    @else
    <td><button class="btn btn-success" disabled>Approved</button></td>
    @endif
    <td><a href="/adminedittip/{{$fs->id}}" class="btn btn-success text-white">Upate</a></td>
    <td><a href="/admindeletetip/{{$fs->id}}" class="btn btn-danger text-white">Delete</a></td>
    <td><a href="/admintipdetail/{{$fs->id}}" class="btn btn-warning text-white">Detail</a></td>
   </tr>
   @endforeach
  </tbody>
</table>

{!! $fetchtip->links() !!}

  @endsection
