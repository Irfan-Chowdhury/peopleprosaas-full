<?php
namespace App\Repositories;

use App\Contracts\BaseContract;
use App\Models\Category;
use App\Models\Product;

abstract class BaseRepository implements BaseContract {
    // ... other common CRUD methods ...

    // public function productsWithCategory() {
    //     // Specific implementation for "Product with Category" scenario
    //     return Product::with('category')->get();
    // }

    // Each specific repository must implement this method to provide the model class
    abstract protected function getModelClass();
}
