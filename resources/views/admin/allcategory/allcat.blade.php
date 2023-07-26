@extends("admin.adminlayout")
@section("title")
Admin | Category Details
@endsection
@section("content")
<br>
<h1>Create Category</h1>
<br>
    <form action="{{URL::to('/allcatpost')}}"  method="post">
        @csrf
        <label style="font-weight: bold;">Category:</label>
        <input type="text" class="form-control" required placeholder="Enter Category" name="insertcat">
        <br>

        <button type="submit" class="btn btn-outline-info form-control">SUBMIT</button>
        <br><br>
        <a href="/fetcharticle" class="btn btn-outline-dark form-control">Back</a>
    </form>

@endsection
