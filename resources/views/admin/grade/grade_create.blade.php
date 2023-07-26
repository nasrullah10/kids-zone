@extends("admin.adminlayout")
@section("title")
Admin | Grade Details
@endsection
@section("content")
<br>
<h1>Create Grade</h1>
<br>
    <form action="{{URL::to('/gradepost')}}"  method="post">
        @csrf
        <label style="font-weight: bold;">Grade:</label>
        <input type="text" class="form-control" required placeholder="Enter grade" name="insertcat">
        <br>

        <button type="submit" class="btn btn-outline-info form-control">SUBMIT</button>
        <br><br>
        <a href="/gradefetch" class="btn btn-outline-dark form-control">Back</a>
    </form>

@endsection
