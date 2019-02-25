<?php

namespace App\Http\Controllers;

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
		$eventdata = $event->getGallaryData();
        $achievedata = $achieeve->getAchievementData();
        $user = Auth::user();
        //dd($user);

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
    	return view('app.userdesk',array('birthWishesData'=>$data,'gallarydata'=>$eventdata,'newsdata'=>$newsdata['channel']['item'],'quotes'=>$quotes['channel']['item'][0],'achievedata'=>$achievedata,"userdata"=>$user))    ;
	}

    public function uploadimage(Request $request){
        $this->validate($request, [
            'pic' => 'required',
            'pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        if($request->hasfile('pic'))
         {
                $user = Auth::user();
                $image = $request->file('pic');
                $name=$image->getClientOriginalName();
                $name = $user->id.'_'.$name;
                $image->move(public_path().'/images/user/', $name);  
                $user_data =new User();
                $user_data->updateIdWiseUser($user->id,$name);
            return redirect()->action('UserDashboardController@index');
    
        }
    }

    public function downloadSalary(Request $request){
        $user = Auth::user();
       // dd('abc');
        $user_data =new User();
        $slipData = $user->getUserSalSlip($user->id);
        //dd($slipData);
        if(!empty($slipData)){
           //PDF file is stored under project/public/download/info.pdf
            $file= public_path(). $slipData[0]['file_name'];
            $file= public_path().'test.pdf';

            $headers = array(
                'Content-Type: application/pdf',
            );
            return response()->download($file, 'salary_slip'.date('M-Y').'.pdf', $headers);

        }
    }
}
