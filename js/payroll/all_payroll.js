function load_payroll(){
  $.ajax({
    url: "../php/php_payroll_form.php",
    dataType: "JSON",
    success: function(data){
      $("table#tbl_payroll tbody").html(data["tbody_rows"]);
      $("table#tbl_payroll tfoot").html(data["tfoot_rows"]);
    }
  });
}

function printPayrollform(){
  var divContents = $("#print_payroll").html(); 
  var a = window.open('', '', 'height=800, width=1500'); 
  a.document.write('<html>'); 
  a.document.write('<body>');
  a.document.write(divContents+'<br>');
  a.document.write('<div class=\"container\" style=\"display: flex; float: right;\">');
  a.document.write('<div>');
  a.document.write('<p style=\"font-size: 14px;\">Noted:</p><p style=\"font-size: 14px;\"><b>CATALINA B. ALCARAZ</b><span><br>Partner - Office Manager</span></p>'+
                      '</div>'+
                      '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
                      '<div>'+
                          '<p style=\"font-size: 14px;\">Approved by:</p><p style=\"font-size: 14px;\"><b>RODOLFO P. MAQUILING</b><span><br>Managing Partner</span></p>'+
                      '</div>'+
                  '</div>');
  a.document.write('</body></html>'); 
  a.document.close(); 
  a.print();
}

function savePayrollform(){
  var contents = $("#print_payroll").html();
  console.log(contents);
  $.ajax({
    type: "POST",
    data: "contents="+contents,
    url: "../php/php_save_payroll.php",
    success: function(data){
      if(data=="1"){
        sweetAlert("Payroll Form successfully added to History!", "", "success");
      }
      if(data=="2"){
        sweetAlert("Payroll Form edited successfully!", "", "success");
      }
      if(data=="0"){
        sweetAlert("Please set the paydate!", "", "warning");
      }
    }
  });
}
