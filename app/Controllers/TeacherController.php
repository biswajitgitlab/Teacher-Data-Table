<?php
namespace App\Controllers;

use App\Models\TeacherModel;
use App\Models\StudentModel;
use App\Models\StateModel;
use App\Models\DistrictModel;
use App\Models\CityModel;
use CodeIgniter\Controller;
use \Hermawan\DataTables\DataTable;

class TeacherController extends BaseController
{
    public function index()
    {
        //echo"Name";
       // $teacher_model = new TeacherModel();
        if ($this->request->isAJAX()) {
            $db = db_connect();
            $builder = $db->table('teacher')
            ->join('students','students.id=teacher.student_id','left')
            ->join('erp_states','erp_states.id=teacher.state_id','left')
            ->join('erp_districts','erp_districts.id=teacher.district_id','left')
            ->join('erp_cities','erp_cities.id=teacher.city_id','left')
            ->select('teacher.id,teacher.name,teacher.email,teacher.address,teacher.number,teacher.teacher_class,students.name as sname,teacher.image,erp_states.name as stname,erp_districts.name as dname,erp_cities.name as cname');
            
            return DataTable::of($builder)->toJson();

            
        }
        $data['title'] = 'Teacher Data';
        // $data['teacher']= $teacher_model->orderBy('id',teacher. 'DESC')->findAll();
       //print_r($data);exit;  ['name'=>'gg','vg'=>'vv','name'=>'ggg']
        $stateModel = new StateModel();
        $districtModel = new DistrictModel();
        $cityModel = new CityModel();
        $data['states'] = $stateModel->findAll();
        $data['district_id'] = $districtModel->findAll();
        $data['city_id'] = $cityModel->findAll();
        //$stateid = $this->request->getPost("sid");
        //$data['districts']=$districtModel->where('state_id', $stateid)->findAll();
        //print_r($data['district']);
        
       // $data['cities'] = $cityModel->findAll();

        $studentModel = new StudentModel();
        $students = $studentModel->findAll();

         //print_r($data); die;
      
        $data['students'] = $students;
        return view('teacher/index', $data);

    }
    public function create()
    {
        // Validation rules for image
    $validationRules = [
        'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]|ext_in[image,jpg,jpeg,png]',
        // Add more validation rules as needed
    ];

    // Validate the request data
    if (!$this->validate($validationRules)) {
        // Validation failed, return error messages
        return json_encode(['status' => 'Error', 'msg' => $this->validator->getErrors()]);
    }
        //print_r($_FILES); exit;
        $data = [
            'name' => $this->request->getpost('name'),
            'email' => $this->request->getpost('email'),
            'address' => $this->request->getpost('address'),
            'number' => $this->request->getpost('number'),
            'teacher_class' => $this->request->getpost('teacher_class')
        ];

        // Handle image upload
        $image = $this->request->getFile('image');
        // In the controller
        
        //print_r($image); exit;
        // Move the uploaded file to the 'htdocs/uploads' folder
        $newName = $image->getRandomName();
        $image->move('uploads/', $newName);

        // Get the file name
        $imageName = $image->getName();
        //print_r($imageName); exit;

        // Add image name and path to the data array
        $data['image'] = $imageName;

        $selectedStudentId = $this->request->getPost('student_id');
        $data['student_id'] = $selectedStudentId;
        $studentModel = new StudentModel();
        $students = $studentModel->findAll();

        // Pass student names to the view for the dropdown
        $data['students'] = $students;
        $stateModel = new StateModel();
        $districtModel = new DistrictModel();
        $cityModel = new CityModel();
        $data['state_id'] =$this->request->getPost('state_id');
        $data['district_id'] = $this->request->getPost('district_id');
        $data['city_id'] = $this->request->getPost('cities_id');

        $teacher_model = new TeacherModel();
        $teacher_model->insert($data);
        return json_encode(['status' => 'Success', 'msg' => 'Successfully Added']);
    }

    public function read()
    {
        $teacher_model = new TeacherModel();
        $data = $teacher_model->orderBy('id', 'ASC')->findAll();
        return json_encode(['status' => 'Success', 'msg' => 'Successfully Added', 'data' => $data]);

    }
    public function edit()
    {
        $id = $this->request->getpost('id');
        $teacher_model = new TeacherModel();
        $data = $teacher_model->where('id', $id)->find();
        //print_r($data);exit;
        return json_encode(['status' => 'Success', 'msg' => 'Successfully Added', 'data' => $data]);

    }

    public function update()
    {
        $id = $this->request->getpost('id');
        $data = [
            'name' => $this->request->getpost('name_edit'),
            'email' => $this->request->getpost('email_edit'),
            'address' => $this->request->getpost('address_edit'),
            'number' => $this->request->getpost('number_edit'),
            'teacher_class' => $this->request->getpost('teacher_class_edit'),
            'student_id' => $this->request->getpost('student_edit_id')

        ];
        //print_r($data);exit;
        $newImage = $this->request->getFile('image_edit');


        // Move the uploaded file to the 'uploads/' folder
        $newName = $newImage->getRandomName();
        $newImage->move('uploads/', $newName);
        //$districts = $districtModel->where('state_id', $stateid)->findAll();

        // Get the file name and add it to the data array
        $imageName = $newImage->getName();
        $data['image'] = $imageName;
        $data['state_id'] =$this->request->getPost('state_edit_id');
        $data['district_id'] = $this->request->getPost('district_edit_id');
        $data['city_id'] = $this->request->getPost('cities_edit_id');
        $teacher_model = new TeacherModel();
        $teacher_model->updateRecord($data, $id);
        return json_encode(['status' => 'Success', 'msg' => 'Successfully Updated']);

    }
    public function delete()
    {
        $id = $this->request->getPost('id');
        $teacher_model = new TeacherModel();
        $teacher_model->where('id', $id)->delete();

        return json_encode(['status' => 'Success', 'msg' => 'Successfully Deleted']);
    }


    public function state(){
        $stateid = $this->request->getPost("sid");
    
   
    
        $stateModel = new StateModel();
        $districtModel = new DistrictModel();
    
       
        $districts = $districtModel->where('state_id', $stateid)->findAll();
        //$data['districts'].=$districts;
        //print_r($data['district']);exit;
        

        
        echo json_encode($districts);
    
        // Fetch all states and cities
        //$data['states'] = $stateModel->findAll();
        //$data['cities'] = $cityModel->findAll();
    
        // You can now use the $data array as needed in your application.
        // For example, you might want to return it if this function is called via an API or use it in a view.
        
    }

    public function city(){
        $distid = $this->request->getPost("cid");
    
   //echo $distid;
    
        $CityModel = new CityModel();
        $districtModel = new DistrictModel();
        $stateModel = new StateModel();
    
       
        $citys = $CityModel->where('district_id', $distid)->findAll();
        //$districts = $districtModel->where('state_id', $stateid)->findAll();
        //$data['districts'].=$districts;
        //print_r($data['district']);exit;
        //echo ($citys);

        
        echo json_encode($citys);
    }
    


}