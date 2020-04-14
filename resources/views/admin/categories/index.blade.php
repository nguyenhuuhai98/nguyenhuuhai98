@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="overview-wrap">
                <h2 class="title-1">Manage Categories</h2>
                <form method="GET" action="{{ route('get.add.category') }}">
                    <button type="submit" class="au-btn au-btn-icon au-btn--blue">
                        <i class="zmdi zmdi-plus"></i>Add
                    </button>
                </form>
            <div class="text-center">
                {{ $categories->links() }}
            </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-40">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th >ID</th>
                            <th >Name</th>
                            <th >Slug</th>
                            <th >Avatar</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td><img src="{{ asset($category->avatar ? $category->avatar : 'upload/no-image.png') }}"></td>
                            <td>
                                <a href="{{ route('get.update.category', $category->id) }}"><button type="button" class="btn btn-outline-info"><i class="far fa-edit"></i> Edit</button></a>
                                <a href="javascript:void(0)" class="confirm-delete" data-id="{{ $category->id }}" ><button type="button" class="btn btn-outline-danger" data-id="{{ $category->id }}"><i class="far fa-trash-alt"></i> Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
<script>
$(".confirm-delete").on("click", function(event) {
    var r = confirm("Are you sure to delete?");
    let data = parseInt($(this).data('id'));
    let url = "/admin/category/delete/" + data;
    if (r == true) {
        $(this).attr('href', url);
    }
    else {
        console.log(123);
        event.preventDefault();
    }
});
</script>
@endsection
