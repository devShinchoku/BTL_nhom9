//click radio hide content

$(document).ready(function() {
    $("#id_delivery_0").click(function() {
        $(".formInput").show();
    });
    $("#id_delivery_2").click(function() {
        $(".formInput").hide();
    });
});

$(document).ready(function() {
  $("#id_delivery_3").click(function() {
      $(".formInput33").show();
  });
  $("#id_delivery_4").click(function() {
      $(".formInput44").hide();
  });
});
// thêm thẻ
document.getElementById("newsectionbtn").onclick = function() {
    var container = document.getElementById("container-99");
    var section = document.getElementById("mainsection");
    container.appendChild(section.cloneNode(true));
  }
// ẩn thẻ
  $(document).ready(function(){
    $("#newsectionbtn999").click(function(){
        $("#container-999").css("display","block");
    });
 });


 //remove thẻ
 $(document).ready(function(){
  $(".remove").click(function(){
    $("#mainsection").remove();
  });
});

$(document).ready(function(){
  $(".remove2").click(function(){
    $("#mainsection999").remove();
  });
});



//copy data
  function FillBilling(f) {
    if(f.billingtoo.checked == true) {
      f.name11.value=f.name1.value ;
      f.name22.value =  f.name2.value;
       f.name33.value = f.name3.value;
       f.name55.value = f.name5.value;
    }
    else
        {
       f.name11.value = "";
      f.name22.value = "";
      f.name33.value = "";
      f.name55.value = "";
    }
}
