<head>
  <!-- Header Start -->
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 0px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">ระบบยืม-คืนหนังสือ</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">ยืมหนังสือ</a></p>
                <!-- <i class="fa fa-circle px-3"></i>
                <p class="m-0">Product</p> -->
            </div>
        </div>
    </div>
    <!-- Header End -->
</head>

<?php  
session_start(); 
$page = 'lend';?> 
<?php 
include "header.php";
include  "fucntion_query.php";
?>

<body>

  <!-- Navigation -->
  <?php include "navbar.php"; ?>
  <!-- Page Content -->

    <nav  aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?="Welcome ".$user->name." ".$user->lastname?></li>
      </ol>
    </nav>

    <div class="jumbotron">       
      <div class="row">
        <div class="col-lg-12 ">
         <h2 class="display-5 text-center">รายการหนังสือทั้งหมด</h2>
         <br>

         <form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
         <tr><th><center>ค้นหาหนังสือ :
            <input name="txtKeyword" type="text" id="txtKeyword" value="<?=$_GET["txtKeyword"];?>">
            <input type="submit" value="Search" class="btn btn-secondary"></center></th></form>

         <form action="save_history.php" method="post"> 
           <div class="container">
            <table id="example" class="table table-hover table-bordered table-light" cellspacing="0" width="100%">
              <thead >
                <tr class="table-active">
                  <th width="5%">ลำดับ</th>
                  <th width="30%">ชื่อหนังสือ</th>
                  <th width="20%">ผู้แต่ง</th>
                  <th width="20%">สำนักพิมพ์</th>
                  <th width="10%">ปี</th>
                  <th width="10%">อัปโหลด</th>
                  <th width="5%">สถานะ</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                $book = GetDataBooks();
                for ($i=0; $i < count($book) ; $i++) { 
                  $disabled = '';
                  if($book[$i]->book_status == 'ปกติ'){
                    $status = 'info';
                  }elseif ($book[$i]->book_status == 'ถูกยืม') {
                    $status = 'warning';
                    $disabled = 'disabled';
                  }elseif ($book[$i]->book_status == 'หาย') {
                    $status = 'danger';
                    $disabled = 'disabled';
                  }else {
                    $status = 'secondary';
                    $disabled = 'disabled';
                  }
                  $checked ='';
                  if($_SESSION["book_id"] == $book[$i]->book_id){
                     $checked = 'checked';
                  }
                  ?>
                  <tr>
                    <td><?=$i+1;?></td>
                    <td >
                      <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"  value="<?=$book[$i]->book_id?>" name="book_id[]" <?=$disabled?> <?=$checked?>>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><?=$book[$i]->book_name?></span>
                        <a href="<?=$book[$i]->book_detail != '' ? $book[$i]->book_detail : '#';?>" target="_blank"></a>
                      </label>
                    </td>
                    <td><?=$book[$i]->book_user?></td>
                    <td><?=$book[$i]->book_category?></td>
                    <td><?=$book[$i]->book_year?></td>
                    <td><?=DateThai($book[$i]->book_date)?></td>
                    <td><h5><span class="badge badge-<?=$status?>"><?=$book[$i]->book_status?></span></h5></td>
                  </tr>
                  <?php } ?>   

                </tbody>
              </table>
            </div>

            <div class="row">
              <div class="col-lg-5"></div>
              <div class="col-lg-7">
                <input type="submit" class="btn btn-success " name="submit" id="submit" value="ยืม">
              </div>
            </div>
          </form>

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
      $('#example').DataTable({
        paging: false
      });

      $("form").submit(function(){
          
          var checked = []
          $("input[name='book_id[]']:checked").each(function ()
          {
              checked.push(parseInt($(this).val()));
          });
          
          if(checked.length == 0){
            alert("กรุณาเลือกหนังสือที่ต้องการยืม!");
            return  false;
          }else{
            alert("ทำการยืมเรียบร้อย!");
            return  true;
          }
          
      });
    } );
  </script>
</body>

</html>
