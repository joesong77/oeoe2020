<?php
include "db_connection.php";


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



  

<head>
<title>接收端</title>
<meta charset="utf-8">
<meta http-equiv="refresh" content="3" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="dist/css/bootstrap-submenu.min.css">
<link rel="shortcut icon" href="favicon.ico" />
<script src="https://code.jquery.com/jquery-3.1.1.min.js" defer></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
<script src="dist/js/bootstrap-submenu.min.js" defer></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
@import url("https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap");
body{
   

    font-family: 'Noto Sans TC',sans-serif;


    
    
}

</style>  
<?php
        createConfirmationmbox();
?>
      
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light " style=" background:#14274E;">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style=" background:#F1F6F9;">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" style="color:#F0F0F0; font-size:20px;"href="receive.php"><img src="img/home_icon-icons.com_64840.png"><span class="sr-only">(current)</span></a>
    </li>
 <li>
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
</nav>
<br>
<?php
if($_SESSION['user'] != null)
{ 
            $sql = "SELECT * FROM `report`  WHERE `r_Done`= '1' AND `r_member`='$userid' order by `r_Check`   limit 10";
      
            $result = filterTable($sql);
        ;
       
            while($row = mysqli_fetch_array($result)):
         
         
              echo"<div  style=' float:left; '>";
 
          
               
              echo "<div   class='row' style=' width:500px;border-color:#d6d7df;border-width:3px;border-style:solid;padding:-1px; margin-right:45px;margin-top:10px;'>";


                echo" <div>";
           
                         
                $Check= $row['r_Check'];//檢傷分級
                if ($Check == '1'){
                   echo "<img style='width:140px;' src='img/0001.jpg'>";
                   
                   
                }elseif ($Check =='2') {
                   echo "<img style='width:140px;' src='img/0002.jpg'>";
                   
                }elseif ($Check=='3') {
                   echo "<img style='width:140px;' src='img/0003.jpg'>";
                }elseif ($Check=='4') {
                  echo "<img style='width:140px;' src='img/0004.jpg'>";
   
                }elseif ($Check=='5') {
                  echo "<img style='width:140px;' src='img/0005.jpg'>";
                  
                } 
               echo "</div>";
         
               echo" <div class='col-sm' style=margin-top:4%;'>";
               
 
               echo "指派案號:".$row['r_Id']."</td>";
         
               echo "<br>";
               echo "出勤單位:".$row['r_Unit']."</td>";
             
          
           
                       
               echo "<br>";
               echo "</div>";
               echo" <div style='margin-top:15%;margin-right:2%;'>";
               $url2 = "javascript:location.href='article.php?id=".$row['r_Id']."'";
               echo '<td><input id="bt" type="button"class="btn btn-secondary  " onclick='.$url2.' value="查看報告"></td>';
               echo "</div>";
   
         
               echo "<br>";
               echo "</div>";
               echo "<br>";
               echo "</div>";
            
            endwhile;
            
 
}
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script> 
	<script>
	window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')
	</script> 
	<script src="js/popper.min.js">
	</script> 
	<script src="js/bootstrap.min.js">
	</script>

</body>
