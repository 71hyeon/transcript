<?php
  $host = "localhost";
  $user = "root";
  $pw = "123456";
  $db = "ai";
  
  $conn = mysqli_connect($host,$user,$pw,$db);
  // $dbcon = new mysqli($host,$user,$pw);

  if(mysqli_connect_errno()){
    echo "데이터베이스 접속 실패";
    echo mysqli_connect_errno();
  }

  // else{
  //   echo "접속 성공";
  // }
?>