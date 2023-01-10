<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
		
    }

//--- Helper Functions

    public function dateformat($date,$format){
        return date($format,strtotime($date));
    }

    public function dateRange($fromDate,$toDate,$format){
        $dates = array();
        $fdate = strtotime($fromDate);
        $ldate = strtotime($toDate);
  		while($fdate <= $ldate ){
    		$dates[] = date($format,$fdate);
    		$fdate = strtotime('+1 day', $fdate);
  		}
        return $dates;
    }

    public function currentWeek(){
        $week_d=array();
		$week_d['sunday']=date('Ymd',strtotime('sunday last week'));
		$week_d['monday']=date('Ymd',strtotime('monday this week'));
		$week_d['tuesday']=date('Ymd',strtotime('tuesday this week'));
		$week_d['wednesday']=date('Ymd',strtotime('wednesday this week'));
		$week_d['thursday']=date('Ymd',strtotime('thursday this week'));
		$week_d['friday']=date('Ymd',strtotime('friday this week'));
		$week_d['saturday']=date('Ymd',strtotime('saturday this week'));

        return $week_d;
    }



}
