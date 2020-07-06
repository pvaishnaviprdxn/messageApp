<?php
    session_start();
    session_destroy();
    setcookie("uid",'',time() + (-86400 * 1));
    header("location:index.php");
