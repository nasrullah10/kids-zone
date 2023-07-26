@extends("admin.adminlayout")
@section("title")
Admin |Add Story rounds
@endsection
@section("content")
<br>
<h1>Add rounds for story competition</h1>
<br>
    <form action="{{URL::to('/roundpost')}}"  method="post">
        @csrf
        <div class="form-group">
        <input type="text" required placeholder="Story title..." class="form-control" name="title"> 
        </div>

        <select class="form-control" required name="roundname"  required="required">
        <option value="">Select Round</option>
        <option value="First Round">First Round</option>
        <option value="Second Round">Second Round</option>
        <option value="Third Round">Third Round</option>
        </select>

        <label style="font-weight: bold;">Last Date:</label>
        <input type="date" placeholder="Last date..." name="date" class="form-control" required>
        <br>

        <label style="font-weight: bold;">Term and conditions:</label>
        <textarea class="form-control descriptionid1" placeholder="Term and conditions..."  row="2" name="termandcondition"></textarea>
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
