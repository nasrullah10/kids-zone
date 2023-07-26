@extends("user.userlayout")
@section("title")
Fetch-Article
@endsection
@section("content")
<br>
<h1>Article Details</h1><a href="/uarticle" class="btn btn-outline-info">Create Article</a>
<br><br>

@if (session('mesg'))
<div class="alert alert-primary" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif


<table class="table table-responsive">
  <thead>
    <tr>
   
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
    ?>
    <td>{{ $topic->category_name }}</td>
    <td>{{ $fa->headline }}</td>
    <td>{{ $fa->art_date }}</td>
    <td>{{ $fa->video_url }}</td>
    <td>
    @if($fa->image!="null")
    <img src="articleimages/{{ $fa->image }}" width="100px"></td>
    @else
      null
      @endif
      @if($fa->status==1)
      <td style="color:green">Approved</td>
      @else
      <td style="color:red">Waiting</td>
      @endif
   
    <td><a href="/ueditarticle/{{$fa->id}}" class="btn btn-outline-primary">Edit</a></td>
    <td><a href="/udeletearticle/{{$fa->id}}" class="btn btn-outline-danger">Delete</a></td>
   </tr>
   @endforeach

  </tbody>
</table>


@endsection
