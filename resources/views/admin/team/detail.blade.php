@extends("admin.adminlayout")
@section("title")
Admin | Team-Detail
@endsection
@section("content")
<br>
<br>
<br>

            <h2>Team Detail</h2>
            <hr />
            @foreach($detail as $d)
        <dl class="dl-horizontal">

            <dt style="color:teal">
            Title
            </dt>
            <dd>
            {{$d->title}}
            </dd>
            <br>
            <dt style="color:teal">
            Short Description
            </dt>
            <dd>
            {!! html_entity_decode($d->short_Des) !!}
            </dd>
            <br>
            <dt style="color:teal">
            Long Description
            </dt>
            <dd>
            {!! html_entity_decode($d->long_des) !!}
            </dd>
            <br>
            <dt style="color:teal">
            Image
            </dt>
            <dd>
            <img src="/teamimages/{{$d->image}}" alt="media_images" style="height:200px">
            </dd>
            <hr/>

            <div>
                <a href="/fetchteam" class="btn btn-secondary">Back to List</a>
            </div>

            <hr/>


        </dl>
  @endforeach
@endsection
