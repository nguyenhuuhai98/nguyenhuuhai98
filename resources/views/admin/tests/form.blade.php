@extends('admin.layouts.master')

@section('title')
    <title>
        @if (isset($test)) Update LessionTest
        @else Adding Test
        @endif
    </title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="overview-wrap">
                <h2 class="title-1">
                    Update Test
                </h2>
            </div>
        </div>
        <div class="col-lg-10" >
            <form action="{{ isset($test) ? route('post.update.test', $test->id) : route('post.add.test') }}" method="POST">
                @csrf
                <div class="form-group" id="adding-form">
                    <label for="name">Test name:</label>
                    <input type="text" class="form-control" id="name" name="name" required value="{{ isset($test->name) ? $test->name : old('text') }}">
                </div>
                <div class="form-group">
                    <label for="lession">Lession:</label>
                    <select name="lession"class="form-control">
                        @if (empty ($lessions))
                            <option value="{{ $test->lession->id }}" selected="">{{ $test->lession->name }}</option>
                        @else
                            @foreach ($lessions as $lession)
                            <option value="{{ $lession->id }}" @isset ($test) @if ($test->lession_id == $lession->id) selected="" @endif @endisset >{{ $lession->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group ">
                    <label for="question[]">Questions</label>
                    <button class="btn btn-success add-more pull-right" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                </div>
                @isset ($test)
                    @foreach ($test->questions as $tquestion)
                    <div class="input-group control-group" style="margin-bottom: 10px">
                        <select class="form-control" name="question[]">
                            @foreach($questions as $question)
                            <option value="{{ $question->id }}" @if ($question->id == $tquestion->id) selected="" @endif>{{ $question->text }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-btn">
                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                        </div>
                    <br>
                    </div>
                    @endforeach
                @endisset
                <br class=" after-add-more">
                <div class="form-group">
                    <button type="submit" class="au-btn au-btn-icon au-btn--blue">Submit</button>
                </div>
            </form>

            <!-- Copy Fields -->
            <div class="copy d-none">
                <div class="control-group input-group" style="margin-top:10px">
                    <select class="form-control" name="question[]">
                        @foreach($questions as $question)
                        <option value="{{ $question->id }}">{{ $question->text }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-btn">
                        <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(".add-more").click(function(){
            var html = $(".copy").html();
            $(".after-add-more").before(html);
        });
        $("body").on("click",".remove",function(){
            $(this).parents(".control-group").remove();
        });
    });
</script>
@endsection
