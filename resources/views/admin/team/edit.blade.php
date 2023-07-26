@extends("admin.adminlayout")
@section("title")
Admin | Edit-team
@endsection
@section("content")
<br>
<h1>Edit team</h1>
<br>

<form action="{{URL::to('/updateteam/'.$update_team->id)}}" enctype="multipart/form-data" method="post">
    @csrf



        <label style="font-weight: bold;">Title:</label>
        <input class="form-control" required placeholder="Enter Title" rows="3" name="updateteamtitle" value="{{ $update_team->title }}">
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control descriptionid1" row="2"  name="updateteamshortdes" >{{ $update_team->short_Des }}</textarea>
       <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control descriptionid1" row="2"  name="updateteamlongdes" >{{ $update_team->long_des }}</textarea>
        <br>

        <input type="file" class="form-control"  name="updateteamimage">
        <img src="/teamimages/{{ $update_team->image }}" width="200px"; height="150px">
        <br>

        <button type="submit" class="btn btn-info form-control">Update</button>
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
