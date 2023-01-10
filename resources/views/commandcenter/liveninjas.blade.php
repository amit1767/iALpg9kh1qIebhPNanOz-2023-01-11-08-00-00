	<ul class="list-inline" id="myUL" >
		 @if(!empty($staffdetails))
			 @foreach($staffdetails as $staff)
		   <li> 
             <div class="live-ninjaas">
			   <div class="live-ninjaas-in">
			    <img src="@if(!empty($staff->avatar->default_path)) {{$staff->avatar->default_path}} @endif" alt="">
			    <p><strong>@if(!empty($staff->cleaner_first_name)) {{$staff->cleaner_first_name.' '.$staff->cleaner_last_name}} @endif </strong> <br> <small>@if(!empty($staff->cleaner_city_name)) {{$staff->cleaner_city_name}} @endif</small> </p>
			   </div>
			   <div class="live-ninja-in-02">
			    <p><span style="color:#EC5F62;"> @if(!empty($staff->assignedCount)) {{$staff->assignedCount}} @endif </span> 
				<span style="color:#57B8EB;"> @if(!empty($staff->stratedCount)) {{$staff->stratedCount}} @endif </span>
				<span style="color:#5CC697;"> @if(!empty($staff->completedCount)) {{$staff->completedCount}} @endif </span>
				</p>
			   </div>
			 </div>
		   </li>
		   @endforeach
		   @endif
		 </ul>