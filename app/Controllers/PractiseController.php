<?php 
namespace App\Controllers;
use App\Models\PractiseModel;
use CodeIgniter\Controller;
use \Hermawan\DataTables\DataTable;


class PractiseController extends BaseController{
    public function index(){
        if ($this->request->isAJAX()) {
            $db = db_connect();
            $builder = $db->table('practise as ps')
            ->select('ps.id,ps.fname,ps.lname,ps.image');
            return DataTable::of($builder)->toJson();

}

    $practise_model=new PractiseModel();

    return view('practise/index');
        }



        public function create(){
            // print_r($_POST); exit;

            $data=[
                'fname'=> $this->request->getpost('fname'),
                'lname'=> $this->request->getpost('lname')

        ];

        $image = $this->request->getFile('image');

if ($image->isValid() && !$image->hasMoved()) {
    $newName = $image->getRandomName();
    $image->move('uploads/');

    $imageName = $image->getName();
    $data['image'] = $imageName;

    $practise_model = new PractiseModel();
    $practise_model->insert($data);

    return json_encode(['status' => 'Success', 'msg' => 'Successfully Added']);
} else {
    return json_encode(['status' => 'Error', 'msg' => 'Failed to upload the file']);
}

    }
    public function read(){
        $practise_model = new PractiseModel();
        $data = $practise_model->orderBy('id', 'ASC')->findAll();
        return json_encode(['status' => 'Success', 'msg' => 'Successfully Added', 'data' => $data]);
    }
    public function edit()
    {
        $id = $this->request->getpost('id');
        $practise_model = new PractiseModel();
        $data = $practise_model->where('id', $id)->find();
        //print_r($data);exit;
        return json_encode(['status' => 'Success', 'msg' => 'Successfully Added', 'data' => $data]);

    }
    public function update()
    {
        $id = $this->request->getpost('id');
        $data = [
            'fname' => $this->request->getpost('fname_edit'),
            'lname' => $this->request->getpost('lname_edit')
            

        ];
      
        $newImage = $this->request->getFile('image_edit');


       
        $newName = $newImage->getRandomName();
        $newImage->move('uploads/', $newName);
       
        $imageName = $newImage->getName();
        $data['image'] = $imageName;
        $practise_model = new PractiseModel();
        $practise_model->updateRecord($data, $id);
        return json_encode(['status' => 'Success', 'msg' => 'Successfully Updated']);
    }

    public function delete()
{
    $id = $this->request->getPost('id');
    $practise_model = new PractiseModel();
    $practise_model->where('id', $id)->delete();

    return json_encode(['status' => 'Success', 'msg' => 'Successfully Deleted']);
}
    




}






?>