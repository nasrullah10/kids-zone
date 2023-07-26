@extends("admin.adminlayout")
@section("title")
Admin | Subject Details
@endsection
@section("content")
<br>
<h1>Create Category</h1>
<br>
    <form action="{{URL::to('/categorypost')}}"  method="post">
        @csrf
        <label style="font-weight: bold;">Subject:</label>
        <input type="text" class="form-control" required placeholder="Enter Subject" name="insertcat">
        <br>

        <button type="submit" class="btn btn-outline-info form-control">SUBMIT</button>
        <br><br>
        <a href="/categoryfetch" class="btn btn-outline-dark form-control">Back</a>
    </form>

@endsection
