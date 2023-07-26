@extends("admin.adminlayout")
@section("title")
Admin | Category Details
@endsection
@section("content")
<style>
    .question-container {
        margin-bottom: 20px;
    }

    .option-container {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .option-container label {
        flex: 0 0 100px;
        margin-right: 10px;
        font-weight: bold;
    }
</style>
<br>
<h1>Create Quiz Question</h1>
<br>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<form action="{{URL::to('/daily-quiz-post')}}" method="post">
    @csrf
    <div class="question-container">
        <label style="font-weight: bold;">Question Title: 1</label>
        <input type="text" class="form-control" required placeholder="Enter Question Title here" name="question_title">
        <br>
        <div id="options-container">
            <div class="option-container">
                <label for="option_1">Option 1:</label>
                <input type="text" id="option" class="form-control" required placeholder="Enter Option 1 Title here" name="option[]">
                
            </div>
            <div class="option-container">
                <label for="option_2">Option 2:</label>
                <input type="text" id="option" class="form-control" required placeholder="Enter Option 2 Title here" name="option[]">
            </div>
            <div class="option-container">
                <label for="option_3">Option 3:</label>
                <input type="text" id="option" class="form-control" required placeholder="Enter Option 3 Title here" name="option[]">
                
            </div>
            <div class="option-container">
                <label for="option_4">Option 4:</label>
                <input type="text" id="option" class="form-control" required placeholder="Enter Option 4 Title here" name="option[]">
            </div>
            <label for="mark_1">Mark:</label>
            <input type="text" id="mark" class="form-control" required placeholder="Enter Mark" name="marks">
            <label for="correctoption">Correct Option:</label>
                <input type="text" id="correctoption" class="form-control" required placeholder="Enter correct option" name="correct_option" value="">
        </div>
    </div>
    <br><br>
    <button type="submit" class="btn btn-outline-dark form-control">Submit</button>
    <br><br>
    <a href="{{route('viewDailyQuiz')}}" class="btn btn-outline-dark form-control">View All Quiz</a>
</form>


@endsection