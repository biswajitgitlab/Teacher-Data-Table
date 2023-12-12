<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $data['product'] = $model->findAll();
//print_r($data); exit;
        return view('product/index', $data);
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
        $data['product'] = $model->find($id);

       // print_r($data); exit; 
        return view('product/edit', $data);

    }

    public function update($id)
    {
        $model = new ProductModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price')
    
        ];
       // print_r($data); exit;

        $model->update($id, $data);

        return redirect()->to('/product');
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id);

        return redirect()->to('/product');
    }

    // Add update and delete methods here
}
