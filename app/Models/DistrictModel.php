<?php

namespace App\Models;

use CodeIgniter\Model;

class DistrictModel extends Model
{
    protected $table            = 'erp_districts';
    protected $allowedFields = ['state_id', 'name'];
   
}
