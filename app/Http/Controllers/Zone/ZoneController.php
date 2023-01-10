<?php
namespace App\Http\Controllers\Zone;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\ApiController; 
use Illuminate\Http\Request;
use Session;
class ZoneController extends ApiController
{
    public function __construct(){
			
    }

    /*********ZONES*******/
    public function zones($page=0){
        if(session()->has('LoggedInUserId')){
            $UserToken= Session::get('token');
            if($page>0){
                $page=$page-1;
            }
            $limit=10;
            $maindatas=array();

        $results=$this->getapi($UserToken,'ninja/config');
        if($results['status']==1){
            if(empty($results['output']->data->column_orders)){
                $final_array=array(
                array("sort"=> 0,"column"=> "order_id","name"=> "Order Id","active"=>1),
                array("sort"=> 1,"column"=> "customer_name","name"=> "Customer Name","active"=> 1),
                array("sort"=> 2,"column"=> "plate_number","name"=> "Plate Number","active"=> 1),
                array("sort"=> 3,"column"=> "manufacturer","name"=> "Manufacturer","active"=> 1),
                array("sort"=> 4,"column"=> "category","name"=> "Category","active"=> 1),
                array("sort"=> 5,"column"=> "services","name"=> "Services","active"=> 1),
                array("sort"=> 6,"column"=> "status","name"=> "Status","active"=> 1),
                array("sort"=> 7,"column"=> "customer_id","name"=> "Customer Id","active"=> 1),

                array("sort"=> 8,"column"=> "payment_status","name"=> "Payment status","active"=> 0),
                array("sort"=> 9,"column"=> "payment_method","name"=> "Payment method","active"=> 0),
                array("sort"=> 10,"column"=> "cleaner_username","name"=> "Cleaner username","active"=> 0),
                array("sort"=> 11,"column"=> "cleaner_email","name"=> "Cleaner email","active"=> 0),
                array("sort"=> 12,"column"=> "cleaner_first_name","name"=> "Cleaner first name","active"=> 0),
                array("sort"=> 13,"column"=> "cleaner_last_name","name"=> "Cleaner last name","active"=> 0),
                array("sort"=> 14,"column"=> "cleaner_last_name","name"=> "Cleaner last name","active"=> 0),
                array("sort"=> 15,"column"=> "phone","name"=> "cleaner Phone","active"=> 0),
                
                );
                $postarr=array('key'=>'column_orders','value'=>$final_array);
                // $resultss=$this->patchapi($UserToken,$postarr,'ninja/config');
                // $results=$this->getapi($UserToken,'ninja/config');

        // $maindatas['columns']=$results['output']->data->column_orders;  
            }else{
                
        // $maindatas['columns']=$results['output']->data->column_orders;
            }
        
        }else if($results['status']==0){
            return redirect('/dashboard')->with('login-error',$results['msg']);
        }else{
            return redirect('/dashboard')->with('login-error',$results['msg']);
        }
            
        $resultss=$this->getapi($UserToken,"ninja/buckets?page=$page&limit=$limit");
        if($resultss['status']==1){	
        
        $maindatas['maindata']=$resultss['output']->data->data;
        $maindatas['total']=$resultss['output']->data->total;
        $maindatas['limit']=$limit;
        $maindatas['totalPages']='';
        $maindatas['page']=$page;
        $maindatas['prevPage']='';
        $maindatas['nextPage']='';
        
        return view('zone.view',compact('maindatas'));
        }else if($resultss['status']==0){
            return redirect('/dashboard')->with('login-error',$resultss['msg']);
        }else{
            return redirect('/dashboard')->with('login-error',$resultss['msg']);
        }	
        
        }else{
            return redirect()->route('mainpage'); 
        }
    }
/******************************/
/*********-UPDATE-COLUMN-SETTING-*******/
public function updatecolumnsetting(Request $request){
        if(session()->has('LoggedInUserId')){
            $UserToken= Session::get('token');
            $column_setting = $request->column_setting;
            $column_name = $request->column_name;
            $column_title = $request->column_title;
            $column_checked = $request->column_checked;
            $new_array=array();
            $final_array=array();
            $i=0;

            foreach($column_name as $cn){
                $new_array['sort']=$i;
                $new_array['column']=$column_title[$i];
                $new_array['name']=$cn;
                $new_array['active']=$column_checked[$i];
                $final_array[]=$new_array;
                $i++;
            }
            $data=array('key'=>'column_orders','value'=>$final_array);
            // $results=$this->patchapi($UserToken,$data,'ninja/co
            if($results['status']==1)
            {
                return redirect('dashboard/zones')->with('success_msg',$results['msg']);
            }
            else
            {
                return redirect('dashboard/zones')->with('error_msg',$results['msg']);
            }
                
        }else{
            return redirect('/dashboard')->with('login-error',"Please login");  
        }
    }

/********************************/
/*********** SEARCH *************/

    public function zonesearch(Request $request){
        if(session()->has('LoggedInUserId')){
            $UserToken= Session::get('token');
            $search_order = $request->search_order;
            // $results = $this->getapi($UserToken,"ninja/buckets");	
        }else{
                return redirect('/dashboard')->with('login-error',"Please login");  
        }
    }

/********************************/
/*********** polygon *************/

    public function polygon(){
        if(session()->has('LoggedInUserId')){
            $UserToken= Session::get('token');
            $results = $this->getapi($UserToken,"ninja/polygons");
            if($results['status']==1){	
                $polygon=$results['output']->data;	
                return view('zone.polygon',compact('polygon'));
            }

        }else{
            return redirect('/dashboard')->with('login-error',"Please login");  
        }
    }


}




?>