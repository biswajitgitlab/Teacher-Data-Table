<?php

namespace App\Models;

use CodeIgniter\Model;
// use App\Models\UserModel as BaseModel;

class ItemModel extends Model
{
    protected $table      = 'items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description'];
}