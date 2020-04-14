@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="overview-wrap">
                <h2 class="title-1">Manage Lessions</h2>
                <form method="GET" action="{{ route('get.add.lession') }}">
                    <button type="submit" class="au-btn au-btn-icon au-btn--blue">
                        <i class="zmdi zmdi-plus"></i>Add
                    </button>
                </form>
            <div class="text-center">
                {{ $lessions->links() }}
            </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-40">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lessions as $lession)
                        <tr>
                            <td>{{ $lession->id }}</td>
                            <td>{{ $lession->name }}</td>
                            <td>{{ $lession->course->name }}</td>
                            <td>{{ $lession->slug }}</td>
                            <td>{{ $lession->description }}</td>
                            <td>
                                <a href="{{ route('get.update.lession', $lession->id) }}"><button type="button" class="btn btn-outline-info"><i class="far fa-edit"></i> Edit</button></a>
                                <a href="javascript:void(0)" class="confirm-delete" data-id="{{ $lession->id }}"><button type="button" class="btn btn-outline-danger" ><i class="far fa-trash-alt"></i> Delete</button></a>
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
    let url = "/admin/lession/delete/" + data;
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
