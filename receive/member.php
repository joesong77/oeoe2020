<?php
include "db_connection.php";
session_start();
 $maccount = $_POST['account'];
 $pwd = $_POST['password'];
 
 /**********/

 $query = "SELECT * FROM `member` Where `m_account` ='" . $maccount . "'";

 $result = filterTable($query);
 $row = mysqli_fetch_array($result);

 if ($row){

       if ($row['m_password']==$pwd)
         {
         $_SESSION['user'] = $maccount;
    
         header('location:./receive.php');

         }else{
             echo "<script language='javascript'>";
             echo "alert('密碼錯誤'); location.href = './index.php';";
             echo "</script>";
         }


        
  }else{
         echo "<script language='javascript'>";
         echo "alert('無此帳號'); location.href = '.index.php';";
         echo "</script>";
  }

?>