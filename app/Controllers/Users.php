<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $users = [
            [
                'username' => 'admin01',
                'name' => 'John Cruz',
                'role' => 'Administrator'
            ],
            [
                'username' => 'cashier01',
                'name' => 'Maria Santos',
                'role' => 'Cashier'
            ],
            [
                'username' => 'cashier02',
                'name' => 'Kevin Reyes',
                'role' => 'Cashier'
            ],
            [
                'username' => 'staff01',
                'name' => 'Angela Garcia',
                'role' => 'Staff'
            ],
            [
                'username' => 'manager01',
                'name' => 'Mark Lopez',
                'role' => 'Manager'
            ]
        ];

        return view('users', ['users' => $users]);
    }
}