<?php 
switch ($action) {
    case 'login':
        include "views/auth/login.php";
        break;
    case 'register':
        include "views/auth/register.php";
        break;   
}