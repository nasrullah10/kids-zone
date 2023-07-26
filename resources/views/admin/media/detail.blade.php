@extends("admin.adminlayout")
@section("title")
Admin | Media_Detail
@endsection
@section("content")
<br>
<br>
<br>

            <h2>Media Detail</h2>
            <hr />
            @foreach($detail as $d)
        <dl class="dl-horizontal">
            <dt style="color:teal">
            Type
            </dt>
            <dd>
                <?php
                $topic = DB::table('allcategorytbls')->where('id',$d->type)->first();
                 ?>
             <td>{{ $topic->category_name }}</td>
            </dd>
            <br>
            <dt style="color:teal">
            Title
            </dt>
            <dd>
            {{$d->headline}}
            </dd>
            <br>
            <dt style="color:teal">
            Date
            </dt>
            <dd>
            {{$d->media_date}}
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
            Video URL
            </dt>
            <dd>
            {{$d->video_url}}
            </dd>
            <br>
            @if($d->image_video!="null")
            <dt style="color:teal">
            Image
            </dt>
            <dd>
            <img src="/mediaimages/{{$d->image_video}}" alt="media_images" style="height:200px">
            </dd>
            @endif
            <hr/>

            <div>
                <a href="/fetchmedia" class="btn btn-secondary">Back to List</a>
            </div>

            <hr/>


        </dl>
  @endforeach
@endsection
