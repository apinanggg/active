<?php

header('Content-Type: application/json');
require_once '../../../service/connect.class.php';
require_once '../../../service/response.class.php';
require_once '../../../service/helper.class.php';
// require_once '../connect.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){

    // print_r($_POST);
    
    $params_check = array(
        'Username' => $_POST['txtUsernameLogin']
    );

    $login_check = DB::query('SELECT * FROM member WHERE Username = :Username', $params_check);

    if(!$login_check){
        return Response::error('Username/Password ไม่ถูกต้อง', 405);
        exit;
    }
    $Password_input = $_POST['txtPasswordLogin'];
    $password_true = $login_check[0]['Password'];

    if($Password_input == $password_true){

        if($login_check[0]['Active'] == 'Yes'){
            
            $_SESSION['UserID'] = $login_check[0]['UserID'];
            $_SESSION['Username'] = $login_check[0]['Username'];
            $_SESSION['Name'] = $login_check[0]['Name'];
            $_SESSION['Email'] = $login_check[0]['Email'];
            $_SESSION['Detail'] = $login_check[0]['detail'];
            $_SESSION['Status'] = $login_check[0]['Status'];
            $_SESSION['Active'] = $login_check[0]['Active'];
            $_SESSION['login_time'] = time();
    
            return Response::success($login_check, 'login success', 200);
        
        }else{
            return Response::error('ท่านยังไม่ได้ยืนยันตัวตน', 405);
        }
    }else{
        return Response::error('Username/Password ไม่ถูกต้อง', 405);
    }
}else{
    return Response::error('Failed to request', 405);
}

   /**
     * FETCH_OBJ
     * $row->username
     * 
     * FETCH_ASSOC
     * $row['username']
     */