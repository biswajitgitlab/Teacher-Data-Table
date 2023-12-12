<?php

namespace App\Models;

use CodeIgniter\Model;
// use App\Models\UserModel as BaseModel;

// class ProductModel extends Model
// {
//     protected $table      = 'product';
//     protected $primaryKey = 'id';
//     protected $allowedFields = ['name', 'description', 'price'];
// }

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'price'];

    public function getProduct($id)
    {
        $this->where('id', $id);
        return $this->first();
    }
}
