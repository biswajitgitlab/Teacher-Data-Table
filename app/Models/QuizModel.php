<?php
namespace App\Models;
use CodeIgniter\Model;

class QuizModel extends Model {
 
    protected $table = 'quiz_list_master';
    protected $primaryKey = 'quiz_id';
    protected $allowedFields = ['id', 'quiz_id', 'name', 'type', 'description', 'instruction', 'no_of_question', 'question_in_page', 'show_result', 'exam_time', 'time_based_publish', 'publish_start_time', 'publish_end_time', 'published_status', 'quiz_helpsheet', 'quiz_image', 'created_by', 'created_on', 'updated_by', 'updated_on'];
    

     }
     
        
     





?>