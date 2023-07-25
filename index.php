<head>
  <!-- Header Start -->
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 0px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">ระบบยืม-คืนหนังสือ</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">หน้าแรก</a></p>
                <!-- <i class="fa fa-circle px-3"></i>
                <p class="m-0">Product</p> -->
            </div>
        </div>
    </div>
    <!-- Header End -->
</head>
<?php 
session_start(); 
$page = 'index';
//unset($_SESSION["status"]);

?> 
<?php 
include "header.php";
include  "fucntion_query.php";
?>

<body>

  <!-- Navigation -->
  <?php include "navbar.php"; ?>
  <!-- Page Content -->

    <div class="jumbotron">

      <div class="row">
         
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
