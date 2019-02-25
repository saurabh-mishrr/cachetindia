<?php
namespace Interfaces;

use App\Base\BaseRepositoryInterface;

interface SalarySlipRepositoryInterface extends BaseRepositoryInterface
{

	public function create(array $attributes);
}