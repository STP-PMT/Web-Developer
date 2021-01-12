<?php
    if(isset( $_COOKIE['Number'])){
        echo "Cookie is already set";
        setcookie('Number',$_COOKIE['Number']+=1,time()+(86400*30));
        
    }else{
        echo "Cookie is NOT set";
        setcookie('Number',0,time()+(86400*30));
    }
    echo "<br> Current cookie number: ".$_COOKIE['Number'];
?>