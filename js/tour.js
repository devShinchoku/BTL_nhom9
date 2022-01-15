$(document).ready(function () {
    tabLoad();
    $('.menu-item').click(function () {
        $('.menu-item').removeClass('selected');
        $(this).addClass('selected');
        tabLoad($(this).data('tab'));
    });
    function tabLoad(tab = 0){
        $.ajax({
            type: "post",
            url: "tour.php",
            data: {tab: tab,id: id},
            dataType: "json",
            success: function (response) {
                $('#tour-info').html(response);
            }
        });
    }

});