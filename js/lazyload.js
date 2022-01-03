$(document).ready(function () {
    $.ajax({
        type: "post",
        url: "lazyload.php",
        data: {last_id:last_id},
        dataType: "json",
        success: function (response) {
            
        }
    });
});