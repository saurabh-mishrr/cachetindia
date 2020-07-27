<?php namespace Interfaces;

use App\Base\BaseRepositoryInterface;

interface FileTrailRepositoryInterface extends BaseRepositoryInterface
{

	public function create(array $attributes);

}