@extends("admin.adminlayout")
@section("title")
Admin | Update-grade
@endsection
@section("content")
<br>
<h1>Edit grade</h1>
<br>

<form action="{{URL::to('/updategrade/'.$update_cat->id)}}" method="post">
    @csrf
        <label style="font-weight: bold;">Edit:</label>
        <input type="text" class="form-control" required placeholder="Edit grade" name="updatecat" value="{{ $update_cat->grade }}">
        <br>


        <button type="submit" class="btn btn-outline-success form-control">Update</button>
        <br><br>
        <a href="/gradefetch" class="btn btn-outline-dark form-control">Back</a>
</form>

@endsection
