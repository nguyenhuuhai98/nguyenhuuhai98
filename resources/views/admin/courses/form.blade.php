@extends('admin.layouts.master')

@section('title')

    <title>
        @if (isset($course)) Update Course
        @else Adding Course
        @endif
    </title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="overview-wrap">
                <h2 class="title-1">
                    @if (isset($course))
                        Update Course
                    @else
                        Adding Course
                    @endif
                </h2>
            </div>
        </div>
        <div class="col-lg-10" >
            <form action="{{ isset($course) ? route('post.update.course', $course->id) : route('post.add.course') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" id="adding-form">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter username" name="name" required value="{{ isset($course->name) ? $course->name : old('name') }}">
                </div>
                <div class="form-group" id="adding-form">
                    <label for="name">Category:</label>
                    <select required  class="form-control" id="category" name="category">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="adding-form">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                </div>
                <button type="submit" class="au-btn au-btn-icon au-btn--blue">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
