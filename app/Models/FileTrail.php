<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileTrail extends Model
{
    //
    protected $table = 'file_trail';

    protected $fillable = [
    	'csv_file_path', 'tar_file_path', 'type_of_upload', 'status', 'uploaded_by'
    ];
}
