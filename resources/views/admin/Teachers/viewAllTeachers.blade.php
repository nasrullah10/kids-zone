@extends("admin.adminlayout")
@section("title")
Admin | User
@endsection
@section("content")

<br><br>
<h2 style="color: teal">User Details</h2>
<br>
<p></p>
@if(session('mesg'))
<div class="alert alert-info" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif

@if(session('del'))
<div class="alert alert-danger" role="alert">
    <strong>{{session('del')}}</strong>
</div>
@endif

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Role</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $u)
            <tr>
                <td>{{$u->firstname ?? 'N/A' }}</td>
                <td>{{$u->lastname ?? 'N/A' }}</td>
                <td>{{$u->email ?? 'N/A' }}</td>
                <td>{{$u->age ?? 'N/A' }}</td>
                <td>{{$u->role ?? 'N/A' }}</td>
                <td>
                    @if ($u->image)
                    <img src="{{ asset($u->image) }}" width="200px" height="100px" alt="">
                    @else
                    <img src="{{ asset('Mytemplate/assets/images/user.png') }}" width="200px" alt="No Image">
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
