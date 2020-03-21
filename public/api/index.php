<?php 
    $url = explode('/',$_SERVER['REQUEST_URI']);
    $page = $url[2];

    require("./$page.php");
?>