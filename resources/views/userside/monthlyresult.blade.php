@extends("userside.userlayout")
@section("title")
<head>
<title>Quiz result | Digital Kid Zone</title>
<meta name="description" content="Quiz result Page" />
<meta name="keywords" content="digitalkidzone" />
</head>
@endsection
@section("content")
<!-- ============================ Page Title Start================================== -->
<section class="page-title" style="background-color:grey">
    <div class="container">
       
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Quiz result</h1>
                    <br>
                    <nav aria-label="breadcrumb"  >
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Quiz result</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
</section>

<br><br>
<div class="container">
    <h1>Monthly Quiz Results</h1>

    <h2>Top Users with Most Correct Answers</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User</th>
                <th>Total Attempts</th>
                <th>Correct Attempts</th>
                <th>Wrong Attempts</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
            @php
                $resultsCollection = collect($results);
                $topUsers = $resultsCollection->sortByDesc('correctAttempts')->take(3);
            @endphp

            @foreach ($topUsers as $user)
                @if ($user['correctAttempts'] > 0)
                    <tr>
                        <td>{{ $user['user'] }}</td>
                        <td>{{ $user['totalAttempts'] }}</td>
                        <td>{{ $user['correctAttempts'] }}</td>
                        <td>{{ $user['wrongAttempts'] }}</td>
                        <td>{{ $user['marks'] }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
<br><br>
@endsection