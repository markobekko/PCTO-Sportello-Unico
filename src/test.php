<?php
    $date_now = new DateTime();
    $date2 = new DateTime("2022-03-12");
    if ($date_now > $date2) {
        echo 'greater than';
    }else{
        echo 'Less than';
    }
?>