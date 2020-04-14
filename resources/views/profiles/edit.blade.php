@extends('layouts.app')

@section('content')

<header id="home" class="backstretched single-page-hero">
	<div class="dark-overlay single-page-hero">
		<div class="container single-page-hero">
			<div class="vertical-center-js text-center">
				<h1>Edit profile</h1>
			</div>
		</div>
	</div>
</header>

<section id="about-us">
	<div class="section-inner">
		<div class="container">
			<div class="row">
				<div>
					<form action="{{ route('post.edit.profile', $user->id) }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="name" class="col-form-label">Name:</label>
							<input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required="required">
						</div>
						<div class="form-group">
							<label for="birthday" class="col-form-label">Birthday:</label>
							<input type="date" name="birthday" class="form-control" id="birthday" value="{{ $user->birthday }}" required="required">
						</div>
						<div class="form-group">
							<label for="email" class="col-form-label">Email:</label>
							<input type="text" name="email" class="form-control" id="email" value="{{ $user->email }}" disabled="" required="required">
						</div>
						<div class="form-group">
							<label for="phone" class="col-form-label">Phone:</label>
							<input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}" required="required">
						</div>
						<div class="form-group">
							<label for="address" class="col-form-label">Address:</label>
							<input type="text" name="address" class="form-control" id="address" value="{{ $user->address }}" required="required">
						</div>
						<div class="form-group">
							<input type="submit" value="Save change">
							<a href="{{ route('get.profile', $user->id) }}"><input type="button" value="Close"></a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
