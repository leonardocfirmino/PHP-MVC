<?php
Namespace Core;

class core{
    public function start(){
        $prefix = "\Controllers\\";
        $param = array();
        if(isset($_GET['url'])){
            $url = $_GET['url'];
                        
            $url = explode("/",$url);
            
            $class = $url[0] ?? "home";
            
            $action = $url[1] ?? "index";

            $param = $url[2] ?? array();

        }
        if(!isset($_GET['url'])){
            $class = "home";
            $action = "index";
        }
        
        $class = $class."Controller";

        if(!file_exists("Controllers/".$class.".php")){
            $class = "notFound";
            $action = "index";
        }
        $class = $prefix.$class;

        call_user_func_array(array($class,$action),array($param));
    }

}