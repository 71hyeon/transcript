<?php
  function grade($avg){
    if($avg>=90){
      $grade = "A";
    }
    else if($avg>=80){
      $grade = "B";
    }
    else if($avg>=70){
      $grade = "C";
    }
    else if($avg>=60){
      $grade = "D";
    }
    else{
      $grade = "F";
    }
    return $grade;
  }
?>