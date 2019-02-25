<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BirthWishesDetail;

class EmplyoeeBirthWishseController extends Controller
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
        $userdata = new User();
        $empRecs = $userdata->getAllUser();
        $empDetails = array();
        foreach ($empRecs as $key => $value) {
            if($value->date_of_birth !="" || $value->date_of_birth != null){
                $bdate = strtotime($value->date_of_birth);
                if(date("m")<= date("m",$bdate) && date("d")<=date("d",$bdate)){
                    $empDetails[$key]['id'] = $value->id;
                    $empDetails[$key]['name'] = $value->name;
                    $empDetails[$key]['birthdate'] = date("d-m-Y",$bdate);
                }
            }
        }
       // dd($empDetails);
        return view('admin.wishes.create',array("empDetails"=>$empDetails));
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
            'emp_id' => 'required',
            'comment' => 'required',
        ]);

        $bod_data =new BirthWishesDetail();
        $bod_data->emp_id = $request->get('emp_id');
        $bod_data->comment = $request->get('comment');
        $bod_data->created_by = "";
        $bod_data->updated_by = "";
        $bod_data->created_on = date('Y-m-d h:i:s');
        $bod_data->updated_on = date('Y-m-d h:i:s');
        $bod_data->save();

        $userdata = new User();
        $empRecs = $userdata->getAllUser();
        $empDetails = array();
        foreach ($empRecs as $key => $value) {
            if($value->date_of_birth !="" || $value->date_of_birth != null){
                $bdate = strtotime($value->date_of_birth);
                if(date("m")<= date("m",$bdate) && date("d")<=date("d",$bdate)){
                    $empDetails[$key]['id'] = $value->id;
                    $empDetails[$key]['name'] = $value->name;
                    $empDetails[$key]['birthdate'] = date("d-m-Y",$bdate);
                }
            }
        }
       // dd($empDetails);
        return view('admin.wishes.create',array("empDetails"=>$empDetails));
   


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
