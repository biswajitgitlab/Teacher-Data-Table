<?php
namespace App\Controllers;

use App\Models\LmsModel;
use App\Models\QuizModel;
use CodeIgniter\Controller;
use \Hermawan\DataTables\DataTable;

class LmsController extends BaseController
{

    public function index(){
        if ($this->request->isAJAX()) {
            $db = db_connect();
            $builder = $db->table('lms_session_exam as lse')
            ->join('quiz_list_master as ql','ql.quiz_id=lse.exam_id')
            ->select('lse.id,ql.name,lse.status');
            
            return DataTable::of($builder)->toJson();

            
        }
        
        $lms_model= new LmsModel();
        $QuizModel = new QuizModel();
        $data['quizlist'] = $QuizModel->findAll();
        

       
        // $data=$lms_model->getAll();
       
        return view('lms/index',$data);

    }

    public function create(){
        $data=[
            
       'exam_id'=>$this->request->getPost('exam_id'),
        'status'=> $this->request->getPost('status'),
        'created_on' => date('Y-m-d H:i:s')
        ];

        
        $lms_model= new LmsModel();
        $lms_model->insert($data);
        return json_encode(['status' => 'Success','msg'=> 'Successfully Added']);

        }
        public function read(){
            $lms_model= new LmsModel();
            $data= $lms_model->orderBy('id', 'ASC')->findAll();
            return json_encode(['status' => 'Success','msg'=> 'Successfully Added','data'=>$data]);
    
        }

        public function edit(){
            $id=$this->request->getpost('id');
            $lms_model= new LmsModel();
            $data= $lms_model->where('id', $id)->find();
            //print_r($data);exit;
            return json_encode(['status' => 'Success','msg'=> 'Successfully Added','data'=>$data]);
    
        }
        public function update()
{
    $id = $this->request->getPost('id');
    $data = [
        'exam_id' => $this->request->getPost('exam_id_edit'),
        'status' => $this->request->getPost('status_edit'),
        'updated_on' => date('Y-m-d H:i:s')
    ];

    $lms_model = new LmsModel();
    $lms_model->updateRecord($data, $id);

    return $this->response->setJSON(['status' => 'Success', 'msg' => 'Successfully Updated']);
}



}













?>

