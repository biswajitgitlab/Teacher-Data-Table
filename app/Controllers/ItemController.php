<?php

namespace App\Controllers;

use App\Models\ItemModel;

class ItemController extends BaseController
{
    public function index()
    {
        $this-> load-> view('items/index', $data);
    }

    public function create()
    {
        return view('items/create');
    }

    public function store()
    {
        $model = new ItemModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];

        $model->insert($data);

        return redirect()->to('/items');
    }



    public function edit($id)
    {
        $model = new ItemModel();
        $data['item'] = $model->find($id);

        return view('items/edit', $data);
    }

    public function update($id)
    {
        $model = new ItemModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];

        $model->update($id, $data);

        return redirect()->to('/items');
    }

    public function delete($id)
    {
        $model = new ItemModel();
        $model->delete($id);

        return redirect()->to('/items');
    }

    // Add update and delete methods here
}
