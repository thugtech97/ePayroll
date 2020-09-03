var count = 0;
var sal, tma;

function load_employee(){
  $.ajax({
    type:"POST",
    data: "action=Payslip",
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

function calculateTotal(){
  $("#tot").html((sal + tma).toLocaleString());
}

function printPayslip(){
  var divContents = $("#toPDF").html(); 
  var a = window.open('', '', 'height=800, width=1500'); 
  a.document.write('<html>'); 
  a.document.write('<body>');
  a.document.write('<center><table><tr>');
  a.document.write('<td style=\"padding: 10px; font-size: 10px;\">'+divContents+'</td>'); 
  a.document.write('<td style=\"padding: 10px; font-size: 10px;\">'+divContents+'</td>');
  a.document.write('<td style=\"padding: 10px; font-size: 10px;\">'+divContents+'</td>');
  a.document.write('</tr></table></center>');
  a.document.write('</body></html>'); 
  a.document.close(); 
  a.print();
}

function load_payslip(name){
  $.ajax({
    type: "POST",
    data: "emp_name="+name,
    url: "../php/php_load_payslip.php",
    dataType: "JSON",
    success: function(data){
      $("#print").prop("disabled", false);

      $("#name").html(data["full_name"]);
      $("#no").html(data["no"]);
      $("#rate").html(data["rate"]);
      $("#days").html(data["days_present"]);
      $("#basic_pay").html(parseFloat(data["basic_pay"]).toLocaleString());
      $("#amount_ot").html(parseFloat(data["amount_ot"]).toLocaleString());
      $("#total").html((parseFloat(data["basic_pay"]) + parseFloat(data["amount_ot"])).toLocaleString());

      $("#amount").html(parseFloat(data["amount"]).toLocaleString());
      $("#gp").html(parseFloat(data["gp"]).toLocaleString());
      
      $("#tax").html((data["tax"] == "") ? 0.00 : parseFloat(data["tax"]).toLocaleString());
      $("#philhealth").html((data["philhealth"] == "") ? 0.00 : parseFloat(data["philhealth"]).toLocaleString());
      $("#sss").html((data["sss"] == "") ? 0.00 : parseFloat(data["sss"]).toLocaleString());
      $("#pag_ibig").html((data["pag_ibig"] == "") ? 0.00 : parseFloat(data["pag_ibig"]).toLocaleString());
      $("#np").html(parseFloat(data["np"]).toLocaleString());

      $("#hdmf_loan").html((data["hdmf_loan"] == "") ? 0.00 : parseFloat(data["hdmf_loan"]).toLocaleString());
      $("#sss_loan").html((data["sss_loan"] == "") ? 0.00 : parseFloat(data["sss_loan"]).toLocaleString());
      $("#mf_cont").html((data["mf_cont"] == "") ? 0.00 : parseFloat(data["mf_cont"]).toLocaleString());
      $("#mf_loan").html((data["mf_loan"] == "") ? 0.00 : parseFloat(data["mf_loan"]).toLocaleString());
      $("#ca").html((data["ca"] == "") ? 0.00 : parseFloat(data["ca"]).toLocaleString());
      
      $("#td").html(parseFloat(data["td"]).toLocaleString());
      $("#nd").html(parseFloat(data["nd"]).toLocaleString());

      $("#sal").html(parseFloat(data["nd"]).toLocaleString());

      sal = parseFloat(data["nd"]);
      tma = parseFloat($("#tma").html());
      calculateTotal();

      $("#rname").html(data["full_name"]);

    }
  });
}

$(document).on("click", ".names", function (e) {
  $('.list-group').find('a').removeClass('active');
  if (!$(this).hasClass('active')){
    $(this).addClass('active');
  }
});

function savetma(){
  tma = ($("#inptma").val()=="") ? 0.00 : parseFloat($("#inptma").val());
  $("#tma").html(parseFloat($("#inptma").val()).toLocaleString());
  $("#inptma").hide();
  $("#btntma").hide();
  $("#tma").show();
  count = 0;
  calculateTotal();
}

$("#tma").click(function(){
  count++;
  if(count==1){
    var v = $("#tma").html();
    $("#tma").hide();
    $("#inptma").show().val(v);
    $("#btntma").show();
  }else{

  }
});