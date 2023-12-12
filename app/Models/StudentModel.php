<?php
namespace App\Models;
use CodeIgniter\Model;

class StudentModel extends Model {
 
    protected $table = 'students';
    protected $allowedFields = ['name','email','address','number','image','teacher'];

    // public function __construct(){
    //     parent::__construct();
    //     $db=Config\Database::connect();
    //     $builder=$db->table('students');
    // }
   

}


?>