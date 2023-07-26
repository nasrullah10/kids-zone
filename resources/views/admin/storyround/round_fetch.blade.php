@extends("admin.adminlayout")
@section("title")
Admin | Fetch-Story rounds
@endsection
@section("content")
<br>
<h1>Detail</h1><a href="/roundget" class="btn btn-outline-info">Create</a>
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
      <th scope="col">Title</th>
      <th scope="col">Apply before</th>
      <th scope="col">Rounds</th>
      <th scope="col">Term and conditions</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>

  <tbody class="text-center">

  @foreach($fetch as $cf)
   <tr>
   <td>{{ $cf->id }}</td>
    <td>{{ $cf->title }}</td>
    <td>{{ $cf->date }}</td>
    <td>{{ $cf->round }}</td>
    <td><textarea style="border:none;outline:none" readonly name="" id="" cols="30" rows="10"> {!! html_entity_decode($cf->description) !!}</textarea></td>
    <td><a href="/editround/{{$cf->id}}" class="btn btn-outline-primary">Edit</a></td>
    <td><a href="/deleteround/{{$cf->id}}" class="btn btn-outline-danger">Delete</a></td>
   </tr>
   @endforeach

  </tbody>
</table>
{!! $fetch->links() !!}

@endsection
