<?php

$a = 1;


 include "db_connection.php";


 $sql1 = "UPDATE `report` SET `r_Done` = '".$a."' WHERE `r_Id` = '".$_GET['id']."' ";//更新資料表done 0改成1(接收資料)
 
 $result = filterTable($sql1);   

 echo "<script>";
 echo " location.href='receive.php'";
 echo "</script>";
 


?>