var array = [];
var value = $("#progress").data('value');

$('.0').change(function() {
    let id = $(this).data('id');
    if (jQuery.inArray(id, array) == -1) {
        array.push(id);
        $(".progress-bar").removeClass("s" + (array.length - 1));
        $(".progress-bar").addClass("s" + array.length);
        value = value + 1;
        var text = value * 20;
        $("#progress").text(text);
        ;
    }
});

$('.1').change(function() {
    let id = $(this).data('id');
    if (jQuery.inArray(id, array) == -1) {
        array.push(id);
        $(".progress-bar").removeClass("s" + (array.length - 1));
        $(".progress-bar").addClass("s" + array.length);
        value = value + 1;
        var text = value * 20;
        $("#progress").text(text);
    }
});

$('.2').change(function() {
    let id = $(this).data('id');
    if (jQuery.inArray(id, array) == -1) {
        array.push(id);
        $(".progress-bar").removeClass("s" + (array.length - 1));
        $(".progress-bar").addClass("s" + array.length);
        value = value + 1;
        var text = value * 20;
        $("#progress").text(text);
    }
});

$('.3').change(function() {
    let id = $(this).data('id');
    if (jQuery.inArray(id, array) == -1) {
        array.push(id);
        $(".progress-bar").removeClass("s" + (array.length - 1));
        $(".progress-bar").addClass("s" + array.length);
        value = value + 1;
        var text = value * 20;
        $("#progress").text(text);
    }
});

$('.4').change(function() {
    let id = $(this).data('id');
    if (jQuery.inArray(id, array) == -1) {
        array.push(id);
        $(".progress-bar").removeClass("s" + (array.length - 1));
        $(".progress-bar").addClass("s" + array.length);
        value = value + 1;
        var text = value * 20;
        $("#progress").text(text);
    }
});


$(document).on("click", ".memorised", function() {
    console.log(123);
    var target = $(this);
    var bookmark = target.children();
    var token = '{{ csrf_field() }}';
    let data = parseInt($(this).data('id'));
    let typeMethod = parseInt($(this).data('type'));
    let url = "/memorised/" + data;
    let method = "post";

    $.ajax({
        url : url,
        method : method,
        data : {
            "_token" : "{{ csrf_token() }}",
            "id" : data,
            "type" : typeMethod,
        },
        success: function (data) {
            if (data.memory) {
                bookmark.removeClass('far');
                bookmark.addClass('fas');
                target.data('type', 1);
            }
            else if (data.unmemory) {
                bookmark.removeClass('fas');
                bookmark.addClass('far');
                target.data('type', 0);
            }
            console.log(data.memory);
        }
    });
});
