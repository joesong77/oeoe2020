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
<?php  //抓取已接收端幾筆
     $sql2="SELECT  COUNT(r_Done) FROM report WHERE `r_Done`= '1' AND `r_member`='$userid'  ";
        $re = filterTable($sql2);
        $ro = mysqli_fetch_array($re);

  

?>

  

<head>
<title>未接收端</title>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="shortcut icon" href="favicon.ico"/>
<link rel="stylesheet" href="dist/css/bootstrap-submenu.min.css">
<meta http-equiv="refresh" content="3" />
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
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
#gotop {
    position:fixed;
    z-index:90;
    right:30px;
    bottom:31px;
    display:none;
    width:50px;
    height:50px;
    color:#fff;
    background:	#14274E;;
    line-height:50px;
    border-radius:50%;
    transition:all 0.5s;
    text-align: center;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
}
#gotop :hover{
    background:#394867;
}

</style>  
<?php
        createConfirmationmbox();
?>
      
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light" style=" background:#14274E;">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="t" aria-label="Toggle navigation" style=" background:#F1F6F9;">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="receive.php"><img src="img/home_icon-icons.com_64840.png"><span class="sr-only">(current)</span></a>
    </li>
 
    <li class="nav-item active">
      <a class="nav-link" style=" color:#F1F6F9;font-size:20px;"href="receive2.php"  target="_blank"><img src="img/document_icon-icons.com_64835.png"><?php echo $ro[0]?> <span class="sr-only">(current)</span></a>
    </li>
 
    </ul>
  </ul>



  

  <form class="form-inline my-3 my-lg-0">

  <a class="nav-link disabled" href=""><?php echo"<img src='img/$img.png' class='rounded float-right' style='width:8%;'>"?></a>
  <a class="nav-lin  " style="color:#F1F6F9; font-size:15px;" href="user.php"><?php echo $isna?></a>
  &nbsp;
  &nbsp;
  <button type="button" class="btn btn-outline-secondary"   onclick="location.href='logout.php'">登出</button>

  </form>
</div>
</nav>

<?php


if($_SESSION['user'] != null)
{ 

      


  
            $sql = "SELECT * FROM `report`  WHERE `r_Done`= '0' AND `r_member`='$userid' order by `r_Time`  desc limit 10"; //抓done為0的資料(未接收資料)用time來做低到高排序
            $result = filterTable($sql);
          
        
            $sql2 = "SELECT * FROM `report`  WHERE `r_Done`= '0' AND `r_member`='$userid' order by `r_Time`  desc limit 1"; //抓done為0的資料(未接收資料)用time來做低到高排序
            $result2 = filterTable($sql2);
            if($row2 = mysqli_fetch_array($result2)){
             
     
             
       
            }
     
     


            while($row = mysqli_fetch_array($result)):
            
             
      
         
        
               
         
               echo"<div  style='float:left;'>";
 
               echo "<div   class='row' style=' width:500px;border-color:#d6d7df;border-width:3px;border-style:solid;padding:-1px; margin-right:45px;margin-top:10px;'>";


               echo" <div >";
          
                        
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
              date_default_timezone_set('Asia/Taipei');//台灣時區
              $startdata= date("Y-m-d H:i:s");//取現在時間
              echo"<br>";
              $enddate=$row['r_Time'];//資料庫時間
              echo"<br>";
            
              $hour=floor((strtotime($startdata)-strtotime($enddate))%86400/3600);//計算小時
              $minute=floor((strtotime($startdata)-strtotime($enddate))%86400/60%60);//計算分鐘
              $second=floor((strtotime($startdata)-strtotime($enddate))%86400%60);//計算秒數
              echo "".$hour."小時".$minute."分鐘".$second."秒";
              echo "<br>";
           
              echo "<br>";
              echo "</div>";
                  
              echo" <div style='margin-right:2%;margin-top:15%;font-family:Helvetica Neue;'>";
   
     
              
              echo"<br>";
            
        
              $url2 = "javascript:location.href='article.php?id=".$row['r_Id']."'";
              echo '<td><input type="button"class="btn btn-outline-secondary  " onclick='.$url2.' value="查看報告"></td>';
              echo "</div>";
              echo "<br>";
 
              echo "</div>";
              echo "<br>";
            echo "</div>";
          
           endwhile;
           
}

             
?>
<div style="clear:both;">
</div>

    
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script> 
	<script>
	window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')
	</script> 
	<script src="js/popper.min.js">
	</script> 
	<script src="js/bootstrap.min.js">
	</script>

<script type="text/javascript">
$(function() {
    /* 按下GoTop按鈕時的事件 */
    $('#gotop').click(function(){
        $('html,body').animate({ scrollTop: 0 }, 'slow');   /* 返回到最頂上 */
        return false;
    });
    
    /* 偵測卷軸滑動時，往下滑超過400px就讓GoTop按鈕出現 */
    $(window).scroll(function() {
        if ( $(this).scrollTop() > 400){
            $('#gotop').fadeIn();
        } else {
            $('#gotop').fadeOut();
        }
    });
});
</script>
   
<a href="https://www.blogger.com/blogger.g?blogID=2031514508322140995#" id="gotop">
<img src="img/1492533490-arrow-14_83309.png">
</a>


</body>
  
    
                 