@extends("admin.adminlayout")
@section("title")
Admin | Fetch-Article
@endsection
@section("content")
<br>
<h1>Article Details</h1><a href="/article" class="btn btn-outline-info">Create Article</a>
<br><br>

@if (session('mesg'))
<div class="alert alert-primary" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif


<table class="table table-responsive">
  <thead>
    <tr>
   
    <th scope="col">Posted by</th>
      <th scope="col">Category</th>
      <th scope="col">Headline</th>
      <th scope="col">Article_date</th>
      <th scope="col">Video Link</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>

  <tbody>

  @foreach($fetcharticle as $fa)
   <tr>
    <?php
       $topic = DB::table('allcategorytbls')->where('id',$fa->type)->first();
       $user = DB::table('users')->where('id',$fa->userid)->first();
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
    <td>{{ $fa->headline }}</td>
    <td>{{ $fa->art_date }}</td>
    <td>{{ $fa->video_url }}</td>
    <td>
    @if($fa->image!="null")
    <img src="articleimages/{{ $fa->image }}" width="100px"></td>
    @else
      null
      @endif
      @if($fa->status ==0)
                    <td><a href="/approveart/{{$fa->id}}" class="btn btn-outline-danger">Waiting..</a></td>
                    @else
                    <td><button class="btn btn-success" disabled>Approved</button></td>
                    @endif
    <td><a href="/editarticle/{{$fa->id}}" class="btn btn-outline-primary">Edit</a></td>
    <td><a href="/deletearticle/{{$fa->id}}" class="btn btn-outline-danger">Delete</a></td>
   </tr>
   @endforeach

  </tbody>
</table>


@endsection
