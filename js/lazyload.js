$(document).ready(function () {
    var action = 'inactive';

    if (action == 'inactive') {
        make_skeleton();

        setTimeout(function () {
            load_data();
        }, 1200);
    }

    $(window).scroll(function () {
        var last_id = $('#clearfix_id').data('last_id');
        console.log(last_id);
        console.log(typeof(last_id));
        if ($(window).scrollTop() + $(window).height() > $(".m-content").height() && action == 'inactive') {
            action = 'active';
            make_skeleton();
            setTimeout(function () {
                load_data(last_id);
            }, 400);
        }
    });

    function make_skeleton() {
        var output = '';
        output+='<div class="card mt-3 ph-card">';
        output+='<div class="ph-item m-0">';
        output+='<div class="ph-col-2">';
        output+='<div class="ph-avatar"></div>';
        output+='</div>';
        output+='<div>';
        output+='<div class="ph-row">';
        output+='<div class="ph-col-4"></div>';
        output+='<div class="ph-col-8 empty"></div>';
        output+='<div class="ph-col-6"></div>';
        output+='<div class="ph-col-6 empty"></div>';
        output+='<div class="ph-col-2"></div>';
        output+='<div class="ph-col-10 empty"></div>';
        output+='</div>';
        output+='</div>';
        output+='<div class="ph-col-12">';
        output+='<div class="ph-picture"></div>';
        output+='</div>';
        output+='<div class="ph-col-12">';
        output+='<div class="ph-row">';
        output+='<div class="ph-col-10 big"></div>';
        output+='<div class="ph-col-2 empty big"></div>';
        output+='<div class="ph-col-4"></div>';
        output+='<div class="ph-col-8 empty"></div>';
        output+='<div class="ph-col-6"></div>';
        output+='<div class="ph-col-6 empty"></div>';
        output+='<div class="ph-col-12"></div>';
        output+='<div class="ph-col-4"></div>';
        output+='<div class="ph-col-8 empty"></div>';
        output+='<div class="ph-col-6"></div>';
        output+='<div class="ph-col-6 empty"></div>';
        output+='<div class="ph-col-12"></div>';
        output+='<div class="ph-col-4"></div>';
        output+='<div class="ph-col-8 empty"></div>';
        output+='<div class="ph-col-6"></div>';
        output+='<div class="ph-col-6 empty"></div>';
        output+='<div class="ph-col-12"></div>';
        output+='</div>';
        output+='</div>';
        output+='</div>';
        output+='</div>';
        output+=output;
        output+=output;
        $('.m-content').append(output);
    }

    function load_data(last_id = 0) {
        $.ajax({
            type: "post",
            url: "lazyload.php",
            data: { last_id: last_id },
            dataType: "json",
            success: function (datas) {
                $('.ph-card').remove();
                $('#clearfix_id').remove();
                $('.m-content').append(datas);
                action = 'inactive';
            }
        });
    }
});