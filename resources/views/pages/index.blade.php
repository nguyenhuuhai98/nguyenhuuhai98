@extends('layouts.app')

@section('content')
{{-- {{ dd(Auth::user()->notifications) }} --}}
<header id="home" class="backstretched fullheight">
    <div class="dark-overlay fullheight">
        <div class="container fullheight">
            <div class="jumbotron">
                <h1><small>We offer the</small><br>
                Best Education</h1>
                <p>
                    <a class="btn btn-white btn-lg page-scroll" href="#about-us" role="button">Why?</a>
                    <a class="btn btn-lg btn-primary btn-green page-scroll" href="#our-courses" role="button">Browse Courses</a>
                </p>
            </div>
        </div>
    </div>
</header>
<section id="our-courses" >
	<div class="section-inner">
		<div class="container">
			<div class="row mb60 text-center">
				<div class="col-sm-12">
					<h3 class="section-title">Popular Courses</h3>
					<p class="section-sub-title">Hurry, they fill up quickly.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-xs-12" role="tabpanel">
							<div class="row">
								<div class="col-sm-12">
									{{-- Nav tabs --}}
									<ul class="nav nav-justified image-tabs" id="course-tabs" role="tablist">
										@foreach($courses as $course)
											@if($loop->first)
											<li role="presentation" class="active">
												<a href="#{{ $course->slug }}" aria-controls="summer-term" role="tab" data-toggle="tab" class="dark-overlay .half-opacity ">
													<span>{{ $course->name }}</span>
												</a>
											</li>
											@else
											<li role="presentation" class="">
												<a href="#{{ $course->slug }}" aria-controls="winter-term" role="tab" data-toggle="tab" class="dark-overlay .half-opacity ">
													<span>{{ $course->name }}</span>
												</a>
											</li>
											@endif
										@endforeach
									</ul>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									{{-- Tab panes --}}
									<div class="tab-content pt60" id="tabs-collapse">
									@foreach ($courses as $course)
										@if ($loop->first)
										<div role="tabpanel" class="tab-pane fade in active" id="{{ $course->slug }}">
											<div class="tab-inner">
												<div class="row">
													@foreach ($lessions as $lession)
														@if ($lession->course_id == $course->id)
														<div class="col-sm-6 mb40">
															<div class="row">
																<div class="col-sm-12 col-xs-12">
																	<h5><span>{{ $lession->name }}</span></h5>
																	<p class="mb20">{!! $lession->description !!}</p>
																	<a href="{{ route('get.detail.lession', [$lession->id, $lession->slug]) }}" class="btn btn-primary btn-green">View Lession</a>
																</div>
															</div>
														</div>
														@endif
													@endforeach
												</div>
											</div>
										</div>
										@else
										<div role="tabpanel" class="tab-pane fade" id="{{ $course->slug }}">
											<div class="tab-inner">
												<div class="row">
													@foreach ($lessions as $lession)
														@if ($lession->course_id == $course->id)
														<div class="col-sm-6 mb40">
															<div class="row">
																<div class="col-sm-12 col-xs-12">
																	<h5><span>{{ $lession->name }}</span></h5>
																	<p class="mb20">{!! $lession->description !!}</p>
																	<a href="{{ route('get.detail.lession', [$lession->id, $lession->slug]) }}" class="btn btn-primary btn-green">View Lession</a>
																</div>
															</div>
														</div>
														@endif
													@endforeach
												</div>
											</div>
										</div>
										@endif
									@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="the-gallery" class="silver-wrapper" >
	<div class="section-inner">
		<div class="container">
			<div class="row mb60 text-center">
				<div class="col-sm-12">
					<h2 class="section-title">Activities</h2>
					{{-- <p class="section-sub-title">A finger on the pulse of our culture.</p> --}}
				</div>
			</div>
            <div class="row">
            	@foreach($activities as $act)
                <div class="col-md-12 mb30">
                	<div class="row">
                		<div class="col-xs-12">
                			<div class="col-xs-1">
	                            <div class="hover-effect smoothie mb20">
	                                <a href="#" class="smoothie">
	                                <img src="{{ $act->user->avatar }}" alt="Image" class="img-responsive smoothie"></a>
	                            </div>
                            </div>
                            <div class="col-xs-11 mt0 mb20">
                            	<a href="{{ route('get.profile', $act->user_id) }}"><h4 class="">{{ $act->user->name }}</h4></a>
                            	<p><i class="far fa-clock"></i> 15 minutes</p>
                        	</div>
                        </div>
                        <div class="col-xs-12 text-justify">
                        	<p class="mb20"><small>{!! $act->description !!}</small></p>
                        </div>
                    </div>
                    <hr>
                </div>
                @endforeach
            </div>
		</div>
	</div>
</section>

<section>
    <div class="section-inner">
        <div class="container">
                <div class="row mb60 text-center">
                <div class="col-sm-12">
                    <h3 class="section-title">Our Sponsers</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-sm-offset-1">
                    <div class="row">
                        <div class="col-md-3"><img class="img-responsive" src="bower_components/hai-bower/images/logo1.png" alt=""></div>
                        <div class="col-md-3"><img class="img-responsive" src="bower_components/hai-bower/images/logo2.png" alt=""></div>
                        <div class="col-md-3"><img class="img-responsive" src="bower_components/hai-bower/images/logo3.png" alt=""></div>
                        <div class="col-md-3"><img class="img-responsive" src="bower_components/hai-bower/images/logo4.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
