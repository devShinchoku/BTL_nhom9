<?php
require '../config/db.php';
    if(isset($_POST['host_id']) && isset($_POST['tab'])){
        $host_id = $_POST['host_id'];
        $tab = $_POST['tab'];
        $output='';
        if($tab == 0){
            $output.='<div class="card p-3">
                        <b class="tourpage-title">
                            Tổng quan
                            </b>
                        </div>
                        <div class="card mt-3 p-3">
                            <b class="tourpage-title">
                                Doanh thu
                            </b>
                            <div class="container row row-cols-1 row-cols-md-2 mt-3 mb-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body" style="text-align: center;">
                                            <h5 class="card-title">Thành công</h5>
                                            <b style="color: rgb(36, 168, 216);">';
            $sql = 'SELECT SUM(total) as tien FROM db_order INNER JOIN db_tour ON db_order.tour_id = db_tour.tour_id
                    INNER JOIN db_tourcategory on db_tourcategory.category_id = db_tour.category_id
                    INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
                    WHERE db_tourhost.host_id = '.$host_id.' AND db_order.status = 0
                    GROUP BY db_tourhost.host_id';
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
                $output.=number_format($data['tien']).' ₫</b>';
            }
            else
                $output.='0 ₫</b>';
            $output.='</div>
                    </div>
                    </div>
                    <div class="col">
                        <div class="card">
              
              <div class="card-body" style="text-align: center;">
                <h5 class="card-title">Huỷ</h5>
                <b style="color: red;">';
            $sql = 'SELECT SUM(total) as tien FROM db_order INNER JOIN db_tour ON db_order.tour_id = db_tour.tour_id
                INNER JOIN db_tourcategory on db_tourcategory.category_id = db_tour.category_id
                INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
                WHERE db_tourhost.host_id = '.$host_id.' AND db_order.status = 1
                GROUP BY db_tourhost.host_id';
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
                $output.=number_format($data['tien']).' ₫</b>';
            }
            else
                $output.='0 ₫</b>';
            $output.='</div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card mt-4">
                            <b class="tourpage-title mt-4">
                                Đơn hàng
                            </b>
                                <div class="container row row-cols-1 row-cols-md-3 g-4 mt-4 mb-4">
                                <div class="col">
                                    <div class="card">
                                    <div class="card-body" style="text-align: center;">
                                        <h5 class="card-title">Đơn hàng đã thanh toán</h5>
                                        <b style="color: rgb(9, 194, 9);">';
            $sql = 'SELECT COUNT(order_id) as soluong FROM db_order INNER JOIN db_tour ON db_order.tour_id = db_tour.tour_id
            INNER JOIN db_tourcategory on db_tourcategory.category_id = db_tour.category_id
            INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
            WHERE db_tourhost.host_id = '.$host_id.' AND db_order.status = 0
            GROUP BY db_tourhost.host_id';
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
                $output.=number_format($data['soluong']).'</b>';
            }
            else
                $output.='0</b>';
             $output.='
                                    </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">               
                                    <div class="card-body" style="text-align: center;">
                                        <h5 class="card-title">Đơn hàng đang chờ phục vụ</h5>
                                        <b style="color: rgb(9, 194, 9);">';
            $sql = 'SELECT COUNT(order_id) as soluong FROM db_order INNER JOIN db_tour ON db_order.tour_id = db_tour.tour_id
            INNER JOIN db_tourcategory on db_tourcategory.category_id = db_tour.category_id
            INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
            WHERE db_tourhost.host_id = '.$host_id.' AND db_order.status = 1
            GROUP BY db_tourhost.host_id';
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
                $output.=number_format($data['soluong']).'</b>';
            }
            else
                $output.='0</b>';
            $output.='
                                    </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">             
                                    <div class="card-body" style="text-align: center;">
                                        <h5 class="card-title">Đơn hàng trong quá trình phục vụ</h5>
                                        <b style="color: rgb(9, 194, 9);">';
            $sql = 'SELECT COUNT(order_id) as soluong FROM db_order INNER JOIN db_tour ON db_order.tour_id = db_tour.tour_id
            INNER JOIN db_tourcategory on db_tourcategory.category_id = db_tour.category_id
            INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
            WHERE db_tourhost.host_id = '.$host_id.'  AND db_order.status = 2
            GROUP BY db_tourhost.host_id';
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
                $output.=number_format($data['soluong']).'</b>';
            }
            else
                $output.='0</b>';
            $output.='
                                    </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">             
                                    <div class="card-body" style="text-align: center;">
                                        <h5 class="card-title">Đơn hàng hoàn tất phục vụ</h5>
                                        <b style="color: rgb(9, 194, 9);">';
            $sql = 'SELECT COUNT(order_id) as soluong FROM db_order INNER JOIN db_tour ON db_order.tour_id = db_tour.tour_id
            INNER JOIN db_tourcategory on db_tourcategory.category_id = db_tour.category_id
            INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
            WHERE db_tourhost.host_id = '.$host_id.'  AND db_order.status = 3
            GROUP BY db_tourhost.host_id';
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
                $output.=number_format($data['soluong']).'</b>';
            }
            else
                $output.='0</b>';
            $output.='
                                    </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">             
                                    <div class="card-body" style="text-align: center;">
                                        <h5 class="card-title">Đơn hàng đã huỷ</h5>
                                        <b style="color: rgb(241, 12, 31);">';
            $sql = 'SELECT COUNT(order_id) as soluong FROM db_order INNER JOIN db_tour ON db_order.tour_id = db_tour.tour_id
            INNER JOIN db_tourcategory on db_tourcategory.category_id = db_tour.category_id
            INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
            WHERE db_tourhost.host_id = '.$host_id.'  AND db_order.status = 4
            GROUP BY db_tourhost.host_id';
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
                $output.=number_format($data['soluong']).'</b>';
            }
            else
                $output.='0</b>';
            $output.='
                                    </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">             
                                    <div class="card-body" style="text-align: center;">
                                        <h5 class="card-title">Tổng đơn hàng</h5>
                                        <b style="color: rgb(241, 12, 31);">';
            $sql = 'SELECT COUNT(order_id) as soluong FROM db_order INNER JOIN db_tour ON db_order.tour_id = db_tour.tour_id
            INNER JOIN db_tourcategory on db_tourcategory.category_id = db_tour.category_id
            INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
            WHERE db_tourhost.host_id = '.$host_id.'
            GROUP BY db_tourhost.host_id';
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
                $output.=number_format($data['soluong']).'</b>';
            }
            else
                $output.='0</b>';
            $output.='
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>';
        }

        if($tab==1){
            $statusArr = ['Đơn hàng đã thanh toán','Đơn hàng đang chờ phục vụ','Đơn hàng trong quá trình phục vụ','Đơn hàng hoàn tất phục vụ','Đơn hàng đã huỷ'];
            $output.='<div class="card mt-3">
                        <b class="tourpage-title m-3">
                        Thông tin đon hàng
                        </b>
                        <div class="container mt-2 mb-2">
                        <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Ngày</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Giá trị</th>
                            <th scope="col">Mã tour</th>
                            <th scope="col">Chi tiết</th>
            
            
                        </tr>
                        </thead>
                        <tbody>';
            $sql = "SELECT order_id,order_date,db_order.status,total,db_order.tour_id FROM db_order INNER JOIN db_tour ON db_order.tour_id = db_tour.tour_id
            INNER JOIN db_tourcategory on db_tourcategory.category_id = db_tour.category_id
            INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
            WHERE db_tourhost.host_id = $host_id
            ORDER BY order_id DESC";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $datas = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $i=0;
                foreach($datas as $data){
                    $i++;
                    $output.='
                                <tr>
                                    <td scope="row">'.$i.'</td>
                                    <td>'.$data['order_date'].'</td>
                                    <td>'.$statusArr[$data['status']].'</td>
                                    <td>'.number_format($data['total']).' đ</td>
                                    <td>'.$data['tour_id'].'</td>
                                    <td>
                                    <a href="oder/?id='.$data['order_id'].'" class="btn btn-primary">Sửa</a>
                                    <a href="delete.php?order_id='.$data['order_id'].'" class="btn btn-danger">Xoá</a>
                                    </td>
                                 </tr>';
                }
            }
            $output.=' </tbody>
                            </table>
                            </div>
                        </div>';
        }
        if($tab==2){
            $typeArr = ['Trong nước','Nước ngoài'];
            $output.='<div class="card mt-3">
                    <b class="tourpage-title m-3">
                    Thông tin chủ đề Tour
                    </b>
                    <div class="container mt-2 mb-2">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Loại</th>
                        </tr>
                        </thead>
                        <tbody>';
            $sql = "SELECT category_id,db_tourcategory.name,type FROM db_tourcategory
            INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
            WHERE db_tourhost.host_id = $host_id
            ORDER BY category_id DESC";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $datas = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $i=0;
                foreach($datas as $data){
                    $i++;
                    $output.='
                                <tr>
                                    <td scope="row">'.$i.'</td>
                                    <td>'.$data['name'].'</td>
                                    <td>'.$typeArr[$data['type']].'</td>
                                    <td>
                                    <a href="delete.php?category_id='.$data['category_id'].'" class="btn btn-danger">Xoá</a>
                                    </td>
                                 </tr>';
                }
            }
            $output.=' </tbody>
                            </table>
                            </div>
                        </div>';
        }
        if($tab==3){
            $statusArr = ['Không công khai','Công khai'];
            $ysArr = ['không','có'];
            $output.='<div class="card mt-3">
                        <b class="tourpage-title m-3">
                        Thông tin Tour
                        </b>
                        <div class="container mt-2 mb-2">
                        <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Tour</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Chủ đề</th>
                            <th scope="col">Thời gian bắt đầu</th>
                            <th scope="col">Thời gian kết thúc</th>
                            <th scope="col">Trả góp</th>
                            <th scope="col">Tình trạng</th>
            
            
                        </tr>
                        </thead>
                        <tbody>';
            $sql = "SELECT tour_id,db_tour.name,db_tourcategory.name as cate,status,starttime,endtime,is_installment FROM db_tour INNER JOIN db_tourcategory on db_tourcategory.category_id = db_tour.category_id
            INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
            WHERE db_tourhost.host_id = $host_id
            ORDER BY tour_id DESC";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $datas = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $i=0;
                foreach($datas as $data){
                    $i++;
                    $output.='
                                <tr>
                                    <td scope="row">'.$i.'</td>
                                    <td>'.$data['name'].'</td>
                                    <td>'.$data['cate'].'</td>
                                    <td>'.$data['starttime'].'</td>
                                    <td>'.$data['endtime'].'</td>
                                    <td>'.$ysArr[$data['is_installment']].'</td>
                                    <td>'.$statusArr[$data['status']].'</td>
                                    <td>
                                    <a href="tour/?id='.$data['tour_id'].'" class="btn btn-primary">Sửa</a>
                                    <a href="delete.php?tour_id='.$data['tour_id'].'" class="btn btn-danger">Xoá</a>
                                    </td>
                                 </tr>';
                }
            }
            $output.=' </tbody>
                            </table>
                            </div>
                        </div>';
        }
        if($tab == 4){
            $output.='
                <div class="container">
                <form action="insert.php" method="post">
                    <label for="txtCateName">Tên Loại tour:</label>
                    <input type="text" id="txtCateName" name="txtCateName" required>
                    <select id="txtCateType" name="txtCateType">
                        <option value="0" selected>Trong nước</option>
                        <option value="1">Ngoài nước</option>
                    </select>
                    <button class="btn btn-success insert-btn" type="submit">Tạo</button>
                </form>
                </div>
            ';
        }
        if($tab == 5){
            $sql = "SELECT category_id,db_tourcategory.name FROM db_tourcategory
            INNER JOIN db_tourhost on db_tourhost.host_id = db_tourcategory.host_id
            WHERE db_tourhost.host_id = $host_id";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $datas = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $output.='
                    <div class="container">
                    <form action="insert.php" method="post">
                        <label for="txtTourName">Tên Loại tour:</label>
                        <input type="text" id="txtTourName" name="txtTourName" required>
                        <select id="txtTourCate" name="txtTourCate">
                        <option value="'.$datas[0]['category_id'].'" selected>'.$datas[0]['name'].'</option>';
                foreach($datas as $data){
                    $output.='<option value="'.$data['category_id'].'">'.$data['name'].'</option>';
                }
                $output.='</select>
                        <button class="btn btn-success insert-btn" type="submit">Tạo</button>
                    </form>
                    </div>
            ';
            }
            else
                $output = array('failure' => true);
        }
        if($tab == 6){
            $sql = "SELECT * FROM db_user";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) >0){
                $perArr = ['Admin','NCC','user'];
                $datas=mysqli_fetch_all($result,MYSQLI_ASSOC);
                $output.='<div class="main" style="margin-top: 7rem!important;">
                <h5 class="card-title" style = "text-align: center;">Quản lý người dùng</h5>
                    <table class="table mt-5">
                        <thead>
                          <tr>
                            
                            <th scope="col">STT</th>
                            <th scope="col">Email</th>
                            <th scope="col">Điện thoại</th>
                            <th scope="col">Họ Tên</th>
                            <th scope="col">Quyền</th>
                          </tr>
                        </thead>
                        <tbody>';
                        foreach($datas as $data){
                    $output.='
                          <tr>
                            <td scope="row">'.$data['user_id'].'</td>
                            <td>'.$data['email'].'</td>
                            <td>'.$data['phonenum'].'</td>
                            <td>'.$data['first_name'].' '.$data['last_name'].'</td>
                            <td>'.$perArr[$data['permission']].'</td>
                            <td>                  
                                <a href="account/?id='.$data['user_id'].'" class="btn btn-primary">Sửa</a>
                                <a href="delete.php?user_id='.$data['user_id'].'" class="btn btn-danger">Xoá</a>
                            </td>
                          </tr>';
                            
                        } 
                $output.='
                        </tbody>
                      </table>
                      <a type="button" href="addUser.php" class="btn btn-primary">Thêm</a>
                </div>
                ';
            }
        }
        mysqli_close($conn);
        echo json_encode($output);
    }
?> 