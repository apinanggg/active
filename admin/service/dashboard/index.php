<?php

header('Content-Type: application/json');
require_once '../../../service/connect.class.php';
require_once '../../../service/response.class.php';

if($_SERVER['REQUEST_METHOD'] === "GET") {
    
    
    // $open = DB::query('SELECT * FROM open WHERE status_close = "true"');
    $company = DB::query('SELECT COUNT(*) as count FROM survey');
    $admin = DB::query('SELECT COUNT(*) as count FROM admin');
    $student = DB::query('SELECT COUNT(survey_id) as count FROM student WHERE status = "true"');
    $student_all = DB::query('SELECT COUNT(survey_id) as count FROM student');

    /** เก็บข้อมูล survey และ student เข้าสู่ array */
    $response = array(
        'company' => $company,
        'student' => $student,
        'student_all' => $student_all,
        'admin' => $admin
    );
    
    return Response::success($response, 'success');
} else {
    
    return Response::error('Method Not Allowed!', 405);
}

