<?php namespace Repositories;

use App\Models\FileTrail;
use Interfaces\FileTrailRepositoryInterface;
use App\Base\BaseRepository;

class FileTrailRepository extends BaseRepository implements FileTrailRepositoryInterface
{


	protected $model;

	public function __construct(FileTrail $ft)
	{
		$this->model = $ft;
	}

	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}

}