@extends("admin.adminlayout")
@section("title")
    Admin | Edit Category
@endsection
@section("content")
    <br>
    <h1>Edit Category</h1>
    <br>
    <form action="{{ URL::to('/daily-quiz-update/' . $question->id) }}" method="post">
        @csrf
        <div class="question-container">
            <label style="font-weight: bold;">Question Title: </label>
            <input type="text" class="form-control" required placeholder="Enter Question Title here" name="question_title" value="{{ $question->question_title }}">
            <br>
            <div id="options-container">
                <?php $json_decode = json_decode($question->dailyQuizOptions[0]);
                // dd($json_decode->daily_quiz_option)
                ?>
                @foreach($json_decode->daily_quiz_option as $index => $option)
                
                    <div class="option-container">
                        <label for="option">Option {{ $index + 1 }}:</label>
                        <input type="text" id="option" class="form-control" required placeholder="Enter Option  Title here" name="option[]" value="{{ $option }}">
                    </div>
                @endforeach
                <label for="mark">Mark:</label>
                <input type="text" id="mark" class="form-control" required placeholder="Enter Mark" name="marks" value="{{ $question->question_marks }}">
                <label for="correctoption">Correct Option:</label>
                <input type="text" id="correctoption" class="form-control" required placeholder="Enter correct option" name="correct_option" value="{{ $question->correct_option }}">
            </div>
        </div>
        <br><br>
        <button type="submit" class="btn btn-outline-dark form-control">Update</button>
        <br><br>
        <a href="/categoryfetch" class="btn btn-outline-dark form-control">Back</a>
    </form>
@endsection
