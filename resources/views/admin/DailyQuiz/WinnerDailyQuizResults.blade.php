@extends("admin.adminlayout")
@section("title")
    Admin | Quiz Results
@endsection

@section('content')
    <div class="container">
        <h1>Quiz Results</h1>

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
@endsection
