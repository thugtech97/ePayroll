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

  <title>ePayroll - Individual Payslip</title>

  <?php
    include "../assets/assets.php";
  ?>

  <style type="text/css">
    #toPDF {
      padding: 25px;
      border-radius: 5px;
      border-style: solid;
      width: 700px;
      background-color: #ffffff;
    }

    .list-group{
      max-height: 450px;
      margin-bottom: 10px;
      overflow:scroll;
      -webkit-overflow-scrolling: touch;
    }

  </style>
</head>
<body id="page-top">
  
  <?php
    include "../included/nav.php";
  ?>

  <div id="wrapper">
    <?php
      include "../included/sidebar_payslip.php";
    ?>

    <div id="content-wrapper">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">ePayroll</a>
          </li>
          <li class="breadcrumb-item active">Payslip</li>
        </ol>
        <h1><i class="fa fa-edit"></i> Individual Payslip</h1>
        <hr>
      <div class="row">
          <div class="col-md-4">
            <div class="card mb-3">
              <div class="card-header"><i class="fa fa-users"></i> Payrollees&nbsp;&nbsp;&nbsp;<span id="num" class="badge badge-success" style="border-radius: 5px;">0</span>
              </div>
              <div class="card-body">
                <div class="list-group" id="all_emp" style="border-style: double; border-radius: 5px;">
                </div>
              </div>
              <div class="card-footer small text-muted">
                RPM & CoCPAs 
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div id="toPDF">
               <center>
                <p><b>RP MAQUILING & CO. CPAs</b><span></span><br>Corner Sulpicio & Liwayway Sts., Luz Village, Brgy. Bayanihan, Butuan City</p><br>
                <p><b>PAYSLIP</b><span></span><br><?php echo $_SESSION["from"]." - ".$_SESSION["to"]; ?></p>
                <hr>
                <p><span style="float:left;">Employee No: <b><span id="no"></span></b></span><span style="float: right;">Rate: <b><span id="rate"></span></b></span></p><br>
                <p><span style="float:left;">Name: <b><span id="name"></span></b></span><span style="float: right;">Days: <b><span id="days"></span></b></span></p><br>
                <hr>
              </center>
              <p><span style="float:left;">Basic Pay</span><span style="float: right;" id="basic_pay">0</span></p><br>
              <p><span style="float:left;">Legal Holiday</span><span style="float: right;">0</span></p><br>
              <p><span style="float:left;">Regular Overtime Pay</span><span style="float: right;" id="amount_ot">0</span></p><br>
              <p><span style="float:left;">Holiday Overtime Pay</span><span style="float: right;">0</span></p><br>
              <hr>
              <p><span style="float:left;">Total</span><span style="float: right;" id="total">0</span></p><br>
              <p><span style="float:left;">Less undertime</span><span style="float: right;" id="amount">0</span></p><br>
              <hr>
              <p><b><span style="float:left;">GROSS PAY</span></b><b><span style="float: right;" id="gp">0</span></b></p><br>
              <hr>
              <p><span style="float:left;">SSS</span><span style="float: right;" id="sss">0</span></p><br>
              <p><span style="float:left;">Philhealth</span><span style="float: right;" id="philhealth">0</span></p><br>
              <p><span style="float:left;">Pag-IBIG</span><span style="float: right;" id="pag_ibig">0</span></p><br>
              <p><span style="float:left;">Withholding Tax</span><span style="float: right;" id="tax">0</span></p><br>
              <hr>
              <p><b><span style="float:left;">NET PAY</span></b><b><span style="float: right;" id="np">0</span></b></p><br>
              <hr>
              <center><p>Other Deductions</p></center>
              <p><span style="float:left;">SSS Loan</span><span style="float: right;" id="sss_loan">0</span></p><br>
              <p><span style="float:left;">HDMF Loan</span><span style="float: right;" id="hdmf_loan">0</span></p><br>
              <p><span style="float:left;">Cash Advance</span><span style="float: right;" id="ca">0</span></p><br>
              <p><span style="float:left;">MF-Cont.</span><span style="float: right;" id="mf_cont">0</span></p><br>
              <p><span style="float:left;">MF-Loan</span><span style="float: right;" id="mf_loan">0</span></p><br>
              <hr>
              <p><span style="float:left;">Total Deductions</span><span style="float: right;" id="td">0</span></p><br>
              <p><b><span style="float:left;">AMOUNT DUE</span><span style="float: right;" id="nd">0</span></b></p><br>
              <hr>
              <p><b><span style="float:left;">Salary</span><span style="float: right;" id="sal">0</span></b></p><br>
              <p><span style="float:left;">Transpo. & Medical Allowances</span><span style="float: right;" id="tma_group"><span id="tma">0</span><input type="text" id="inptma" style="display: none;"><button id="btntma" onclick="savetma()" style="display: none;">Save</button></span></p>
              <br>
              <p><b><span style="float:left;">TOTAL</span><span style="float: right;" id="tot">0</span></b></p><br>
              <hr>
              <p><span style="float: right;">Received by: <b><span id="rname"></span></b></span></p><br>
            </div>
            <hr>
            <button class="btn btn-md btn-info" style="float: left;" onclick="printPayslip();" id="print" disabled>Print</button>
          </div>
        </div>
      <br>
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

  <script src="../js/payslip/payslip.js"></script>
  <script type="text/javascript">
    load_employee();
  </script>

</body>
</html>