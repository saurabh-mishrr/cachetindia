<?php

namespace Repositories;

use App\Base\BaseRepository;
use Interfaces\SalarySlipRepositoryInterface;
use App\Models\SalarySlip;

class SalarySlipRepository extends BaseRepository implements SalarySlipRepositoryInterface
{

	protected $model;

	public function __construct(SalarySlip $models){
		$this->model = $model;
	}

	public function create(array $attributes)
	{
		$this->model->create($attributes);
	}

}