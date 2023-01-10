

<div class="col-lg-12 col-md-12">
  <div class="common_search_box_1">
        <input class="form-control" id="availableninja_search" onkeyup="availableNinja()" type="search" placeholder="&#xf002; Search Ninja" aria-label="Search">
        <!-- <img class="search_icon_img" src="{{asset('public/assets/image/search_icon.png')}}" alt=""> -->
</div>
<form action="{{ route('assign_task') }}" method="post" name="assign_task" id="assign_task" class="available_ninja_form" >
    {{ csrf_field() }}
<div class="assigne-ninja-box-modal">
  <div class="table-responsive mt-3">
   <div id="example_wrapper" class="dataTables_wrapper">
     <div id="assignninjaaa_wrapper" class="dataTables_wrapper no-footer">
       <table id="assignninjaaa" class="display dataTable no-footer" role="grid" aria-describedby="example_info">
        <thead>
         <tr role="row">
         <th class="sorting_desc sorting_disabled" tabindex="0" aria-controls="assignninjaaa" rowspan="1" colspan="1" aria-label="Ninja: activate to sort column ascending" aria-sort="descending" style="width: 53.1406px;">Ninja</th>
         <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 215.844px;">Details</th>
         <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 156.672px;">Action</th>
         </tr>
        </thead>
      <tbody>

      @if(!empty($ninjadetails))
            @foreach($ninjadetails as $ninja) 
                @if($ninja->cleaner_available==1)
        <input type="hidden" value="{{ $bucket_id }}" name="bucket_id" >
       <tr class="even" role="row">
         <td class="sorting_1">
          <input name="cleaner_id" value="@if(!empty($ninja->id)) {{ $ninja->id }} @endif" type="radio" data-id="39" id="view_ninja_info-39" class="marker-link view_ninja_info-39">
         
          <img src="@if(!empty($ninja->avatar->default_path)) {{$ninja->avatar->default_path}} @endif " alt="" class="ninja_img green-border">
         </td>
         <td>
            <p>@if(!empty($ninja->cleaner_first_name)){{$ninja->cleaner_first_name}}@endif @if(!empty($ninja->cleaner_last_name)){{$ninja->cleaner_last_name}}@endif</p>
             <p><strong class="#23BAF0-text"> Ninja </strong> <i class="fa fa-star active"></i> @if(!empty($ninja->ratings->avg)) {{  number_format($ninja->ratings->avg,2)}} @endif</p>
            <p> @if(!empty($ninja->cleaner_city_name)) {{$ninja->cleaner_city_name}} @endif </p>
         </td>
         <td>
            <p class="#7ED385-text"> <strong> Available </strong>  </p>
            <p> Reach Time: <strong> 30 min </strong> </p>
            <p> Distance: <strong> 15 min </strong> </p>
         </td>
       </tr>				
                @endif		
            @endforeach
       @endif

     </tbody>
     
   </table>
  </div>
  </div>
 </div>
 
 <div class="fixed-bottom-buttonn">
   <button href="#"  class="btn btn-danger light" type="button" class="close" data-bs-dismiss="modal"> CANCEL  </a>
   <button type="submit" class="assign_task_modal_btn"> Assign Task </button>
  </div>
</div>
</form>
</div>

<!--  -->

