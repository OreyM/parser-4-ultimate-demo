<?php


namespace App\Core\Abstracts\Data\Repositories;


use App\Core\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    /**
     * @var Model $model
     */
    protected $model;

    public function __construct()
    {
        $this->makeModel();
    }

    private function makeModel(): void
    {
        $model = app($this->model);

        if ( ! $model instanceof Model) {
            throw new RepositoryException(
                "Class {$this->model()} must be an instance of Illuminate\Database\Eloquent\Model"
            );
        }

        $this->model = $model;
    }
}
