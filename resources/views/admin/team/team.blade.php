@extends("admin.adminlayout")
@section("title")
Admin | team
@endsection
@section("content")
<br>
<h1>team</h1>
<br>

<form action="{{URL::to('/team_post')}}" enctype="multipart/form-data" method="post">
    @csrf


        <label style="font-weight: bold;">Title:</label>
        <input class="form-control" required placeholder="Enter Title" rows="3" name="insertteamtitle">
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter Short Description"  row="2" name="insertteamshortdes"></textarea>
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter Long Description"  row="2" name="insertteamlongdes"></textarea>
        <br>

        <input type="file" class="form-control" required name="insertteamimage">
        <br>


        <button type="submit" class="btn btn-info form-control">ADD</button>
        <br><br>
        <a href="/fetchteam" class="btn btn-dark form-control">back</a>
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
