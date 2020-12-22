<?php
 include "db_connection.php";
 
 $sql = "SELECT * FROM `vreport` INNER JOIN `report` on  vreport.v_Id=report.r_Id WHERE `r_Id` = '".$_GET['id']."'" ;
 $result = filterTable($sql);
 while($row = mysqli_fetch_array($result)):
  $id = $row['r_Id'];
  $status=$row['v_Status'];
  $lemplement=$row['v_Lmplement'];
  $lemplement=$row['v_Lmplement'];
  $plate = $row['r_Plate'];
  $done = $row['r_Done'];
  $problem = $row['v_Problem'];
  $age = $row['v_Age'];
  $gender = $row['v_Gender'];

endwhile; 
session_start();

$userid = $_SESSION['user'];
function  createConfirmationmbox(){
    echo '<script type="text/javascript"> ';
    echo ' function openurl(link) {';
    echo '  if (confirm("確定刪除？")) {';
    echo '    document.location = link;';
    echo '  }';
    echo '}';
    echo '</script>';
}

if($_SESSION['user'] != null)
      { 
      $sql = "SELECT * FROM `member`where m_account= '$userid'";
      $result = filterTable($sql);

        if($row = mysqli_fetch_array($result)){
         echo "<tr>";
         $isna = $row['m_name'];
         $img =$row['img'];


         echo "</tr>";
      
        
        }
    
    }
 
?>
<!DOCTYPE html>
<title>報告</title>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/article.css" rel="stylesheet">    
<link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php
        createConfirmationmbox();

?>
<style>

@import url("https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap");
body{
   
   font-size:20px;
    font-family: 'Noto Sans TC',sans-serif;


    
    
}
</style> 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style=" background:#14274E;">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="t" aria-label="Toggle navigation" style=" background:#F1F6F9;">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" style="color:#F0F0F0; font-size:20px;"href="receive.php"><img src="img/home_icon-icons.com_64840.png"><span class="sr-only">(current)</span></a>
    </li>
 
    <li class="nav-item active">
      <a class="nav-link" style=" font-size:20px;"href="receive2.php"  target="_blank"><img src="img/document_icon-icons.com_64835.png"> <span class="sr-only">(current)</span></a>
    </li>
 
    </ul>
  </ul>



  

  <form class="form-inline my-3 my-lg-0">

  <a class="nav-link disabled" href="#"><?php echo"<img src='img/$img.png' class='rounded float-right' style='width:8%;'>"?></a>
  <a class="nav-lin  " style="color:#F0F0F0; font-size:15px;"><?php echo $isna?></a>
  &nbsp;
  &nbsp;
  <button type="button" class="btn btn-outline-light"   onclick="location.href='logout.php'">登出</button>

  </form>
</div>
</nav>
<br>

<?php
echo" <div style='margin-left:2%;'>";
echo "指派案號:".$id."</td>";
echo"<br>";
echo "患者狀態:".$status."</td>";
echo"<br>";
echo "患者主訴問題:".$problem."</td>";
echo"<br>";
echo "實施急救:".$lemplement."</td>";
echo"<br>";
echo "車牌號碼:".$plate."</td>";
echo"<br>";
echo "年齡:".$age."</td>";
echo"<br>";
echo "性別:".$gender."</td>";
echo"<br>";

echo"</div>";
echo"<div class='text-center'>";
echo"<img src='img/20201026_141849.jpg' class='rounded' style='width:20%;'>";
echo"</div>";

    

   
if($done==0){


$url1 = "javascript:location.href='inp.php?id=".$id."'";
echo"<div class='text-center'>";
echo '<td><input   type="button" class="btn btn-danger  " onclick='.$url1.' value="接收報告"></td>';
echo"</div>";
echo'<br>';

}

?>

    
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script> 
	<script>
	window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')
	</script> 
	<script src="js/popper.min.js">
	</script> 
	<script src="js/bootstrap.min.js">
	</script>
</html>