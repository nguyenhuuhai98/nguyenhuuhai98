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
                <div class="col-sm-8 col-sm-offset-1">
                    <div class="group-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a data-toggle="pill" href="#vocal">Vocabulary</a></li>
                            <li><a data-toggle="pill" href="#quiz">Quiz</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="vocal" class="tab-pane fade in active">
                                @foreach ($lession->words as $word)
                                    @if ($user_word)
                                        <?php $i = 0?>
                                    @endif
                                        @foreach ($user_word->words as $uword)
                                            @if ($word->id == $uword->id)
                                                <?php $i=1; break; ?>
                                            @endif
                                        @endforeach
                                    @if ($i == 0)
                                        <h3 class="mt0 mb20"><a href="javascript:void(0)" class="memorised" data-id="{{ $word->id }}" data-type="0"><i class="far fa-bookmark memory-mark"></i></a>  {{ $word->key_word }}</h3>
                                    @else
                                        <h3 class="mt0 mb20"><a href="javascript:void(0)" class="memorised" data-id="{{ $word->id }}" data-type="1"><i class="fas fa-bookmark memory-mark"></i></a>  {{ $word->key_word }}</h3>
                                    @endif
                                    <p class="mb20"><small>{{ $word->sentence }}</small></p>
                                @endforeach
                            </div>
                            <div id="quiz" class="tab-pane fade">
                                <?php $i = 1 ?>
                                <form action="{{ route('answer.question', [$lession->id, $lession->test->id]) }}" method="POST">
                                    @csrf
                                    @foreach($questions as $key => $question)
                                    <div class="form-group mt0 mb20">
                                        <div >
                                            <label for="{{ $question->id }}">{{ $i.'. '.$question->text }}</label>
                                        </div>
                                        <div>
                                            @foreach($question->answers as $k => $answer)
                                            <input type="radio" id="{{ $key }}" class="{{ $key }}" data-id="{{ $key }}" data-value="{{ $question->id }}" name="questions[{{ $question->id }}]" value="{{ $answer->id }}"> {{ $answer->text }}<br>
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr class="mb20">
                                    <?php $i++ ?>
                                    @endforeach
                                    <input type="submit" class="btn btn-success" id="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div style="position: fixed; width: 200px">
                        <div>
                            <span id="ten-countdown"></span>
                            <span class="pull-right"><span id="progress" data-value="0">0</span> %</span>
                        </div>
                        <div class="progress" style="height: 40px">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
