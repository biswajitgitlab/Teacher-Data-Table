<?php 
    
namespace App\Models;
use CodeIgniter\Model;
class PractiseModel extends Model{
    protected $table = "practise";
    protected $primaryKey = "id";
    protected $allowedFields = ['fname', 'lname', 'image'];

    public function updateRecord($data, $id)
    {
        $this->set($data);
        $this->where($this->primaryKey, $id);
        $this->update();

        
        return $this->affectedRows(); // Optional: Return the number of affected rows

    }

}

    
    
    
    
    
    
?>