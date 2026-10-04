<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $users = $userModel->findAll();

        return view('users', ['users' => $users]);
    }

    public function new()
    {
        return view('users_new');
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|is_unique[users.username]',
            'full_name' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $userModel->insert([
            'username'   => $this->request->getPost('username'),
            'full_name'  => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('users'));
    }

    public function edit($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        return view('users_edit', ['user' => $user]);
    }

    public function update($id)
    {
        $userModel = new UserModel();

        $rules = [
            'username'  => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required',
        ];

        $file = $this->request->getFile('avatar');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $rules['avatar'] =
                'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();

            $file->move(FCPATH . 'uploads', $newName);

            // Prepare the avatar as a 200x200 display-ready image
            \Config\Services::image()
                ->withFile(FCPATH . 'uploads/' . $newName)
                ->fit(200, 200, 'center')
                ->save(FCPATH . 'uploads/' . $newName);

            // Save only the filename in the database
            $data['avatar'] = $newName;
        }

        $userModel->update($id, $data);

        return redirect()->to(site_url('users'));
    }
}