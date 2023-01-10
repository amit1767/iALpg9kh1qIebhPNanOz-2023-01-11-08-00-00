<?php
namespace App\Http\Controllers\Siteadmin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Session;
class SiteadminController extends ApiController
{
	public function __construct(){
			
		}
	/*********VIEW*******/
	public function view(){
			if(session()->has('LoggedInUserId')){
				/*******
			$results=$this->getapi($UserToken,'ninja/config');
			if($results['status']==1){
				if(empty($results['output']->data->column_customers)){
					$final_array=array(
					array("sort"=> 0,"column"=> "user_code","name"=> "Admin Code","active"=>1),
					array("sort"=> 1,"column"=> "username","name"=> "Username","active"=> 1),
					array("sort"=> 2,"column"=> "first_name","name"=> "First Name","active"=> 1),
					array("sort"=> 3,"column"=> "last_name","name"=> "Last Name","active"=> 1),
					array("sort"=> 4,"column"=> "mobile","name"=> "Mobile","active"=> 1),
					array("sort"=> 5,"column"=> "email","name"=> "Email","active"=> 1),
					array("sort"=> 6,"column"=> "city","name"=> "City","active"=> 1),
					array("sort"=> 7,"column"=> "_id","name"=> "Admin Id","active"=> 1)
					);
					$postarr=array('key'=>'siteadmin_columns','value'=>$final_array);
			        $resultss=$this->patchapi($UserToken,$postarr,'ninja/config');
					$results=$this->getapi($UserToken,'ninja/config');

			$maindatas['columns']=$results['output']->data->column_customers;
				}else{
			$maindatas['columns']=$results['output']->data->column_customers;
				}
			
			}else if($results['status']==0){
				return redirect('/dashboard/siteadmin/')->with('login-error',$results['msg']);
			}else{
				return redirect('/dashboard/siteadmin/')->with('login-error',$results['msg']);
			}
				
			$resultss=$this->getapi($UserToken,"ninja/siteadmin?page=$page&limit=$limit");
			if($resultss['status']==1){	
			$maindatas['maindata']=$resultss['output']->data->data;
			$maindatas['total']=$resultss['output']->data->total;
			$maindatas['limit']=$resultss['output']->data->limit;
			$maindatas['totalPages']=$resultss['output']->data->totalPages;
			$maindatas['page']=$resultss['output']->data->page;
			$maindatas['prevPage']=$resultss['output']->data->prevPage;
			$maindatas['nextPage']=$resultss['output']->data->nextPage;
			**********/	
				
				return view('siteadmin/view');
			}else{
				return redirect()->route('mainpage'); 
			}
	}
	
}