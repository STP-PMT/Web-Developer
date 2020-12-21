<?php
    class Student{
        public $id;
        public $fullname;
        public $gpa;
        public function _construct($id,$name,$gpa){
            $this->id = $id;
            $this->fullname = $name;
            $this->gpa =$gpa;
        }
    }
?>