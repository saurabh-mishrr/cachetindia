<?php

namespace App\Http\Controllers\Backends;

use App\Models\FileTrail;
use App\Models\SalarySlip;
use App\Models\TaxForm;
use Illuminate\Http\Request;
use App\Http\Requests\FileTrailUploadRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use CsvReader;
use Repositories\FileTrailRepository;

class FileTrailController extends Controller
{

    protected $repo;

    public function __construct(FileTrailRepository $ftr)
    {
        $this->repo = $ftr;
    }
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
        return view('admin.file_trail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileTrailUploadRequest $request)
    {
        DB::beginTransaction();
        try {
            $storageLocation = date('d-m-Y');
            $tarFile = $request->file('tar_file_path');
            $tarStoredIn = $tarFile->storeAs($storageLocation, $tarFile->getClientOriginalName());
            $csvFile = $request->file('csv_file_path');
            $csvStoredIn = $csvFile->storeAs($storageLocation, $csvFile->getClientOriginalName());  
            $model = $this->repo->create([
                'csv_file_path'     =>  $csvStoredIn,
                'tar_file_path'     =>  $tarStoredIn,
                'status'            =>  'pending',
                'type_of_upload'    =>  $request->type_of_upload,
                'uploaded_by'       =>  1
            ]);            
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->withInput()->withError(['msg', $e->getMessage()]);
        }
        DB::commit();
        if ($request->type_of_upload == "salary_slip") {
            return redirect()->route('upload-salary-slips', ['id' => $model->id.'_'.$request->month_name]);
        }
        
        return redirect()->route('upload-form-16', ['id' => $model->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FileTrail  $fileTrail
     * @return \Illuminate\Http\Response
     */
    public function show(FileTrail $fileTrail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FileTrail  $fileTrail
     * @return \Illuminate\Http\Response
     */
    public function edit(FileTrail $fileTrail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FileTrail  $fileTrail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileTrail $fileTrail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FileTrail  $fileTrail
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileTrail $fileTrail)
    {
        //
    }

    public function salarySlipUploadPage(Request $request)
    {
        
        return view('admin.file_trail.salary_upload', ['id' => $request->id]);
        
    }
    
    public function form16UploadPage(Request $request)
    {
        
        return view('admin.file_trail.form16_upload', ['id' => $request->id]);
        
    }

    public function uploadSalarySlips(Request $request)
    {
        $data=explode('_', $request->id);
        $requestid=$data[0];
        $month=$data[1];
        if ($request->isMethod('post')) {
            $record = FileTrail::find($requestid);
            if ($record->status == 'pending') {
                DB::beginTransaction();
                $storagePath = storage_path('app').'/';
                $tarFilePath = $storagePath.$record->tar_file_path;
                $extractToPath = $storagePath.''.date('d-m-Y', strtotime($record->created_at));
		$tarFile = explode('/', $tarFilePath);
                $tarFile = explode('.zip', $tarFile[count($tarFile)-1]);
		$xtractedFolder = $tarFile[0];
		
                $errorMsg = "Salary Slip not exist for Emp_id: ";
               
		\Zipper::make($tarFilePath)->extractTo($extractToPath);
/*		try {
		$zip = \App::make(\ZipArchive::class);
$res = $zip->open($tarFilePath);
if ($res === TRUE) {
  $zip->extractTo($extractToPath);
  $zip->close();
 
} else {
	Log::error("File didn't unzip.");
}}
catch(\Throwable $e) {
	Log::error($e->getMessage());

}*/
		
		$reader = CsvReader::open($storagePath.$record->csv_file_path);
                $csvFileData = array_map('array_filter', $reader->readAll());
                $error=0;
                $i = 1;
		$data = [];		
                while ($i < sizeof($csvFileData)) {
			$slipFilePath = $extractToPath.'/'.$xtractedFolder.'/'.$csvFileData[$i][1];
			/*if (!file_exists($slipFilePath)) { 
				Log::error($slipFilePath);
			}*/	
			if (file_exists($slipFilePath)) {
				
                        //if emp_id's file not found before and now found.
                        if (array_key_exists($csvFileData[$i][0], $data)) {
                            unset($data[$csvFileData[$i][0]]);
                        } else {
                            if($month=='December'){
                                $year =$lastyear = date('Y', strtotime('-1 year'));
                            }else{
                                $year=date('Y');
                            }
                            try {
                                SalarySlip::create([
                                    'emp_id'            =>     $csvFileData[$i][0],
                                    'uploaded_by'       =>     1,
                                    'file_name'         =>     $slipFilePath,
                                    'status'            =>     1,
                                    'year_month'        =>     $year.'-'.$month,
                                ]);
                            } catch (Exception $e) {
                                Log::error($e->getMessage());
                                DB::rollBack();
                                return redirect()->route('FileTrailController@create')->withError(['msg', $e->getMessage()]);
                            }
                            
                        }
                    } else {
                        $error=1;
                        $data[$csvFileData[$i][0]] = 'false';
                        $errorMsg .= "{$csvFileData[$i][0]},";
                    }
                    $i++;
                }
                $record->status = "success";
                $record->save();
                DB::commit();
                if($error){
                    $setError="->with('error', $errorMsg)";
                }
                return redirect()->route('salary.create')->with('success', 'Salary slips uploaded successfully.').$setError;
            } else {
                return redirect()->route('salary.create')->with('error', 'Invalid request.');
            }
        }
    }
    
    //Upload form 16
    public function uploadform16(Request $request)
    {
        $data=explode('_', $request->id);
        $requestid=$data[0];
        $month=$data[1];

        if ($request->isMethod('post')) {
            $record = FileTrail::find($requestid);
            if ($record->status == 'pending') {
                DB::beginTransaction();
                $storagePath = storage_path('app').'/';
                $tarFilePath = $storagePath.$record->tar_file_path;
                $extractToPath = $storagePath.'/'.date('d-m-Y', strtotime($record->created_at));
                $tarFile = explode('/', $tarFilePath);
                $tarFile = explode('.zip', $tarFile[7]);
                $xtractedFolder = $tarFile[0];
                $errorMsg = "Salary Slip not exist for Emp_id: ";
                
                \Zipper::make($tarFilePath)->extractTo($extractToPath);
                $reader = CsvReader::open($storagePath.$record->csv_file_path);
                $csvFileData = array_map('array_filter', $reader->readAll());

                // echo (sizeof($csvFileData)-1);
                // echo $csvFileData[1][1];
                // echo '<pre>';
                // print_r($csvFileData);
                // exit;
                $error=0;
                $i = 1;
                $data = [];
                while ($i < sizeof($csvFileData)) {
                    $slipFilePath = $extractToPath.'/'.$xtractedFolder.'/'.$csvFileData[$i][1];
                    if (file_exists($slipFilePath)) {
                        //if emp_id's file not found before and now found.
                        if (array_key_exists($csvFileData[$i][0], $data)) {
                            unset($data[$csvFileData[$i][0]]);
                        } else {
                            
                            try {
                                taxform::create([
                                    'emp_id'            =>     $csvFileData[$i][0],
                                    'uploaded_by'       =>     1,
                                    'file_name'         =>     $slipFilePath,
                                    'status'            =>     1,
                                    'year_month'        =>     date('Y').'-'.$month,
                                ]);
                            } catch (Exception $e) {
                                Log::error($e->getMessage());
                                DB::rollBack();
                                return redirect()->route('FileTrailController@create')->withError(['msg', $e->getMessage()]);
                            }
                            
                        }
                    } else {
                        $error=1;
                        $data[$csvFileData[$i][0]] = 'false';
                        $errorMsg .= "{$csvFileData[$i][0]},";
                    }
                    $i++;
                }
                $record->status = "success";
                $record->save();
                DB::commit();
                if($error){
                    $setError="->with('error', $errorMsg)";
                }
                return redirect()->route('salary.create')->with('success', 'Form 16 uploaded successfully.').$setError;
            } else {
                return redirect()->route('salary.create')->with('error', 'Invalid request.');
            }
        }
    }
}
