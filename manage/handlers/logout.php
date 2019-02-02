<?php
    session_start();
    session_destroy();
    if(isset($_COOKIE['fbb2'])){
        setcookie("fbb2", "askljfsdFsdfSD2FSEESe324e2F1", time()-2592000, "/manage");
    }
    if(isset($_COOKIE['gdb2'])){
        setcookie("gdb2", "askljfsdFsdfSD1FSEESe324e2F1", time()-2592000, "/manage");
    }
    header("Location: ../login.php");
?>