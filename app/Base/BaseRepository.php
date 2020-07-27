<?php namespace App\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository
{

	protected $model;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}
}