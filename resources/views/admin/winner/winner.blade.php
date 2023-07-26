@extends("admin.adminlayout")
@section("title")
Admin | winner
@endsection
@section("content")
<br>
<h1>winner</h1>
<br>

<form action="{{URL::to('/winner_post')}}" enctype="multipart/form-data" method="post">
    @csrf


        <label style="font-weight: bold;">Select Winner Name:</label>
        <select name="insertwinnertitle" required class="form-control suitid" id="">
            <option class="districtid" value="">Select User</option>
        @foreach($users as $id2)
            <option value="{{$id2->id}}">{{$id2->id}} {{$id2->firstname}} {{$id2->lastname}} </option>
            @endforeach
        </select>
        <br>

        <label style="font-weight: bold;">Participated At(Competition of):</label>
        <input class="form-control" required placeholder="Enter Participated At" rows="3" name="insertwinnerpart">
        <br>

        <label style="font-weight: bold;">Position:</label>
        <input class="form-control" required placeholder="Enter Position" rows="3" name="insertwinnerposition">
        <br>

        <label style="font-weight: bold;">Link:</label>
        <input class="form-control" required placeholder="Enter Link" rows="3" name="insertwinnerlink">
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter Short Description"  row="2" name="insertwinnershortdes"></textarea>
        <br>

       

        <input type="file" class="form-control" required name="insertwinnerimage">
        <br>


        <button type="submit" class="btn btn-info form-control">ADD</button>
        <br><br>
        <a href="/fetchwinner" class="btn btn-dark form-control">back</a>
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
