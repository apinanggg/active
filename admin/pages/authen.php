<?php 
  
    require_once '../../../service/connect.class.php' ; 
    if( !isset($_SESSION['UserID'] ) ){
        header('Location: ../../../index.php');  
    }


    function DateThaiPDO($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthFull = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน",
                            "ตุลาคม","พฤศจิกายน","ธันวาคม");
    $strMonthThai=$strMonthFull[$strMonth];
    return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute:$strSeconds";
}
?>



