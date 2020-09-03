<?php
  session_start();
	if(isset($_SESSION["id"])){
		echo "<script> document.location='dashboard.php'; </script>";
	}
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="../css/sb-admin.css" rel="stylesheet">

  <?php
    require "../assets/assets.php";
  ?>

	<title>ePayroll System - Login</title>

</head>
<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><center><img src="../img/logo_payroll.jpg" height="180" width="170" style="border-style: solid; border-width: 3px; border-radius: 10px;"><h5>ePayroll System</h5></center></div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputUsername" class="form-control" placeholder="Email address" required="required">
              <label for="inputUsername">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('form').on('submit', function(event) {
        $.ajax({
          type:"POST",
          data:"username="+$("#inputUsername").val()+"&password="+$("#inputPassword").val(),
          url:"../php/php_login.php",
          }).done(function(data){
            console.log(data);
            if(data=="1"){
              document.location = "dashboard.php";
            }else{
              swal("Account not found!", "", "error");
            }
          });
          event.preventDefault();
      });
    });
  </script>

</body>
</html>