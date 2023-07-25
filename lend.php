<head>
  <!-- Header Start -->
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 0px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">ระบบยืม-คืนหนังสือ</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">ค้นหาหนังสือ</a></p>
                <!-- <i class="fa fa-circle px-3"></i>
                <p class="m-0">Product</p> -->
            </div>
        </div>
    </div>
    <!-- Header End -->
</head>

<?php  
session_start();
$page = 'lend';
$txtKeyword = "";
if(isset($_GET['txtKeyword'])){
    $txtKeyword = $_GET['txtKeyword'];
} else {
    $_GET['txtKeyword'] = "";
}
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
        <div class="col-lg-12 ">
         <h2 class="display-5 text-center">รายการหนังสือทั้งหมด</h2>
         <br>

         <form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
         <tr><th><center>ค้นหาหนังสือ : 
            <input name="txtKeyword" type="text" id="txtKeyword" placeholder="ชื่อหนังสือ/หมวดหมู่"value="<?=$_GET["txtKeyword"];?>">
            <input type="submit" value="Search" class="btn btn-secondary"></center></th></form>


         <div class="container">
          <table id="example" class="table table-hover table-bordered table-light" cellspacing="0" width="100%">
            <thead>
              <tr class="table-active">
                <th width="5%">ลำดับ</th>
                <th width="30%">ชื่อหนังสือ</th>
                <th width="20%">ผู้แต่ง</th>
                <th width="20%">หมวดหมู่</th>
                <th width="10%">ปี</th>
                <th width="10%">อัปโหลด</th>
                <th width="5%">สถานะ</th>
              </tr>
            </thead>

            <tbody>
             <?php 
             $book = GetDataBooks();
             $link = '#';
             for ($i=0; $i < count($book) ; $i++) { 
               if($book[$i]->book_status == 'ปกติ'){
                 $status = 'info';
                 $link = "href='admin-page.php?book_id=".$book[$i]->book_id."'";
               }elseif ($book[$i]->book_status == 'ถูกยืม') {
                 $status = 'warning';
               }elseif ($book[$i]->book_status == 'หาย') {
                 $status = 'danger';
               }else {
                 $status = 'secondary';
               }
               if(isset($_SESSION["status"])){
                if($_SESSION["status"] != 0){
                  $link = "href='book_update.php?book_id=".$book[$i]->book_id."'";
                }
              }

              ?>
              <tr>
               <td><?=$i+1;?></td>
               <td>
                <a <?=$link?> >
                  <?php  if(isset($_SESSION["status"])){if($_SESSION["status"] != 0){?>
                  <img width="20" src="./images/pen.png">
                  <?php }}?>
                  <?=$book[$i]->book_name?></a> <a href="<?=$book[$i]->book_detail != '' ? $book[$i]->book_detail : '#';?>" target="_blank"></a>
                </td>
                <td>
                  <?=!empty($book[$i]->book_user) ? str_replace(array("\n\r", "\n","n/g"), '<br/>', $book[$i]->book_user) : ''?>
                </td>
                <td><?=$book[$i]->book_category?></td>
                <td><?=$book[$i]->book_year?></td>
                <td><?=DateThai($book[$i]->book_date)?></td>
                <td><h5><span class="badge badge-<?=$status?>"><?=$book[$i]->book_status?></span></h5></td>
              </tr>
              <?php } ?>   

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.0.0-beta/dt-1.10.16/datatables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
</body>

</html>
