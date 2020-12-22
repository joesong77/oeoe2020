<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="5" />
</head>
<?php


include "db_connection.php";
$str="12345678901234567";
str_shuffle($str);
$name=substr(str_shuffle($str),0,17);
$alnit=rand(1,4);
if ($alnit == '1'){
    $nit= "文昌91";
    $late="5480-GT"; 
     
  }elseif ($alnit =='2') {
     $nit= "中山91";
     $late="2357-YR"; 
     
  }elseif ($alnit=='3') {
     $nit= "東山93";
     $late="0367-FD"; 
  }elseif ($alnit=='4') {
     $nit= "四平92";
     $late="2677-YR"; 

 
}
$olor=rand(1,5);
date_default_timezone_set('Asia/Taipei');//台灣時區
$ti= date("Y-m-d H:i:s");//取現在時間
$do=0; 
$status="正常呼吸";
$lemplement="無";
$ge=rand(1,2);
if($ge == '1'){
    $gender="男";
}elseif($ge == '2'){
   $gender="女";
}
$page=rand(1,3);
if($page=='1'){
   $age="12以下";
}elseif($page=='2'){
   $age='18以上';
}elseif($page=='3'){
   $age='12-18';
}

$problem="呼吸系統_呼吸短促輕度呼吸窘迫SpOtu(92-94%)";
$sql="INSERT INTO vreport(`v_Id`,`v_Status`,`v_Lmplement`,`v_Problem`,`v_Age`,`v_Gender`)
VALUES('$name','$status','$lemplement','$problem','$age','$gender')";	
$result = filterTable($sql);   




    

  

    $me= "TVGH1";

$sql1="INSERT INTO report(`r_Id`,`r_Unit`,`r_Plate`,`r_Check`,`r_Time`,`r_Done`,`r_member`)
VALUES('$name','$nit','$late','$olor','$ti','$do','$me')";	
$result = filterTable($sql1);   



?>
</html>