<?php 
    
    require_once('../authen.php'); 
//    echo  $_SESSION['AD_ID'];
//     print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | Intern</title>
  <link rel="shortcut icon" type="image/x-icon" href="../../../favicon.ico">

   <!-- bootstrap 5 -->
   <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" >
    <!-- bootstrap4-toggle -->
    <link rel="stylesheet" href="../../../node_modules/bootstrap4-toggle/css/bootstrap4-toggle.min.css">
    <!-- dataTables.bootstrap5 -->
    <link rel="stylesheet" href="../../../node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <!-- responsive.dataTables -->
    <link rel="stylesheet" href="../../../node_modules/datatables.net-responsive/cdn.datatables.net_responsive_2.2.9_css_responsive.dataTables.min.css">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="../../../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../../../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- toast -->
    <link rel="stylesheet" href="../../../node_modules/toastr/toastr.min.css">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/adminlte.min.css">

    <!-- <link href="../../../assets/css/select2.min.css" rel="stylesheet" /> -->
    
    <!-- <link href="../../../assets/fonts/noto-sans-thai.css" rel="stylesheet">
    <link href="../../../assets/fonts/VT323.css" rel="stylesheet"> -->

    <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


    <!-- <link rel="stylesheet" href="../../../assets/css/styles3.css"> -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-datepicker-thai/css/datepicker.css">

  <style>
    .btn-xl {
    padding: 1.25rem 2.5rem;
    }
    .callout a {
    color: #edf2f4;
    text-decoration: none;
        }
      /* body:not(.layout-fixed) .main-sidebar {
    
    min-height: 110%;
   
} */
/* .main-footer{
      margin-left: 0 !important;
    } */
  </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <h1>สวัสดีงับ</h1>

    <div class="row">
        <div class="col-md-8 display">

        </div>
    </div>
                   
    <a href="../logout.php" class="btn btn-danger" role="button">Logout</a>

</div>


<!-- SCRIPTS -->
 <!-- jquery3.6  bootstrap 5 popper-->
 <script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../../node_modules/poper/cdn.jsdelivr.net_npm_@popperjs_core@2.9.2_dist_umd_popper.min.js"></script>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../../assets/js/adminlte.min.js"></script>
<script src="../../assets/js/main.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<script src="../../plugins/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>
<!-- <script src="../../assets/js/pages/dashboard.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<script>
   

   let Username = '<?php echo $_SESSION['Username'];?>';
   let Name = '<?php echo $_SESSION['Name'];?>';
   let Email = '<?php echo $_SESSION['Email'];?>';
   let Detail = '<?php echo $_SESSION['Detail'];?>';
   let Status = '<?php echo $_SESSION['Status'];?>';

   $(`
     <span style="font-size:14px; font-weight:700; color:blue;">Username : ${Username} </span><br>
     <span style="font-size:14px; font-weight:700; color:blue;">ชื่อ : ${Name} </span><br>
     <span style="font-size:14px; font-weight:700; color:blue;">Email : ${Email} </span><br>
     <span style="font-size:14px; font-weight:700; color:blue;">Detail : ${Detail} </span><br>
     <span style="font-size:14px; font-weight:700; color:blue;">Status : ${Status} </span><br>
                                    
    `).appendTo('.display')


</script>

</body>
</html>
