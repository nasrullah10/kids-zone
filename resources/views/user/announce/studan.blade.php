@extends("user.userlayout")
@section("title")
Announcement
@endsection
@section("content")
<br>
<h2>Announcement</h2>
<hr />
<div class="container">

<div class="row">

@foreach($fetchan as $fa)
<div class="col-md-4">
<div class="card" style="width: 17rem;">
    <img class="card-img-top" src="/annimages/{{$fa->image}}" alt="Card image cap">
    <div class="card-body">
    <h4>{{$fa->headline}}</h4>
      <p class="card-text">     {!! html_entity_decode($fa->short_Des) !!}</p>
      <a href="/studandetail/{{$fa->id}}" class="btn btn-dark btn-sm mt-10">Details</a>
    </div>
  </div>
  <br><br>
</div>
@endforeach
</div>
</div>



@endsection