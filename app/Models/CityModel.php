<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
    protected $table            = 'erp_cities';
    protected $allowedFields = ['name','district_id','state_id'];
}
