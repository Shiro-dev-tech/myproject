<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();

        $products = $productModel
            ->where('is_archived', 0)
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('products/index', [
            'products' => $products
        ]);
    }

    public function new()
    {
        return view('products/new');
    }

    public function create()
    {
        $rules = [
            'name'           => 'required|max_length[100]',
            'price'          => 'required|decimal',
            'stock_quantity' => 'required|integer|greater_than_equal_to[0]',
            'image'          => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'           => $this->request->getPost('name'),
            'price'          => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'created_at'     => date('Y-m-d H:i:s'),
            'is_archived'    => 0,
        ];

        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();

            $file->move(
                FCPATH . 'uploads/products',
                $newName
            );

            \Config\Services::image()
                ->withFile(
                    FCPATH . 'uploads/products/' . $newName
                )
                ->fit(400, 400, 'center')
                ->save(
                    FCPATH . 'uploads/products/' . $newName
                );

            $data['image'] = $newName;
        }

        $productModel = new ProductModel();

        $productModel->insert($data);

        return redirect()->to(site_url('products'));
    }

    public function edit($id)
    {
        $productModel = new ProductModel();

        $product = $productModel->find($id);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('products/edit', [
            'product' => $product
        ]);
    }

    public function update($id)
    {
        $productModel = new ProductModel();

        $product = $productModel->find($id);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'name'           => 'required|max_length[100]',
            'price'          => 'required|decimal',
            'stock_quantity' => 'required|integer|greater_than_equal_to[0]',
            'image'          => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'           => $this->request->getPost('name'),
            'price'          => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
        ];

        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();

            $file->move(
                FCPATH . 'uploads/products',
                $newName
            );

            \Config\Services::image()
                ->withFile(
                    FCPATH . 'uploads/products/' . $newName
                )
                ->fit(400, 400, 'center')
                ->save(
                    FCPATH . 'uploads/products/' . $newName
                );

            $data['image'] = $newName;
        }

        $productModel->update($id, $data);

        return redirect()->to(site_url('products'));
    }

    public function delete($id)
    {
        $productModel = new ProductModel();

        $product = $productModel->find($id);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $productModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to(site_url('products'));
    }
}