@extends("userside.userlayout")
@section("title")

<head>
    <title>Secure Certificate Verification | Instantly Validate Credentials | Digital Kid Zone</title>
    <meta name="description" content="Verify the authenticity of certificates quickly and securely. Our advanced certificate verification platform ensures the legitimacy of academic, professional, and other credentials. Instantly validate qualifications and protect against fraud. Trust in our reliable verification service for peace of mind." />
    <meta name="keywords" content="digital kids zone, certificate verification, credential validation, secure verification platform, authentic certificate, academic credentials, professional qualifications, fraud prevention" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
    .input-group.md-form.form-sm.form-1 input{
  border: 1px solid #bdbdbd;
  border-top-right-radius: 0.5rem;
  border-bottom-right-radius: 0.5rem;
}
.input-group.md-form.form-sm.form-2 input {
  border: 1px solid #bdbdbd;
  border-top-left-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}
.input-group.md-form.form-sm.form-2 input.red-border {
  border: 1px solid #ef9a9a;
}
.input-group.md-form.form-sm.form-2 input.lime-border {
  border: 1px solid #cddc39;
}
.input-group.md-form.form-sm.form-2 input.amber-border {
  border: 1px solid #ffca28;
}
    </style>
</head>
@endsection
@section("content")

<br><br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="{{URL::to('/search')}}" method="POST">
            @csrf
            <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control my-0 py-1 red-border" type="text" name="search_input" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                <button type="submit"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                    <!-- <a href="" type="button"><span class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></span></a> -->
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if(isset($certificate))
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Certificate Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Issue Date</th>
                    <th scope="col">Participate Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($certificate) >0)
                        @foreach($certificate as $c)
                            <tr>
                                <td>{{$c->certificate_id}}</td>
                                <td>{{$c->firstname}}</td>
                                <td>{{$c->lastname}}</td>
                                <td>{{$c->genre}}</td>
                                <td>{{$c->remark}}</td>
                                <td>{{$c->issuedate}}</td>
                                <td>{{$c->partdate}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
                <br><br><br><br><br><br>
            @endif

        </div>
    </div>
</div>
        



@endsection