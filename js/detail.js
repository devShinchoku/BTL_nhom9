$(document).ready(function () {
    tabLoad();
    $('#btnQD').click(function () { 
        tabLoad(1);
    });
    $('#btnCT').click(function () { 
        tabLoad(0);
    });
    $('#btnKM').click(function () { 
        tabLoad(2);
    });
    $('#btnCS').click(function () { 
        tabLoad(3);
    });
    $('#btnLH').click(function () { 
        tabLoad(4);
    });
    function tabLoad(tab = 0){
        $.ajax({
            type: "post",
            url: "detail.php",
            data: {tab: tab,id: id},
            dataType: "json",
            success: function (response) {
                $('#tour-detail').html(response);
                console.log(response)
            }
        });
    }
});