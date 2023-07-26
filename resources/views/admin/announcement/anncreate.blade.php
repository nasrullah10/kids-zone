@extends("admin.adminlayout")
@section("title")
Admin | Announcement
@endsection
@section("content")
<br>
<h1>Announcement Create</h1>
<br>

<form action="{{URL::to('/anncreatepost')}}" enctype="multipart/form-data" method="post">
    @csrf

        <label style="font-weight: bold;">Category:</label>
        <select name="insertanntype" required class="form-control" id="">
            <option id="coursedd"  value="">Select Category</option>
        @foreach($fetchan as $id1)
            <option value="{{$id1->id}}">{{$id1->id}} {{$id1->category_name}} </option>
            @endforeach
        </select>
        <br>

        <label style="font-weight: bold;">Headline:</label>
        <input class="form-control" required placeholder="Enter Headline" rows="3" name="insertannheadline">
        <br>

        <label style="font-weight: bold;">Date:</label>
        <input type="date" class="form-control" required placeholder="Enter Type" rows="3" name="insertanndate">
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter Short Description"  row="2" name="insertannshortdes"></textarea>
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter long Description"  row="2" name="insertannlongdes"></textarea>
        <br>

        <label style="font-weight: bold;">Video URL:</label>
        <input type="url" class="form-control"  placeholder="Enter Video URL" rows="3" name="insertannurl">
        <br>

        <label style="font-weight: bold;">Image</label>
        <input type="file" class="form-control"  name="insertannimage">
        <br>

        <button type="submit" class="btn btn-info form-control">ADD</button>
        <br>
        <br>
        <a href="/fetchann" class="btn btn-dark form-control">Back</a>
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
