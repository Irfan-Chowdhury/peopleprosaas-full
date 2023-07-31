<?php

namespace App\Contracts;


interface BaseContract {
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);

    // Add other specific methods here as needed
}
