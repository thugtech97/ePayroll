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

  <title>ePayroll - Dashboard</title>
  <?php
    require "../assets/assets.php";
  ?>

</head>

<body id="page-top">
<?php
	require "../included/nav.php";
?>
  <div id="wrapper">
  	<?php
  		require '../included/sidebar_dashboard.php';
  	?>

    <div id="content-wrapper">
<!--
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol>
        <h1>Blank Page</h1>
        <hr>
        <p>This is a great starting point for new custom pages.</p>

      </div>
!-->
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