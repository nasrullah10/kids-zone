@extends("admin.adminlayout")
@section("title")
    Admin | Quiz Results
@endsection

@section('content')
    <div class="container">
        <h1>Quiz Results</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Total Attempts</th>
                    <th>Correct Attempts</th>
                    <th>Wrong Attempts</th>
                    <th>Total Marks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ $result['user'] }}</td>
                        
                        <td>{{ $result['totalAttempts'] }}</td>
                        <td>{{ $result['correctAttempts'] }}</td>
                        <td>{{ $result['wrongAttempts'] }}</td>
                        <td>{{ $result['marks'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
