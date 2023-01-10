<?php
namespace App\Http\Controllers\Attendance;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Session;
use Illuminate\Http\Request;
class AttendanceController extends ApiController {

    public function attendance() {
        if (session()->has('LoggedInUserId')) {
            $UserToken = Session::get('token');
            $ZoneClusterList = $this->getapi($UserToken, 'ninja/zone-clusters?paging=0');
            if ($ZoneClusterList['status'] == 1) {
                $zones = $ZoneClusterList['output']->data;
                if(Session::has('month')){
                    $month = Session::get('month');
                    $fromDate = date('Ym01', strtotime($month));
                    $toDate = date('Ymt',strtotime($month));
                }else{
                    $fromDate = date('Ym01');
                    $toDate = date('Ymt');
                }
                
                $month_dates = $this->dateRange($fromDate, $toDate,'Ymd');
                $month = $this->dateformat($fromDate, 'F Y');

                $ninja_attendance1='';
                if(Session::has('week')){
                    $week = Session::get('week');
                    $weekdates = (explode("-",$week));
                    $week_start = $weekdates[0];
                    $week_end = $weekdates[1];
                }else{
                    $week_start = date('Ymd',strtotime('sunday last week'));
                    $week_end = date('Ymd',strtotime('saturday this week'));
                }

                $week_d = $this->dateRange($week_start, $week_end,'Ymd');
                $attendanceList1 = $this->getapi($UserToken,'ninja/attendance?fromDate='.$week_start.'&toDate='.$week_end);
                if ($attendanceList1['status'] == 1) {
                    $ninja_attendance1 = $attendanceList1['output']->data;
                }

                $allcity = array();
                $citylist = $this->getapi($UserToken, 'ninja/countries/cities?bussiness=1');
                if ($citylist['status'] == 1) {
                    $allcity = $citylist['output']->data;
                }
                $attendanceList = $this->getapi($UserToken,'ninja/attendance?fromDate='.$fromDate.'&toDate='.$toDate);
                if ($attendanceList['status'] == 1) {
                    $ninja_attendance = $attendanceList['output']->data;
                    return view('attendance/attendance', compact('zones', 'ninja_attendance', 'month_dates', 'month', 'allcity','fromDate','toDate','week_d','ninja_attendance1','weekdates','week_start','week_end'));
                } else {
                    return redirect('dashboard/attendance')->with('error_msg', $attendanceList['msg']);
                }
            } else {
                return redirect('dashboard/attendance')->with('error_msg', $ZoneClusterList['msg']);
            }
        } else {
            return redirect()->route('mainpage');
        }
    }
    public function attendanceByZoneCluster(Request $request) {
        if (session()->has('LoggedInUserId')) {
            $UserToken = Session::get('token');
            $fromDate = date('Ym01');
            $toDate = date('Ymt');
            $zone_id = $request->zone;
            $d_value = $request->default_page_value;
            $ZoneClusterList = $this->getapi($UserToken, 'ninja/zone-clusters?paging=0');
            if ($ZoneClusterList['status'] == 1) {
                $zones = $ZoneClusterList['output']->data;
                foreach ($zones as $zonesL) {
                    if ($zonesL->_id == $zone_id) {
                        $ZoneList = $zonesL;
                    }
                }
            }
            $month_dates = $this->dateRange($fromDate, $toDate,'Ymd');
            if ($this->dateformat($fromDate, 'm') == $this->dateformat($toDate, 'm')) {
                $month = $this->dateformat($fromDate, 'F Y');
            } else {
                $month = array($this->dateformat($fromDate, 'F Y'), $this->dateformat($toDate, 'F Y'));
            }
            
            $ninja_attendance1='';
            $week_start = date('Ymd',strtotime('sunday last week'));
            $week_end = date('Ymd',strtotime('saturday this week'));
            $week_d = $this->dateRange($week_start, $week_end,'Ymd');
            $attendanceList1 = $this->getapi($UserToken, 'ninja/attendance?fromDate=' . $week_start . '&toDate=' . $week_end . '&zone_id=' . $zone_id);
            if ($attendanceList1['status'] == 1) {
                $ninja_attendance1 = $attendanceList1['output']->data;
            }

            $allcity = array();
            $citylist = $this->getapi($UserToken, 'ninja/countries/cities?bussiness=1');
            if ($citylist['status'] == 1) {
                $allcity = $citylist['output']->data;
            }
            $attendanceList = $this->getapi($UserToken, 'ninja/attendance?fromDate=' . $fromDate . '&toDate=' . $toDate . '&zone_id=' . $zone_id);
            if ($attendanceList['status'] == 1) {
                $ninja_attendance = $attendanceList['output']->data;
                return view('attendance/attendance', compact('ZoneList', 'zones', 'ninja_attendance', 'month_dates', 'month', 'allcity','fromDate','toDate','week_d','d_value','ninja_attendance1'));
            } else {
                return redirect('dashboard/attendance')->with('error_msg', $attendanceList['msg']);
            }
        } else {
            return redirect()->route('mainpage');
        }
    }
    public function attendanceByCity(Request $request) {
        if (session()->has('LoggedInUserId')) {
            $UserToken = Session::get('token');
            $fromDate = date('Ym01');
            $toDate = date('Ymt');
            $city_id = $request->city;
            $d_value = $request->default_page_value;
            $month_dates = $this->dateRange($fromDate,$toDate,'Ymd');    
            if ($this->dateformat($fromDate, 'm') == $this->dateformat($toDate, 'm')) {
                $month = $this->dateformat($fromDate, 'F Y');
            } else {
                $month = array($this->dateformat($fromDate, 'F Y'), $this->dateformat($toDate, 'F Y'));
            }
            $ZoneClusterList = $this->getapi($UserToken, 'ninja/zone-clusters?paging=0&cities='.$city_id);
            if ($ZoneClusterList['status'] == 1) {
                $zones = $ZoneClusterList['output']->data;
            }
            
            $ninja_attendance1='';
            $week_start = date('Ymd',strtotime('sunday last week'));
            $week_end = date('Ymd',strtotime('saturday this week'));
            $week_d = $this->dateRange($week_start, $week_end,'Ymd');
            $attendanceList1 = $this->getapi($UserToken, 'ninja/attendance?fromDate=' . $week_start . '&toDate=' . $week_end . '&city_id=' . $city_id);
            if ($attendanceList1['status'] == 1) {
                $ninja_attendance1 = $attendanceList1['output']->data;
            }

            $allcity = array();
            $citylist = $this->getapi($UserToken, 'ninja/countries/cities?bussiness=1');
            if ($citylist['status'] == 1) {
                $allcity = $citylist['output']->data;
                foreach ($allcity as $cities) {
                    if ($cities->_id == $city_id) {
                        $cityList = $cities;
                    }
                }
            }
            $attendanceList = $this->getapi($UserToken, 'ninja/attendance?fromDate=' . $fromDate . '&toDate=' . $toDate . '&city_id=' . $city_id);
            if ($attendanceList['status'] == 1) {
                $ninja_attendance = $attendanceList['output']->data;
                
                return view('attendance/attendance',compact('zones','ninja_attendance','month_dates','month','allcity','cityList','fromDate','toDate','week_d','d_value','ninja_attendance1'));
                
            } else {
                return redirect('dashboard/attendance')->with('error_msg', $attendanceList['msg']);
            }
        } else {
            return redirect()->route('mainpage');
        }
    }
    public function attendanceform(Request $request) {
        if (session()->has('LoggedInUserId')) {
            $UserToken = Session::get('token');
            $default_zone_id = $request->default_zone_id;
            $ZoneList = '';
            if(!empty($default_zone_id)){
                $ZoneClusterList = $this->getapi($UserToken, 'ninja/zone-clusters?paging=0');
                if ($ZoneClusterList['status'] == 1) {
                    $zones = $ZoneClusterList['output']->data;
                    foreach ($zones as $zonesL) {
                        if ($zonesL->_id == $default_zone_id) {
                            $ZoneList = $zonesL;

                            $zone_name = $ZoneList->name;
                            $zone_id = $ZoneList->_id; 
                            $city_name = $ZoneList->cities[0]->name; 
                            $city_id = $ZoneList->cities[0]->_id;
                        }
                    }
                }
            }else{
                $zone_name = (!empty($request->zone_name)) ? $request->zone_name : '' ;
                $zone_id = (!empty($request->zone_id)) ? $request->zone_id : '' ;
                $city_name = (!empty($request->city_name)) ? $request->city_name : '' ;
                $city_id = (!empty($request->city_id)) ? $request->city_id :  '' ;
            }

            $zonebycity = $this->getapi($UserToken, 'ninja/zone-clusters?paging=0&cities='.$city_id);
            if ($zonebycity['status'] == 1) {
                $zones = $zonebycity['output']->data;
            }

            $cleaner_id = (!empty($request->cleaner_id)) ? $request->cleaner_id : '';   
            $cleaner_name = (!empty($request->cleaner_name)) ? $request->cleaner_name : '';
            $date = (!empty($request->date)) ? $request->date : ''; 
            $cleaner_pic = (!empty($request->cleaner_pic)) ? $request->cleaner_pic : '';
            $absent_reason = $request->absent_reason;
            $approve_by = $request->approve_by;
            $halfday_f = $request->halfday_f;
            $halfday_t = $request->halfday_t;
            $comment = $request->comment;
            $present = $request->present;
		    $fullday = $request->fullday;
			$halfday = $request->halfday;
            $month = $request->month;
            $week = $request->current_week;
            $is_active = $request->is_active;

            if(Session::has('is_active')){
                Session::forget('is_active');
                Session::forget('month');
                Session::forget('week');
            }
            if($is_active == 1){
                Session::put('is_active',"week");
                Session::put('week',$week);
            }else{
                Session::put('is_active',"month");
                Session::put('month',$month);
            }
           
            $allcity = array();
            $citylist = $this->getapi($UserToken, 'ninja/countries/cities?bussiness=1'); 
            if ($citylist['status'] == 1) {
                $allcity = $citylist['output']->data;
            }
            $html = view('attendance/attendanceform', compact('cleaner_id', 'cleaner_name', 'date', 'allcity', 'zone_name', 'zone_id', 'city_name', 
            'week','month','present','fullday','halfday','city_id','cleaner_pic','absent_reason','approve_by','halfday_f','halfday_t','zones','comment'))->render();
            echo json_encode(array('status' => 'success', 'htm' => $html));
        } else {
            return redirect()->route('mainpage');
        }
    }
    public function zonebycity(Request $request) {
        if (session()->has('LoggedInUserId')) {
            $UserToken = Session::get('token');
            $city_id = (!empty($request->city_id)) ? $request->city_id : '';
            $zonebycity = $this->getapi($UserToken, 'ninja/zone-clusters?paging=0&cities=' . $city_id);
            if ($zonebycity['status'] == 1) {
                $zone = $zonebycity['output']->data;
                $html = "";
                
                if (!empty($zone)) {
                    foreach ($zone as $zones) {
                        $zone_name = (!empty($zones->name)) ? $zones->name : '';
                        $zone_id = (!empty($zones->_id)) ? $zones->_id : '';
                        $html.= '<option value=' . $zone_id . '>' . $zone_name . '</option>';
                    }
                }
                echo json_encode(array('status' => 'success', 'htm' => $html));
            }
        } else {
            return redirect()->route('mainpage');
        }
    }
    public function updateAttendanceCasePresent(Request $request) {
        if (session()->has('LoggedInUserId')) {
            $UserToken = Session::get('token');
            $cleaner_id = $request->cleaner_id;
            $zonecluster_id = $request->zonecluster;
            $date = (int)date('Ymd', strtotime($request->date));
            $comment = $request->comment;
            $week = $request->week;
            $month = $request->month;
            if (isset($request->setdefault)) {
                if ($request->setdefault == 1) {
                    $is_set_default = true;
                }
            } else {
                $is_set_default = false;
            }

            $data = array("cleaner_id"=>$cleaner_id,"zone_cluster_id"=>$zonecluster_id,"date"=>$date,"present_type"=>0,"comment"=>$comment,"is_set_default"=>$is_set_default);
            //    echo "<pre>"; print_r($data); echo "</pre>"; die;
            $results = $this->postapi2($UserToken, $data, 'ninja/attendance');
            if ($results['status'] == 1) {
                return redirect()->route('attendance')->with('success_msg', "Attendance updated successfully");
            } else {
                return redirect()->route('attendance')->with('error_msg', $results['msg']);
            }
        } else {
            return redirect()->route('mainpage');
        }
    }
    public function updateAttendanceCaseAbsentFullday(Request $request) {
        if (session()->has('LoggedInUserId')) {
            $UserToken = Session::get('token');
            $cleaner_id = $request->cleaner_id;
            $date = (int)date('Ymd', strtotime($request->date));
            $absent_daterange = explode(" - ", $request->absent_daterange);
            $absent_reason = (int)$request->absent_reason;
            $approve_by = $request->approve_by;
            $comment = $request->comment;
            $week = $request->week;
            $month = $request->month;
            
            $daterangefrom = date('Ymd', strtotime($absent_daterange[0]));
            $daterangeto = date('Ymd', strtotime($absent_daterange[1]));

            $absent_dates = array();
            if ($daterangefrom == $daterangeto) {
                $absent_dates[] = $daterangefrom;
            } else { 
                $absent_dates = $this->dateRange($daterangefrom, $daterangeto, 'Ymd');
            }
   
            $data = array("cleaner_id" => $cleaner_id, "is_present" => false, "date" => $date, "present_type" => 1, "absent_type" => 0, "absent_dates" => $absent_dates, "absent_reason" => $absent_reason, "approve_by" => $approve_by, "comment" => $comment);
            // echo "<pre>"; print_r($data); echo "</pre>"; die;
            $results = $this->postapi2($UserToken, $data, 'ninja/attendance');
            if ($results['status'] == 1) {
                return redirect()->route('attendance')->with('success_msg', "Attendance updated successfully");
            } else {
                return redirect()->route('attendance')->with('error_msg', $results['msg']);
            }
        } else {
            return redirect()->route('mainpage');
        }
    }
    public function updateAttendanceCaseAbsentHalfday(Request $request) {
        if (session()->has('LoggedInUserId')) {
            $UserToken = Session::get('token');
            $cleaner_id = $request->cleaner_id;
            $date = (int)date('Ymd', strtotime($request->date));
            $zonecluster_id = $request->zonecluster;
            $absent_reason = (int)$request->absent_reason;
            $approve_by = $request->approve_by;
            $comment = $request->comment;
            $week = $request->week;
            $month = $request->month;
            $halfdaytime = $request->inlineRadioOptions;
            $time = array();
            if ($halfdaytime == 1) {
                $time = array("from" => "09:00", "to" => "15:00");
            }
            if ($halfdaytime == 2) {
                $time = array("from" => "15:00", "to" => "21:00");
            }
            $data = array("cleaner_id" => $cleaner_id, "is_present" => false, "date" => $date, "present_type" => 1, "absent_type" => 1, "halfDay" => $time, "absent_reason" => $absent_reason, "approve_by" => $approve_by, "comment" => $comment);
            $results = $this->postapi2($UserToken, $data, 'ninja/attendance');
            //  echo "<pre>"; print_r($results); echo "</pre>"; die;
            if ($results['status'] == 1) {
                return redirect()->route('attendance')->with('success_msg', "Attendance updated successfully");
            } else {
                return redirect()->route('attendance')->with('error_msg', $results['msg']);
            }
        } else {
            return redirect()->route('mainpage');
        }
    }

    public function searchninja(Request $request){
        if(session()->has('LoggedInUserId')){
            $keyword=$request->search_ninja;
		    $UserToken= Session::get('token');
            $d_value = $request->default_page_value;
            $zones=array();
            $ZoneClusterList = $this->getapi($UserToken, 'ninja/zone-clusters?paging=0');
            if($ZoneClusterList['status'] == 1){
                $zones = $ZoneClusterList['output']->data;
            }
                $fromDate = date('Ym01');
                $toDate = date('Ymt');
                $month_dates = $this->dateRange($fromDate, $toDate,'Ymd');
                $month = $this->dateformat($fromDate, 'F Y');
                
                $ninja_attendance1='';
                $week_start = date('Ymd',strtotime('sunday last week'));
                $week_end = date('Ymd',strtotime('saturday this week'));
                $week_d = $this->dateRange($week_start, $week_end,'Ymd');
                $attendanceList1 = $this->getapi($UserToken,'ninja/attendance?fromDate='.$week_start.'&toDate='.$week_end.'&search='.$keyword);
                if ($attendanceList1['status'] == 1) {
                    $ninja_attendance1 = $attendanceList1['output']->data;
                }

                $allcity = array();
                $citylist = $this->getapi($UserToken, 'ninja/countries/cities?bussiness=1');
                if ($citylist['status'] == 1) {
                    $allcity = $citylist['output']->data;
                }
                $attendanceList = $this->getapi($UserToken,'ninja/attendance?fromDate='.$fromDate.'&toDate='.$toDate.'&search='.$keyword);
                if ($attendanceList['status'] == 1) {
                    $ninja_attendance = $attendanceList['output']->data;
                    if(!empty($ninja_attendance)){
                        return view('attendance/attendance', compact('zones', 'ninja_attendance', 'month_dates', 'month', 'allcity','fromDate','toDate','week_d','d_value','keyword','ninja_attendance1'));
                    }else{
                        return redirect('dashboard/attendance')->with('error_msg','No data available');
                    }
                } else {
                    return redirect('dashboard/attendance')->with('error_msg','No data available');
                }

        } else {
            return redirect()->route('mainpage');
        }
    }

    public function attendanceMonth(Request $request){
        if (session()->has('LoggedInUserId')) {
            $UserToken = Session::get('token');
            $angle = (!empty($request->angle)) ? $request->angle : '';
            $current_month = (!empty($request->current_month)) ? $request->current_month : '';
            $default_page_value = $request->default_page_value;
            $zone_cluster = $request->zone_cluster;
            $city_id = $request->city_id;
            $keyword = $request->search_key; 
            $fromD = $request->from_date;
            $toD = $request->to_date;
            
            if($angle == 1){
                $nextmonth = date("Ymd",strtotime('+1 month',strtotime($current_month)));
            }else{
                $nextmonth = date("Ymd",strtotime('-1 month',strtotime($current_month)));
            }
            $fromDate = date('Ym01', strtotime($nextmonth));
            $toDate = date('Ymt',strtotime($nextmonth));

            $month_dates = $this->dateRange($fromDate, $toDate,'Ymd');
            $month = $this->dateformat($fromDate, 'F Y');

            if($default_page_value == 1){
                $attendanceList = $this->getapi($UserToken,'ninja/attendance?fromDate='.$fromDate.'&toDate='.$toDate);
            }else if($zone_cluster !=""){
                $attendanceList = $this->getapi($UserToken,'ninja/attendance?fromDate='.$fromDate.'&toDate='.$toDate.'&zone_id='.$zone_cluster);
                $ZoneClusterList = $this->getapi($UserToken, 'ninja/zone-clusters?paging=0');
                if ($ZoneClusterList['status'] == 1) {
                    $zones = $ZoneClusterList['output']->data;
                    foreach ($zones as $zonesL) {
                        if ($zonesL->_id == $zone_cluster) {
                            $ZoneList = $zonesL;
                        }
                    }
                }
            }else if($city_id !=""){
                $attendanceList = $this->getapi($UserToken,'ninja/attendance?fromDate='.$fromDate.'&toDate='.$toDate.'&city_id='.$city_id);
                $citylist = $this->getapi($UserToken, 'ninja/countries/cities?bussiness=1');
                if ($citylist['status'] == 1) {
                    $allcity = $citylist['output']->data;
                    foreach ($allcity as $cities) {
                        if ($cities->_id == $city_id) {
                            $cityList = $cities;
                        }
                    }
                }
            }else if($keyword !=""){
                $attendanceList = $this->getapi($UserToken,'ninja/attendance?fromDate='.$fromDate.'&toDate='.$toDate.'&search='.$keyword);
            }else{
                echo json_encode(array('msg' => 'Something went wrong, please try again'));
                exit();
            }

            if ($attendanceList['status'] == 1) {
                $ninja_attendance = $attendanceList['output']->data;
                $html = view('attendance/month', compact('ZoneList','cityList','ninja_attendance','month_dates','month','fromDate','toDate','keyword'))->render();
                echo json_encode(array('status' => 'success', 'htm' => $html , 'nextmonth' => $nextmonth , 'fromDate' => $fromDate , 'toDate' => $toDate));
            } else {
                echo json_encode(array('msg' => $attendanceList['msg'] ));
            }

        } else {
            return redirect()->route('mainpage');
        }
    }

    public function attendanceWeek(Request $request){
        if (session()->has('LoggedInUserId')) {
            $UserToken = Session::get('token');
            $angle = (!empty($request->angle)) ? $request->angle : '';
            $current_week = (!empty($request->current_week)) ? (explode("-",$request->current_week)) : '';
            $default_page_value = $request->default_page_value;
            $zone_cluster = $request->zone_cluster;
            $city_id = $request->city_id;
            $keyword = $request->search_key;
            $fromDate=''; $toDate='';

            $fromD = $request->from_date;
            $toD = $request->to_date;

            if($angle == 1){
                $fromDate =  date('Ymd',strtotime("+1 day", strtotime($current_week[1])));
                $toDate =  date('Ymd',strtotime("+6 day", strtotime($fromDate)));
            }else{
                $fromDate =  date('Ymd',strtotime("-7 day", strtotime($current_week[0])));
                $toDate =  date('Ymd',strtotime("-1 day", strtotime($current_week[0])));
                // $FromDate =  date('Ymd',strtotime("-6 day", strtotime($toDate)));
            }

            $week_d = $this->dateRange($fromDate, $toDate,'Ymd');
            $nextweek = $fromDate."-".$toDate; 

            if($default_page_value == 1){
                $attendanceList = $this->getapi($UserToken,'ninja/attendance?fromDate='.$fromDate.'&toDate='.$toDate);
            }else if($zone_cluster !=""){
                $attendanceList = $this->getapi($UserToken,'ninja/attendance?fromDate='.$fromDate.'&toDate='.$toDate.'&zone_id='.$zone_cluster);
                $ZoneClusterList = $this->getapi($UserToken, 'ninja/zone-clusters?paging=0');
                if ($ZoneClusterList['status'] == 1) {
                    $zones = $ZoneClusterList['output']->data;
                    foreach ($zones as $zonesL) {
                        if ($zonesL->_id == $zone_cluster) {
                            $ZoneList = $zonesL;
                        }
                    }
                }
            }else if($city_id !=""){
                $attendanceList = $this->getapi($UserToken,'ninja/attendance?fromDate='.$fromDate.'&toDate='.$toDate.'&city_id='.$city_id);
                $citylist = $this->getapi($UserToken, 'ninja/countries/cities?bussiness=1');
                if ($citylist['status'] == 1) {
                    $allcity = $citylist['output']->data;
                    foreach ($allcity as $cities) {
                        if ($cities->_id == $city_id) {
                            $cityList = $cities;
                        }
                    }
                }
            }else if($keyword !=""){
                $attendanceList = $this->getapi($UserToken,'ninja/attendance?fromDate='.$fromDate.'&toDate='.$toDate.'&search='.$keyword);
            }else{
                echo json_encode(array('msg' => 'Something went wrong, please try again'));
                exit();
            }


            if ($attendanceList['status'] == 1) {
                $ninja_attendance = $attendanceList['output']->data;
                $html = view('attendance/week', compact('ZoneList','cityList','ninja_attendance','month_dates','fromDate','toDate','week_d','keyword'))->render();
                echo json_encode(array('status' => 'success', 'htm' => $html , 'nextweek' => $nextweek));
            } else {
                echo json_encode(array('msg' => $attendanceList['msg'] ));
            }

        } else {
            return redirect()->route('mainpage');
        }
    }

    public function exportfile(Request $request){
        if(session()->has('LoggedInUserId')) {
            $UserToken = Session::get('token');
            $current_month = (!empty($request->currentmonth)) ? $request->currentmonth : '';
            $fromDate = date('Ym01', strtotime($current_month));
            $toDate = date('Ymt',strtotime($current_month));
            $filename = date('FY',strtotime($current_month));

            $attendanceList = $this->getapi($UserToken,'ninja/attendance?fromDate='.$fromDate.'&toDate='.$toDate);
           
            if($attendanceList['status'] == 1){
                $ninja_attendance = $attendanceList['output']->data;
                
                $heading = array('zone_name','cleaner_user_name','date','present_type','half_days_time','reason','comment','special_services');

                $main_array=array();
                $main_array[]=$heading;
                
                foreach($ninja_attendance as $ninja){
                    $service='';
                    $single_data=array();

                    if(!empty($ninja->special_services)){
                        foreach($ninja->special_services as $special_service){
                            $service.=$special_service->ot_id.':'.$special_service->slug.';';
                        }
                    }
                    if(!empty($service)){ $service = rtrim( $service,";"); }

                    foreach($ninja->attendance as $attendance){
                        $single_data=array();
                        $present_type='';
                        $half_days_time='';
                        $absent_reason='other';
                        $zone_clustername=(!empty($attendance->zone_cluster[0]->name)) ? $attendance->zone_cluster[0]->name : '';
                        if($zone_clustername == '' ){ continue; }

                        $single_data[] = $zone_clustername;
                        $single_data[] = (!empty($ninja->name)) ? $ninja->name : '';
                        $single_data[] = (!empty($attendance->date)) ? date('d/m/Y', strtotime($attendance->date)) : '';

                        if(isset($attendance->is_present) && $attendance->is_present==true){ if(isset($attendance->present_type) && $attendance->present_type==0){ $present_type='present'; } }
                        if(isset($attendance->is_present) && $attendance->is_present==false){ if(isset($attendance->absent_type) && $attendance->absent_type==0){ $present_type='absent_full_day'; } }
                        if(isset($attendance->is_present) && $attendance->is_present==true){ if(isset($attendance->present_type) && $attendance->present_type==1){ if(isset($attendance->absent_type) && $attendance->absent_type==1){ $present_type='absent_half_day'; } } }
                        if(!empty($attendance->halfDay[0]->from)){ if($attendance->halfDay[0]->from == '09:00' ){ $half_days_time="09-15"; }else{ $half_days_time="15-21"; } }
                        if(isset($attendance->absent_reason)){ if($attendance->absent_reason == 0 ){ $absent_reason='off'; }else if($attendance->absent_reason == 1 ){ $absent_reason='leave'; }else if($attendance->absent_reason == 2 ){ $absent_reason='vacation'; }else if($attendance->absent_reason == 3 ){ $absent_reason='emergency'; }else{ $absent_reason='other'; } }                        
                        if(!empty($present_type) && $present_type=='present' ){ $absent_reason=''; }

                        $single_data[] = $present_type;
                        $single_data[] = $half_days_time;
                        $single_data[] = $absent_reason;
                        $single_data[] = (!empty($attendance->comment)) ? $attendance->comment : '';
                        $single_data[] = $service;

                        $main_array[]=$single_data;
                    }
                }

                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="'.$filename.'.csv"');
    
                $fp = fopen('php://output', 'wb');
                foreach ( $main_array as $row ) {
    
                    fputcsv($fp, $row);
                }

                fclose($fp);

            }else{
                return redirect('dashboard/attendance')->with('error_msg', $attendanceList['msg']);
            }

        } else {
            return redirect()->route('mainpage');
        }
        
    }

    public function importfile(Request $request){
        if(session()->has('LoggedInUserId')){
            $UserToken = Session::get('token');
            $base_url = env('API_URL');

            $file = $_FILES['import_file']['tmp_name'];
            $filename = $_FILES['import_file']['name'];
            $mimetype = mime_content_type($file);
            $image_upload_val = array('file'=> new \CURLFile($file,$mimetype,$filename));

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $base_url.'ninja/attendance/import',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $image_upload_val,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: multipart/form-data",
                "Accept-Language: en",
                "Authorization: Bearer $UserToken"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            // echo $response;
            // echo "<br>";
            // echo $err; die;

            if ($err) {
                return redirect()->route('attendance')->with('error_msg', "cURL Error #:" . $err);
            } else {
                $outputs=json_decode($response);
                if($outputs->success){
                    return redirect()->route('attendance')->with('success_msg',$outputs->data->message);
                }else{
                    return redirect()->route('attendance')->with('error_msg', $outputs->message);
                }
            }

        } else {
            return redirect()->route('mainpage');
        }
    }
    




}


?>
