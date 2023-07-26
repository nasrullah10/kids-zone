@extends("admin.adminlayout")
@section("title")
Admin | Update-Category
@endsection
@section("content")
<br>
<h1>Edit Category</h1>
<br>

<form action="{{URL::to('/allcatupdate/'.$update_cat->id)}}" method="post">
    @csrf
        <label style="font-weight: bold;">Edit:</label>
        <input type="text" class="form-control" required placeholder="Edit Category" name="updatecat" value="{{ $update_cat->category_name }}">
        <br>


        <button type="submit" class="btn btn-outline-success form-control">Update</button>
        <br><br>
        <a href="/fetcharticle" class="btn btn-outline-dark form-control">Back</a>
</form>

@endsection
