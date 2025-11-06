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

        // if already logged in, redirect based on role
        if ($session->has('user')) {
            $role = strtolower($session->get('user')['role'] ?? 'client');
            if ($role === 'admin') {
                return redirect()->to('/admin');
            }
            return redirect()->to('/');
        }

        return view('user/login', [
            'old'     => $session->getFlashdata('old') ?? [],
            'errors'  => $session->getFlashdata('errors') ?? [],
            'success' => $session->getFlashdata('success') ?? null,
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

        // rules
        $validation->setRule('email', 'Email', 'required|valid_email');
        $validation->setRule('password', 'Password', 'required');

        $post = $request->getPost();

        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        $email = (string) ($post['email'] ?? '');
        $password = (string) ($post['password'] ?? '');

        $userModel = new UserModel();
        // only active accounts
        $user = $userModel->where('email', $email)->where('account_status', 1)->first();

        if (! $user) {
            $session->setFlashdata('errors', ['email' => 'No active account found for that email']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        $userArr = is_array($user) ? $user : (method_exists($user, 'toArray') ? $user->toArray() : (array) $user);

        // password column in your table is password_hash
        if (! password_verify($password, $userArr['password_hash'] ?? '')) {
            $session->setFlashdata('errors', ['password' => 'Incorrect password']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        // set session with relevant fields (match your DB columns)
        $session->set('user', [
            'id'           => $userArr['id'] ?? null,
            'username'     => $userArr['username'] ?? null,
            'email'        => $userArr['email'] ?? null,
            'first_name'   => $userArr['first_name'] ?? null,
            'middle_name'  => $userArr['middle_name'] ?? null,
            'last_name'    => $userArr['last_name'] ?? null,
            'display_name' => $userArr['display_name'] ?? trim(($userArr['first_name'] ?? '') . ' ' . ($userArr['last_name'] ?? '')),
            'role'         => strtolower($userArr['role'] ?? 'client'),
            'is_artist'    => (int) ($userArr['is_artist'] ?? 0),
        ]);

        // redirect admin to admin dashboard
        $role = strtolower($userArr['role'] ?? 'client');
        if ($role === 'admin') {
            return redirect()->to('/admin');
        }

        return redirect()->to('/');
    }

    /**
     * Logout
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

        return redirect()->to('/login');
    }

    /**
     * Show signup page (GET /signup)
     */
    public function showSignupPage()
    {
        $session = session();
        if ($session->has('user')) {
            return redirect()->to('/');
        }

        return view('user/signup', [
            'old' => $session->getFlashdata('old') ?? [],
            'errors' => $session->getFlashdata('errors') ?? [],
        ]);
    }

    /**
     * Signup (POST /signup)
     */
    public function signup()
    {
        $request = service('request');
        $session = session();
        $validation = \Config\Services::validation();

        $validation->setRule('first_name', 'First name', 'required|min_length[2]|max_length[100]');
        $validation->setRule('last_name', 'Last name', 'required|min_length[2]|max_length[100]');
        $validation->setRule('email', 'Email', 'required|valid_email');
        $validation->setRule('password', 'Password', 'required|min_length[8]');
        $validation->setRule('confirm_password', 'Confirm Password', 'required|matches[password]');

        $post = $request->getPost();

        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        $userModel = new UserModel();

        if ($userModel->where('email', $post['email'])->first()) {
            $session->setFlashdata('errors', ['email' => 'Email already registered']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        $data = [
            'username'      => $post['username'] ?? null,
            'first_name'    => $post['first_name'],
            'middle_name'   => $post['middle_name'] ?? null,
            'last_name'     => $post['last_name'],
            'display_name'  => $post['display_name'] ?? trim($post['first_name'] . ' ' . $post['last_name']),
            'email'         => $post['email'],
            'password_hash' => password_hash($post['password'], PASSWORD_DEFAULT),
            'role'          => 'client',
            'is_artist'     => 0,
            'account_status' => 1,
            'email_activated' => 0,
            'newsletter'    => isset($post['newsletter']) ? 1 : 0,
        ];

        $inserted = $userModel->insert($data);
        if (! $inserted) {
            $session->setFlashdata('errors', ['general' => 'Could not create account. Try again.']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        $session->setFlashdata('success', 'Account created — please log in.');
        return redirect()->to('/login');
    }
}
