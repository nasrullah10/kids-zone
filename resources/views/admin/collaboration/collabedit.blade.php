@extends("admin.adminlayout")
@section("title")
Admin | Edit-collab
@endsection
@section("content")
<br>
<h1>Edit collab</h1>
<br>

<form action="{{URL::to('/updatecollab/'.$updateco->id)}}" enctype="multipart/form-data" method="post">
    @csrf

        <label style="font-weight: bold;">Title:</label>
        <input type="text" class="form-control" required placeholder="Enter Title" name="updatecollabtitle" value="{{ $updateco->title }}">
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter long Description"  row="2" name="updatecollablongdes">{{ $updateco->long_Des }}</textarea>
        <br>

        <label style="font-weight: bold;">Link:</label>
        <input type="url" class="form-control" required placeholder="Enter Type" rows="3" name="updatecollaurl" value="{{ $updateco->video_url }}">
        <br>

        <label style="font-weight: bold;">Image</label>
        <input type="file" class="form-control" required name="insertcollabimage">
        <img src="/collabimages/{{ $updateco->image }}" width="200px"; height="150px">
        <br>
   

        <button type="submit" class="btn btn-info form-control">Update</button>
        <br>
        <br>
        <a href="/fetchcollab" class="btn btn-dark form-control">Back</a>
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
