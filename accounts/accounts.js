//change.js
$(document).ready(function(){
    $("#inputPassword1").change(function(){
        let passPattern =/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{6,64}$/;
        if(passPattern.test($(this).val()) == false){
            $("#passlHelp1").text("Password phải có ít nhất 6 kí tự bao gồm ít nhất 1 chữ hoa 1 chữ thường và 1 số").css("color","red");
            $("#btnSubmitACC").attr("disabled", true); //disale
        }
        else{
            $("#passlHelp1").text("Password hợp lệ").css("color","rgb(77, 181, 9)");
            $('#btnSubmitACC').removeAttr("disabled"); //enable   
        }
    })
    $("#inputPassword2").change(function(){
        let passPattern =/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{6,64}$/;
        if(passPattern.test($(this).val()) == false){
            $("#passlHelp2").text("Password phải có ít nhất 6 kí tự bao gồm ít nhất 1 chữ hoa 1 chữ thường và 1 số").css("color","red");
            $("#btnSubmitACC").attr("disabled", true); //disale
        }
        else{
            $("#passlHelp2").text("Password hợp lệ").css("color","rgb(77, 181, 9)");
            $('#btnSubmitACC').removeAttr("disabled"); //enable   
        }
    })
    $("#inputEmail").change(function(){
        let emailPattern = /\S+@\S+.\S+/;
        if(emailPattern.test($(this).val()) == false){
            $("#emailHelp").text("Email của bạn không hợp lệ").css("color","red");
            $("#btnSubmitACC").attr("disabled", true); //disale
        }
        else{
            $("#emailHelp").text("Email hợp lệ").css("color","rgb(77, 181, 9)");
            $('#btnSubmitACC').removeAttr("disabled"); //enable   
        }
    })
    $("#inputPassword2").change(function(){ 
        var password = $("#inputPassword1").val()
        var password1 = $("#inputPassword2").val() 
        if(password != password1){
            $("#checkpass").text("Password khong khop").css("color","red");          
        }
        else
            $("#checkpass").text("Password ok").css("color","rgb(77, 181, 9)");            
    })
    //eye pass 
    $('#eye').click(function(){
        $(this).toggleClass('open')
        $(this).children('i').toggleClass('bi-eye bi-eye-slash');
        if($(this).hasClass('open')){
            $("#inputPassword1").prop('type','text');
        }else{           
            $("#inputPassword1").prop('type','password');
        }
    });
})


