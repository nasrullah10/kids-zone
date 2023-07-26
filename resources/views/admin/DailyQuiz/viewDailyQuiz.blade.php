@extends("admin.adminlayout")
@section("title")
Admin | Fetch-Category
@endsection
@section("content")
<style>
    .btn-create {
        margin-bottom: 20px;
    }

    .alert-primary {
        margin-bottom: 20px;
    }

    .table-responsive {
        margin-top: 20px;
    }
</style>
<br>
<h1>Quiz Details</h1>
<a href="{{route('DailyQuizForm')}}" class="btn btn-outline-info btn-create">Create Quiz</a>
<br><br>

@if (session('mesg'))
<div class="alert alert-primary" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif

<div class="table-responsive">
    <table class="table">
        <thead class="thead-light text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Quiz Title</th>
                <th scope="col">Quiz Option 1</th>
                <th scope="col">Quiz Option 2</th>
                <th scope="col">Quiz Option 3</th>
                <th scope="col">Quiz Option 4</th>
                <th scope="col">Quiz Correct Option </th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php $i = 1; @endphp
            @forelse($getAllDailyQuiz as $detail)
            <?php // $json_decode = json_decode($question->dailyQuizOptions[0]);
                //  dd($detail->dailyQuizOptions[0]->correct_option)
                ?>
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $detail->question_title }}</td>
                <td>{{ $detail->dailyQuizOptions[0]->daily_quiz_option[0] ??"no option added" }}</td>
                <td>{{ $detail->dailyQuizOptions[0]->daily_quiz_option[1] ??"no option added" }}</td>
                <td>{{ $detail->dailyQuizOptions[0]->daily_quiz_option[2] ??"no option added" }}</td>
                <td>{{ $detail->dailyQuizOptions[0]->daily_quiz_option[3] ??"no option added" }}</td>
                <td>{{ $detail->dailyQuizOptions[0]->correct_option ??"no correct option added" }}</td>
                <td>
                    <a href="{{route('editDailyQuizForm',$detail->id)}}" class="btn btn-outline-primary">Edit</a>
                    <a href="{{route('deleteDailyQuiz',$detail->id)}}" class="btn btn-outline-danger">Delete</a>
                </td>
                
            </tr>
            @empty
            <tr>
                <td colspan="8">No Quiz Found!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
