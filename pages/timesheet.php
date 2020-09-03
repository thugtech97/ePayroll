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
  <link href="../bootstrap4c-custom-switch-master/dist/css/component-custom-switch.css" rel="stylesheet">
  <title>ePayroll - Individual Timesheet</title>

  
  <style type="text/css">
    #toPDF {
      padding: 25px;
      border-radius: 5px;
      border-style: solid;
      width: 700px;
      background-color: #ffffff;
    }

    #tbl_emp_logs tbody tr.highlight td {
      background-color: #ccc;
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
      include "../included/sidebar_timesheets.php";
    ?>

    <div id="content-wrapper">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">ePayroll</a>
          </li>
          <li class="breadcrumb-item active">Timesheets</li>
        </ol>
        <h1><i class="fa fa-edit"></i> Individual Timesheet</h1>
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
              <div style="float: right;" class="custom-switch custom-switch-label-onoff custom-switch-md pl-0">
                <input class="custom-switch-input" id="check_ot" type="checkbox">
                <label class="custom-switch-btn" for="check_ot"></label>
              </div>
              <br><br>
              <hr>
              <div id="cont_dtr">
                <center>
                  <p style="font-size: 11.8px;"><b>RP MAQUILING & CO. CPAs</b><span></span><br>Corner Sulpicio & Liwayway Sts., Luz Village, Brgy. Bayanihan, Butuan City</p>
                  <p style="font-size: 11.8px;"><b>TIMESHEET</b><span></span><br><?php echo $_SESSION["from"]." - ".$_SESSION["to"]; ?></p>
                </center>
                <p style="font-size: 11.8px;"><b>Employee: <span id="emp"></span></b></p>
                  <table id='tbl_emp_logs' width='100%' border='1' cellspacing='0' cellpadding='0' style='border-collapse:collapse; font-size: 11px;'>
                    <thead>
                      <tr>
                        <td><center><b>Date</b></center></td>
                        <td><center><b>In 1</b></center></td>
                        <td><center><b>Out 1</b></center></td>
                        <td><center><b>In 2</b></center></td>
                        <td><center><b>Out 2</b></center></td>
                        <td><center><b>UT</b></center></td>
                        <td><center><b>OT</b></center></td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      /*
                        if(isset($_SESSION["from_N"])){
                          $f = explode("-", $_SESSION["from_N"]);
                          $t = explode("-", $_SESSION["to_N"]);

                          $Date1 = $f[2].'-'.$f[1].'-'.$f[0]; 
                          $Date2 = $t[2].'-'.$t[1].'-'.$t[0];

                          $array = array(); 

                          $Variable1 = strtotime($Date1); 
                          $Variable2 = strtotime($Date2); 
                            
                          for ($currentDate = $Variable1; $currentDate <= $Variable2;  $currentDate += (86400)) {
                          $Store = date('Y-m-d', $currentDate); 
                          $array[] = $Store; 

                          }

                          foreach ($array as $key) {
                            //echo $key."<br>"; 
                          }
                        }
                        */
                      ?>
                    </tbody>
                    <tfoot>
                      
                    </tfoot>
                  </table>
                <p style="font-size: 11.8px;"><b>Days Present: <span id="days_present">0</span><span style="float: right;">Days Absent: 0.00</span></b></p>
                <p style="font-size: 11.8px;"><b>Remaining Leave Credits: <span style="float: right;">Vacation Leave: <span id="vl"></span> <br>Sick Leave: <span id="sl"></span></span></b></p><br>
                <p style="font-size: 11.8px;"><b>Undertime: <span id="tutdec">0.00</span> <span style="float: right;">Overtime: <span id="totdec">0.00</span></span></b></p><br>
                <center>
                  <p style="font-size: 11.8px;">Certified true and correct:</p>
                  <p style="font-size: 11.8px;"><b>_______________________________________________</b><span><br>Signature over printed name</span></p><br>
                  <p style="font-size: 11.8px;">Noted:</p>
                  <p style="font-size: 11.8px;"><b>CATALINA B. ALCARAZ</b><span><br>Managing Partner</span></p>
                </center>
              </div>
            </div>
            <hr>
            <button class="btn btn-md btn-info print" style="float: left;" onclick="printTimesheet();" disabled>Print</button>
          </div>
        </div>
      <br>

      <div id="edit_time" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4>Edit Time (<span id="date_log"></span>)</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="time_in_1" class="form-control">
                  <label for="inputAmount">Time In (1)</label>
                </div><br>
                <div class="form-label-group">
                  <input type="text" id="time_out_1" class="form-control">
                  <label for="inputDateCollected">Time Out (1)</label>
                </div><br>
                <div class="form-label-group">
                  <input type="text" id="time_in_2" class="form-control">
                  <label for="inputDatePaid">Time In (2)</label>
                </div><br>
                <div class="form-label-group">
                  <input type="text" id="time_out_2" class="form-control">
                  <label for="inputCollector">Time Out (2)</label>
                </div><br>
              </div>
              <p><b>Undertime: </b><span id="ut">0:00</span> <span style="float:right;"><b>Overtime: </b><span id="ot">0:00</span></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_edit" class="btn btn-info">Edit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

  
  <script src="../js/timesheet/timesheet.js"></script>
  <script type="text/javascript">
    load_employee();
  </script>

  <?php
    if($_SESSION["on_off"] == "true"){
    ?>
      <script>
        $(function(){
          console.log("ot checked");
          $("#check_ot").prop("checked", true).trigger("change");
        });
      </script>
  <?php
    }
  ?>

</body>

</html>