@extends('admin.layouts.master')

@section('title')

    <title>
        @if (isset($lession)) Update Lession
        @else Adding Lession
        @endif
    </title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="overview-wrap">
                <h2 class="title-1">
                    @if (isset($lession))
                        Update Lession
                    @else
                        Adding Lession
                    @endif
                </h2>
            </div>
        </div>
        <div class="col-lg-10" >
            <form action="{{ isset($lession) ? route('post.update.lession', $lession->id) : route('post.add.lession') }}" method="POST">
                @csrf
                <div class="form-group" id="adding-form">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required value="{{ isset($lession->name) ? $lession->name : old('name') }}">
                </div>
                <div class="form-group" id="adding-form">
                    <label for="description">Description:</label>
                    <textarea rows="4" cols="4" class="form-control" id="description" placeholder="Enter description" name="description" required>{{ isset($lession->description) ? $lession->description : old('description') }}</textarea>
                </div>
                <div class="form-group" id="adding-form">
                    <label for="name">Course:</label>
                    <select required  class="form-control" id="course" name="course">
                        @foreach ($courses as $course)
                        <option value="{{ $course->id }}" @if ($course->course_id == $course->id) selected="" @endif>{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="au-btn au-btn-icon au-btn--blue">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
