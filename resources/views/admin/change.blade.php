@extends("admin.adminlayout")
@section("title")
Admin | Edit Account
@endsection
@section("content")
<br>
<h1>Edit Account</h1>
<br>
<form action="{{URL::to('/updatechange/'.$update_cat->id)}}" method="post">
    @csrf
    <label style="font-weight: bold;">First Name:</label>
    <input type="text" class="form-control" required placeholder="Edit First Name" name="updatefname" value="{{ $update_cat->firstname }}">
    <br>
    <label style="font-weight: bold;">Email:</label>
    <input type="text" class="form-control" required placeholder="Edit Email" name="updatelname" value="{{ $update_cat->lastname }}">
    <br>
        <label style="font-weight: bold;">Email:</label>
        <input type="text" class="form-control" required placeholder="Edit Email" name="updateemail" value="{{ $update_cat->email }}">
        <br>
        <label style="font-weight: bold;">Password:</label>
        <input type="text" class="form-control" required placeholder="Edit Password" name="updatepassword" value="{{ $update_cat->password }}">
        <br>
        <label style="font-weight: bold;">Age</label>
    <input type="text" class="form-control" required placeholder="Edit Age" name="updateage" value="{{ $update_cat->age }}">
    <br>
    {{-- <input type="file" name="insertimage" required>
    <img width="180" height="180px"  class="rounded-circle"  src="/userimages/{{$update_cat->image}}" alt="Add Your Profile Picture" />
    <br> --}}
   


        <button type="submit" class="btn btn-outline-success form-control">Update</button>
        <br><br>
        <a href="/chane class="btn btn-outline-dark form-control">Back</a>
</form>

@endsection