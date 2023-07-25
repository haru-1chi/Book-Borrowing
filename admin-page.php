<head>
  <!-- Header Start -->
  <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 0px;">
    <div class="container text-center py-5">
      <h1 class="text-white display-3 mt-lg-5">ระบบยืม-คืนหนังสือ</h1>
      <div class="d-inline-flex align-items-center text-white">
        <p class="m-0"><a class="text-white" href="">เข้าสู่ระบบ</a></p>
        <!-- <i class="fa fa-circle px-3"></i>
                <p class="m-0">Product</p> -->
      </div>
    </div>
  </div>
  <!-- Header End -->
</head>

<?php
session_start();
include "fucntion_query.php";

$page = 'admin';
$data = $_REQUEST;

if (isset($data['submit'])) {
  $login = checkLogin($data['username'], $data['password']);

  if (!is_null($login)) {
    $user = getUser($login->user_id);
    if ($user->status == 0) {
      //user
      $_SESSION["book_id"] = $data['book_id'];
      $_SESSION["status"] = $user->status;
      $_SESSION["id"] = $user->user_id;
      header("Location: manage-lend.php");
    } else {
      //admin
      $_SESSION["status"] = $user->status;
      $_SESSION["id"] = $user->user_id;
      header("Location: manage-lend-admin.php");
    }
  } else {
    $_SESSION["check"] = 0;
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
        <h2 class="display-5">เข้าสู่ระบบ</h2>
        <br>
        <?php if (isset($_SESSION["check"])) {
          unset($_SESSION["check"]) ?>
          <div class="alert alert-danger" role="alert">
            Username และ Password ไม่ถูกต้อง!
          </div>
        <?php } ?>
        <?php if (isset($_SESSION["regis"])) {
          unset($_SESSION["regis"]) ?>
          <div class="alert alert-success" role="alert">
            ลงทะเบียนสำเร็จ!
          </div>
        <?php } ?>


        <form class="container" id="needs-validation" novalidate method="post">
          <div class="row">
            <div class="col col-lg-3">
            </div>
            <div class="col-md-6 mb-3 text-left">
              <label for="validationServer01">ชื่อผู้ใช้</label>
              <input type="hidden" value="<?= @$_GET['book_id'] ?>" name="book_id">
              <input type="text" class="form-control" id="validationServer01" placeholder="username" name="username"
                required>
              <div class="invalid-feedback">
                กรุณากรอกชื่อผู้ใช้.
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-lg-3">
            </div>
            <div class="col-md-6 mb-3 text-left">
              <label for="validationServer02">รหัสผ่าน</label>
              <input type="password" class="form-control " id="validationServer02" placeholder="password"
                name="password" required>
              <div class="invalid-feedback">
                กรุณากรอกรหัสผ่าน.
              </div>
            </div>
          </div>

          <button class="btn btn-secondary" type="submit" name="submit">LogIn</button>
        </form>

        <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function () {
            "use strict";
            window.addEventListener("load", function () {
              var form = document.getElementById("needs-validation");
              form.addEventListener("submit", function (event) {
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
  <script type="text/javascript">
    $(document).ready(function () {
      $(".alert").fadeIn().delay(2000).fadeOut(1000, function () { $(this).remove(); });
    });
  </script>

</body>

</html>