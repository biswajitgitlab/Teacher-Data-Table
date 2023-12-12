<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('product/list', $data);
    }

  

    public function create()
    {
        return view('product/create');
        
    }
    
    public function store()
    {
        $model = new ProductModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
        ];

        //print_r($data); exit;

        $model->insert($data);

        return redirect()->to('/product');
    }
    public function edit($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->getProduct($id);

        if (!$data['product']) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Product not found!',
            ]);
        }

        return view('product/edit', $data);
    }

    public function update($id)
    {
        $model = new ProductModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
        ];
        $model->update($id, $data);

        return $this->response->setJSON([
            // 'status' => 'success',
            // 'message' => 'Product updated successfully!',
            'redirect' => site_url('product'),
        ]);
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id);

        // return $this->response->setJSON([
        //     'status' => 'success',
        //     'message' => 'Product deleted successfully!',
        // ]);
        return redirect()->to('/product');
    }
}
?>