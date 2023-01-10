					@if(!empty($maindatas['maindata']))
						  @foreach($maindatas['maindata'] as $row)
					<tr class="odd table-row" role="row" data-href="{{ url('/dashboard/viewcustomer/')}}/{{$row->_id}}">
					@if(!empty($maindatas['columns'])) @foreach($maindatas['columns'] as $column)
						@if(isset($column->active) && $column->active==1)
						@php $clm_name=$column->column;  @endphp
							<td class="">		
							@php
							if(isset($row->{$clm_name})){
									if($clm_name=='createdAt'){
										$createdAt=date('d M Y h:i A',strtotime($row->createdAt)); 
										print_r($createdAt); 
									}else if($clm_name=='updatedAt'){
										$updatedAt=date('d M Y h:i A',strtotime($row->updatedAt)); 
										print_r($updatedAt);
									}else{
										print_r($row->{$clm_name}); 
									}
							}
							@endphp
							</td>
						@endif	
					@endforeach	
					@endif
						</tr>                                           
					@endforeach
					@endif