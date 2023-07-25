<head>
  <!-- Header Start -->
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 0px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">ระบบยืม-คืนหนังสือ</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">จัดการยืม-คืน</a></p>
                <!-- <i class="fa fa-circle px-3"></i>
                <p class="m-0">Product</p> -->
            </div>
        </div>
    </div>
    <!-- Header End -->
</head>

<?php  
session_start(); 
$page = 'return';
$_SESSION["id"];?> 
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
         <h2 class="display-5 text-center">จัดการข้อมูลการยืม-คืน</h2>
         <br>

         <form action="return_history.php" method="post"> 
           <div class="container">
            <table id="example" class="table table-hover table-bordered table-light" cellspacing="0" width="100%">
              <thead class="thead-light">
                <tr class="table-active">
                  <th width="5%">ลำดับ</th>
                  <th width="30%">ชื่อหนังสือ</th>
                  <th width="30%">User/ผู้ยืม</th>
                  <th width="10%">ยืมวันที่</th>
                  <th width="10%">กำหนดคืน</th>
                  <th width="10%">ค่าปรับ</th>
                  <th width="5%">สถานะ</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                $book = GetDataLend();
                for ($i=0; $i < count($book) ; $i++) { 
                  $disabled = '';
                  if($book[$i]->status_lend != 0){
                     $disabled = 'disabled';
                  }  
                  
                  ?>
                  <tr>
                    <td><?=$i+1;?></td>
                    <td >
                      <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"  value="<?=$book[$i]->book_id?>" name="detail_id[]" <?=$disabled?> >
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><?=$book[$i]->book_name?></span>
                        <a href="<?=$book[$i]->book_detail != '' ? $book[$i]->book_detail : '#';?>" target="_blank"></a>
                      </label>
                    </td>
                    <td>
                      <input type="hidden" class="custom-control-input"  value="<?=$book[$i]->student_id?>" name="student_id[]" >
                      <?=$book[$i]->student_id." / ".$book[$i]->name." ".$book[$i]->lastname?></td>
                    <td><?=DateThai($book[$i]->lent_date_strat)?></td>
                    <td><?=DateThai($book[$i]->lend_date_end)?></td>
                    <?php
                    $num_day = number_format(DateTimeDiff(date('Y-m-d'),$book[$i]->lend_date_end));
                    ?>
                    <td>
                      <?php 
                      $sum = 0;
                      if($num_day < 0){
                        $sum = str_replace("-","",$num_day) * 5;
                      }if($num_day < 0 && $book[$i]->status_lend != 0){
                        $sum = 0;
                      }
                      echo $sum." บาท";
                      ?>
                      <input type="hidden" name="fine[]" value="<?=$sum?>">  
                      </td>
                      <?php

                     if($sum >  0){
                       $status = 'danger';
                       $text = 'เลยกำหนดส่ง';
                     }else{
                       $status = 'warning';
                       $text = 'ถูกยืม';
                     }

                     if($book[$i]->status_lend != 0){
                       $status = 'success';
                       $sum = 0;
                       $text = 'คืนแล้ว';
                     }
                     ?>
                     <td><h5><span class="badge badge-<?=$status?>">
                      <?php echo $text?>

                    </span></h5>
                  </td>
                </tr>
                <?php } ?>   

              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
              <input type="submit" class="btn btn-success " name="" value="ทำเรื่องการคืน">
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
          $("input[name='detail_id[]']:checked").each(function ()
          {
              checked.push(parseInt($(this).val()));
          });
          
          if(checked.length == 0){
            alert("กรุณาเลือกหนังสือที่ต้องการคืน !");
            return  false;
          }else{
            return  true;
          }
          
      });
  } );
</script>
</body>

</html>
