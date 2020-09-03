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
  <?php
    include "../assets/assets.php";
  ?>

  <title>ePayroll - Individual Timesheet</title>

  
  <style type="text/css">
    #toPDF {
      padding: 15px;
      border-style: ridge;
      border-radius: 5px;
      width: 100%;
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
      include "../included/sidebar_payroll.php";
    ?>

    <div id="content-wrapper">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">ePayroll</a>
          </li>
          <li class="breadcrumb-item active">Payroll</li>
        </ol>
        <h1><i class="fa fa-print"></i> Individual Payroll</h1>
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
              <h4><center><b>Employee Information</b></center></h4>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="full_name" class="form-control" disabled>
                      <label for="full_name">Full Name</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="emp_no" class="form-control" disabled>
                      <label for="emp_no">Employee No.</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="emp_rate" class="form-control" disabled>
                      <label for="emp_rate">Rate</label>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <h4><center><b>Payroll Information</b></center></h4>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="days_present" class="form-control">
                      <label for="days_present">Days Present</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="basic_pay" class="form-control" disabled>
                      <label for="basic_pay">Basic Pay</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="undertime" class="form-control" disabled>
                      <label for="undertime">Undertime</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="amount" class="form-control" disabled>
                      <label for="amount">Amount</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  
                </div>
                <div class="col-md-3">
                
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="overtime" class="form-control" disabled>
                      <label for="undertime">Reg. Overtime</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="amount_ot" class="form-control" disabled>
                      <label for="amount">Amount</label>
                    </div>
                  </div>
                </div>
              </div>
              <p><b><center>Gross Pay: ₱<span id="gp">0.00</span></center></b></p>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="sss" class="form-control inputAmounts">
                      <label for="hdmf_loan">SSS</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="philhealth" class="form-control inputAmounts">
                      <label for="tax">Philhealth</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="pag_ibig" class="form-control inputAmounts">
                      <label for="sss_loan">Pag-IBIG</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="tax" class="form-control inputAmounts">
                      <label for="hdmf_loan">Tax</label>
                    </div>
                  </div>
                </div>
              </div>
              <p><b><center>Net Pay: ₱<span id="np">0.00</span></center></b></p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="hdmf_loan" class="form-control inputAmount">
                      <label for="tax">HDMF Loan</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="sss_loan" class="form-control inputAmount">
                      <label for="sss_loan">SSS Loan</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="mf_cont" class="form-control inputAmount">
                      <label for="mf_cont">MF-Cont</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="mf_loan" class="form-control inputAmount">
                      <label for="mf_loan">MF-Loan</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="ca" class="form-control inputAmount">
                      <label for="ca">CA</label>
                    </div>
                  </div>
                </div>
              </div>
              <p><b><span style="float: left;">Total Deduction: ₱</span><span id="td">0.00</span><span style="float: right;">Net Due: ₱<span id="nd">0.00</span> </span></b></p>
            </div>
            <hr>
            <button class="btn btn-md btn-info save_payroll" onclick="save();" disabled>Save</button>
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

  
  <script src="../js/payroll/payroll.js"></script>
  <script type="text/javascript">
    load_employee();
  </script>

</body>

</html>