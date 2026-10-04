<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        $customers = $customerModel->findAll();

        return view('customers', ['customers' => $customers]);
    }

    public function new()
    {
        return view('customers_new');
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();

        $customerModel->insert([
            'full_name'  => $this->request->getPost('full_name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'));
    }

    public function edit($id)
    {
        $customerModel = new CustomerModel();

        $customer = $customerModel->find($id);

        return view('customers_edit', ['customer' => $customer]);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();

        $customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()->to(site_url('customers'));
    }
}