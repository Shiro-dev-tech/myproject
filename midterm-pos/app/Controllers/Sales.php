<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\SaleModel;

class Sales extends BaseController
{
    public function new()
    {
        if (!session()->get('user_id')) {
            return redirect()->to(site_url('login'))
                ->with('error', 'Please log in first.');
        }

        $productModel = new ProductModel();
        $customerModel = new CustomerModel();

        return view('sales/new', [
            'products' => $productModel
         ->where('is_archived', 0)
         ->orderBy('name', 'ASC')
         ->findAll(),

            'customers' => $customerModel
                ->orderBy('full_name', 'ASC')
                ->findAll(),
        ]);
    }

    public function create()
    {
        if (!session()->get('user_id')) {
            return redirect()->to(site_url('login'))
                ->with('error', 'Please log in first.');
        }

        $rules = [
            'product_id'  => 'required|is_natural_no_zero',
            'customer_id' => 'permit_empty|is_natural_no_zero',
            'quantity'    => 'required|is_natural_no_zero',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->listErrors());
        }

        $db = db_connect();

        $productId = (int) $this->request->getPost('product_id');
        $quantity = (int) $this->request->getPost('quantity');

        $customerInput = $this->request->getPost('customer_id');

        $customerId = $customerInput !== ''
            ? (int) $customerInput
            : null;

        $db->transStart();

        $product = $db->query(
            'SELECT id, price, stock_quantity
             FROM products
             WHERE id = ?
             FOR UPDATE',
            [$productId]
        )->getRowArray();

        if (!$product) {
            $db->transRollback();

            return redirect()->back()
                ->withInput()
                ->with('error', 'The selected product does not exist.');
        }

        if ($quantity > (int) $product['stock_quantity']) {
            $db->transRollback();

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Sale rejected: only '
                    . $product['stock_quantity']
                    . ' item(s) are available.'
                );
        }

        if (
            $customerId !== null
            && !(new CustomerModel())->find($customerId)
        ) {
            $db->transRollback();

            return redirect()->back()
                ->withInput()
                ->with('error', 'The selected customer does not exist.');
        }

        $newStock =
            (int) $product['stock_quantity'] - $quantity;

        $db->table('products')
            ->where('id', $productId)
            ->update([
                'stock_quantity' => $newStock,
            ]);

        $saleModel = new SaleModel();

        $saleModel->insert([
            'product_id'  => $productId,
            'customer_id' => $customerId,
            'sold_by'     => (int) session()->get('user_id'),
            'quantity'    => $quantity,
            'total_price' => (float) $product['price'] * $quantity,
            'created_at'  => date('Y-m-d H:i:s'),
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'The sale could not be recorded.');
        }

        return redirect()->to(site_url('sales/history'))
            ->with('success', 'Sale recorded successfully.');
    }

    public function history()
    {
        if (!session()->get('user_id')) {
            return redirect()->to(site_url('login'))
                ->with('error', 'Please log in first.');
        }

        $sales = db_connect()
            ->table('sales s')
            ->select(
                's.*,
                 p.name AS product_name,
                 c.full_name AS customer_name,
                 u.full_name AS staff_name'
            )
            ->join('products p', 'p.id = s.product_id')
            ->join('customers c', 'c.id = s.customer_id', 'left')
            ->join('users u', 'u.id = s.sold_by')
            ->orderBy('s.created_at', 'DESC')
            ->get()
            ->getResultArray();

        return view('sales/history', [
            'sales' => $sales
        ]);
    }
}