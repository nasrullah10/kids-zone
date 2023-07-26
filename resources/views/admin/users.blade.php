@extends("admin.adminlayout")
@section("title")
Admin | User
@endsection
@section("content")

<br><br>
<h2 style="color:teal">User Details</h2>
<br>
<p>

</p>
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





<table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Age </th>
            <th>Role</th>
            <th>Image</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>

    @foreach($user as $u)
    <tr>
        <td>{{$u->firstname ?? 'N/A' }}</td>
        <td>{{$u->lastname ?? 'N/A' }}</td>
        <td>{{$u->email ?? 'N/A' }}</td>
        <td>{{$u->age ?? 'N/A' }}</td>
        <td>{{$u->role ?? 'N/A' }}</td>
        <td><img src="/{{$u->image}}" width="40px"
            alt=""></td>
        <td>
            @if ($u->role == "2")
            <a href="{{ URL::to('status_update', $u->id) }}" class="btn
                btn-outline-primary"><i class="fa fa-toggle-on"
                    aria-hidden="true"></i> Active</a>
            @else
            <a href="{{ URL::to('status_update', $u->id) }}" class="btn
                btn-outline-danger"><i class="fa fa-ban" aria-hidden="true"></i>
                Inactive</a>
            @endif
        </td>
        <td><a href="/delete_user/{{ $u->id }}" class="btn
                btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                Delete</a></td>
    </tr>
    @endforeach

</table>


@endsection
