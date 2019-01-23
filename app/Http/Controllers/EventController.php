<?php

namespace App\Http\Controllers;

use App\EventMaster;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.create-event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pic' => 'required',
        ]);

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
    public function destroy(EventMaster $eventMaster)
    {
        //
    }
}
