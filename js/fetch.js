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
        $('.m-content').append(output);
    }

    function load_data(last_id = 0) {
        var search_arr = [];
        search_arr.push($('#search0').val(),$('#search1').val());
        if(isExtend){
            search_arr.push($('#search2').val(),$('#search3').val(),$('#search4').val(),$('#search5').val(),$('#search6').val(),$('#search7').val(),$('#search8').is(':checked'),$('#search9').is(':checked'));
        }
        $.ajax({
            type: "post",
            url: "fetch.php",
            data: { last_id: last_id, search_arr : search_arr},
            dataType: "json",
            success: function (datas) {
                $('.ph-card').remove();
                $('#clearfix_id').remove();
                $('.m-content').append(datas);
                action = 'inactive';
            }
        });
    }

    $('#btnSearch').click(function () {
        $('.m-content').empty();
        $('.m-content').append('<div id="clearfix_id" data-last_id="0"></div>');
        make_skeleton();
        setTimeout(function () {
            load_data(0);
        }, 400);
    });
});