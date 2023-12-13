<?php
namespace App\Models;
use CodeIgniter\Model;

class LmsModel extends Model {
 
    protected $table = 'lms_session_exam';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['id', 'exam_id', 'status', 'created_by', 'created_on', 'updated_by', 'updated_on'];
    

    public function updateRecord($data, $id)
    {
        $this->set($data);
        $this->where($this->primaryKey, $id);
        $this->update();

        return $this->affectedRows(); // Optional: Return the number of affected rows
    }
   
   
}



?>