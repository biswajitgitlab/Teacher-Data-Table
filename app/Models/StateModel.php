<?php

namespace App\Models;

use CodeIgniter\Model;

class StateModel extends Model
{
    protected $table            = 'erp_states';
    protected $allowedFields = ['name'];
    
}
