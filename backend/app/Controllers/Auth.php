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
        $validation = \Config\Boot::validation();

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

            // Normalize to array
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
}
