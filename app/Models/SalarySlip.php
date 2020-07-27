<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalarySlip extends Model
{
	protected $table = 'salary_slip';
    protected $fillable = [
			'emp_id',     
			'uploaded_by',
			'file_name',
			'status',     
			'year_month', 
    ];
}
