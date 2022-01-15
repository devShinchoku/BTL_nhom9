$(document).ready(function () {
    tabLoad();
    $('.ct-muitab-btn').click(function () {
        tabLoad($(this).data('tab'));
    });
    function tabLoad(tab = 0){
        $.ajax({
            type: "post",
            url: "detail.php",
            data: {tab: tab,id: id},
            dataType: "json",
            success: function (response) {
                $('#tour-detail').html(response);
            }
        });
    }
});