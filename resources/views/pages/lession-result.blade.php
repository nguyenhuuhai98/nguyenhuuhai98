@extends('layouts.app')

@section('content')
<header id="home" class="backstretched single-page-hero">
	<div class="dark-overlay single-page-hero">
		<div class="container single-page-hero">
			<div class="vertical-center-js text-center">
				<h1>{{ $lession->name }}</h1>
			</div>
		</div>
	</div>
</header>


<section id="about-us">
	<div class="section-inner">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="group-tabs">
						<div class="tab-content">
							<h3 class="text-center">Results</h3>
							<div>
								<?php $i = 1 ?>
								@csrf
								@foreach($questions as $question)
								<div class="form-group mt0 mb20">
									<div >
										<label for="{{ $question->id }}">{{ $i.'. '.$question->text }}</label>
									</div>
									<div>
										@foreach($question->answers as $answer)
										<input type="radio" disabled="" @if ($request->questions[$question->id] == $answer->id) checked="" @endif  name="{{ $question->id }}" value="{{ $answer->id }}" required="required"> {{ $answer->text }}
											@foreach($true_answer as $true)
												@if($true->id == $answer->id)
												<i class="fas fa-check"></i>
												@endif
											@endforeach
										<br>
										@endforeach
									</div>
								</div>
								<?php $i++ ?>
								@endforeach
							</div>
						</div>
						<a href="{{ route('home') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-circle-left"></i> Back to Home</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
