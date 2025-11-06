<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    /**
     * Show login page (GET /login)
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

        return view('user/login', [
            'errors'  => $errors,
            'old'     => $old,
            'success' => $success,
        ]);
    }

    /**
     * Handle login (POST /login)
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

        // Normalize to array
        $userArr = is_array($user) ? $user : (method_exists($user, 'toArray') ? $user->toArray() : (array) $user);

        // Check password (use empty string if not set)
        if (! password_verify($post['password'] ?? '', $userArr['password_hash'] ?? '')) {
            $session->setFlashdata('errors', ['password' => 'Incorrect password']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        // Normalize role/type (support both 'type' and 'role' DB columns)
        $userType = strtolower($userArr['type'] ?? $userArr['role'] ?? 'customer');

        // Save session data
        $session->set('user', [
            'id'         => $userArr['id'] ?? null,
            'email'      => $userArr['email'] ?? null,
            'first_name' => $userArr['first_name'] ?? null,
            'last_name'  => $userArr['last_name'] ?? null,
            'type'       => $userType,
        ]);

        // Remember Me option
        $remember = (bool) $request->getPost('remember');
        $params = session_get_cookie_params();
        $lifetime = $remember ? (30 * 24 * 60 * 60) : 0;
        $secure = (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] === 'https');
        setcookie(
            session_name(),
            session_id(),
            $lifetime ? (time() + $lifetime) : 0,
            $params['path'],
            $params['domain'],
            $secure,
            true // httponly
        );

        // Redirect based on normalized role
        if ($userType === 'admin') {
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
        $secure = (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] === 'https');
        setcookie(session_name(), '', time() - 3600, $params['path'], $params['domain'], $secure, true);

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

        return view('user/signup', ['errors' => $errors, 'old' => $old]);
    }

    public function signup()
    {
        $request = service('request');
        $session = session();
        $validation = \Config\Services::validation();

        // Validation rules
        $validation->setRule('first_name', 'First name', 'required|min_length[2]|max_length[100]');
        $validation->setRule('last_name',  'Last name',  'required|min_length[2]|max_length[100]');
        $validation->setRule('email',      'Email',      'required|valid_email');
        $validation->setRule('password',   'Password',   'required|min_length[8]');
        $validation->setRule('confirm_password', 'Confirm Password', 'required|matches[password]');

        $post = $request->getPost();

        // If validation fails
        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        $userModel = new \App\Models\UserModel();

        // Prevent duplicate email
        if ($userModel->where('email', $post['email'])->first()) {
            $session->setFlashdata('errors', ['email' => 'Email already registered']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // Prepare display name
        $displayName = trim($post['display_name'] ?? ($post['first_name'] . ' ' . $post['last_name']));

        // Generate username
        $baseForUsername = $displayName ?: explode('@', $post['email'])[0];
        $username = $this->generateUniqueUsername($baseForUsername, $userModel);

        // Prepare data for insertion
        $data = [
            'first_name'      => $post['first_name'],
            'middle_name'     => $post['middle_name'] ?? null,
            'last_name'       => $post['last_name'],
            'display_name'    => $displayName,
            'username'        => $username,
            'email'           => $post['email'],
            'password_hash'   => password_hash($post['password'], PASSWORD_DEFAULT),
            'role'            => 'client',
            'is_artist'       => 0,
            'account_status'  => 1,
            'email_activated' => 0,
            'newsletter'      => 1,
        ];

        // Insert user
        $inserted = $userModel->insert($data);

        if (! $inserted) {
            $errors = $userModel->errors() ?? ['general' => 'Registration failed, please try again.'];
            $session->setFlashdata('errors', $errors);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        $session->setFlashdata('success', 'Account created successfully. Please log in.');
        return redirect()->to('/login');
    }

    /**
     * Generate a unique username based on a base string
     */
    protected function generateUniqueUsername(string $base, \App\Models\UserModel $userModel)
    {
        $base = strtolower(preg_replace('/[^a-z0-9]+/', '-', trim($base)));
        $base = trim($base, '-');
        if ($base === '') $base = 'user';

        $username = $base;
        $suffix = 0;

        while ($userModel->where('username', $username)->first()) {
            $suffix++;
            $username = $base . $suffix;
            if ($suffix > 50) {
                $username = $base . '-' . substr(bin2hex(random_bytes(3)), 0, 6);
                break;
            }
        }
        return $username;
    }
}
