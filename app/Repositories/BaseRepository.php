<?php

namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseContract
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }


    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data): void
    {
        $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $this->getById($id)->update($data);
    }

    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    // Feature
    public function getMaxPosition() :int
    {
        return $this->model->max('position') ?? 0;
    }


    // Feature
    public function getOrderByPosition()
    {
        return $this->model->orderBy('position','ASC');
    }





    // public function productsWithCategory() {
    //     // Specific implementation for "Product with Category" scenario
    //     return Product::with('category')->get();
    // }

    // Each specific repository must implement this method to provide the model class
    // abstract protected function getModelClass();
}
