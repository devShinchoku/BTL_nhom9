<?php
    require_once 'models/home.php';
    class home {
        public function index(){
            require_once 'views/home/index.php';
            if(isset($_POST['last_id'])){
                $id = $_POST['last_id'];
                $this->homeModel->index($id);
            }
        }
    }
?>