<?php

    if($_GET["logout"]){

        setcookie("username",null,-1,"/");
        setcookie("permission",null,-1,"/");
        header("Location: index.php");
    }

?>