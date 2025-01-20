<?php
    





    
    if(isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
        $action();
    }else{
        require_once('mostrar.html');
    }
?>