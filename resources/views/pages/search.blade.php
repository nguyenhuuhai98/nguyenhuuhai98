@extends('layouts.app')

@section('content')
<header id="home" class="backstretched single-page-hero">
    <div class="dark-overlay single-page-hero">
        <div class="container single-page-hero">
            <div class="vertical-center-js text-center">
	            @isset ($message)
                <p class="section-search-title">{!! $message !!}</p>
	            @endisset
            </div>
        </div>
    </div>
</header>

<section id="our-courses">
    <div class="section-inner">
        <div class="container">
            <div class="row">
                <div >
                    <div class="group-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" id="nav-justified">
                            <li class="active"><a data-toggle="pill" href="#users">Users</a></li>
                            <li><a data-toggle="pill" href="#courses">Courses</a></li>
                        </ul>
						<div class="tab-content" id="search-content">
                        <div id="courses" class="tab-pane fade">
                        	@if (!empty ($courses))
	                            @foreach ($courses as $course)
				                    <div class="mb40 col-sm-4">
				                        <h5><span>{{ $course->name }}</span></h5>
				                        <p class="lead"><b>{{ count($course->lessions) }} </b>Lessions</p>
				                        <a @if (count($course->lessions) > 0) href="{{ route('get.all.lession', [$course->id, $course->slug]) }}" @else class="available" @endif><button class="btn btn-primary btn-green">register course</button></a>
				                    </div>
				                @endforeach
		                    @else
					            <div class="text-center">
					                <p class="section-search-title">No courses were found</p>
					            </div>
		                    @endif
                        </div>
                        <div id="users" class="tab-pane fade in active">
                        	@if (!empty ($users))
	                        	@foreach ($users as $user)
			                		<div class="col-md-12 mb40 col-md-offset-1">
			                        	<div class="row">
			                        		<div class="col-xs-2">
					                            <div class="hover-effect smoothie mb20">
					                                <a href="{{ route('get.profile', $user->id) }}" class="smoothie">
					                                <img src="{{ $user->avatar }}" alt="avatar" class="img-responsive smoothie"></a>
					                            </div>
				                            </div>
				                            <div class="col-xs-6">
				                            	<a href="{{ route('get.profile', $user->id) }}">
					                            <h3 class="mt0 mb40">{{ $user->name }}</h3></a>
					                            <p class="mb20"><b class="count-follower" data-value="{{ count($user->otherUsersFollow) }}">{{ count($user->otherUsersFollow) }}</b> followers</p>
				                            </div>
				                            <div class="col-xs-2">
			                                    <?php $i=0 ?>
			                                    @foreach(Auth::user()->followOtherUsers as $userF)
			                                        @if($userF->id == $user->id)
			                                            <?php $i=1; break; ?>
			                                        @endif
			                                    @endforeach
			                                    @if($i==1)
			                                    <a href="javascript:void(0)" class="btn btn-warning follow" data-id="{{ $user->id }}" data-type="1">
			                                        <span class="bigger-110">Unfollow</span>
			                                    </a>
			                                    @else
			                                    <a href="javascript:void(0)" class="btn btn-info follow" data-id="{{ $user->id }}" data-type="0">
			                                        <span class="bigger-110">Follow</span>
			                                    </a>
			                                    @endif
					                        </div>
			                            </div>
			                        </div>
			                    @endforeach
		                    @else
					            <div class="vertical-center-js text-center">
					                <p class="section-search-title">No users were found</p>
					            </div>
		                    @endif
                        </div>
                        </div>
                    </div>
                </div>
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

$(document).on("click", ".follow", function() {
	console.log(123444);
    var target = $(this);
    var countF = $(".count-follower");
    var bookmark = target.children();
    let data = parseInt($(this).data('id'));
    let typeMethod = parseInt($(this).data('type'));
    let value = parseInt($(".count-follower").data('value'));
    let url = "/profile/follow/" + data;
    let method = "POST";
    $.ajax({
        url : url,
        method : method,
        data : {
            "_token" : "{{ csrf_token() }}",
            "id" : data,
            "type" : typeMethod,
            "value" : value,
        },
        success: function (data) {
            if (data.follow) {
                bookmark.text('Unfollow');
                target.addClass('btn-warning');
                target.removeClass('btn-info');
                target.data('type', 1);
                $(".count-follower").text(data.newValue);
                $(".count-follower").data('value', data.newValue);
            }
            else if (data.unfollow) {
                bookmark.text('Follow');
                target.removeClass('btn-warning');
                target.addClass('btn-info');
                target.data('type', 0);
                $(".count-follower").text(data.newValue);
                $(".count-follower").data('value', data.newValue);
            }
        }
    });
    console.log(countF);
});
</script>
@endsection
