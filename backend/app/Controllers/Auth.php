<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    /**
     * Show Login Page
     */
    public function showLoginPage()
    {
        $session = session();

        // Redirect if already logged in
        if ($session->has('user')) {
            $type = strtolower($session->get('user')['type'] ?? 'customer');
            return $type === 'admin'
                ? redirect()->to('/admin/dashboard')
                : redirect()->to('/');
        }

        // Pull flashdata
        $errors = $session->getFlashdata('errors') ?? [];
        $old = $session->getFlashdata('old') ?? [];
        $success = $session->getFlashdata('success') ?? null;

        return view('auth/login', [
            'errors' => $errors,
            'old' => $old,
            'success' => $success
        ]);
    }

    /**
     * Handle Login Logic
     */
    public function login()
    {
        $request = service('request');
        $session = session();
        $validation = \Config\Services::validation();

        // Validate fields
        $validation->setRule('email', 'Email', 'required|valid_email');
        $validation->setRule('password', 'Password', 'required');

        $post = $request->getPost();

        // If validation fails
        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        $email = $post['email'];
        $userModel = new UserModel();

        // Check if active user exists
        $user = $userModel->where('email', $email)->where('account_status', 1)->first();
        if (! $user) {
            $session->setFlashdata('errors', ['email' => 'No active account found for that email']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        $userArr = is_array($user) ? $user : $user->toArray();

        // Check password
        if (! password_verify($post['password'], $userArr['password_hash'] ?? '')) {
            $session->setFlashdata('errors', ['password' => 'Incorrect password']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        // Save session data
        $session->set('user', [
            'id' => $userArr['id'] ?? null,
            'email' => $userArr['email'] ?? null,
            'first_name' => $userArr['first_name'] ?? null,
            'last_name' => $userArr['last_name'] ?? null,
            'type' => strtolower($userArr['type'] ?? 'customer'),
        ]);

        // Remember Me option
        $remember = (bool) $request->getPost('remember');
        $params = session_get_cookie_params();
        $lifetime = $remember ? (30 * 24 * 60 * 60) : 0;
        setcookie(session_name(), session_id(), $lifetime ? time() + $lifetime : 0, $params['path'], $params['domain'], isset($_SERVER['HTTPS']), true);

        // Redirect based on role
        if ($userArr['type'] === 'admin') {
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->to('/');
    }

    /**
     * Handle Logout
     */
    public function logout()
    {
        session()->destroy();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $params['path'], $params['domain'], isset($_SERVER['HTTPS']), true);

        return redirect()->to('/login');
    }

    /**
     * Show Signup Page
     */
    public function showSignupPage()
    {
        $session = session();

        if ($session->has('user')) {
            return redirect()->to('/');
        }

        $errors = $session->getFlashdata('errors') ?? [];
        $old = $session->getFlashdata('old') ?? [];

        return view('auth/signup', ['errors' => $errors, 'old' => $old]);
    }

    /**
     * Handle Signup Logic
     */
    public function signup()
    {
        $request = service('request');
        $session = session();
        $validation = \Config\Services::validation();

        // Validation Rules
        $validation->setRule('first_name', 'First name', 'required|min_length[2]|max_length[100]');
        $validation->setRule('last_name', 'Last name', 'required|min_length[2]|max_length[100]');
        $validation->setRule('email', 'Email', 'required|valid_email');
        $validation->setRule('password', 'Password', 'required|min_length[6]');
        $validation->setRule('password_confirm', 'Password Confirmation', 'required|matches[password]');

        $post = $request->getPost();

        // If invalid
        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        $userModel = new UserModel();

        // Prevent duplicate email
        if ($userModel->where('email', $post['email'])->first()) {
            $session->setFlashdata('errors', ['email' => 'Email already registered']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // Prepare data for insertion
        $data = [
            'first_name' => $post['first_name'],
            'middle_name' => $post['middle_name'] ?? null, // nullable
            'last_name' => $post['last_name'],
            'email' => $post['email'],
            'password_hash' => password_hash($post['password'], PASSWORD_DEFAULT),
            'type' => 'customer',
            'account_status' => 1,
            'email_activated' => 1,
        ];

        // Insert to database
        $inserted = $userModel->insert($data);

        if (! $inserted) {
            $session->setFlashdata('errors', ['general' => 'Could not create account. Please try again.']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // Success redirect
        $session->setFlashdata('success', 'Account created successfully! Please log in.');
        return redirect()->to('/login');
    }
}
