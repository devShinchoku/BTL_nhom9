
$(document).ready(function(){
    $("#inputPassword1").change(function(){
        let passPattern =/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{6,64}$/;
        if(passPattern.test($(this).val()) == false){
            $("#passlHelp1").text("Password khong hop le").css("color","red");
        }
        else{
            $("#passlHelp1").text("Password hop le").css("color","red");
        }
    })
})

$(document).ready(function(){
    $("#inputPassword2").change(function(){
        let passPattern =/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{6,64}$/;
        if(passPattern.test($(this).val()) == false){
            $("#passlHelp2").text("Password khong hop le").css("color","red");
        }
        else{
            $("#passlHelp2").text("Password hop le").css("color","red");
        }
    })
})
$(document).ready(function(){
    $("#inputEmail").change(function(){
        let emailPattern = /\S+@\S+.\S+/;
        if(emailPattern.test($(this).val()) == false){
            $("#emailHelp").text("Email khong hop le").css("color","red");
        }
        else{
            $("#emailHelp").text("Email hop le").css("color","red");
        }
    })
})