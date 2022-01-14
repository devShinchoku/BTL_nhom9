//click radio hide content

$(document).ready(function() {
    $("#id_delivery_0").click(function() {
        $(".formInput").show();
    });
    $("#id_delivery_2").click(function() {
        $(".formInput").hide();
    });
});


// thêm thẻ


// ẩn thẻ
//   $(document).ready(function(){
//     $("#newsectionbtn999").click(function(){
//         $("#container-999").css("display","block");
//     });
//  });

 $(document).ready(function(){
	$('.showbtn').click(function(){
  		$('#showhideForm').show();
  	});
    $('.hidebtn').click(function(){
  		$('#showhideForm').hide();
  	});
});
//  //remove thẻ
//  $(document).ready(function(){
//   $(".remove").click(function(){
//     $("#mainsection").remove();
//   });
// });

// $(document).ready(function(){
//   $(".remove2").click(function(){
//     $("#mainsection999").remove();
//   });
// });



//copy data
  function FillBilling(f) {
    if(f.billingtoo.checked == true) {
      f.name11.value=f.txtHo.value ;
      f.name22.value =  f.txtTen.value;
       f.name33.value = f.txtEmail.value;
       f.name55.value = f.txtDiachi.value;
    }
    else
        {
       f.name11.value = "";
      f.name22.value = "";
      f.name33.value = "";
      f.name55.value = "";
    }
}

