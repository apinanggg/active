
<?php

// header('Content-Type: application/json');

require_once '../service/connect.class.php';
// require_once '../service/response.class.php';
require_once '../service/helper.class.php';

if($_SERVER['REQUEST_METHOD'] === "GET") {

    // print_r($_GET);

    $SID = $_GET['sid'];
    $Uid = $_GET['uid'];
    $UserID =  base64_decode($Uid);

    $params_username = array(
        'SID' => $SID,
        'UserID' => $UserID

    );
    $username_check = DB::query('SELECT * FROM member WHERE SID = :SID AND UserID = :UserID', $params_username);

    if(!$username_check){
        echo '<script> alert("Activate Invalid !")</script>';
        header('Refresh:0; url=../index.php');

    }else{

        $params_update = array(
            'Active' => 'Yes',
            'SID' => $SID,
            'UserID' => $UserID
        );

       $update = DB::query("UPDATE member SET Active = :Active WHERE SID = :SID AND UserID = :UserID", $params_update);
        
       if($update){
            echo '<script> alert("ยืนยันตัวตนสำเร็จ ")</script>';
            header('Refresh:0; url=../index.php');
       }else{
            echo '<script> alert("คุณได้ยืนยันตัวตนไปแล้ว")</script>';
            header('Refresh:0; url=../index.php');
        //    return Response::error('เกิดข้อผิดพลาด', 405);
       }
    }
    
} else {
   
    echo '<script> alert("เกิดข้อผิดพลาดในการส่งค่า")</script>';
    header('Refresh:0; url=../index.php');
}





