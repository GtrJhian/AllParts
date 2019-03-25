<!-- @foreach($inventories as $inventory)
											<tr id="trID_{{$inventory->Item_ID}}">
												@if($inventory->Item_Quantity<=$inventory->Alarm_Quantity)
												<td><p style="color:red"><b>{{$inventory->Item_Code}}</b></p></td>
												@else
												<td><p><b>{{$inventory->Item_Code}}</b></p></td>
												@endif
												<td>{{$inventory->Item_Description}}</td>
												<td>
                                                <?php
													//$brand = \DB::table('item_brands')->where('brand_id',$inventory->Item_Brand)->value('brand_name');
													?>
													{{$brand}}
												</td>
												<td>
													<?php
													//$category = \DB::table('item_categories')->where('category_id',$inventory->Item_Category)->value('item_category');
													?>
													{{$category}}
												</td>
												<td><?php
												// if($inventory->Item_Type==0){
												// 	echo "Item";
												// }
												// else{
												// 	echo "Package";
												// }
												?>
											</td>
											<td>{{$inventory->Item_Quantity}} {{$inventory->Item_Unit}}s</td>
											<td>₱{{$inventory->Item_Price}}</td>
											<td>{{$inventory->Alarm_Quantity}} {{$inventory->Item_Unit}}s</td>
											<td>
												<button class="view_btn btn btn-primary btn-action-invt">
													<i class="fa fa-eye"></i>
												</button>
												@if($inventory->Item_Type==0)
												<button class="update_item_btn btn btn-primary btn-action-invt">
													<i class="fa fa-edit"></i>
												</button>
												@else
												<button class="update_pckg_btn btn btn-primary btn-action-invt">
													<i class="fa fa-edit"></i>
												</button>
												@endif
												<button class="archive_btn btn btn-danger btn-action-invt">
													<i class="fa fa-times"></i>
												</button>
											</td></tr>
											@endforeach -->