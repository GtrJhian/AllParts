
<?php 
  $dataSale = $receiptPost['dataSale']['0'];
  $dataSaleDetails = $receiptPost['dataSaleDetails']['0'];
?>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
  <title>Billing</title>
  <style>
    /* *{font-family: 'Nunito',sans-serif;}; */
    .form{border: 5px solid black;text-align: center;margin: 0 auto;padding: 10px; padding-bottom: 0px; padding-top: 0 px; width: 900px;}
    input{border: none;border-bottom: 1px solid black;}
    hr{border: 2px dotted black;}
    label{font-weight: bolder;font-family: 'Nunito',sans-serif;}
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
        <img src="{{asset('vendor/img/cor.png')}}" alt="logo" class="rounded mx-auto d-block" height="160px" width="100%">
      </header>
      <br>
      <div class="row">
          <div class="col-xs-8"></div>
          <label>SALES INVOICE</label> <br>
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <label> NO.: </label> 
      <input style="color:red" type="text" size="20" readonly value="{{ $dataSale->sales_invoice_no}}">
        </div>
      <br/>       
      <div class="row" align="left">
        <div class="col-xs-8">
        <label>Sold to: <input type="text" size="65" readonly value="{{ $dataSale->F_Name.' '.$dataSale->L_Name}}"></label>
        </div>
        <div class="col-xs-4" align="left">
        <label>Date: <input type="text" size="27" readonly value="{{ $dataSale->Sale_Date}}"></label>   
        </div>
      </div>
      <div class="row" align="left">
          <div class="col-xs-8">
          <label>  Address: <input type="text" size="64" readonly value="{{ $dataSale->Address}}"></label>
          </div>
          <div class="col-xs-4">
          <label> P.O. No.: <input type="text" size="24" readonly value="{{ $dataSale->Sale_Date}}"></label>
          </div>
      </div>
      <div class="row" align="left">
        <div class="col-xs-4">
        <label> TIN: <input type="text" size="29" readonly value="{{ $dataSale->TIN_no}}"></label>
        </div>
        <div class="col-xs-4" align="left">
        <label>  Bus Style: <input type="text" size="21" readonly></label>
        </div>
        <div class="col-xs-4" >
        <label>  OSCA/PWD ID No.: <input type="text" size="14" readonly value="{{ $dataSale->OSCA_PWD_ID}}"></label>
        </div>
      </div>
      <div class="row" align="left">
        <div class="col-xs-4">
        <label> Terms of Payment: <input type="text" size="16" readonly value="{{ $dataSale->term_of_payment}}"></label>
        </div>
        <div class="col-xs-4" align="left">
        <label>  D.R. No.: <input type="text" size="22" readonly></label>
        </div>
        <div class="col-xs-4">
        <label>  SC/PWD Signature: <input type="text" size="14" readonly></label>
        </div>
      </div>
      <br/><br/>
      <table width="100%" class="table-responsive" align="center" border ="2" style="font-family: 'Nunito',sans-serif;">
        <tr>
          <th class="col-xs-1" style="text-align: center">QUANTITY</th>
          <th class="col-xs-1" style="text-align: center">UNIT </th>
          <th class="col-xs-5" style="text-align: center">ARTICLES</th>
          <th class="col-xs-3" style="text-align: center">UNIT PRICE</th>
          <th class="col-xs-3" style="text-align: center">AMOUNT</th>
        </tr>
        <?php $totalAmount = 0; ?>
        @foreach($receiptPost['dataSaleDetails'] as $post)
          <tr style="text-align: center">
            <td>{{$dataSaleDetails->Quantity}}</td>
            <td>{{$dataSaleDetails->Unit}}</td>
            <td>{{$dataSaleDetails->Item_Description}}</td>
            <td>{{$dataSaleDetails->Unit_Price}}</td>
            <td>{{($dataSaleDetails->Quantity * $dataSaleDetails->Unit_Price)}}</td>
            <?php $totalAmount += ($dataSaleDetails->Quantity * $dataSaleDetails->Unit_Price); ?>
          </tr>
        @endforeach
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
          <td>VATable Sales:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;{{$totalAmount - $totalAmount * ($dataSale->Vat_sales/100)}}</td>
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
          <td>VAT Amount:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;{{ $totalAmount * ($dataSale->Vat_sales/100)}}</td>
          <td>Add VAT:</td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>Total Amount Due:</td>
        <td>&#8369;&nbsp;{{$totalAmount}}</td>
        </tr>
      </table>
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
              <input type="text" size="25" readonly value="Keith Pacio"> 
              <label>Cashier/Authorized Representative</label>
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