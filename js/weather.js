$(document).ready(function () {
    $.ajax({
        type: "get",
        url: "https://api.openweathermap.org/data/2.5/weather?id=1581129&units=metric&lang=vi&appid=516bdbf0bc63c563cfdaba03e5c7e27d",
        dataType: "json",
        success: function (data) {
            let output =  weather_output(data);
            $('#weather').append(output);
        }
    });
    function weather_output(data){
        let output = '';
        output+='<div class="card">';
        output+='<div class="card-body">';
        output+='<h5 class="card-title location">'+data.name+', '+data.sys.country+'</h5>';
        output+='<h5 class="card-title day mt-3">'+new Date(data.dt*1000).toLocaleDateString("vi-VN",{weekday:'long', day:'numeric', month:'2-digit',year:'numeric'})+'</h5>';
        output+='<div class="w-cloud mt-2">';
        output+='<img with="64px" height="64px" src="http://openweathermap.org/img/wn/' + data.weather[0].icon + '@2x.png">';
        output+='<div class="temper-container">';
        output+='<div class="temperture">';
        output+='<h2 style="font-size: 25px;">'+data.main.temp+'</h2>';
        output+='<div style="display: flex;">';
        output+='<h5 class="w-temper-sacles">°C | °F</h5>';
        output+='</div></div>';
        output+='<h5 class="w-status">'+ data.weather[0].description +'</h5>';
        output+='</div></div>';
        output+='<div class="w-detail mt-2">';
        output+='<ul class="w-detail-list">';
        output+='<li class="w-detail-list-item">';
        output+='<p>Khoảng nhiệt</p>';
        output+='<span>'+data.main.temp_min +' - '+data.main.temp_max+'</span>';
        output+='</li>';
        output+='<li class="w-detail-list-item">';
        output+='<p>Tốc độ gió</p>';
        output+='<span>'+data.wind.speed+'m/s</span>';
        output+='</li>';
        output+='<li class="w-detail-list-item">';
        output+='<p>Bình Minh</p>';
        output+='<span>'+new Date(data.sys.sunrise*1000).toLocaleTimeString("vi-VN",{hour:'2-digit',minute:'2-digit'})+' AM</span>';
        output+='</li>';
        output+='</ul>';
        output+='<ul class="w-detail-list">';
        output+='<li class="w-detail-list-item">';
        output+='<p>Độ ẩm</p>';
        output+='<span>'+data.main.humidity+'%</span>';
        output+='</li>';
        output+='<li class="w-detail-list-item">';
        output+='<p>Khả năng mưa</p>';
        output+='<span>'+data.clouds.all+'%</span>';
        output+='</li>';
        output+='<li class="w-detail-list-item">';
        output+='<p>Hoàng hôn</p>';
        output+='<span>'+new Date(data.sys.sunset*1000).toLocaleTimeString("vi-VN",{hour:'2-digit',minute:'2-digit'})+' PM</span>';
        output+='</li>';
        output+='</ul>';
        output+='<ul class="w-detail-list">';
        output+='<li class="w-detail-list-item">';
        output+='<p>Áp suất</p>';
        output+='<span>'+data.main.pressure+'hPa</span>';
        output+='</li>';
        output+='<li class="w-detail-list-item">';
        output+='<p>Tầm nhìn</p>';
        output+='<span>'+ data.visibility/1000 +'Km</span>';
        output+='</li>';
        output+='</ul>';
        output+='</div>';
        output+='<a href="https://openweathermap.org/" class="w-cr">';
        output+='Cập nhật lúc '+new Date(data.dt*1000).toLocaleTimeString("vi-VN",{hour:'2-digit',minute:'2-digit',hour12: true})+'. @Open-weather';
        output+='</a>';
        output+='</div>';
        output+='</div>';
        return output;
    }
});