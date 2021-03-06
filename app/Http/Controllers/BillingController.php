<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BillingPost;
use App\AccountingPost;
use App\Exports\BillingExport;
use App\Exports\AccountingExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class BillingController extends Controller
{

	function __construct(){
		$this->middleware(['auth','authBillings']);
	}

	public $Acc_ID=1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$dataIndex = DB::table('sale')
							->join('customer','customer.Cus_ID', 'sale.Cus_ID')
							->select('F_Name', 'L_Name', 'Sale_Date', 'Company', 'Address', 'sale.Sale_ID', 'sales_invoice_no', 'debit', 'credit')
							->where('Sale_Archived', '=', '0')
							->get();
			return view('billing.index')->with('indexPost', $dataIndex);
    }
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewBill($id)
    {	
			$dataSale = $this->find($id);
			$dataSaleDetails = $this->findDetails($id);
													
			$dataAccDetails = DB::table('accounting')
												->select('Acc_Date', 'Acc_Payment')
												->where('Sale_ID', $id)
												->get();

			$data = array(
				'dataSale'=>$dataSale,
				'dataSaleDetails' => $dataSaleDetails,
				'dataAccDetails'=>$dataAccDetails
			);										
			return $data;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editBill($id)
    {	
			$dataSaleDetails = $this->findDetails($id);
													
			$dataAccDetails = DB::table('accounting')
												->select('Acc_Date', 'Acc_Payment')
												->where('Sale_ID', $id)
												->get();

			$data = array(
				'dataSaleDetails' => $dataSaleDetails,
				'dataAccDetails'=>$dataAccDetails
			);										
			return $data;
	}
	
	//Custom Methods
	public function find($id){
		$dataFind = DB::table('sale')
									->join('customer', 'customer.Cus_ID', 'sale.Cus_ID')
									->select('Sale_Date', 'sales_invoice_no', 'term_of_payment', 'debit', 'Vat_sales', 'Vat_amount', 'credit', 
														'F_Name', 'L_Name', 'Contact_No', 'Address', 'Company', 'TIN_no', 'OSCA_PWD_ID')
									->where('sale.Sale_ID', '=' ,$id)
									->get();
		return $dataFind;
	}

	public function findDetails($id){
		$dataFindDetails = DB::table('sale_detail')
								->join('inventory', 'inventory.Item_ID', 'sale_detail.Item_ID')
								->select('Quantity', 'Unit', 'Unit_Price', 'Item_Description', 'Item_Code')
								->where('Sale_ID', $id)
								->get();
		return $dataFindDetails;
	}
		
	public function addPayment(Request $request){
		if($request->ajax()){
			$data = array(
				'Sale_ID' => $request->id,
				'Acc_Date' => date("Y/m/d"),
				'Acc_Payment' => $request->payment
			);

			if(!DB::table('accounting')->insert($data)){
				return "Error Saving Payment";
			}else {
				DB::table('sale')
						->where('Sale_ID', '=', $request->id)
						->increment('credit', $request->payment);

				//Save to Logs
				$actionParam = "Add Payment For Sale ID ->".$request->id;
				$this->saveLog($this->Acc_ID, $actionParam);

				$dataAccDetails = DB::table('accounting')
											->select('Acc_Date', 'Acc_Payment')
											->where('Sale_ID', $request->id)
											->get();
				return $dataAccDetails;
			}
		}else return "Error Saving Payment";
	}

	//This part must change because the account ID is static
	function saveLog($id, $action){
		date_default_timezone_set('Asia/Manila');
		
		$data_user_log = array(
			'Acc_ID' => $id,
			'Action' => $action,
			'Date' => date("Y/m/d h:i:sa")
		);
		
		DB::table('user_log')->insert($data_user_log);
	}

		function archiveBill(Request $request){
			if($request->ajax()){
				$saleTable = DB::table('sale')
								->where('Sale_ID', '=', $request->id)
								->update(['Sale_archived' => 1 ]);

				if(!$saleTable) return "Something went wrong";
				else {
					//Save to Logs
					$actionParam = "Archived Sale ID ->".$request->id;
					$this->saveLog($this->Acc_ID, $actionParam);

					return "Success";
				}
			}else return "Something went wrong";
		}

		function receipt($id){

			$dataSale = $this->find($id);
			$dataSaleDetails = $this->findDetails($id);

			$data = array(
				'dataSale'=>$dataSale,
				'dataSaleDetails' => $dataSaleDetails
			);			

			// return $data;
			return view('Billing.Receipt.sales')->with('receiptPost', $data);
		}

		function excel($month, $archived, $reportType){
			$save = false;
			if($reportType == "Billing"){
				if(sizeof(BillingPost::billingQueryAll($month, $archived)->get())>0 && $month=="All"){
					$save = true;
				}else if(sizeof(BillingPost::billingQuery($month, $archived)->get())>0 && $month!="All"){
					$save = true;
				}
			}else if($reportType == "Accounting"){
				if(sizeof(AccountingPost::accountingQueryAll()->get())>0 && $month=="All"){
					$save = true;
				}else if(sizeof(AccountingPost::accountingQuery($month)->get())>0 && $month!="All"){
					$save = true;
				}
			}
			

			if($save==true){
				//Save to Logs
				$actionParam = "Generate Reports ". $reportType ." with Month ->".$month;
				$this->saveLog($this->Acc_ID, $actionParam);
				if($reportType == "Billing") return (new BillingExport($month, $archived))->download('Billing Data.xlsx', \Maatwebsite\Excel\Excel::XLSX);
				if($reportType == "Accounting") return (new AccountingExport($month))->download('Accounting Data.xlsx', \Maatwebsite\Excel\Excel::XLSX);
				
			}else{
				echo "<h1>NO DATA TO GENERATE</h1>";
			}
			
			// echo (sizeof(BillingPost::billingQuery($month, $archived)->get()));
		}

		function viewArchived(){
			$dataArchived = DB::table('sale')
									->join('customer','customer.Cus_ID', 'sale.Cus_ID')
									->select('F_Name', 'L_Name', 'Company', 'Address', 'sale.Sale_ID', 'debit', 'sales_invoice_no', 'credit')
									->where('Sale_Archived', '=', '1')
									->get();

			return $dataArchived;
		}

		function unarchiveBill(Request $request){
			if($request->ajax()){
				$saleTable = DB::table('sale')
								->where('Sale_ID', '=', $request->id)
								->update(['Sale_archived' => 0 ]);
				if(!$saleTable) return "Something went wrong";
				else {	
					//Save to Logs
					$actionParam = "Unarchived Sale ID ->".$request->id;
					$this->saveLog($this->Acc_ID, $actionParam);

					return "Success";
				}
			}else return "Something went wrong";
		}

		function viewAccounting(){
			$dataAccounting = DB::table('accounting')
												->join('sale', 'sale.Sale_ID', 'accounting.Sale_ID')
												->select('TR_Acc', 'sale.Sale_ID', 'sales_invoice_no', 'Acc_Date', 'term_of_payment')
												->get();
			
			return $dataAccounting;
		}
}