@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="overview-wrap">
                <h2 class="title-1">
                    @if (isset($category))
                        Update Category
                    @else
                        Adding Category
                    @endif
                </h2>
            </div>
        </div>
        <div class="col-lg-10" >
            <form action="{{ isset($category) ? route('post.update.category', $category->id) : route('post.add.category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" id="adding-form">
                    <label for="name">Username:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter username" name="name" required value="{{ isset($category->name) ? $category->name : old('name') }}">
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
