@extends('layouts.app')

@section('content')
<header id="home" class="backstretched single-page-hero">
    <div class="dark-overlay single-page-hero">
        <div class="container single-page-hero">
            <div class="vertical-center-js text-center">
                <h1>Browse Our Courses</h1>
                <p class="section-sub-title">Hurry, they fill up quickly.</p>
            </div>
        </div>
    </div>
</header>

<section id="our-courses">
    <div class="section-inner">
        <div class="container">
            @isset ($message)
                <h2 class="text-center">{{ $message }}</h2>
            @endisset
            <div class="row justify-content-md-center">
                @foreach ($courses as $course)
                    <div class="mb40 col-sm-4">
                        <h5><span>{{ $course->name }}</span></h5>
                        <p class="lead"><b>{{ count($course->lessions) }} </b>Lessions</p>
                        <a @if (count($course->lessions) > 0) href="{{ route('get.all.lession', [$course->id, $course->slug]) }}" @else class="available" @endif><button class="btn btn-primary btn-green">register course</button></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<a href="#" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>
</div>
<script src="{{ asset('bower_components/hai-bower/js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(".available").on("click", function() {
        console.log(123);
        alert('This course is not availables');
    });
</script>
@endsection
