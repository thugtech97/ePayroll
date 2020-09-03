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

  <title>ePayroll - History</title>

  <?php
    include "../assets/assets.php";
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
  		require '../included/sidebar_history.php';
  	?>

    <div id="content-wrapper">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">ePayroll</a>
          </li>
          <li class="breadcrumb-item active">History</li>
        </ol>
        <h1><i class="fa fa-history"></i> Payroll History</h1>
        <hr>
        <div id="dt_div" class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Payroll Logs</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Payroll No.</th>
                    <th>Pay Date</th>
                    <th>Payroll Coverage</th>
                    <th>Date Added</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require "../php/php_conn.php";
                    $sql = mysqli_query($conn, "SELECT * FROM tbl_history ORDER BY log_number DESC");

                    while($row = mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                      <td><?php echo $row["log_number"]; ?></td>
                      <td><?php echo $row["pay_date"]; ?></td>
                      <td><?php echo $row["pay_coverage"]; ?></td>
                      <td><?php echo $row["date_added"]; ?></td>
                      <td><button class="btn btn-sm btn-info" id="<?php echo $row["log_number"]; ?>" data-toggle="modal" onclick="view_payroll(this.id)"><i class="fa fa-eye"></i> View</button></td>
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
        <div id="myModal" class="modals">
          <!-- Modal content -->
          <div class="modals-content">
            <div class="modals-header">
              <span class="closes">&times;</span>
              <h4>Payroll No. <span id="pnum"></span></h4>
            </div>
            <div class="modals-body" id="payroll_body">
            
            </div>
            <div class="modals-footer">
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

<script type="text/javascript">
  var modal = document.getElementById("myModal");
  var span = document.getElementsByClassName("closes")[0];

  function view_payroll(num){
    $.ajax({
      type: "POST",
      data: "num="+num,
      url: "../php/php_view_payroll.php",
      success: function(data){
        $("#pnum").html(num);
        $("#payroll_body").html(data);
        modal.style.display = "block";
      }
    });
  }

  span.onclick = function() {
    modal.style.display = "none";
  }
  
</script>

</body>

</html>