<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BirthWishesDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emp_bod_wishes_detail';
    public $primaryKey = 'wishes_idPrimary';
    public $timestamps = false;
    // protected $fillable = [
    //     'emp_id','comment'
    // ];

  
}
