<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        // Determine active tile from URI segment
        $uri = service('uri');
        $segment = strtolower((string) $uri->getSegment(1));
        $active = in_array($segment, ['shop', 'users', 'requests']) ? $segment : 'home';

        // Load only existing UserModel
        $userModel = new UserModel();
        $usersCount = $userModel->countAll();

        // Since ProductModel and RequestModel do not exist yet
        $productsCount = 0;
        $requestsCount = 0;

        return view('admin/dashboard', [
            'counts' => [
                'users' => (int) $usersCount,
                'products' => (int) $productsCount,
                'requests' => (int) $requestsCount,
            ],
            'active' => $active,
        ]);
    }
}
