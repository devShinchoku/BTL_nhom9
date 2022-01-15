$(document).ready(function () {
    loadTab();
    $('.menu-item').click(function () {
        $('.menu-item').removeClass('selected');
        $(this).addClass('selected');
        loadTab($(this).data('tab'));
    });
    
    function loadTab(tab = 0){
        $.ajax({
            type: "post",
            url: "manage.php",
            data: {tab:tab,host_id:host_id},
            dataType: "json",
            success: function (response) {
                $('#tabload').html(response);
                if(response.failure){
                    alert('Bạn cần phải tạo 1 chủ đề tour trước khi tạo tour');
                    loadTab(4);
                    $('.menu-item').removeClass('selected');
                    $('#btnCreateCate').addClass('selected');
                }
            }
        });
    }
});