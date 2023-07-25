<head>
  <!-- Header Start -->
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 0px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">ระบบยืม-คืนหนังสือ</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">ลงทะเบียน</a></p>
                <!-- <i class="fa fa-circle px-3"></i>
                <p class="m-0">Product</p> -->
            </div>
        </div>
    </div>
    <!-- Header End -->
</head>

<?php  
session_start();  
include  "fucntion_query.php";
$page = 'register';

$data = $_REQUEST;

if(isset($data['submit'])){
  $user = insertUser($data);
  if($user >= 1){
     $_SESSION["regis"] = 1;
     header("Location: admin-page.php");
  }
}

?> 
<?php include "header.php" ?>

<body>

  <!-- Navigation -->
  <?php include "navbar.php"; ?>
  <!-- Page Content -->

    <div class="jumbotron">

      <div class="row">
        <div class="col col-lg-3">
        </div>
        <div class="col-lg-6 text-center">
         <h2 class="display-5">เพิ่มสมาชิกใหม่</h2>
         <br>
         <form class="container" id="needs-validation" novalidate method="post">
           <div class="row">
             <div class="col-md-12 mb-3 text-left">
               <label for="validationServer01">ชื่อผู้ใช้</label>
               <input type="text" class="form-control " id="validationServer01" placeholder="username"  required name="username">
               <div class="invalid-feedback">
                 กรุณากรอกชื่อผู้ใช้.
               </div>
             </div>
             <div class="col-md-12 mb-3 text-left">
               <label for="validationServer02">รหัสผ่าน</label>
               <input type="password" class="form-control " id="validationServer02" placeholder="password" required name="password">
               <div class="invalid-feedback">
                 กรุณากรอกรหัสผ่าน.
               </div>
             </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-3 text-left">
               <label for="validationServer03">ชื่อ</label>
               <input type="text" class="form-control " id="validationServer03" placeholder="firstname" required name="name">
               <div class="invalid-feedback">
                 กรุณากรอกชื่อ.
               </div>
             </div>
             <div class="col-md-12 mb-3 text-left">
               <label for="validationServer04">นามสกุล</label>
               <input type="text" class="form-control " id="validationServer04" placeholder="lastname" required 
               name=" lastname">
               <div class="invalid-feedback">
                 กรุณากรอกนามสกุล.
               </div>
             </div>
           </div>

           <button class="btn btn-secondary" type="submit" name="submit">ลงทะเบียน</button>
         </form>

         <script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
                "use strict";
                window.addEventListener("load", function() {
                  var form = document.getElementById("needs-validation");
                  form.addEventListener("submit", function(event) {
                    if (form.checkValidity() == false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add("was-validated");
                  }, false);
                }, false);
              }());
            </script>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

  </html>
