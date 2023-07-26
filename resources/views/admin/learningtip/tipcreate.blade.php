@extends("admin.adminlayout")
@section("title")
Admin | Create-LerningTips
@endsection
@section("content")
<br>
<h1>Add Learning tips </h1>
<br>

<form action="{{URL::to('/admintipcreatepost')}}" enctype="multipart/form-data" method="post">
    @csrf

        <label style="font-weight: bold;">Category:</label>
        <select name="inserttiptype" required class="form-control" id="">
            <option id="coursedd" value="">Select Category</option>
            @foreach($fetchcat as $id1)
            <option value="{{$id1->id}}">{{$id1->id}} {{$id1->category_name}} </option>
            @endforeach
        </select>
        <br>

       


        <label style="font-weight: bold;">Title:</label>
        <input class="form-control" required placeholder="Enter Title" rows="3" name="inserttiptitle">
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter Short Description"  row="3" name="inserttipshortdes"></textarea>
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter Long Description"  row="3" name="inserttiplongdes"></textarea>
        <br>

        <input type="file" class="form-control"  name="inserttipimage">
        <br>

        <label style="font-weight: bold;">Video URL:</label>
        <input type="url" class="form-control"  placeholder="Enter Video URL" rows="3" name="inserttipurl">
        <br>

        <button type="submit" class="btn btn-info ">ADD</button>
        <a href="/admintip" class="btn btn-secondary">Back to List</a>
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
