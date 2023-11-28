<?php

header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;


require_once '../service/connect.class.php';
require_once '../service/response.class.php';
require_once '../service/helper.class.php';

  //ส่งเมล์ เรียกไฟล์
  require_once "../PHPMailer/PHPMailer.php";
  require_once "../PHPMailer/SMTP.php";
  require_once "../PHPMailer/Exception.php";


/** ตรวจสอบ REQUEST METHOD ตรงกับที่กำหนดหรือไม่ */
if($_SERVER['REQUEST_METHOD'] === "POST") {

    if(($_POST["txtUsername"]) == "")
	{
        return Response::error('Please input Username!', 405);
		exit();	
	}
	
	if(($_POST["txtPassword"]) == "")
	{
        return Response::error('Please input Password!', 405);
		exit();	
	}	
		
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
        return Response::error('Password not Match!', 405);
		exit();
	}
	
	if(($_POST["txtName"]) == "")
	{
        return Response::error('Please input Name!', 405);
		exit();	
	}	

	if(($_POST["txtEmail"]) == "")
	{
        return Response::error('Please input Email!', 405);
		exit();	
	}

    // print_r($_POST);

    // exit;
    

    $params_username = array(
        'Username' => $_POST['txtUsername']
    );
    $username_check = DB::query('SELECT * FROM member WHERE Username = :Username', $params_username);

        // exit;

    if(!$username_check){
        

        $SID = randtext(20);

        


        $txtUsername = $_POST["txtUsername"];
        $txtPassword = $_POST["txtPassword"];
        $txtName = $_POST["txtName"];
        $txtEmail = $_POST["txtEmail"];

       

        $params_created = array(
            
            'Username' => $txtUsername,
            'Password' => $txtPassword,
            'Name' => $txtName,
            'Email' => $txtEmail,
            'Status' => 'USER',
            'SID' => $SID,
            'Active' => 'No'
        );
        $affected = DB::query("INSERT INTO  member (Username,Password,Name,Email,Status,SID,Active) 
                                                VALUES (:Username, :Password, :Name, :Email, :Status, :SID, :Active)", $params_created);

                           
            if($affected){

                // $lastInsertedPeopleId = mysqli_insert_id($affected);

                $params_username2 = array(
                    'Username' => $txtUsername
                );
                $username_check2 = DB::query('SELECT * FROM member WHERE Username = :Username', $params_username2);

                $UserID =  $username_check2[0]['UserID'];
                $Uid = base64_encode($UserID);

                $strMessageLink = "http://localhost/active/service/activate.php?sid=".$SID."&uid=".$Uid;

                     //ส่งเมล์
                $mail = new PHPMailer();
                // SMTP Settings
                $mail->CharSet = "utf-8";
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "apinansasa10@gmail.com"; // enter your email address
                $mail->Password = "gswfwlsxoouzohmu"; // enter your APP password ใน gmail 2factor authentication
                $mail->Port = 465;
                $mail->SMTPSecure = "ssl";

                $subject = "ยืนยัน การสมัครสมาชิก";
                $body = "
                        ชื่อ:  $txtName <br>
                        User :  $txtUsername<br>
                        Link ยืนยันตัวตน : $strMessageLink";
                

                        $mail->isHTML(true);
                        $mail->setFrom($txtEmail);
                        $mail->addAddress($txtEmail); // Send to mail
                        $mail->Subject = $subject; //หัวข้อ
                        $mail->Body = $body;  //เนื้อหา

                if($mail->send()) {
                    return Response::success($affected, 'ลงทะเบียนสำเร็จ !!!', 201);
                }else{
                    return Response::success($affected, 'ลงทะเบียนสำเร็จ !!!', 201);
                }



            }else{
                return Response::error('เกิดข้อผิดพลาดในการลงทะเบียน', 405);

            }
               
        // return Response::success($affected, 'บันทึกข้อมูลเสร็จเรียบร้อย', 201);

    }else{
        return Response::error('ชื่อผู้ใช้งาน (Username) ซ้ำ!!!', 405);
    }

} else {
    /** เรียกใช้งาน Method error สำหรับ Response ข้อมูลกลับไป */ 
    return Response::error('Method Not Allowed!', 405);
}


function randtext($range){
    $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIGKLMNOPQRSTUVWXYZ123456789';
    $start = rand(1,(strlen($char)-$range));
    $shuffled = str_shuffle($char);
    return substr($shuffled,$start,$range);
}
