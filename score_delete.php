<?php

include "dbcon.php";

$num = $_GET['num'];

$sql = "delete from std_score where num=$num;";
$result = mysqli_query($conn,$sql);

mysqli_close($conn);

// echo "<script> alert('삭제되었습니다.'); </script>";

// header("location:score_list.php");
?>
<script>
  alert("삭제되었습니다.");
  location.href = 'score_list.php';
</script>