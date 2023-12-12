<?php
namespace App\Models;
use CodeIgniter\Model;

class TeacherModel extends Model {
 
    protected $table = 'teacher';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['name','email','address','number', 'teacher_class', 'image','student_id','state_id', 'district_id', 'city_id'];
    

    public function updateRecord($data, $id)
    {
        $this->set($data);
        $this->where($this->primaryKey, $id);
        $this->update();

        return $this->affectedRows(); // Optional: Return the number of affected rows
    }
   
}



?>