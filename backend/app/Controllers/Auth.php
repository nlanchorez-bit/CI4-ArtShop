<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        $session = session();
        $request = $this->request;
        $validation = \Config\Services::validation();

        // If POST, attempt authentication
        if ($request->getMethod() === 'post') {
            // validation rules
            $validation->setRule('email', 'Email', 'required|valid_email');
            $validation->setRule('password', 'Password', 'required');

            $post = $request->getPost();

            if (! $validation->run($post)) {
                $session->setFlashdata('errors', $validation->getErrors());
                $session->setFlashdata('old', $post);
                return redirect()->back()->withInput();
            }

            $email = (string) $request->getPost('email');
            $userModel = new UserModel();
            $user = $userModel->where('email', $email)->first();

            if (! $user) {
                $session->setFlashdata('errors', ['email' => 'No account found for that email']);
                $session->setFlashdata('old', ['email' => $email]);
                return redirect()->back()->withInput();
            }

            // Normalize to array (UserModel may return entity or array)
            $userArr = is_array($user) ? $user : (method_exists($user, 'toArray') ? $user->toArray() : (array) $user);

            $passwordHash = $userArr['password_hash'] ?? '';

            if (! password_verify((string)$request->getPost('password'), $passwordHash)) {
                $session->setFlashdata('errors', ['password' => 'Incorrect password']);
                $session->setFlashdata('old', ['email' => $email]);
                return redirect()->back()->withInput();
            }

            // authentication successful -> set session
            $session->set('user', [
                'id' => $userArr['id'] ?? null,
                'email' => $userArr['email'] ?? null,
                'first_name' => $userArr['first_name'] ?? null,
                'last_name' => $userArr['last_name'] ?? null,
                'type' => $userArr['type'] ?? 'client',
                'display_name' => trim(($userArr['first_name'] ?? '') . ' ' . ($userArr['last_name'] ?? '')),
            ]);

            // Redirect by user type
            $type = strtolower($userArr['type'] ?? 'client');
            if ($type === 'manager') {
                return redirect()->to('/admin/dashboard');
            }

            return redirect()->to('/');
        }

        // GET: render login view (passes any flashdata to view)
        return view('user/login', [
            'old' => session()->getFlashdata('old') ?? [],
            'errors' => session()->getFlashdata('errors') ?? [],
        ]);
    }

    /**
     * Logout user: remove session data, destroy session, remove session cookie,
     * then redirect to homepage.
     */
    public function logout()
    {
        $session = session();

        if ($session->has('user')) {
            $session->remove('user');
        }

        $session->destroy();

        $params = session_get_cookie_params();
        $secure = ! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
        $path = $params['path'] ?? '/';
        $domain = $params['domain'] ?? '';

        setcookie(session_name(), '', time() - 3600, $path, $domain, $secure, true);

        return redirect()->to('/');
    }

    public function signup()
    {
        $session = session();
        $request = $this->request;
        $validation = \Config\Services::validation();

        // Only process when method is POST
        if ($request->getMethod() === 'post') {

            // Validation rules
            $validation->setRule('first_name', 'First Name', 'required|min_length[2]');
            $validation->setRule('last_name', 'Last Name', 'required|min_length[2]');
            $validation->setRule('email', 'Email', 'required|valid_email');
            $validation->setRule('password', 'Password', 'required|min_length[8]');
            $validation->setRule('confirm_password', 'Confirm Password', 'required|matches[password]');

            $post = $request->getPost();

            // If validation fails
            if (! $validation->run($post)) {
                $session->setFlashdata('errors', $validation->getErrors());
                $session->setFlashdata('old', $post);
                return redirect()->back()->withInput();
            }

            // Check if email already exists
            $userModel = new UserModel();
            $existing = $userModel->where('email', $post['email'])->first();

            if ($existing) {
                $session->setFlashdata('errors', ['email' => 'Email is already registered.']);
                $session->setFlashdata('old', $post);
                return redirect()->back()->withInput();
            }

            // Prepare Data (matching database table fields)
            $data = [
                'first_name'       => $post['first_name'],
                'middle_name'      => $post['middle_name'] ?? null,
                'last_name'        => $post['last_name'],
                'email'            => $post['email'],
                'password_hash'    => password_hash($post['password'], PASSWORD_DEFAULT),
                'type'             => 'client',
                'account_status'   => 1,
                'email_activated'  => 0,
                'newsletter'       => isset($post['newsletter']) ? 1 : 0,
                'gender'           => $post['gender'] ?? null,
                'profile_image'    => null,
            ];

            // Insert
            $inserted = $userModel->insert($data);

            if (! $inserted) {
                $session->setFlashdata('errors', ['general' => 'Registration failed, please try again.']);
                $session->setFlashdata('old', $post);
                return redirect()->back()->withInput();
            }

            // Success: Redirect to login
            $session->setFlashdata('success', 'Account created successfully. Please log in.');
            return redirect()->to('/login');
        }

        // GET Request: Show signup view
        return view('user/signup', [
            'old' => $session->getFlashdata('old') ?? [],
            'errors' => $session->getFlashdata('errors') ?? [],
        ]);
    }
}
