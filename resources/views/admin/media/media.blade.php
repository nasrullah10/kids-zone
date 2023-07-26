@extends("admin.adminlayout")
@section("title")
Admin | Media
@endsection
@section("content")
<br>
<h1>Media</h1>
<br>

<form action="{{URL::to('/mediacreatepost')}}" enctype="multipart/form-data" method="post">
    @csrf


        <label style="font-weight: bold;">Category:</label>
    <select name="insertmediatype" class="form-control" id="">
        <option id="coursedd" value="">Select Category</option>
    @foreach($fetchmed as $id1)
        <option value="{{$id1->id}}">{{$id1->id}} {{$id1->category_name}} </option>
        @endforeach
    </select>
   <br>

        <label style="font-weight: bold;">Headline:</label>
        <input class="form-control" required placeholder="Enter Headline" rows="3" name="insertmediaheadline">
        <br>

        <label style="font-weight: bold;">Date:</label>
        <input type="date" class="form-control" required placeholder="Enter Type" rows="3" name="insertmediadate">
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter Short Description"  row="2" name="insertmediashortdes"></textarea>
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter Long Description"  row="2" name="insertmedialongdes"></textarea>
        <br>

        <label style="font-weight: bold;">Video URL:</label>
        <input type="url" class="form-control"  placeholder="Enter Video URL" rows="3" name="insertmediaurl">
        <br>

        <input type="file" class="form-control"  name="insertmediaimage">
        <br>


        <button type="submit" class="btn btn-info form-control">ADD</button>
        <br><br>
        <a href="/fetchmedia" class="btn btn-dark form-control">back</a>
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
