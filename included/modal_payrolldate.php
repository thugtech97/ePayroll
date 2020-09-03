  <div id="set_payroll_date" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4>Set Payroll Date</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <center><p><b>FROM</b></p></center>
              <input type="date" id="date_from" class="form-control">
            </div>
            <div class="col-md-6">
              <center><p><b>TO</b></p></center>
              <input type="date" id="date_to" class="form-control">
            </div>
          </div>
          <center><br><p><b>PAY DATE</b></p></center>
            <input type="date" id="date_pay" class="form-control">
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-info" onclick="set_payroll_date();">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>