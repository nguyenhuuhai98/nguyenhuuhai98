@extends('admin.layouts.master')

@section('title')
<title>
    @if (isset($question)) Update Question
    @else Adding Question
    @endif
</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="overview-wrap">
                <h2 class="title-1">
                    @if (isset($question))
                    Update Question
                    @else
                    Adding Question
                    @endif
                </h2>
            </div>
        </div>
        <div class="col-lg-10" >
            <form action="{{ isset($question) ? route('post.update.question', $question->id) : route('post.add.question') }}" method="POST">
                @csrf
                <div class="form-group" id="adding-form">
                    <label for="text">Text:</label>
                    <input type="text" class="form-control" id="text" placeholder="Enter text" name="text" required value="{{ isset($question->text) ? $question->text : old('text') }}">
                </div>
                <div class="form-group">
                    <label for="text">Answers:</label>
                    <button class="btn btn-success add-more pull-right" type="button"><i class="fas fa-plus"></i></button>
                </div>
                <input type="hidden" class="check-value" data-value="{{ isset ($answers) ? count($answers) : 0  }}">
                @isset ($answers)
                    @foreach ($answers as $key => $answer)
                        <div style="margin-bottom: 10px">
                            <div class="input-group control-group after-add-more">
                                <input type="text" name="answer[{{ $key }}]" class="form-control" placeholder="Enter Answer Here" value="{{ $answer->text }}">
                                &nbsp;True answer?<input type="radio" name="radio" value="{{ $key }}" @if ($answer->true_answer == 1) checked="" @endif>
                                <div class="input-group-btn">
                                    <button class="btn btn-danger remove" type="button"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
                <br class="list">
                <button type="submit" class="au-btn au-btn-icon au-btn--blue">Submit</button>
            </form>
            <div class="copy d-none">
                <div class="control-group input-group" style="margin-top:10px">
                    <input type="text" name="answer[]" class="form-control" placeholder="Enter Answer Here">
                    <div class="input-group-btn">
                        <button class="btn btn-danger remove" type="button"><i class="fas fa-minus"></i></button>
                    </div>
                    True answer? <input type="radio" name="radio" value="">
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var count = parseInt($(".check-value").data("value")) +1;
        $(".add-more").click(function(){
            // var html = $(".copy").html();
            var html = '<div class="copy">' +
                            '<div class="control-group input-group" style="margin-top:10px">'+
                                '<input type="text" name="newAnswer['+ count +']" class="form-control" placeholder="Enter Answer Here">'+
                                'True answer? <input type="radio" name="radio" value="'+ count +'">'+
                                '<div class="input-group-btn"> '+
                                    '<button class="btn btn-danger remove" type="button"><i class="fas fa-minus"></i></button>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
            console.log(html);
            var html2 = "<div>abc</div>";
            $(".list").before(html);
            count++;
        });
        $("body").on("click",".remove",function(){
          $(this).parents(".control-group").remove();
        });
    });
</script>
@endsection
