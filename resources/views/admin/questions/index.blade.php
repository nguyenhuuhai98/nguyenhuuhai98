@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="overview-wrap">
                <h2 class="title-1">Manage questions</h2>
                <form method="GET" action="{{ route('get.add.question') }}">
                    <button type="submit" class="au-btn au-btn-icon au-btn--blue">
                        <i class="zmdi zmdi-plus"></i>Add
                    </button>
                </form>
            <div class="text-center">
                {{ $questions->links() }}
            </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-40">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Text</th>
                            <th>Answers</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                        <tr>
                            <td>{{ $question->id }}</td>
                            <td>{{ $question->text }}</td>
                            <td>
                                <ul class="vue-list-inner">
                                    @foreach($question->answers as $answer)
                                    <li>{{ $answer->text }} @if ($answer->true_answer == 1) <i class="fas fa-check"></i> @endif</li>
                                    @endforeach
                                </ul>

                            </td>
                            <td>
                                <a href="{{ route('get.update.question', $question->id) }}"><button type="button" class="btn btn-outline-info"><i class="far fa-edit"></i> Edit</button></a>
                                <a href="{{ route('delete.question', $question->id) }}"><button type="button" class="btn btn-outline-danger" ><i class="far fa-trash-alt"></i> Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
