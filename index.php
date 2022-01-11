<?php
    $app = new app();

    class App{
        private $__ctr, $__act ,$__params;
        function __construct()
        {
            $this->__ctr = 'home';
            $this->__act = 'index';
            $this->__param = [];
            $this->handleUrl();
        }

        function getUrl(){
            if(!empty($_SERVER['PATH_INFO']))
                $url = $_SERVER['PATH_INFO'];
            else
                $url = '/';
            return $url;
        }

        public function handleUrl(){
            $url = $this->getUrl();
            $urlArr = array_values(array_filter(explode('/',$url)));

            //xu ly controller tu url
            if(!empty($urlArr[0])){
                $this->__ctr = $urlArr[0];
            }
            if(file_exists('controllers/'.$this->__ctr.'.php')){
                require_once 'controllers/'.$this->__ctr.'.php';
                $this->__ctr = new $this->__ctr();
                unset($urlArr[0]);
            }
            else
                loadError();

            //xu ly action tu url
            if(!empty($urlArr[1])){
                $this->__act = $urlArr[1];
                unset($urlArr[1]);
            }

            //xu ly params
            $this->__params=array_values($urlArr);

            if(method_exists($this->__ctr,$this->__act))
                call_user_func_array([$this->__ctr,$this->__act],$this->__params);
            else
                loadError();
        }
    }
    function loadError($name = '404'){
        require_once 'error/'.$name.'.php';
    }
?>
