<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cart | Tour</title>

</head>
<body>
    <?php
        require "../config/db.php";
        if (isset($_GET["id"])){
            $idtour = $_GET["id"];
            $sql = "SELECT * FROM db_tour WHERE tour_id = $idtour";
            $ketqua = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($ketqua)){

        

    ?>
    <header class="container-fluid fixed-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="/" class="h-logo navbar-brand"><svg viewBox="0 0 24 24" class="MuiSvgIcon-root jss7"
                        focusable="false" aria-hidden="true">
                        <path
                            d="M22 11.5c0-1-.2-1.9-.6-2.8-1.4-4.2-5.6-7-10-6.8h-.1c-1.7.2-3.4.7-4.9 1.8-4.6 3-5.8 9.2-2.8 13.9v.1c.2.2.3.6.6.8l.1.1c1.9 2.2 4.7 3.6 7.7 3.6h8.7c.8 0 1.3-.6 1.3-1.3v-9.4z">
                        </path>
                        <path fill="#FFF"
                            d="M16.9 16.8c-.7.9-1.7 1.4-2.8 1.5-.5 0-1-.1-1.4-.5-.3-.3-.5-.8-.4-1.2 0-.2 0-.4.1-.6 0-.2.1-.5.2-.8l1-3.8c-.2.3-.4.5-.6.8-.9 1.8-1.7 3.7-2.4 5.6 0 .1-.1.3-.2.4h-.1c-.1.1-.3.2-.5.2s-.4-.1-.5-.2c-.3-.2-.4-.4-.5-.6-.1-.3-.2-.5-.2-.8s0-.5.1-.8l2.5-9.9c0-.1.1-.2.2-.2l1.7-.5h.1c.1 0 .1.1.1.2l-3.1 12v.2c0-.1.1-.2.2-.5l.3-.9c.2-.7.5-1.4.7-2s.5-1.3.8-1.9c.3-.6.6-1.1 1.1-1.6.1-.1.2-.2.3-.2v-.1s0-.1.1-.1v-.1h.2c.3 0 .5.1.7.3.2.3.2.6.2.9 0 .4-.1.8-.2 1.2l-.3 3.2c-.1.4-.1.8-.1 1.2.1.2.3.3.8.2.7-.2 1.3-.5 1.8-.9.1 0 .2.2.1.3z">
                        </path>
                    </svg>
                </a>
                <ul class="h-menu navbar-nav justify-content-center">
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-newspaper"></i>
                            </div>
                            Bảng tin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-binoculars"></i>
                            </div>
                            Trải nghiệm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            Tour
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-building"></i>
                            </div>
                            Khách sạn
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-ticket"></i>
                            </div>
                            Vé máy bay
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-newspaper"></i>
                            </div>
                            Bảng tin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="h-menu-logo nav-link">
                            <div class="h-menu-logo-icon">
                                <div class="background-icon"></div>
                                <i class="bi bi-bag"></i>
                            </div>
                            Mua sắm
                        </a>
                    </li>
                </ul>
                <ul class="h-user navbar-nav justify-content-end">
                    <li class="nav-item"><span class="h-user-iteam">
                            <i class="bi bi-cart3"></i>
                        </span></li>
                    <li class="nav-item"><span class="h-user-iteam">
                            <i class="bi bi-wallet2"></i>
                        </span></li>
                    <li class="nav-item"><span class="h-user-iteam">
                            <i class="bi bi-arrow-down-circle"></i>
                        </span></li>
                    <li class="nav-item"><img id="img" class="style-scope yt-img-shadow" alt="Hình ảnh đại diện"
                            height="32" width="32"
                            src="https://yt3.ggpht.com/yti/APfAmoFV39QFrpgQ605BDJUj7quJ-JIHmqaWYE59wro_EQ=s88-c-k-c0x00ffffff-no-rj-mo">
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="card cart-background mt-5" style="height: 655px;width: 1232px;border-radius: 3px; ">             
                <div>
                    <h6 style="font-size: 22px; margin-left: 1.4%;padding-top: 2%;">
                        Giỏ hàng
                    </h6>
                </div>  
                <!-- không có gì ở giỏ -->
                <!-- <div class="text-center">                      
                    <div class="card-body mt-5 cart-iteam">
                        <i class="bi bi-cart3"></i>
                        <p class="card-text" style="font-size: 22px;font-weight: 500;">
                            Không có sản phẩm nào trong giỏ hàng của bạn
                        </p>                         
                    </div>
                </div>    -->
                <form action="../booking/?id=1" method="post" role="form">
                    <div class="card-body mt-5 cart-iteam">
                        <p class="card-text" style="font-size: 22px;font-weight: 500;">
                            Tour ( 1)
                        </p>     
                        <div class="" style="height: 273px;width: 1200px; border: 1px solid rgb(224, 224, 224); display: flex; border-radius: 5px;">
                            <div class="cart-tour-1 haha">
                                <div class="container mt-3 cart-tour-1-1 col-sm-6">
                                    <img src="https://media.hahalolo.com/2021/01/05/08/56/3aca1f02583d8f449558b41c1f985980-1609836968_320xauto_high.png.webp" alt="">                  
                                </div>
                                <div class="mt-3 col-sm-7" style="padding-left: 12px;">
                                    <a href="" class="cart-tour-text1">
                                        <b>
                                            <?php
                                                echo $row["name"];
                                            ?>
                                        </b>
                                    </a>
                                    <div class="mt-3" style="font-size: 16px;">
                                        Lịch trình:
                                    </div>
                                    <div class="mt-3" style="font-size: 16px;font-weight: 500; ">     
                                    <div>
                                            <?php
                                                echo $row["city"].','.$row["country"];
                                            ?>                                   
                                    </div>                              
                                    </div>
                                    <div class="cart-tour-text2 mt-3">
                                        <div>Số khách:</div>
                                        <div style="font-weight: 500; margin-left: 10px;">                                        
                                                1 người lớn                                     
                                        </div>
                                    </div>
                                    <div class="cart-tour-text2 mt-2">
                                        <div>Loại Tour:</div>
                                        <div style="font-weight: 500;margin-left: 10px;">                                     
                                                Trong nước                                     
                                        </div>
                                    </div>
                                </div>                           
                            </div>
                            <div class="cart-tour-2 mt-3" style="display: flex;">   
                                <div class="" style="height: 124px;width: 479px; border: 1px solid rgb(224, 224, 224); border-radius: 5px;">
                                    <div class="mt-3 cart-tour-2-1">
                                        <div style="width: 50%; border-right: 2px solid rgb(224, 224, 224);">
                                            <div>
                                                Ngày khởi hành
                                            </div>
                                            <b>
                                                <?php
                                                    echo $row["starttime"];
                                                    
                                                ?>
                                            </b>
                                        
                                        </div>
                                        <div style="width: 50%;">
                                            <div>                                           
                                                Ngày kết thúc
                                            </div>
                                            <b>
                                                <?php
                                                    echo $row["endtime"];
                                                ?>
                                            </b>
                                        </div>
                                    </div>
                                    <div class="mt-3" style="text-align: center; font-size: 16px;">
                                        <b>
                                            <?php
                                                echo $row["tour_long"];
                                            ?>
                                            ngày
                                        </b>
                                    </div>
                                </div>
                                
                                <div class="cart-price">
                                    <div style="font-size: 22px; color: red;">
                                            <?php
                                            
                                                echo number_format($row["man_price"]);
                                            ?>
                                            Đ
                                    </div>
                                    <div style="font-size: 18px;">
                                        Đã bao gồm thuế và phí
                                    </div>
                                    <div>
                                        <button class="cart-price-tour">
                                            Đặt Tour
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>                           
                    </div>
                </form>
            </div>
        </div>
        <?php
      }
    }
    ?>
    </main>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>
</html>