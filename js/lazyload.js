$(document).ready(function () {
    var action = 'inactive';
    function load_data(last_id = '') {
        $.ajax({
            type: "post",
            url: "lazyload.php",
            data: { last_id: last_id },
            dataType: "json",
            success: function (data) {
                setTimeout(function () {
                    $('.removeCard').remove();
                    $('#clearfix_id').remove();
                    $('.m-content').append(data.content_output);
                    if (data.no_data_output != '') {
                        $('#no_more_data').html(data.no_data_output);
                    }
                    action = 'inactive';
                }, 1000);
            }
        });
    }
    function make_skeleton() {
        var output = '';
        $('#clearfix_id').remove();
        for (var count = 0; count < 2; count++) {
            output += "<div class='card removeCard mt-3'>";
            output += "<div class='ph-item m-0'>";
            output += "<div class='ph-row'>";
            output += "<div class='ph-col-2'>";
            output += "<div class='ph-avatar'></div>"
            output += "</div>";
            output += "<div class='ph-col-2'>";
            output += "<div class='ph-row'><div class='ph-col-12'></div><div class='ph-col-12'></div></div>"
            output += "</div>";
            output += "</div>";
            output += "</div>";
            output += "<div>";
            output += "<div class='ph-row'>";
            output += "<div class='ph-col-12'></div>";
            output += "<div class='ph-col-12'></div>";
            output += "<div class='ph-col-12'></div>";
            output += "</div>";
            output += "<div>";
            output += "<div class='ph-col-4'></div>";
            output += "<div class='ph-col-4'></div>";
            output += "<div class='ph-col-4'></div>";
            output += "<div class='ph-col-4'></div>";
            output += "</div>";
            output += "</div>";
            output += "</div>";
            output += "</div>";
        }
        output += '<div class="clearfix" id="clearfix_id"></div>';
        $('.m-content').append(output);
    }

    if (action == 'inactive') {
        make_skeleton();

        setTimeout(function () {
            load_data();
        }, 3000);
    }

    $(window).scroll(function () {
        var last_id = $('#clearfix_id').data('last_id');
        if (last_id != '') {
            if ($(window).scrollTop() + $(window).height() > $(".timeline").height() && action == 'inactive') {
                action = 'active';
                make_skeleton();

                setTimeout(function () {
                    load_data(last_id);
                }, 5000);
            }
        }
    });

});