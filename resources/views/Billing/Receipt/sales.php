<html>
<head>
  <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
  <title>Billing</title>
  <style>
    .form{border: 5px solid black;text-align: center;margin: 0 auto;padding: 10px; padding-bottom: 0px; padding-top: 0 px; width: 900px;}
    input{border: none;border-bottom: 1px solid black;}
    hr{border: 2px dotted black;}
    label{font-weight: bolder;}
    table.details {border-collapse: collapse;width: 100%;text-align: center;}
    table.details td {padding: 8px;text-align: center;border-bottom: 1px solid #ddd;border-left: 20px solid #fff;}
    table.details th {padding: 8px;text-align: center;border-bottom: 10px solid #fff;border-left: 20px solid #fff;}
    table.details th:first-child, table.details td:first-child{border-left:none;}
  </style>
</head>

<body>
  <div class="container">
    <br><br>
    <div class="form">
      <header>
        <img src="cor.png" alt="logo" class="rounded mx-auto d-block" height="160px" width="100%">
      </header>
      <br>
      <div class="row">
          <div class="col-xs-8"></div>
          <label>SALES INVOICE</label> <br>
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <label> NO.: </label> 
        <input style="color:red" type="text" size="20" readonly value="">
        </div>
      <br/>       
      <div class="row" align="left">
        <div class="col-xs-8">
          Sold to: <input type="text" size="65" readonly>
        </div>
        <div class="col-xs-4" align="left">
          Date: <input type="text" size="27" readonly>   
        </div>
      </div>
      <div class="row" align="left">
          <div class="col-xs-8">
            Address: <input type="text" size="64" readonly>
          </div>
          <div class="col-xs-4">
            P.O. No.: <input type="text" size="24" readonly>
          </div>
      </div>
      <div class="row" align="left">
        <div class="col-xs-4">
          TIN: <input type="text" size="29" readonly>
        </div>
        <div class="col-xs-4" align="left">
          Bus Style: <input type="text" size="21" readonly>
        </div>
        <div class="col-xs-4" >
          OSCA/PWD ID No.: <input type="text" size="14" readonly>
        </div>
      </div>
      <div class="row" align="left">
        <div class="col-xs-4">
          Terms of Payment: <input type="text" size="16" readonly>
        </div>
        <div class="col-xs-4" align="left">
          D.R. No.: <input type="text" size="22" readonly>
        </div>
        <div class="col-xs-4">
          SC/PWD Signature: <input type="text" size="14" readonly>
        </div>
      </div>
      <br/><br/>
      <table width="100%" class="table-responsive" align="center" border ="2">
        <tr>
          <th class="col-xs-1">QUANTITY</th>
          <th class="col-xs-1">UNIT </th>
          <th class="col-xs-5">ARTICLES</th>
          <th class="col-xs-3">UNIT PRICE</th>
          <th class="col-xs-3">AMOUNT</th>
        </tr>
        <tr>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
        </tr>
        <tr>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
        </tr>
        <tr>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
        </tr>
        <tr>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>Total Sales (VAT Inclusive):</td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>Less VAT:</td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>VATable Sales:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</td>
          <td>Amount Net of VAT:</td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>VAT Exempt Sales:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</td>
          <td>Less SC/PWD Discount:</td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Zero Rated Sales:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</td>
          <td>Amount Due:</td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>VAT Amount:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</td>
          <td>Add VAT:</td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>Total Amount Due:</td>
          <td>&#8369</td>
        </tr>
      </table>
      <!--
      <div class="row" align="left">
        <div class="col-xs-6"></div>
        <div class="col-xs-6" align="right">
          Total Sales (VAT Inclusive): <input type="text" size="18" readonly>   
        </div>
      </div>
      <div class="row" align="left">
        <div class="col-xs-6"></div>
        <div class="col-xs-6" align="right">
          Less VAT: <input type="text" size="18" readonly>   
        </div>
      </div>
      <div class="row" align="left">
        <div class="col-xs-7" align="right">
          VATable Sales: <input type="text" size="18" readonly>  
        </div>
        <div class="col-xs-5" align="right">
          Amount Net of VAT: <input type="text" size="18" readonly>   
        </div>
      </div>
      <div class="row" align="left">
        <div class="col-xs-7" align="right">
          VAT Exempt Sales: <input type="text" size="18" readonly>  
        </div>
        <div class="col-xs-5" align="right">
          Less SC/PWD Discount: <input type="text" size="18" readonly>   
        </div>
      </div>
      <div class="row" align="left">
        <div class="col-xs-7" align="right">
          Zero Rated Sales: <input type="text" size="18" readonly>  
        </div>
        <div class="col-xs-5" align="right">
          Amount Due: <input type="text" size="18" readonly>   
        </div>
      </div>
      <div class="row" align="left">
        <div class="col-xs-7" align="right">
          VAT Amount: <input type="text" size="18" readonly>  
        </div>
        <div class="col-xs-5" align="right">
          Add VAT: <input type="text" size="18" readonly>   
        </div>
      </div>
      <br>
      <div class="row" align="left">
        <div class="col-xs-6"></div>
        <div class="col-xs-6" align="right">
          <label>TOTAL AMOUNT DUE: <input type="text" size="18" readonly> </label> 
        </div>
      </div>
      <br>
      -->
      <div class="row" align="left">
          <div class="col-xs-8">
            <label style="font-size: 10px; text-align:justify">
                Goods travel at buyer's risk. It is understood that the goods described herein remain the property of ALL PARTS HYDRAULICS 
                INDUSTRIAL CORPORATION until fully paid. All deposits on items not claimed within 30 days from the date of invoice is hereby
                forfeited and stock sold to satisfy its cost without the need of prior approval. Interest at 16% per annum will be charged on
                all overdue amounts plus 25% on said amount for attorney's fees and cost of collection. The parties expressly submit themselves
                to the jurisdiction of the courts of the City of Manila in any legal action arising out of this transaction.</label>
          </div>
          <div class="col-xs-4" align="right">
              <br><br><br><br>
              <label> By: </label>
              <input type="text" size="25" readonly> 
              Cashier/Authorized Representative
          </div>
      </div>
      <br> 
      <div class="row" align="left">
          <div class="col-xs-3"></div>
          <div class="col-xs-7" align="left">
            <br>
           <label style="font-size: 10px"><i><u>
            THIS SALES INVOICE SHALL BE VALID FOR FIVE(5) YEARS FROM THE DATE OF ATP</i></u></label>
          </div>
          <div class="col-xs-2"></div>
      </div> 
      <br>
    </div>
  </div>   
  <br><br><br>
</body>
</html>