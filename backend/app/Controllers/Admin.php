<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        $session = session();

        // Redirect to login if not logged in
        if (! $session->has('user')) {
            return redirect()->to('/login');
        }

        // Only allow admin role
        $user = $session->get('user') ?? [];
        $role = strtolower($user['role'] ?? $user['type'] ?? 'client');
        if ($role !== 'admin') {
            // not authorized to see admin dashboard
            return redirect()->to('/');
        }

        // Determine active tile from URI segment
        $uri = service('uri');
        $segment = strtolower((string) $uri->getSegment(1));
        $active = in_array($segment, ['shop', 'users', 'requests']) ? $segment : 'home';

        // Load UserModel and count active users
        $userModel = new UserModel();
        // count only active accounts (account_status = 1). countAllResults(false) doesn't reset the builder.
        $usersCount = (int) $userModel->where('account_status', 1)->countAllResults(false);

        // get products count if ProductModel exists
        $productsCount = 0;
        if (class_exists('\App\Models\ProductModel')) {
            $pm = new \App\Models\ProductModel();
            $productsCount = (int) $pm->countAllResults(false);
        }

        // get requests count if RequestModel exists
        $requestsCount = 0;
        if (class_exists('\App\Models\RequestModel')) {
            $rm = new \App\Models\RequestModel();
            $requestsCount = (int) $rm->countAllResults(false);
        }

        return view('admin/dashboard', [
            'counts' => [
                'users' => $usersCount,
                'products' => $productsCount,
                'requests' => $requestsCount,
            ],
            'active' => $active,
        ]);
    }
}
