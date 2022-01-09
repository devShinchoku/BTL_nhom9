$(document).ready(function(){
    $("#inputEmail").change(function(){
        let emailPattern = /\S+@\S+.\S+/;
        if(emailPattern.test($(this).val()) == false){
            $("#emailHelp").text("Email của bạn không hợp lệ").css("color","red");
        }
        else{
            $("#emailHelp").text("Email hop le").css("color","red");
        }
    })
})