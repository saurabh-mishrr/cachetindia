<?php

namespace App\Http\Controllers;

use App\EventMaster;
use App\EventGallery;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events =  EventMaster::where('status', '1')
               ->orderBy('created_on', 'desc')
             //  ->take(10)
               ->get();
              // dd($events);
        return view('admin.event.view',array('event'=>$events));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'pic' => 'required',
            'pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $event_data =new EventMaster();
        $event_data->name = $request->get('name');
        $event_data->type = $request->get('type')=="" ? "no type":$request->get('type');
        $event_data->status = '1';
        $event_data->created_by = "";
        $event_data->updated_by = "";
        $event_data->created_on = date('Y-m-d h:i:s');
        $event_data->updated_on = date('Y-m-d h:i:s');
        $event_data->save();

        if($request->hasfile('pic'))
         {

            foreach($request->file('pic') as $image)
            {
                $name=$image->getClientOriginalName();
               
                $storageLocation = 'events/'.$event_data->id.'/';
                // $image = $request->file('pic');
                // $image->move(public_path().'/uploads/events/', $name);  
             //   $image->move(public_path('/uploads/events/'), $name);
            
                $imgStoredIn = $image->storeAs($storageLocation, $name, 'domain');
                $gallery_data =new EventGallery();
                $gallery_data->event_id = $event_data->id;
                $gallery_data->pic = $event_data->id.'/'.$name;
                $gallery_data->status = '1';
                $gallery_data->created_by = "";
                $gallery_data->updated_by = "";
                $gallery_data->created_on = date('Y-m-d h:i:s');
                $gallery_data->updated_on = date('Y-m-d h:i:s');
                $gallery_data->save();
         
            }
        }

        $events =  EventMaster::where('status', '1')
               ->orderBy('created_on', 'desc')
             //  ->take(10)
               ->get();
              // dd($events);
        return view('admin.event.view',array('event'=>$events));
   
      
      //  return back()->with('success', 'Your images has been successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventMaster  $eventMaster
     * @return \Illuminate\Http\Response
     */
    public function show(EventMaster $eventMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventMaster  $eventMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(EventMaster $eventMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventMaster  $eventMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventMaster $eventMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventMaster  $eventMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,EventMaster $eventMaster)
    {  
        EventMaster::where('event_id',$request->event)
          ->update(['status' => '0']);
        
        EventGallery::where('event_id',$request->event)
          ->update(['status' => '0']);

        $events =  EventMaster::where('status', '1')
               ->orderBy('created_on', 'desc')
             //  ->take(10)
               ->get();
              // dd($events);
        return view('admin.event.view',array('event'=>$events));
    
    }
}
