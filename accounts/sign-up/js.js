$(document).ready(function(){
    $("#email").change(function(){
        let emailPattern = /^{0-9}{10}(@gmail.com)$/;
        if(emailPattern.test($(this).val()) == false){
            $("#emailHelp").text("Email ko hop le").css("color","red");
        }else{
            $.ajax({
                url:"check.php",
                type:"post",
                data:{email:$(this).val()},

                success:function(res){
                    $("#emailHelp").text(res).css("color","red");
                }
            })
        }
    })
})