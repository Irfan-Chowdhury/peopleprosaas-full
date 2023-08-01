<?php
namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseContract {

    protected $model;
    public function __construct(Model $model){
        $this->model = $model;
    }

    public function all() {
        return $this->model->all();
    }
    public function find($id){}
    public function create(array $data){}
    public function update($id, array $data){}
    public function delete($id){}

    // public function productsWithCategory() {
    //     // Specific implementation for "Product with Category" scenario
    //     return Product::with('category')->get();
    // }

    // Each specific repository must implement this method to provide the model class
    // abstract protected function getModelClass();
}
