@extends("admin.adminlayout")
@section("title")
Admin | Announcement Detail
@endsection
@section("content")
<br>
<br>
<br>

            <h2>Announcement Detail</h2>
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
            {{$d->a_date}}
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
            Video Link
            </dt>
            <dd>
            {{$d->video_url}}
            </dd>
            <br>

            <dt style="color:teal">
            Image
            </dt>
            <dd>
            <img src="/annimages/{{$d->image}}" alt="announcementimages" style="height:100px">
            </dd>
            <hr/>

            <div>
                <a href="/fetchann" class="btn btn-secondary">Back to List</a>
            </div>

            <hr/>


        </dl>
  @endforeach

@endsection
