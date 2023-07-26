@extends("admin.adminlayout")
@section("title")
Admin | Update Story rounds
@endsection
@section("content")
<br>
<h1>Edit rounds for story competition</h1>
<br>

<form action="{{URL::to('/updateround/'.$update_round->id)}}" method="post">
@csrf
        <div class="form-group">
        <input type="text" required placeholder="Story title..." value="{{$update_round->title}}" class="form-control" name="title"> 
        </div>

        <select class="form-control" required name="roundname"  required="required">
        <option value="{{$update_round->round}}">{{$update_round->round}}</option>
        <option value="First Round">First Round</option>
        <option value="Second Round">Second Round</option>
        <option value="Third Round">Third Round</option>
        </select>


        <label style="font-weight: bold;">Last Date:</label>
        <input type="date" value="{{$update_round->date}}"  class="form-control" required>
        <br>
        
        <label style="font-weight: bold;">Term and conditions:</label>
        <textarea class="form-control descriptionid1" placeholder="Term and conditions..."  row="2" name="termandcondition">{{$update_round->description}}</textarea>
        <br>

        <button type="submit" class="btn btn-outline-info form-control">SUBMIT</button>
        <br><br>
        <a href="/roundfetch" class="btn btn-outline-dark form-control">Back</a>
    </form>
    <script src="/texteditor/texteditor.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.descriptionid1',
        skin: 'bootstrap',
        plugins: 'lists, link, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        menubar: true,
    });
</script>
@endsection

