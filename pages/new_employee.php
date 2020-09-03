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

  <title>ePayroll - New Employee Entry</title>
  <?php
    include "../assets/assets.php";
  ?>
</head>
<body id="page-top">
  
  <?php
    include "../included/nav.php";
  ?>

  <div id="wrapper">
    <?php
      include "../included/sidebar_new_employee.php";
    ?>

    <div id="content-wrapper">

      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">ePayroll</a>
          </li>
          <li class="breadcrumb-item active">New Employee</li>
        </ol>
        <h1><i class="fa fa-user-plus"></i> New Employee Entry</h1>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Records no.:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Biometrics ID:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">First Name:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Middle Initial:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Last Name:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Gender:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Status:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Address:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Department:</label>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Job Title/Position:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Date Hired:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Basic Rate:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Emp Status:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Time Group Sched:</label>
              </div>
            </div>
            <hr>
            <p><center><b>Contribution</b></center></p>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">SSS:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">PhilHealth:</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Pag-Ibig:</label>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <center>
          <button class="btn btn-info btn-md">Add</button>
          <button class="btn btn-success btn-md">Save</button>
          <button class="btn btn-danger btn-md">Clear</button>
        </center>
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

</body>

</html>