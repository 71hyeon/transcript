
<?php
  include "dbcon.php";
  include "score.php";//학점

  error_reporting(0);

  $mode = $_GET['mode'];
  $name = $_POST['name'];
  $kor = $_POST['kor'];
  $eng = $_POST['eng'];
  $math = $_POST['math'];
  $com = $_POST['com'];
  $mus = $_POST['mus'];



  if($mode == "insert"){
    $sum = $kor+$eng+$math+$com+$mus;
    $avg = round($sum/5,2);

    $sql = "insert into std_score (name,kor,eng,math,com,mus,sum,avg)";
    $sql .= "values ('$name','$kor','$eng','$math','$com','$mus','$sum','$avg');";

    $result = mysqli_query($conn,$sql);
  }

?>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>

<body>
  <div class="container">

<h3>1)성적 입력하기 </h3>

<form action="score_list.php?mode=insert" method="post">
  <table width="900" border="1" class="table table-bordered" cellpadding="5">
    <tr>
      <th>이름 : <input type="text" name="name" size="5" id="name">&nbsp;
      국어 : <input type="text" name="kor" size="5" id="kor">&nbsp;
      영어 : <input type="text" name="eng" size="5" id="eng">&nbsp;
      수학 : <input type="text" name="math" size="5" id="math">&nbsp;
      컴퓨터 : <input type="text" name="com" size="5" id="com">&nbsp;
      음악 : <input type="text" name="mus" size="5" id="mus">&nbsp;</th>
    
    <td align="center">
      <input type="submit" class="btn btn-primary" value="성적입력">
    </td></tr>
  </table>
</form>

<p>
  <h3>2)성적 출력하기</h3>
</p>
<a href="score_list.php?mode=big_first">[성적순 정렬]</a>
<a href="score_list.php?mode=small_first">[성적역순 정렬]</a>
<table width="900" class="table table-bordered">
  <thead>
    <tr align="center" bgcolor="#CEFBC9">
      <th>번호</th>
      <th>이름</th>
      <th>국어</th>
      <th>영어</th>
      <th>수학</th>
      <th>컴퓨터</th>
      <th>음악</th>
      <th>합계</th>
      <th>평균</th>
      <th>학점</th>
      <th>삭제</th>
    </tr>
  </thead>
  <tbody>
  <?php

  if($mode=="big_first"){
    $sql = "select * from std_score order by sum desc;";
  }
  else if($mode == "small_first"){
    $sql = "select * from std_score order by sum ;";
  }
  else{
    $sql = "select * from std_score;";
  }


    $result = mysqli_query($conn,$sql);

    $count = 1; 

    while($row = mysqli_fetch_array($result)){
      $avg = round($row['avg'],1);
      $grade = grade($avg);
      $num = $row['num'];
      ?>
    <tr align="center">
      <td><?=$count?></td>
      <td><?=$row['name']?></td>
      <td><?=$row['kor']?></td>
      <td><?=$row['eng']?></td>
      <td><?=$row['math']?></td>
      <td><?=$row['com']?></td>
      <td><?=$row['mus']?></td>
      <td><?=$row['sum']?></td>
      <td><?=$avg?></td>
      <td><?=$grade?></td>
      <td><button type="button" class="btn btn-dark" onclick="location.href='score_delete.php?num=<?=$num?>'">삭제</button> </td>
    </tr>

  <?php $count++; }
  ?>

  </tbody>
</table>
</div>
</body>
<?php mysqli_close($conn);?>