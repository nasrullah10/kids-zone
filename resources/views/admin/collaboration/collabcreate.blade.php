@extends("admin.adminlayout")
@section("title")
Admin | collab
@endsection
@section("content")
<br>
<h1>collab</h1>
<br>

<form action="{{URL::to('/collabcreatepost')}}" enctype="multipart/form-data" method="post">
    @csrf
  
        <label style="font-weight: bold;">Title:</label>
        <input type="text" class="form-control" required placeholder="Enter Title" name="insertcollabtitle">
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter long Description"  row="2" name="insertcollablongdes"></textarea>
        <br>

        <label style="font-weight: bold;">Link:</label>
        <input type="url" class="form-control" required placeholder="Enter Type" rows="3" name="insertcollaburl">
        <br>

        <label style="font-weight: bold;">Image</label>
        <input type="file" class="form-control" required name="insertcollabimage">
        <br>

        <button type="submit" class="btn btn-info form-control">ADD</button>
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
