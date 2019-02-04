<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthWishesDetail;
use App\EmployeeMaster;
use App\EventGallery;


class UserDashboardController extends Controller
{
    //below method used for display user deshboard.
	public function index(){
		$emp = new EmployeeMaster();
		$event = new EventGallery();
		$data = $emp->getBirthWishesData();
		$eventdata = $event->getGallaryData();


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
    	return view('app.userdesk',array('birthWishesData'=>$data,'gallarydata'=>$eventdata,'newsdata'=>$newsdata['channel']['item'],'quotes'=>$quotes['channel']['item'][0]));
	}

}
