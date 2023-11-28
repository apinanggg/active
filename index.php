<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/waitme/waitMe.min.css">


</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            
        <div class="btn-group" role="group">
            <button class="btn btn-success btn-md" id="createItem">สมัคร</button>
            <button class="btn btn-primary btn-md" id="loginItem">Login</button>
            
        </div>

        <div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false"  aria-labelledby="formModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header" >
                                                <h5 class="modal-title" id="formModalLabel" style="font-size: 20px; font-weight: 700;"><i class="fa fa-cog fa-spin"></i>&nbsp;สมัคร</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- สร้าง Form Input สำหรับใส่ข้อมูล -->
                                            <form id="formData" autocomplete="off">
                                                <div class="modal-body" style="background-color: #f2f8fb;">
                                                <table width="400" border="1" style="width: 400px">
                                                    <tbody>
                                                    <tr>
                                                        <td width="125"> &nbsp;Username</td>
                                                        <td width="180">
                                                        <input name="txtUsername" type="text" id="txtUsername" size="20" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> &nbsp;Password</td>
                                                        <td><input name="txtPassword" type="password" id="txtPassword" autocomplete="off">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> &nbsp;Confirm Password</td>
                                                        <td><input name="txtConPassword" type="password" id="txtConPassword" autocomplete="off">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;Name</td>
                                                        <td><input name="txtName" type="text" id="txtName" size="35"></td>
                                                    </tr>
                                                    <tr>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;Email</td>
                                                        <td><input name="txtEmail" type="text" id="txtEmail" size="35"></td>
                                                    </tr>
                                                    <tr>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                </div>
                                                <div class="modal-footer" >
                                                    <button type="button" class="btn btn-danger" id="close_re" data-bs-dismiss="modal">ปิด</button>
                                                    <button type="submit" class="btn btn-success" id="submitCreate">ลงทะเบียน</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="formModalLogin" data-bs-backdrop="static" data-bs-keyboard="false"  aria-labelledby="formModalLoginLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" >
                                                <h5 class="modal-title" id="formModalLoginLabel" style="font-size: 20px; font-weight: 700;"><i class="fa fa-cog fa-spin"></i>&nbsp;Login</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- สร้าง Form Input สำหรับใส่ข้อมูล -->
                                            <form id="formLogin" autocomplete="off">
                                                <div class="modal-body" style="background-color: #f2f8fb;">
                                                <table border="1" style="width: 300px">
                                                        <tbody>
                                                        <tr>
                                                            <td> &nbsp;Username</td>
                                                            <td>
                                                            <input name="txtUsernameLogin" type="text" id="txtUsernameLogin">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> &nbsp;Password</td>
                                                            <td><input name="txtPasswordLogin" type="password" id="txtPasswordLogin">
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                                <div class="modal-footer" >
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                                                    <button type="submit" class="btn btn-success">Login</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>


                                 <!-- modal loading-->
                                     <div class="modal fade" id="modal-loading" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-loadingLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                          <div class="modal-content">
                                           <div class="modal-body text-center">
                                            <div class="spinner-border text-primary" role="status"></div>

                                            <div>กำลังดำเนินการ..</div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                     </div>
                 </div>
        </div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
<script src="node_modules/waitme/waitMe.min.js"></script>



<script>

         

            $('#createItem').on('click', function (e) {
                e.preventDefault()

                $('#txtUsername').val('');
                $('#txtPassword').val('');
                
                /** สร้าง Modal สำหรับแสดง Form Create */
                new bootstrap.Modal($('#formModal'), {
                    keyboard: false
                }).show()
            }) 

            $('#formData').on('submit', function (e) {

                e.preventDefault()

               $('#formData').waitMe({
                                        effect : 'timer',
                                        text : 'รอสักครู่....'
                                        })

                
                // $('#modal-loading').modal('show')

                let endpoint = 'save_register.php',
                formData = new FormData(),
                
                serialize = $('#formData').serializeArray()
               
                serialize.forEach( function (item, index) {
                    formData.append(item.name, item.value)
                })
               
                $.ajax({
                    type: 'POST',
                    url: `service/${endpoint}`,
                    data: formData, 
                    processData: false, 
                    contentType: false 
                }).done(function(resp, textStatus, jqXHR){ 
                    
                    Swal.fire({
                        text: resp.message,
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                    }).then(() => {
                        // location.assign('./')
                        $('#modal-loading').modal('hide')
                        location.reload() 
                    })
                }).fail(function(jqXHR, textStatus, errorThrown){ 
                    $('#modal-loading').modal('hide')
                    $('#formData').waitMe("hide");
                    Swal.fire({ 
                        text: jqXHR.responseJSON.message, 
                        icon: 'error', 
                        confirmButtonText: 'ตกลง', 
                    })
                })
            })



            $('#loginItem').on('click', function (e) {
                e.preventDefault()

                $('#txtUsernameLogin').val('');
                $('#txtPasswordLogin').val('');
                
                /** สร้าง Modal สำหรับแสดง Form Create */
                new bootstrap.Modal($('#formModalLogin'), {
                    keyboard: false
                }).show()
            }) 


            $('#formModalLogin').on('submit', function (e) {

                e.preventDefault()

                // $('#modal-loading').modal('show')

               let formData = new FormData(),
                
                serialize = $('#formLogin').serializeArray()
               
                serialize.forEach( function (item, index) {
                    formData.append(item.name, item.value)
                })


                $.ajax({
                    type: 'POST',
                    url: `admin/service/auth/login.php`,
                    data: formData, 
                    processData: false, 
                    contentType: false 
                }).done(function(resp, textStatus, jqXHR){ 
                    
                    Swal.fire({
                        text: resp.message,
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                    }).then(() => {

                        // $('#modal-loading').modal('hide')
                        location.href = 'admin/pages/dashboard/'
                        // location.reload() 
                    })
                }).fail(function(jqXHR, textStatus, errorThrown){ 
                
                    Swal.fire({ 
                        text: jqXHR.responseJSON.message, 
                        icon: 'error', 
                        confirmButtonText: 'ตกลง', 
                    })
                })
                })



            $('#formModal').on('hidden.bs.modal', function (e) {
            $(this)
            .find("input,textarea,select")
            .val('')
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();

})


</script>

    
</body>
</html>

