<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxForm extends Model
{
	protected $table = 'tax_form';
    protected $fillable = [
			'emp_id',     
			'uploaded_by',
			'file_name',
			'status',     
			'year_month', 
    ];
}
