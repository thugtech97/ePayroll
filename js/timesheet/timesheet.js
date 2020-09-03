
var row;
var e = "";
var newut;

function saveToSession(tut, tutdec, totdec, tbody, tfoot){
  $.ajax({
    data: "emp_name="+e+"&tut="+tut+"&tutdec="+tutdec+"&totdec="+totdec+"&tbody="+tbody+"&tfoot="+tfoot,
    type: "POST",
    url: "../php/php_timesheet_session.php",
    success: function(data){
      
    }
  });
}

function toTime(info) {
  var hrs = parseInt(Number(info));
  var min = Math.round((Number(info)-hrs) * 60);
  return (hrs < 10 ? '0'+hrs : hrs)+':'+(min < 10 ? '0'+min : min);
}

function toDecimal(time){
  var x = time.split(":");
  var result = ((parseInt(x[1]) / 60).toFixed(2)).toString();
  var fr = parseFloat(x[0] +"."+(result.split("."))[1]) - 0.00;
  return fr;
}

function calculate(){
  var table = $("table#tbl_emp_logs tbody");
  var sum = 0;
  table.find('tr').each(function (i) {
    var $tds = $(this).find('td #val');
    var ut = $tds.eq(5).text();
    if(ut==" "){
      
    }else{
      var x = ut.split(":");
      var result = (parseInt(x[0]) * 60) + parseInt(x[1]);
      sum+=result;
    }
  });
  var hours = (sum / 60);
  var rhours = Math.floor(hours);
  var minutes = (hours - rhours) * 60;
  var rminutes = Math.round(minutes);
  $("#tut").html((rhours < 10 ? '0'+rhours : rhours)+":"+(rminutes < 10 ? '0'+rminutes : rminutes));
  var fr = toDecimal($("#tut").html());
  $("#tutdec").html((fr < 0) ? "0.00" : fr.toFixed(2));
  var chk_ot = $('#check_ot').is(':checked');
  if(chk_ot){
    compute_ot();
  }else{
    saveToSession($("#tut").html(), $("#tutdec").html(), $("#totdec").html(), $("table#tbl_emp_logs tbody").html(), $("table#tbl_emp_logs tfoot").html());
  }
}

function compute_ot(){
  var table = $("table#tbl_emp_logs tbody");
  var tot_all = 0.00;
  table.find('tr').each(function (i) {
    var $tds = $(this).find('td #val');
    var t1 = $tds.eq(1).text();
    var t2 = $tds.eq(2).text();
    var t3 = $tds.eq(3).text();
    var t4 = $tds.eq(4).text();
    
    if(t1!=" " && t2!=" " && t3!=" " && t4!=" "){
       var tot = 0.00;
       var arr_t1 = ((t1.split(" "))[0]).split(":");
       var arr_t2 = ((t2.split(" "))[0]).split(":");
       var arr_t3 = ((t3.split(" "))[0]).split(":");
       var arr_t4 = ((t4.split(" "))[0]).split(":");

       if(toDecimal((t1.split(" "))[0]) >= 8.00){
        if(toDecimal((t2.split(" "))[0]) <= 12.00){
          tot+= toDecimal((t2.split(" "))[0]) - toDecimal((t1.split(" "))[0]); 
        }else{
          tot+= 12.00 - toDecimal((t1.split(" "))[0]); 
        } 
       }else{
        if(toDecimal((t2.split(" "))[0]) <= 12.00){
          tot+= toDecimal((t2.split(" "))[0]) - 8.00; 
        }else{
          tot+= 12.00 - 8.00; 
        }
       }

       if(parseInt(arr_t3[0]) >= 1 && parseInt(arr_t3[0]) != 12){
        tot+= toDecimal((t4.split(" "))[0]) - toDecimal((t3.split(" "))[0]); 
       }else{
        tot+= toDecimal((t4.split(" "))[0]) - 1.00;
       }

       tot = (tot > 8.00 ? (tot - 8.00) : 0.00);
       tot_all+=tot;
       $tds.eq(6).html(toTime(tot.toFixed(2)));
       tot = 0.00;

    }else{
      $tds.eq(6).html("");
    }
  });
  $("#tot").html(toTime(tot_all.toFixed(2)));
  $("#totdec").html(tot_all.toFixed(2));
  saveToSession($("#tut").html(), $("#tutdec").html(), $("#totdec").html(), $("table#tbl_emp_logs tbody").html(), $("table#tbl_emp_logs tfoot").html());
}

function off_ot(){
  var table = $("table#tbl_emp_logs tbody");
  table.find('tr').each(function (i) {
    var $tds = $(this).find('td #val');
    $tds.eq(6).html("");
  });
  $("#tot").html("");
  $("#totdec").html("0.00");
  saveToSession($("#tut").html(), $("#tutdec").html(), $("#totdec").html(), $("table#tbl_emp_logs tbody").html(), $("table#tbl_emp_logs tfoot").html());
}

function modify(t1, t2, t3, t4, r){
  $.ajax({
    data: "t1="+t1[0]+"&t2="+t2[0]+"&t3="+t3[0]+"&t4="+t4[0],
    type: "POST",
    url: "../php/php_modify.php",
    success: function(data){
      r.find('td #val:eq(5)').html(data);
      calculate();
    }
  });
}

function load_employee(){
  $.ajax({
    type:"POST",
    data: "action=Timesheet",
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

function printTimesheet() { 
  var divContents = $("#cont_dtr").html(); 
  var a = window.open('', '', 'height=800, width=1500'); 
  a.document.write('<html>'); 
  a.document.write('<body><center>');
  a.document.write('<table><tr>');
  a.document.write('<td style=\"padding: 15px;\">'+divContents+'</td>'); 
  a.document.write('<td style=\"padding: 15px;\">'+divContents+'</td>');
  a.document.write('<td style=\"padding: 15px;\">'+divContents+'</td>');
  a.document.write('</tr></table>');
  a.document.write('</center></body></html>'); 
  a.document.close(); 
  a.print();
} 

function load_dtr(emp_name) {
  e = emp_name;
  $.ajax({
    type: "POST",
    dataType: "JSON",
    data: "emp_name="+emp_name,
    url: "../php/php_generate_dtr.php",
  }).done(function(data){
    if(data=="0"){
      alert("not found");
    }else{
      $(".print").prop("disabled", false);
      $("table#tbl_emp_logs tbody").html(data["table"]);
      $("table#tbl_emp_logs tfoot").html(data["tfoot"]);
      $("#days_present").html(data["present"]);
      $("#emp").html(data["full_name"]);
      $("#tutdec").html(data["tutdec"]);
      $("#sl").html(data["sl"]);
      $("#vl").html(data["vl"]);
    }
    var chk_ot = $('#check_ot').is(':checked');
    if(chk_ot){
      compute_ot();
    }else{
      off_ot();
    }

  });
}

$('#tbl_emp_logs').on('click', 'tbody tr', function(event) {
  row = $(this);
  var columns = $(this).find('td #val');
  var values = [];

  $.each(columns, function(i, item) {
    if(item.innerHTML==" "){
      values.push(" ");
    }else{
      values.push(item.innerHTML);  
    }
    
  });

  $("#edit_time").modal();
  $("#date_log").html((values[0])==" " ? "" : values[0]);
  $("#time_in_1").val((values[1])==" " ? "" : values[1]);
  $("#time_out_1").val((values[2])==" " ? "" : values[2]);
  $("#time_in_2").val((values[3])==" " ? "" : values[3]);
  $("#time_out_2").val((values[4])==" " ? "" : values[4]);
  $("#ut").html((values[5])==" " ? "" : values[5]);

});

$("#btn_edit").click(function(){
  $('#edit_time').modal('toggle');
  row.find('td #val:eq(1)').html($("#time_in_1").val() == "" ? " " : $("#time_in_1").val());
  row.find('td #val:eq(2)').html($("#time_out_1").val() == "" ? " " : $("#time_out_1").val());
  row.find('td #val:eq(3)').html($("#time_in_2").val() == "" ? " " : $("#time_in_2").val());
  row.find('td #val:eq(4)').html($("#time_out_2").val() == "" ? " " : $("#time_out_2").val());
  modify($("#time_in_1").val().split(" "), $("#time_out_1").val().split(" "), $("#time_in_2").val().split(" "), $("#time_out_2").val().split(" "), row);
  alertify.success("Time edited!");

});
$(document).on("click", ".names", function (e) {
  $('.list-group').find('a').removeClass('active');
  if (!$(this).hasClass('active')){
    $(this).addClass('active');
  }
});

$('#check_ot').change(function(){
  var chk = this.checked;
  if(chk == true){
    console.log('on');
    if(e!=""){
      compute_ot();
    }
  }else{
    console.log('off');
    off_ot();
  }

  $.ajax({
    type: "POST",
    data: "chk="+chk,
    url: "../php/php_chk_ot.php",
    success: function(data){
      if(data=="1"){
        alertify.success("Overtime Pay calculated!");
      }else{
        alertify.error("Overtime Pay not calculated!");
      }
    }
  });
});   