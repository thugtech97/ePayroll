
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard.php">ePayroll System</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <input style="display: none;" type="file" name="file_upload" id="file_upload" class="file" multiple>
    </form>
      <ul class="navbar-nav ml-auto ml-md-0">
        
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Transaction</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="browse dropdown-item"><i class="fa fa-upload"></i> Upload Attendance Log(s)</a>
            <div class="dropdown-divider"></div>
            <a class="truncate dropdown-item"><i class="fa fa-trash"></i> Truncate Existing Log(s)</a>
          </div>
        </li>

        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Settings</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#"><i class="fa fa-users"></i> Schedule Group</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fa fa-calendar"></i> Holiday Maintenance</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="leave_credits.php"><i class="fa fa-sign-out-alt"></i> Employee Leave</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Utilities</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item set"><i class="fa fa-calendar"></i> Set Payroll Date</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fa fa-file-import"></i> Import Employee From Granding</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Purge Dbase</a>
          </div>
        </li>
      </ul>
      <?php
        require "modal_payrolldate.php";
        require "modal_loader.php";  
      ?>
  </nav>
  <script type="text/javascript">
      function set_payroll_date(){
        if($("#date_from").val()=="" || $("#date_to").val()=="" || $("#date_pay").val()==""){
          sweetAlert("Please fill all!", "", "error");
        }else{
          $.ajax({
            type: "POST",
            url: "../php/php_payroll_date.php",
            data: "date_from="+$("#date_from").val()+"&date_to="+$("#date_to").val()+"&date_pay="+$("#date_pay").val(),
            success: function(data){
              $("#set_payroll_date .close").click();
              alertify.success("Payroll Date is now set.")
            }
          });
        }
      }

      $(document).on('click', '.browse', function(){
        var file = $(".file");
        file.trigger('click');
      });

      $(document).on('click', '.set', function(){
        $("#set_payroll_date").modal();
      });

      $(document).on('click', '.truncate', function(){
        $.ajax({
          url:"../php/php_truncate.php",
          success: function(data){
            if(data=="1"){
              sweetAlert("Attendance logs deleted!", "", "success");
            }else{
              sweetAlert("Attendance logs already deleted!", "", "warning");
            }
          }
        });
      });

      $(document).on('change', '.file', function(){
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
          prepareUpload(event);
      });

      function prepareUpload(event){
        files = event.target.files;
        uploadFiles(event);
      }

      function uploadFiles(event) {
        event.stopPropagation();
        event.preventDefault();
        var data = new FormData();
        $.each(files, function(key, value){
          data.append(key, value);
        });
        console.log(data);
        $('#modal_loader').modal('show');
        $.ajax({
          url: '../php/php_upload.php?files&deptId=11111',
          type: 'POST',
          data: data,
          cache: false,
          dataType: 'JSON',
          processData: false,
          contentType: false,
          success: function(data, textStatus, jqXHR){
            if(typeof data.error === 'undefined'){
              sweetAlert("Attendance logs uploaded!", "You can now set the payroll date (Go to Utilities->Set Payroll Date)", "success");
            }else{
              sweetAlert("Attendance logs already uploaded!", "", "warning");
            }
          },
          error: function(jqXHR, textStatus, errorThrown){
            sweetAlert("Attendance logs uploaded!", "You can now set the payroll date (Go to Utilities->Set Payroll Date)", "success");
          },
          complete: function(){
              $('#modal_loader').modal('hide');
          }
        });
      }

</script>