                        <h5 class="atten_sh_caption"> @if(!empty($fromDate)){{date('M d',strtotime($fromDate))}}@if(date('Y',strtotime($fromDate)) != date('Y',strtotime($toDate))),{{date('Y',strtotime($fromDate))}}@endif @endif - @if(date('M',strtotime($fromDate)) == date('M',strtotime($toDate))){{date('d',strtotime($toDate))}}@else{{date('M d',strtotime($toDate))}}@endif,{{date('Y',strtotime($toDate))}} </h5>
		  			
						  		<!-- Dubai,  Jumairah zone week days-->
						  		<table class="table table-responsive table-bordered">
								 	<thead>
								 		<tr>
								 			<th scope="col" rowspan="2" class="attendance_placezone"> @if(!empty($ZoneList->name)) {{$ZoneList->name}} @endif @if(!empty($cityList->name)) {{$cityList->name}} @endif @if(empty($ZoneList->name) && empty($cityList->name) && empty($keyword)) All Ninja @endif </th>
								 			<th colspan="24" class="text-center"> @if(!empty($fromDate)){{date('M d',strtotime($fromDate))}}@if(date('Y',strtotime($fromDate)) != date('Y',strtotime($toDate))),{{date('Y',strtotime($fromDate))}}@endif @endif - @if(date('M',strtotime($fromDate)) == date('M',strtotime($toDate))){{date('d',strtotime($toDate))}}@else{{date('M d',strtotime($toDate))}}@endif,{{date('Y',strtotime($toDate))}} </th>
								 		</tr>
									    <tr>

									@foreach($week_d as $d_week) 
										@if(($d_week >= $fromDate) && ($d_week <= $toDate))
										  <th scope="col" colspan=""> {{date('l',strtotime($d_week))}} </th>
										@endif
									@endforeach

									    </tr>
								  	</thead>
								  	<tbody>
								@if(!empty($ninja_attendance))
									@foreach($ninja_attendance as $ninja)
									    <tr>
									      <td scope="row" class="attendance_user_cell" ><img src="@if(!empty($ninja->cleaner_avatar->default_path)){{$ninja->cleaner_avatar->default_path}}@endif" alt="" class="img-fluid"><span>@if(!empty($ninja->name)) {{$ninja->name}} @endif</span></td>								
									     
									@if(!empty($ninja->attendance))
									
										@php $ninja_cleaner=array(); $att_detail=array(); @endphp
									   
									   	@foreach($ninja->attendance as $attendance)
										 	@php $ninja_cleaner[]=$attendance->date; 
										 	$att_detail[$attendance->date]=$attendance; @endphp 
									 	@endforeach
						 
									 	@foreach($week_d as $d_week) 
										 @if(($d_week >= $fromDate) && ($d_week <= $toDate)) 
									  	 @if(in_array($d_week,$ninja_cleaner))

									  		@php $attendance=$att_detail[$d_week]; @endphp
											 
										   	<td class="@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==0) atten_sh_color_cell atten_sh_P_caribbean_green @endif @endif
												   @if(isset($attendance->is_present) && $attendance->is_present==false) @if(isset($attendance->absent_type) && $attendance->absent_type==0) atten_sh_color_cell atten_sh_A_pastel_red @endif @endif
												   @if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==1) @if(isset($attendance->absent_type) && $attendance->absent_type==1) atten_sh_color_cell atten_sh_H_salmon_pink @endif @endif @endif" 
											 	id="ninja-attendance" data-date="@if(!empty($attendance->date)){{$attendance->date}}@endif" data-cleaner_name="@if(!empty($ninja->name)){{$ninja->name}}@endif" data-cleaner_id="@if(!empty($ninja->id)){{$ninja->id}}@endif" 
											 	data-city_name="@if(!empty($attendance->zone_cluster[0]->cities[0]->name)){{$attendance->zone_cluster[0]->cities[0]->name}}@endif" data-city_id="@if(!empty($attendance->zone_cluster[0]->cities[0]->_id)){{$attendance->zone_cluster[0]->cities[0]->_id}}@endif"
											 	data-zone_id="@if(!empty($attendance->zone_cluster[0]->_id)){{$attendance->zone_cluster[0]->_id}}@endif" data-cleaner_pic="@if(!empty($ninja->cleaner_avatar->default_path)){{$ninja->cleaner_avatar->default_path}}@endif" data-zone_name="@if(!empty($attendance->zone_cluster[0]->name)){{$attendance->zone_cluster[0]->name}}@endif" 
                                                data-absent_reason="@if(!empty($attendance->absent_reason)){{$attendance->absent_reason}}@endif" data-approve_by="@if(!empty($attendance->approve_by)){{$attendance->approve_by}}@endif"
                                                data-halfDay-f="@if(!empty($attendance->halfDay[0]->from)){{$attendance->halfDay[0]->from}}@endif" data-halfDay-t="@if(!empty($attendance->halfDay[0]->to)){{$attendance->halfDay[0]->to}}@endif"
												data-present="@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==0) P @endif @endif" data-absent_fullday="@if(isset($attendance->is_present) && $attendance->is_present==false) @if(isset($attendance->absent_type) && $attendance->absent_type==0) A @endif @endif"
												data-absent_halfday="@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==1) @if(isset($attendance->absent_type) && $attendance->absent_type==1) H @endif @endif @endif" data-comment="@if(!empty($attendance->comment)){{$attendance->comment}}@endif"
												data-celldate="@if(!empty($attendance->date)){{date('d-m-Y',strtotime($attendance->date))}}@endif" data-today_date="{{date('Ymd')}}" data-is_active="1" data-bs-toggle="modal" data-bs-target="#exampleModal" >    
										 	  	
											   	@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==0) P @endif @endif
											   	@if(isset($attendance->is_present) && $attendance->is_present==false) @if(isset($attendance->absent_type) && $attendance->absent_type==0) A @endif @endif
												@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==1) @if(isset($attendance->absent_type) && $attendance->absent_type==1) H @endif @endif @endif
										  	</td>
											
									   	@else
										   
										   <td id="ninja-attendance" data-date="{{$d_week}}" data-cleaner_name="@if(!empty($ninja->name)){{$ninja->name}}@endif" data-cleaner_id="@if(!empty($ninja->id)){{$ninja->id}}@endif" data-city_name="" data-city_id=""
												data-zone_id="" data-today_date="{{date('Ymd')}}" data-default_zone_id="@if(!empty($ninja->default_zone_id)){{$ninja->default_zone_id}}@endif" data-cleaner_pic="@if(!empty($ninja->cleaner_avatar->default_path)){{$ninja->cleaner_avatar->default_path}}@endif" 
												data-celldate="{{date('d-m-Y',strtotime($d_week))}}" data-is_active="1" data-zone_name="" data-bs-toggle="modal" data-bs-target="#exampleModal" >    
										   
										   </td>
										   
									   @endif
									   @endif
									   @endforeach
										
									@else
										@foreach($week_d as $d_week)
										  @if(($d_week >= $fromDate) && ($d_week <= $toDate))  
											<td id="ninja-attendance" data-date="{{$d_week}}" data-cleaner_name="@if(!empty($ninja->name)){{$ninja->name}}@endif" data-cleaner_id="@if(!empty($ninja->id)){{$ninja->id}}@endif" data-city_name="" data-city_id=""
												data-zone_id="" data-today_date="{{date('Ymd')}}" data-default_zone_id="@if(!empty($ninja->default_zone_id)){{$ninja->default_zone_id}}@endif" data-cleaner_pic="@if(!empty($ninja->cleaner_avatar->default_path)){{$ninja->cleaner_avatar->default_path}}@endif" 
												data-celldate="{{date('d-m-Y',strtotime($d_week))}}" data-is_active="1" data-zone_name="" data-bs-toggle="modal" data-bs-target="#exampleModal" >    
										  
											</td>
										  @endif
										@endforeach
									@endif

									    </tr>
									@endforeach
								@endif
											    					  
								  	</tbody>
								</table>
						  		<!-- close -->
							