@extends('layouts.app')

@section('content')
<header id="home" class="backstretched single-page-hero">
	<div class="dark-overlay single-page-hero">
		<div class="container single-page-hero">
			<div class="vertical-center-js text-center">
				<h1>{{ $course->name }}</h1>
				<p class="section-sub-title">In a neat, listed layout.</p>
			</div>
		</div>
	</div>
</header>

<section id="our-courses">
	<div class="section-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb40">
					<div class="row">
						@if (count($lessions)==0)
							<h3 class="text-center">There are no lessons in this course yet</h3>
						@else
							@foreach($lessions as $lession)
								<div class="col-xs-6 mb40">
									<h2 class="mt0 mb40">{{ $lession->name }}</h2>
									<p class="mb20"><small>{{ $lession->description }}</small></p>
									<a href="#" class="btn btn-primary btn-red" data-toggle="modal" data-target="#{{ $lession->slug }}">Word List</a>
									<a @if ($lession->test != null) href="{{ route('get.detail.lession', [$lession->id, $lession->slug]) }}" @else class="available" @endif><button class="btn btn-primary btn-green">Start Lession</button></a>
									<div class="modal fade" id="{{ $lession->slug }}">
										<div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">{{ $lession->name }}</h4>
												</div>
												<!-- Modal body -->
												<div class="modal-body">
													@foreach($lession->words as $word)
													<b>{{ $word->key_word }}</b>
													<br>
													@endforeach
												</div>
												<!-- Modal footer -->
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>

											</div>
										</div>
									</div>
								</div>
							@endforeach
						@endif
					</div>
				</div>
				<div>{{ $lessions->links() }}</div>
				<hr>
			</div>
		</div>
	</div>
</section>
<script src="{{ asset('bower_components/hai-bower/js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(".available").on("click", function() {
        console.log(123);
        alert('This lession is not availables');
    });
</script>
@endsection
