@extends("admin.adminlayout")
@section("title")
Admin | Update-Subject
@endsection
@section("content")
<br>
<h1>Edit Category</h1>
<br>

<form action="{{URL::to('/updatecategory/'.$update_cat->id)}}" method="post">
    @csrf
        <label style="font-weight: bold;">Edit:</label>
        <input type="text" class="form-control" required placeholder="Edit Subject" name="updatecat" value="{{ $update_cat->category_name }}">
        <br>


        <button type="submit" class="btn btn-outline-success form-control">Update</button>
        <br><br>
        <a href="/categoryfetch" class="btn btn-outline-dark form-control">Back</a>
</form>

@endsection
