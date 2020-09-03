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

  <title>ePayroll - Print Payroll</title>
  <?php
    include "../assets/assets.php";
  ?>

   <style type="text/css">
    #toPDF {
      padding: 10px;
      border-radius: 5px;
      border-style: solid;
      width: 100%;
      background-color: #ffffff;
    }

  </style>

</head>

<body id="page-top">
<?php
	include "../included/nav.php";
?>
  <div id="wrapper">
  	<?php
  		include '../included/sidebar_printpayroll.php';
  	?>

    <div id="content-wrapper">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">ePayroll</a>
          </li>
          <li class="breadcrumb-item active">Print Payroll</li>
        </ol>
        <h1><i class="fa fa-print"></i> Generate Payroll Form</h1>
        <hr>
        <div id="toPDF">
          <div id="print_payroll">
          <center>
            <p style="font-size: 14px;"><b>RP MAQUILING AND CO. CPAs</b><span></span><br>Corner Sulpicio and Liwayway Sts., Luz Village, Brgy. Bayanihan, Butuan City</p><br>
            <p style="font-size: 14px;"><b>PAYROLL</b><span></span><br>Pay Date:<?php echo " ".$_SESSION["paydate"]; ?><br>Pay Coverage:<?php echo " ".$_SESSION["from"]." - ".$_SESSION["to"]; ?></p>
          </center>
            <table id='tbl_payroll' width='100%' border='1' cellspacing='0' cellpadding='0' style='border-collapse:collapse; font-size: 12px;'>
              <thead>
                <tr>
                  <td><center><b>Employee<br>Name</b></center></td>
                  <td><center><b>Rate</b></center></td>
                  <td><center><b>Days</b></center></td>
                  <td><center><b>Basic<br>Pay</b></center></td>
                  <td><center><b>UT</b></center></td>
                  <td><center><b>Amount</b></center></td>

                  <?php
                    if($_SESSION["on_off"] == "true"){
                    ?>
                      <td><center><b>Reg. OT</b></center></td>
                      <td><center><b>Amount</b></center></td>
                  <?php
                    }
                  ?>

                  <td><center><b>Gross<br>Pay</b></center></td>
                  <td><center><b>SSS</b></center></td>
                  <td><center><b>Philhealth</b></center></td>
                  <td><center><b>Pag-IBIG</b></center></td>
                  <td><center><b>Tax</b></center></td>
                  <td><center><b>Net Pay</b></center></td>
                  <td><center><b>HDMF<br>Loan</b></center></td>
                  <td><center><b>SSS<br>Loan</b></center></td>
                  <td><center><b>MF-<br>Cont</b></center></td>
                  <td><center><b>MF-<br>Loan</b></center></td>
                  <td><center><b>CA</b></center></td>
                  <td><center><b>Total<br>Deduction</b></center></td>
                  <td><center><b>Net<br>Due</b></center></td>
                  <td><center><b>Signature</b></center></td>
                </tr>
              </thead>
              <tbody>

              </tbody>
              <tfoot>

              </tfoot>
            </table>
            <br>
            </div>
            <div class="row">
              <div class="col-md-6">

              </div>
              <div class="col-md-3">
                <p style="font-size: 14px;">Noted:</p>
                <p style="font-size: 14px;"><b>CATALINA B. ALCARAZ</b><span><br>Partner - Office Manager</span></p>
              </div>
              <div class="col-md-3">
                <p style="font-size: 14px;">Approved by:</p>
                <p style="font-size: 14px;"><b>RODOLFO P. MAQUILING</b><span><br>Managing Partner</span></p>
              </div>
            </div>
            
        </div>
        <br>
        <button class="btn btn-md btn-info print" style="float: left;" onclick="printPayrollform();">Print</button>&nbsp;
        <button class="btn btn-md btn-info print" onclick="savePayrollform();">Save</button>
        <br>
        <br>
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

  <script src="../js/payroll/all_payroll.js"></script>
  <script type="text/javascript">
    load_payroll();
  </script>

</body>

</html>