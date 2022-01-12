//change.js
$(document).ready(function(){
    $("#inputPasswordchange1").change(function(){
        let passPattern =/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{6,64}$/;
        if(passPattern.test($(this).val()) == false){
            $("#passlHelpchange1").text("Password phải có ít nhất 6 kí tự bao gồm ít nhất 1 chữ hoa 1 chữ thường và 1 số").css("color","red");
        }
        else{
            $("#passlHelpchange1").text("Password hợp lệ").css("color","rgb(77, 181, 9)");
        }
    })
})
$(document).ready(function(){
    $("#inputPasswordchange2").change(function(){
        let passPattern =/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{6,64}$/;
        if(passPattern.test($(this).val()) == false){
            $("#passlHelpchange2").text("Password phải có ít nhất 6 kí tự bao gồm ít nhất 1 chữ hoa 1 chữ thường và 1 số").css("color","red");
        }
        else{
            $("#passlHelpchange2").text("Password hợp lệ").css("color","rgb(77, 181, 9)");
        }
    })
})
$(document).ready(function(){
    $("#inputEmailchange").change(function(){
        let emailPattern = /\S+@\S+.\S+/;
        if(emailPattern.test($(this).val()) == false){
            $("#emailHelpchange").text("Email của bạn không hợp lệ").css("color","red");
        }
        else{
            $("#emailHelpchange").text("Email hợp lệ").css("color","rgb(77, 181, 9)");
        }
    })
})
//forgot.js
$(document).ready(function(){
    $("#inputEmailforgot").change(function(){
        let emailPattern = /\S+@\S+.\S+/;
        if(emailPattern.test($(this).val()) == false){
            $("#emailHelpforgot").text("Email của bạn không hợp lệ").css("color","red");
        }
        else{
            $("#emailHelpforgot").text("Email hợp lệ").css("color","rgb(77, 181, 9)");
        }
    })
})

//sign-in.js
$(document).ready(function(){
    $("#inputEmailsign-in").change(function(){
        let emailPattern = /\S+@\S+.\S+/;
        if(emailPattern.test($(this).val()) == false){
            $("#emailHelpsign-in").text("Email của bạn không hợp lệ").css("color","red");
        }
        else{
            $("#emailHelpsign-in").text("Email hợp lệ").css("color","rgb(77, 181, 9)");
        }
    })
})

$(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('open')
        $(this).children('i').toggleClass('bi-eye bi-eye-slash');
        if($(this).hasClass('open')){
            $("#inputPasswordsign-in").prop('type','text');
        }else{           
            $("#inputPasswordsign-in").prop('type','password');
        }
    });
}); 
$(document).ready(function(){
    $("#inputPasswordsign-in").change(function(){
        let passPattern =/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{6,64}$/;
        if(passPattern.test($(this).val()) == false){
            $("#passlHelpsign-in").text("Password phải có ít nhất 6 kí tự bao gồm ít nhất 1 chữ hoa 1 chữ thường và 1 số").css("color","red");
        }
        else{
            $("#passlHelpsign-in").text("Password hợp lệ").css("color","rgb(77, 181, 9)");
        }
    })
})

//sign-up.js

$(document).ready(function(){
    $("#inputPasswordsign-up2").change(function(){ 
        var password = $("#inputPasswordsign-up1").val()
        var password1 = $("#inputPasswordsign-up2").val() 
        if(password != password1){
            $("#sr_passsign-up1").text("Password khong khop").css("color","red");
        }
        else
            $("#sr_passsign-up1").text("Password ok").css("color","rgb(77, 181, 9)");       
    })
})

$(document).ready(function(){
    $("#inputPasswordsign-up1").change(function(){
        let passPattern =/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{6,64}$/;
        if(passPattern.test($(this).val()) == false){
            $("#passlHelpsign-up").text("Password khong hop le").css("color","red");
        }
        else{
            $("#passlHelpsign-up").text("Password hop le").css("color","rgb(77, 181, 9)");
        }
    })
})

$(document).ready(function(){
    $("#inputEmailsign-up").change(function(){
        let emailPattern = /\S+@\S+.\S+/;
        if(emailPattern.test($(this).val()) == false){
            $("#emailHelpsign-up").text("Email khong hop le").css("color","red");
        }
        else{
            $("#emailHelpsign-up").text("Email hop le").css("color","rgb(77, 181, 9)");
        }
    })
})



