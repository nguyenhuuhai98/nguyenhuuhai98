@extends('layouts.app')

@section('content')
<div class="container">
    <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li class="active">
                    <a href="#">
                        <i class="green ace-icon fa fa-user bigger-120"></i>
                        Profile
                    </a>
                </li>
            </ul>

            <div class="tab-content no-border padding-24">
                <div class="tab-pane in active">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 center">
                            <span class="profile-picture mb20">
                                <img class="editable img-responsive" alt=" Avatar" id="avatar2" src="{{ $user->avatar }}">
                            </span>
                            <div class="d-flex justify-content-between mb20">
                                <span class="pull-left"><b>{{ count($user->activities) }}</b> activities</span>
                                <span><b class="count-follower" data-value="{{ count($user->otherUsersFollow) }}">{{ count($user->otherUsersFollow) }}</b> followers</span>
                                <span class="pull-right">Following <b>{{ count($user->followOtherUsers) }}</b> users</span>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-12 col-sm-8">
                            <h4 class="blue">
                                <span class="middle">{{ $user->name }}</span>
                                @if(Auth::user()->id == $user->id)
                                <a href="{{ route('get.edit.profile',Auth::user()->id) }}">&nbsp;<i class="fas fa-pencil-alt"></i></a>
                                @else
                                    <?php $i=0 ?>
                                    @foreach(Auth::user()->followOtherUsers as $userF)
                                        @if($userF->id == $user->id)
                                            <?php $i=1; break; ?>
                                        @endif
                                    @endforeach
                                    @if ($i==1)
                                    <a href="javascript:void(0)" class="btn btn-warning follow" data-id="{{ $user->id }}" data-type="1">
                                        <span class="bigger-110">Unfollow</span>
                                    </a>
                                    @else
                                    <a href="javascript:void(0)" class="btn btn-info follow" data-id="{{ $user->id }}" data-type="0">
                                        <span class="bigger-110">Follow</span>
                                    </a>
                                    @endif
                                @endif
                            </h4>

                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Gender </div>

                                    <div class="profile-info-value">
                                        <span>{{ $user->gender == 0 ? 'Male' : 'Female' }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Age </div>

                                    <div class="profile-info-value">
                                        <span>{{ $user->birthday ? Carbon\Carbon::parse($user->birthday)->age : '[N/A]' }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Email </div>

                                    <div class="profile-info-value">
                                        <span>{{ $user->email? $user->email : '[N/A]' }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Phone </div>

                                    <div class="profile-info-value">
                                        <span>{{ $user->phone? $user->phone : '[N/A]' }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Location </div>

                                    <div class="profile-info-value">
                                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                                        <span>{{ $user->address ? $user->address : '[N/A]' }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Joined </div>

                                    <div class="profile-info-value">
                                        <span>{{ $user->created_at? $user->created_at->format('Y/m/d') : '[N/A]' }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="hr hr-8 dotted"></div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="space-20"></div>
                </div><!-- /#home -->

            </div>
        </div>
    </div>
    <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li class="active">
                    <a data-toggle="tab" href="#feed">
                        <i class="orange ace-icon fa fa-rss bigger-120"></i>
                        Activity Feed
                    </a>
                </li>

                @if(Auth::user()->id == $user->id)
                <li>
                    <a data-toggle="tab" href="#course">
                        <i class="orange ace-icon fa fa-rss bigger-120"></i>
                        Registed Courses
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#lession">
                        <i class="blue ace-icon fa fa-users bigger-120"></i>
                        Learining Results
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#result">
                        <i class="pink ace-icon fa fa-picture-o bigger-120"></i>
                        Words Memorised
                    </a>
                </li>
                @endif
            </ul>

            <div class="tab-content no-border padding-24">
                <div id="feed" class="tab-pane in active">
                        <div class="row">
                            @foreach($activities as $act)
                            <div class="col-sm-10 profile-activity clearfix col-lg-offset-1">
                                <div>
                                    <img class="pull-left" alt="Alex Doe's avatar" src="{{ $act->user->avatar }}">
                                    <a class="user" href="#"> {{ $act->user->name }} </a>
                                    {!! $act->description !!}
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        {{ $act->created_at }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div><!-- /.row -->
                        <div class="text-center">
                            {{ $activities->links() }}
                        </div>
                    <div class="space-20"></div>
                </div>

                @if(Auth::user()->id == $user->id)
                <div id="course" class="tab-pane">
                    <div class="profile-feed row">
                        @foreach ($user->courses as $course)
                        <div class="col-sm-6">
                            <div class="profile-activity clearfix">
                                <div>
                                    <a class="user" href="#"> {{ $user->name }} </a>
                                    has registed course
                                    <b><a href="#">{{ $course->name }}</a></b>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="lession" class="tab-pane">
                    <div class="row">
                        @foreach($user->lessions as $lession)
                        <div class="col-sm-6">
                            <div class="profile-activity clearfix">
                                <div class="col-sm-9">
                                    <a class="user" href="{{ route('get.detail.lession', [$lession->id, $lession->slug]) }}"> {{ $lession->name }} </a>
                                </div>
                                <div class="col-sm-3">
                                    <span>{{ $lession->pivot->result }} / 5</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="result" class="tab-pane">
                    <div class="row">
                        @if (!empty ($user->words))
                            @foreach($user->words as $word)
                            <div class="col-sm-3">
                                <div class="profile-activity clearfix">
                                    <div class="col-sm-6">
                                        <b><span>{{ $word->key_word }}</span></b>
                                    </div>
                                    <div class="col-sm-6">
                                        <a class="user pull-right" href="{{ route('get.detail.lession', [$word->lession->id, $word->lession->slug]) }}"> View </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('bower_components/hai-bower/js/jquery.min.js') }}"></script>
<script type="text/javascript">

$(document).on("click", ".follow", function() {
    var target = $(this);
    var countF = $(".count-follower");
    var bookmark = target.children();
    let data = parseInt($(this).data('id'));
    let typeMethod = parseInt($(this).data('type'));
    let value = parseInt($(".count-follower").data('value'));
    let url = "/profile/follow/" + data;
    let method = "POST";
    $.ajax({
        url : url,
        method : method,
        data : {
            "_token" : "{{ csrf_token() }}",
            "id" : data,
            "type" : typeMethod,
            "value" : value,
        },
        success: function (data) {
            if (data.follow) {
                bookmark.text('Unfollow');
                target.addClass('btn-warning');
                target.removeClass('btn-info');
                target.data('type', 1);
                $(".count-follower").text(data.newValue);
                $(".count-follower").data('value', data.newValue);
            }
            else if (data.unfollow) {
                bookmark.text('Follow');
                target.removeClass('btn-warning');
                target.addClass('btn-info');
                target.data('type', 0);
                $(".count-follower").text(data.newValue);
                $(".count-follower").data('value', data.newValue);
            }
        }
    });
    console.log(countF);
});
</script>
@endsection
