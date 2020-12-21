<?php
    if($_SERVER['REQUEST_METHOD']==="POST"){
        $quiz =$_POST["quiz"];
        $mid =$_POST["mid"];
        $final =$_POST["final"];
    }else{
        $quiz =$_GET["quiz"];
        $mid =$_GET["mid"];
        $final =$_GET["final"];
    }

    $total =$quiz + $mid + $final;
    $grade ="";
    if($total >=80 && $total <=100){
        $grade = "A";
    }elseif($total>=75 && $total <80){
        $grade ="B+";
    }elseif($total>=70 && $total <75){
        $grade ="B";
    }elseif($total>=65 && $total <70){
        $grade ="C+";
    }elseif($total>=60 && $total <65){
        $grade ="C";
    }elseif($total>=55 && $total <60){
        $grade ="D+";
    }elseif($total>=50 && $total <55){
        $grade ="D";
    }elseif($total>=0 && $total <50){
        $grade ="F";
    }else{
        echo "<h1 style=color:red>Error</h1>";
    }
    echo "Total : ".$total." Grade: <h2 style=color:blue>".$grade ."</h2>";
?>