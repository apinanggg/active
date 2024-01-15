
<?php 
  
    require_once '../../../service/connect.class.php' ; 
    
    if( !isset($_SESSION['UserID'] ) ){
        header('Location: ../../../index.php');  
    }

    if( !isset( $_SESSION['UserID'] ) || time() - $_SESSION['login_time'] > 5)
    {
        echo "<script language='javascript'>";
        echo 'alert("SESSION หมดอายุงับ");';
        echo "location.href = '../logout.php'";
        echo "</script>";
    }


?>



