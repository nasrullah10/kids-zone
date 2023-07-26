@extends("admin.adminlayout")
@section("title")
Admin | Winner-Detail
@endsection
@section("content")
<br>
<br>
<br>

            <h2>Winner Detail</h2>
            <hr />
            @foreach($detail as $d)
        <dl class="dl-horizontal">

            <dt style="color:teal">
            Name Of The Winner
            </dt>
            <?php
            $user = DB::table('users')->where('id',$d->userid)->first();
            ?>
            <dd>
               
            {{$user->firstname}} {{$user->lastname}}
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
                Link
                </dt>
                <dd>
                    {{$d->link}}
                </dd>
                <br>
                <dt style="color:teal">
                  Participated At (Competition Of)
                    </dt>
                    <dd>
                        {{$d->part}}
                    </dd>
                    <br>
                    <dt style="color:teal">
                        Position
                        </dt>
                        <dd>
                            {{$d->position}}
                        </dd>
                        <br>
           
            <dt style="color:teal">
            Image
            </dt>
            <dd>
            <img src="/winnerimages/{{$d->image}}" alt="media_images" style="height:200px">
            </dd>
            <hr/>

            <div>
                <a href="/fetchwinner" class="btn btn-secondary">Back to List</a>
            </div>

            <hr/>


        </dl>
  @endforeach
@endsection
