<?php
include 'C:/xampp/htdocs/SSS/App/Controller/config.php';
include 'C:/xampp/htdocs/SSS/App/Controller/nav-bar.php';

if(isset($_GET['rt'])){

    $route = explode('/',$_GET['rt']);
    require_once($route[0].".php");
}
else require_once ("Index.php");


