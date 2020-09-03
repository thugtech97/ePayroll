<?php
  session_start();
  if(!isset($_SESSION["id"])) {
    echo "<script> document.location='index.php'; </script>";
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ePayroll - Leave Credits</title>
  <?php
    require "../assets/assets.php";
  ?>
  <link rel="stylesheet" href="../css/payroll-style.css">
  <link rel="stylesheet" href="../rmdp/css/popelt.css">
  <script src="../rmdp/source/popelt-v1.0-source.js"></script>

</head>

<body id="page-top">
<?php
	require "../included/nav.php";
?>
  <div id="wrapper">
  	<?php
  		require '../included/sidebar_leavecredits.php';
  	?>

    <div id="content-wrapper">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">ePayroll</a>
          </li>
          <li class="breadcrumb-item active">Leave Credits</li>
        </ol>
        <h1><i class="fa fa-sign-out-alt"></i> Leave Credits</h1>
        <hr>
        <div id="dt_div" class="card mb-3">
          <div class="card-header">
            <i class="fas fa-users"></i>
            Employees</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Employee No.</th>
                    <th>Employee Fullname</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require "../php/php_conn.php";
                    $sql = mysqli_query($conn, "SELECT e.no, e.fname, e.mi, e.lname, l.sick_leave, l.vacation_leave FROM tbl_employee AS e, tbl_leave_credits AS l WHERE e.no = l.no");

                    while($row = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                      <td><?php echo $row["no"]; ?></td>
                      <td><?php echo utf8_encode($row["lname"].", ".$row["fname"]." ".($row["mi"] != "" ? $row["mi"]."." : "")); ?></td>
                      <td><center><button class="btn btn-sm btn-info" id="<?php echo $row["sick_leave"].",".$row["vacation_leave"].",".$row["no"]; ?>" data-toggle="modal" onclick="view_leave_credits(this.id)"><i class="fa fa-tasks"></i> Manage Leave</button></center></td>
                    </tr>

                    <?php
                    }
                    ?>

                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">RPM and Co. CPAs @ <?php echo date("Y");?></div>
        </div>
        <div id="manage_leave_credits" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4><i class="fa fa-sign-out-alt"></i> Leave Credits</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <p id="emp_no" style="display: none;"></p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Sick Leave:</label>
                      <input id="sick_leave" class="form-control colorful" type="number" value="1" min="1" max="10" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Vacation Leave:</label>
                      <input id="vacation_leave" class="form-control colorful" type="number" value="1" min="1" max="10" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-info" onclick="set_leave_credits();">Save</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

      </div>
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website <?php echo date("Y");?></span>
          </div>
        </div>
      </footer>

    </div>

  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../js/bootstrap-number-input.js" ></script>
  <script>
  // Remember set you events before call bootstrapSwitch or they will fire after bootstrapSwitch's events
  $("[name='checkbox2']").change(function() {
    if(!confirm('Do you wanna cancel me!')) {
      this.checked = true;
    }
  });

  $('#after').bootstrapNumber();
  $('.colorful').bootstrapNumber({
    upClass: 'success',
    downClass: 'danger'
  });

  function view_leave_credits(lc){
    var sv = lc.split(",");
    $("#manage_leave_credits").modal();
    $("#sick_leave").val(sv[0]);
    $("#vacation_leave").val(sv[1]);
    $("#emp_no").html(sv[2]);
  }

  function set_leave_credits(){
    $.ajax({
      type: "POST",
      data: "emp_no="+$("#emp_no").html()+"&sick_leave="+$("#sick_leave").val()+"&vacation_leave="+$("#vacation_leave").val(),
      url: "../php/php_leave_credits.php",
      success: function(data){
        window.location.reload();
      }
    });
  }
  </script>

</body>

</html>