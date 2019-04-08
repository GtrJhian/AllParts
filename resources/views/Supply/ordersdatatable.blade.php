<thead>
	<th>PO No.</th>
	<th>Vendor Name</th>
	<th>PO Date</th>
	<th>Amount</th>
	@if($status == 2)
	<th>Date Delivered</th>
	@endif
	<th style="width: 15%;">Action</th>
</thead>
<tbody>
	@foreach($tableData as $purchase)
	<tr>

		<td>{{$purchase->Order_No}}</td>
		<td>{{$purchase->supplier->Company_Name}}</td>
		<td>{{$purchase->Order_Date}}</td>
		<td>PHP {{$purchase->Amount}}</td>
		@if($status == 2)
		<td>{{$purchase->Order_Delivered}}</td>
		@endif
		<td>
			@if($archive)
			<a id="{{$purchase->Order_No}}" class="editpur_btn btn btn-primary btn-action-invt">  
				<i class="fa fa-eye"></i>
			</a>
			<a href="{{ route('purchasing.restore',['id' => $purchase->Order_No])}}" class="unarchive_btn btn btn-primary btn-action-invt">
				<i class="fa fa-redo"></i>
			</a>
			<a id="{{$purchase->Order_No}}" href="" class="delete_archive_btn btn btn-danger btn-action-invt" onclick="return false;">  
				<i class="fa fa-times"></i>
			</a>
			@elseif($archive != true && $purchase->Order_Status < 2)
			@if($purchase->Order_Status == 0)
			<a href="{{ route('purchasing.approve',['id' => $purchase->Order_No])}}" class="approve_btn btn btn-success btn-action-invt" >  
				<i class="fa fa-check"></i>
			</a>												
			<a id="{{$purchase->Order_No}}" href="" class="editpur_btn btn btn-primary btn-action-invt" onclick="return false;">  
				<i class="fa fa-edit"></i>
			</a>
			@elseif($purchase->Order_Status == 1)
			<a href="{{ route('purchasing.deliver',['id' => $purchase->Order_No])}}" class="deliver_btn btn btn-success btn-action-invt" >  
				<i class="fa fa-check"></i>
			</a>												
			<a id="{{$purchase->Order_No}}" href="" class="editpur_btn btn btn-primary btn-action-invt" onclick="return false;">  
				<i class="fa fa-eye"></i>
			</a>
			@endif

			<!-- <a href="{{ route('purchasing.delete',['id' => $purchase->Order_No])}}" class="archive_btn btn btn-danger btn-action-invt" >  
				<i class="fa fa-times"></i>
			</a> -->
			<a id="{{$purchase->Order_No}}" href="" class="archive_btn btn btn-danger btn-action-invt" onclick="return false;">  
				<i class="fa fa-times"></i>
			</a>
			@elseif($archive != true && $purchase->Order_Status == 2)
			<a id="{{$purchase->Order_No}}" href="" class="editpur_btn btn btn-primary btn-action-invt" onclick="return false;">  
				<i class="fa fa-eye"></i>
			</a>
			<a id="{{$purchase->Order_No}}" href="" class="archive_deli_btn btn btn-danger btn-action-invt" onclick="return false;">  
				<i class="fa fa-times"></i>
			</a>
			@endif
		</td>
	</tr>
	@endforeach

</tbody>
