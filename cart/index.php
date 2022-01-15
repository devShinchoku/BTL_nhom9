<?php
    require '../template/header.php';
    require '../config/db.php';
?>
    <main>
        <div class="container">
            <div class="card cart-background mt-5" style="height: 655px;width: 1232px;border-radius: 3px; ">             
                <div>
                    <h6 style="font-size: 22px; margin-left: 1.4%;padding-top: 2%;">
                        Giỏ hàng
                    </h6>
                </div>
                <!-- không có gì ở giỏ -->
                <?php 
                    if(!isset($_SESSION['cart'])){
                ?>
                <div class="text-center">                      
                    <div class="card-body mt-5 cart-iteam">
                        <i class="bi bi-cart3"></i>
                        <p class="card-text" style="font-size: 22px;font-weight: 500;">
                            Không có sản phẩm nào trong giỏ hàng của bạn
                        </p>                         
                    </div>
                </div> 
                <?php
                    }
                    else{
                ?>  
                <div>
                    <div class="card-body mt-5 cart-iteam">
                        <p class="card-text" style="font-size: 22px;font-weight: 500;">
                            Tour ( <?php echo sizeof($_SESSION['cart']); ?>)
                        </p>
                        <?php foreach($_SESSION['cart'] as $id)
                            $sql = "SELECT * FROM db_tour WHERE tour_id = $id";
                            $result = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result);
                        ?>
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
                                                    echo date('d/m/Y');
                                                    
                                                ?>
                                            </b>
                                        
                                        </div>
                                        <div style="width: 50%;">
                                            <div>                                           
                                                Ngày kết thúc
                                            </div>
                                            <b>
                                                <?php
                                                    echo date('d/m/Y', strtotime('+'.$row['tour_long'].' day'));
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
                                        <a class="cart-price-tour" href="http://localhost/BTL_NHOM9/booking/?id=$id">
                                            Đặt Tour
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>                           
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </main>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>
</html>