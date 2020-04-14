
import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true
});

var channelId = $('.channel').attr('data-channel');
window.Echo.private(`App.Models.User.${channelId}`)
    .notification((notification) => {
        let url = "../../course/lessions/" + notification.course_id + "-" + notification.course_slug;
        let html = `
        <div>
            <div class="col-sm-10">
                <a href=` + url + `> ${notification.title} <b> ${notification.content} </b></a>
                <i class="timeline-date"> Just now </i>
            </div>
            <div class="col-sm-2">
                <a href="" data-toggle="tooltip" data-placement="right" title="Mark as read!"><i class="fas fa-circle"></i></a>
            </div>
        </div>`;
        console.log(html);
        $('.notifications').prepend(html);
        let countNotifications = $('.count-notification').data('count');
        $('.count-notification').data('count', countNotifications + 1);
        $('.count-notification').text(countNotifications + 1);
    });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on("click", ".read", function() {
    var target = $(this);
    var circle = target.children();
    var token = '{{ csrf_field() }}';
    let data = $(this).data('id');
    let typeMethod = parseInt($(this).data('type'));
    let url = "/mark/" + data;
    let method = "post";
    console.log(data);
    $.ajax({
        url : url,
        method : method,
        data : {
            "id" : data,
            "type" : typeMethod,
        },
        success: function (data) {
            if (data.read) {
                circle.removeClass('fas');
                circle.addClass('far');
                target.data('type', 1);
            }
            else if (data.unread) {
                circle.removeClass('far');
                circle.addClass('fas');
                target.data('type', 0);
            }
        }
    });
});
