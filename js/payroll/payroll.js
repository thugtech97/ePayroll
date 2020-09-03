var row;
var emp_name;

function netPay(){
  var sss = ($("#sss").val()=="") ? 0.00 : parseFloat($("#sss").val());
  var tax = ($("#tax").val()=="") ? 0.00 : parseFloat($("#tax").val());
  var pag_ibig = ($("#pag_ibig").val()=="") ? 0.00 : parseFloat($("#pag_ibig").val());
  var philhealth = ($("#philhealth").val()=="") ? 0.00 : parseFloat($("#philhealth").val());

  var total = sss + tax + pag_ibig + philhealth;
  $("#np").html((parseFloat($("#gp").html()) - total).toFixed(2));
  calculateDeductions();
}

function calculateDeductions(){
  var hdmf_loan = ($("#hdmf_loan").val()=="") ? 0.00 : parseFloat($("#hdmf_loan").val());
  //var tax = ($("#tax").val()=="") ? 0.00 : parseFloat($("#tax").val());
  var sss_loan = ($("#sss_loan").val()=="") ? 0.00 : parseFloat($("#sss_loan").val());
  var mf_cont = ($("#mf_cont").val()=="") ? 0.00 : parseFloat($("#mf_cont").val());
  var mf_loan = ($("#mf_loan").val()=="") ? 0.00 : parseFloat($("#mf_loan").val());
  var ca = ($("#ca").val()=="") ? 0.00 : parseFloat($("#ca").val());

  var totalD = hdmf_loan + sss_loan + mf_cont + mf_loan + ca;
  $("#td").html((totalD).toFixed(2));
  $("#nd").html((parseFloat($("#np").html()) - totalD).toFixed(2));
}

function load_employee(){
  $.ajax({
    type:"POST",
    data: "action=Payroll",
    dataType:"JSON",
    url: "../php/php_load_employee.php",
    success: function(data){
      if(data["emp"]==""){
        sweetAlert("Attendance not found!", "Please upload the attendance log file.", "error");
        $("#all_emp").html("<a class=\"list-group-item names\">No data.</a>");
      }else{
        $("#all_emp").html(data["emp"]);
        $("#num").html(data["num"]);   
      }
    }
  });
}

function save(){
  
  $.ajax({
    type: "POST",
    data: "emp_name="+emp_name+"&days_present="+$("#days_present").val()+"&basic_pay="+$("#basic_pay").val()+"&amount="+$("#amount").val()+"&amount_ot="+$("#amount_ot").val()+"&hdmf_loan="+$("#hdmf_loan").val()+
    "&gp="+$("#gp").html()+"&sss="+$("#sss").val()+"&philhealth="+$("#philhealth").val()+"&pag_ibig="+$("#pag_ibig").val()+"&np="+$("#np").html()+"&tax="+$("#tax").val()+"&sss_loan="+$("#sss_loan").val()+"&mf_cont="+$("#mf_cont").val()+"&mf_loan="+$("#mf_loan").val()+
    "&ca="+$("#ca").val()+"&td="+$("#td").html()+"&nd="+$("#nd").html(),
    url: "../php/php_payroll_session.php",
    success: function(data){
      alertify.success("Saved!");
    }
  });
}

function load_payroll(name){
  emp_name = name;
  $.ajax({
    type: "POST",
    data: "emp_name="+name,
    url: "../php/php_load_payroll.php",
    dataType: "JSON",
    success: function(data){
      $("#full_name").val(data["full_name"]);
      $("#emp_no").val(data["no"]);
      $("#emp_rate").val(data["rate"]);
      $("#days_present").val(data["days_present"]);
      $("#undertime").val(parseFloat(data["undertime"]).toFixed(2));
      $("#overtime").val(parseFloat(data["overtime"]).toFixed(2));

      $("#basic_pay").val((parseFloat($("#emp_rate").val()) * parseFloat($("#days_present").val())).toFixed(2));
      $("#amount").val(((parseFloat($("#emp_rate").val()) / 8) * parseFloat($("#undertime").val())).toFixed(2));
      $("#amount_ot").val(((parseFloat($("#emp_rate").val()) / 8) * parseFloat($("#overtime").val()) * 1.25).toFixed(2));

      $("#gp").html((parseFloat($("#basic_pay").val()) - parseFloat($("#amount").val())).toFixed(2));
      $("#gp").html((parseFloat($("#gp").html()) + parseFloat($("#amount_ot").val())).toFixed(2));

      $("#hdmf_loan").val(data["hdmf_loan"]);
      $("#tax").val(data["tax"]);
      $("#sss_loan").val(data["sss_loan"]);
      $("#mf_cont").val(data["mf_cont"]);
      $("#mf_loan").val(data["mf_loan"]);
      $("#ca").val(data["ca"]);
      
      $("#sss").val(data["sss"]);
      $("#philhealth").val(data["philhealth"]);
      $("#pag_ibig").val(data["pag_ibig"]);
      $("#np").html(data["np"]);

      $("#td").html(data["td"]);
      $("#nd").html(data["nd"]);

      $(".save_payroll").prop("disabled", false);
      netPay();
    }
  });
}

$(document).on("click", ".names", function (e) {
  $('.list-group').find('a').removeClass('active');
  if (!$(this).hasClass('active')){
    $(this).addClass('active');
  }
});

$("#days_present").on("keyup", function(){
  $("#basic_pay").val((parseFloat($("#emp_rate").val()) * parseFloat($("#days_present").val())).toFixed(2));
  $("#amount").val(((parseFloat($("#emp_rate").val()) / 8) * parseFloat($("#undertime").val())).toFixed(2));
  $("#gp").html((parseFloat($("#basic_pay").val()) - parseFloat($("#amount").val())).toFixed(2));
  netPay();
});

$('.inputAmount').on('keyup', function(){
  var val = $(this).val();
  $(this).val("0"); 

  if(isNaN(val)){
    val = val.replace(/[^0-9\.]/g,'');
      if(val.split('.').length>2) 
        val =val.replace(/\.+$/,"");
  }
    $(this).val(val);
    netPay();
});

$('.inputAmounts').on('keyup', function(){
  var val = $(this).val();
  $(this).val("0"); 

  if(isNaN(val)){
    val = val.replace(/[^0-9\.]/g,'');
      if(val.split('.').length>2) 
        val =val.replace(/\.+$/,"");
  }
    $(this).val(val);
    netPay();
});