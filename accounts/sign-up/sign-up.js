//check confirm pass word sign up
$(document).ready(function(){
    $("#inputPassword2").change(function(){ 
        var password = $("#inputPassword1").val()
        var password1 = $("#inputPassword2").val() 
        if(password != password1){
            $("#sr_pass1").text("Password khong khop").css("color","red");
        }
        else
            $("#sr_pass1").text("Password ok").css("color","black");       
    })
})
// // check dieu kien pass
// $(document).ready(function(){
//     $("#inputPassword1").change(function(){
//         let passPattern =/(?=.[a-z])(?=.[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
//         if(passPattern.test($(this).val())){
//             $("#passlHelp").text("Password hop le").css("color","red");                    
//         }
//         else{
//             $("#passlHelp").text("Password khong hop le").css("color","red");
//         }
//     })
// })
// check dieu kien pass
$(document).ready(function(){
    $("#inputPassword1").change(function(){
        let passPattern =/^(?=.[a-z])(?=.[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
        if(passPattern.test($(this).val()) == false){
            $("#passlHelp").text("Password khong hop le").css("color","red");
        }
        else{
            $("#passlHelp").text("Password hop le").css("color","red");
        }
    })
})
// check email
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