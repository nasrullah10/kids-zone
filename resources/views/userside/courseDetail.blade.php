@extends("userside.userlayout")
@section("title")
<title>Course Details</title>
@endsection
<script src="https://js.stripe.com/v3/"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
@section("content")

<section class="gray">
    <div class="container">
    @if(session('error'))
    <div class="alert alert-error text-center alert-dismissible fade show text-danger" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="sec-heading center">
                    <h2><span class="theme-cl">Course Details</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center mb-4">
                <div class="course-image d-inline-block">
                    <img src="{{ asset($course->image) }}" class="img-fluid" alt="Course Image">
                </div>
            </div>
            <div class="col-lg-8 offset-lg-2">
                <div class="course-details">
                    <h3 class="course-title">{{$course->name}}</h3>
                    <div class="course-info mt-4">
                        <div class="course-description">
                            <h4>Package Type:</h4>
                            <p>
                                @if($course->package_type === 'free')
                                    <i class="fa fa-check-circle text-success"></i> Free
                                @elseif($course->package_type === 'paid')
                                    <i class="fa fa-dollar-sign text-primary"></i> Paid
                                @endif
                            </p>
                        </div>
                        @if($course->package_type === 'free')
                            
                        @elseif($course->package_type === 'paid')
                        <div class="course-description">
                            <h4> Course Price:</h4>
                            <p>
                                {{$course->course_price}}
                            </p>
                        </div>
                        @endif
                        
                        <div class="course-description">
                            <h4>Start Date:</h4>
                            <p>{{$course->start_date}}</p>
                        </div>
                        <div class="course-description">
                            <h4>End Date:</h4>
                            <p>{{$course->end_date}}</p>
                        </div>
                        <div class="course-description">
                            <h4>Teacher Name:</h4>
                            <p>{{$course->firstname}} {{$course->lastname}}</p>
                        </div>
                        <div class="course-description">
                            <h4>Description:</h4>
                            <p>{{$course->description}}</p>
                        </div>
                        <!-- Add more course details here -->
                        @if(session('cid'))
                             
                            
                            @if($course->package_type === 'free')
                            <form action="{{route('FreeCourse')}}" method="POST">
                                
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type='hidden' name="course_id" value="{{$course->id}}">
                                <input type='hidden' name="user_id" value="{{session('cid')}}">
                                <button class="btn btn-success" type="submit" ><i class="fa fa-money"></i> Enroll Now (Free)</button>
                                <!-- <a href="#" class="btn btn-modern mt-4"><i class="ti-arrow-right"></i></a> -->
                                
                                </form>
                            @elseif($course->package_type === 'paid')
                            <td colspan="5" style="text-align:right;">

                                <form action="{{route('PurchaseCourse')}}" method="POST">
                                
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type='hidden' name="course_price" value="{{$course->course_price ?? '0'}}">
                                <input type='hidden' name="course_name" value="{{$course->name}}">
                                <input type='hidden' name="course_id" value="{{$course->id}}">
                                <input type='hidden' name="user_id" value="{{session('cid')}}">
                                <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Enroll Now (Paid)</button>
                                <!-- <a href="#" class="btn btn-modern mt-4"><i class="ti-arrow-right"></i></a> -->
                                
                                </form>
                            </td>

                            @endif
                        @else
                            <a href="/login" class="btn btn-modern mt-4">Enroll Now <i class="ti-arrow-right"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
