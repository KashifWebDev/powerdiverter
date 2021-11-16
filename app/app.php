<?php
    require 'app/db.php';

    function redirect($link){
        echo '<script>window.location = "'.$link.'";</script>';
        header("Location: $link");
    }
?>