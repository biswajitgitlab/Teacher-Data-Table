<?php
namespace App\Controllers;

use App\Models\TeacherModel;
use CodeIgniter\Controller;
class TeacherController extends BaseController
{
public function index(){
    //echo"Name";
    $teacher_model= new TeacherModel();
$data['title']='Teacher Data';
   // $data['teacher']= $teacher_model->orderBy('id', 'DESC')->findAll();
//print_r($data);
return view('teacher/index',$data);

}
public function create(){
    //print_r($_FILES); exit;
    $data=[
        'name'=>$this->request->getpost('name'),
        'email'=>$this->request->getpost('email'),
        'address'=>$this->request->getpost('address'),
        'number'=>$this->request->getpost('number'),
        'teacher_class'=>$this->request->getpost('teacher_class')
    ];

                // Handle image upload
                $image = $this->request->getFile('image');
                //print_r($image); exit;
                // Move the uploaded file to the 'htdocs/uploads' folder
                $newName = $image->getRandomName();
                $image->move('uploads/', $newName);

                // Get the file name
                $imageName = $image->getName();
                //print_r($imageName); exit;

                // Add image name and path to the data array
                $data['image'] = $imageName;
                //$data['image_path'] = base_url('uploads/' . $newName); // Change 'uploads' to your actual upload folder

                $teacher_model= new TeacherModel();
                $teacher_model->insert($data);
                return json_encode(['status' => 'Success','msg'=> 'Successfully Added']);
}

    public function read(){
        $teacher_model= new TeacherModel();
        $data= $teacher_model->orderBy('id', 'ASC')->findAll();
        return json_encode(['status' => 'Success','msg'=> 'Successfully Added','data'=>$data]);

    }
    public function edit(){
        $id=$this->request->getpost('id');
        $teacher_model= new TeacherModel();
        $data= $teacher_model->where('id', $id)->find();
        //print_r($data);exit;
        return json_encode(['status' => 'Success','msg'=> 'Successfully Added','data'=>$data]);

    }

            public function update(){ 
                $id=$this->request->getpost('id');
                $data=[
                    'name'=>$this->request->getpost('name_edit'),
                    'email'=>$this->request->getpost('email_edit'),
                    'address'=>$this->request->getpost('address_edit'),
                    'number'=>$this->request->getpost('number_edit'),
                    'teacher_class'=>$this->request->getpost('teacher_class_edit')
                ];
    //print_r($data);exit;
    $newImage = $this->request->getFile('image_edit');
    
    
        // Move the uploaded file to the 'uploads/' folder
        $newName = $newImage->getRandomName();
        $newImage->move('uploads/', $newName);

        // Get the file name and add it to the data array
        $imageName = $newImage->getName();
        $data['image'] = $imageName;
        $teacher_model= new TeacherModel();
        $teacher_model->updateRecord($data, $id);
        return json_encode(['status' => 'Success','msg'=> 'Successfully Updated']);
    
}
public function delete()
{
    $id = $this->request->getPost('id');
    $teacher_model = new TeacherModel();
    $teacher_model->where('id', $id)->delete();

    return json_encode(['status' => 'Success', 'msg' => 'Successfully Deleted']);
}


}









    