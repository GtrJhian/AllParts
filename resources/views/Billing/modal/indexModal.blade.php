<!-- Modal Excel-->
<div id="modal-wrapper-index" class="modal container">
  <div class="modal-content animate">
    <span onclick="document.getElementById('modal-wrapper-index').style.display = 'none'" class="close" title="Close PopUp">&times;</span>
    <form action="" method="post">
      <div align="center">
        <h3>Input Password</h3>
        <input class="form-control" style="width:90%" required type="password" id="password" required name="password" placeholder="User Password">
        <h3>Select files to download:</h3>           
        <select id="select" name="file" class="btn btn-primary dropdown-toggle" required data-toggle="dropdown">
					<option value="">Choose Form</option>
          <option value="excel_petty">Petty Cash</option>
          <option value="excel_ca">Cash Advance</option>
          <option value="excel_cal">Cash Advance Liquidation</option>
          <option value="excel_trans">Cash Transmital</option>
        </select>
        <input class="btn btn-success" type="submit" value="Download" name="excel">
      </div>
    </form> 
  </div>           
</div>
<!-- End Modal -->