<?php
    session_start();
    if(!isset($_SESSION['students'])){
        $_SESSION['students'] = array();
    }
    class Student{
        public $id;
        public $fullname;
        public $gpa;
        public function __construct($id, $name ,$gpa){
            $this->id = $id;
            $this->fullname = $name;
            $this->gpa = $gpa;
        }
    }

    $id = $_GET['id'];
    $fullname = $_GET['name'];
    $gpa = $_GET['gpa'];
    $mode = $_GET['mode'];

    if($mode == "add"){
        $student = new Student($id, $fullname ,$gpa);
        array_push($_SESSION['students'], $student);

    }else if($mode == "show"){
        foreach($_SESSION['students'] as $s){
            echo $s->id . " " . $s->fullname . " " . $s->gpa . "<br>";
        }
    }else if($mode == "delete"){
        $idx = 0;
        foreach($_SESSION['students'] as $s){
            if($s->id == $id){
                array_splice($_SESSION['students'], $idx,1);
            }else{
                $idx++;
            }
        }
    }
?>