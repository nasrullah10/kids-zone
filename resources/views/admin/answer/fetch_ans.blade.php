@extends("admin.adminlayout")
@section("title")
Admin | Fetch-Options
@endsection
@section("content")
<br>
<h1>Options</h1><a href="/anscreateget" class="btn btn-info">Create New</a>
<br><br>

@if (session('mesg'))
<div class="alert alert-danger" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif

@if (session('createc'))
<div class="alert alert-info" role="alert">
    <strong>{{session('createc')}}</strong>
</div>
@endif

@if (session('editc'))
<div class="alert alert-success" role="alert">
    <strong>{{session('editc')}}</strong>
</div>
@endif


<table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Question Id</th>
      <th scope="col">Option A</th>
      <th scope="col">Option B</th>
      <th scope="col">Option C</th>
      <th scope="col">Option D</th>
      <th scope="col">Correct Answer</th>
     <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($fetchans as $fa)
   <tr>
    <td>{{ $fa->id }}</td>
    <td>{{ $fa->quesid }}</td>
   <td>{{ $fa->optionA }}</td>
    <td>{{ $fa->optionB }}</td>
    <td>{{ $fa->optionC }}</td>
    <td>{{ $fa->optionD }}</td>
    <td>{{ $fa->correct_opt }}</td>
    <td><a href="/anseditget/{{$fa->id}}" class="btn btn-success text-white">Edit</a></td>
    <td><a href="/ansdelete/{{$fa->id}}" class="btn btn-danger text-white">Delete</a></td>
   </tr>
   @endforeach

  </tbody>
</table>

{!! $fetchans->links() !!}

@endsection
