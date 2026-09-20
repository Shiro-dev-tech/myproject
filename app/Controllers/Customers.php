<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $customers = [
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'juan@email.com',
                'phone' => '09123456789'
            ],
            [
                'name' => 'Maria Santos',
                'email' => 'maria@email.com',
                'phone' => '09234567890'
            ],
            [
                'name' => 'Jose Reyes',
                'email' => 'jose@email.com',
                'phone' => '09345678901'
            ],
            [
                'name' => 'Ana Garcia',
                'email' => 'ana@email.com',
                'phone' => '09456789012'
            ],
            [
                'name' => 'Mark Lopez',
                'email' => 'mark@email.com',
                'phone' => '09567890123'
            ]
        ];

        return view('customers', ['customers' => $customers]);
    }
}