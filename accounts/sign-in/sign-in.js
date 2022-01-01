
$(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('open')
        $(this).children('i').toggleClass('bi-eye bi-eye-slash');
        if($(this).hasClass('open')){
            $("#password").prop('type','text');
        }else{           
            $("#password").prop('type','password');
        }
    });
}); 