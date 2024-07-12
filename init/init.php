<?php 
include "config.php";
$baseurl="http://localhost/fstudio";
$action=$_GET['action']??"";
if($action==""){
    include "views/welcome.php";   
}else{
    include "controllers/controller.php";
}