<?php

namespace App\Controllers;

class Auth extends BaseController{
    public function index(){
        return redirect()->to('/login');;
    }

    public function login() {
        $data = [
            "title" => 'Login',
            "validation" => \Config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    public function register() {
        $data = [
            "title" => 'Register',
            "validation" => \Config\Services::validation()
        ];
        return view('auth/register', $data);
    }

    public function forgotPassword() {
        $data = [
            "title" => 'Forgot Password',
            "validation" => \Config\Services::validation()
        ];
        return view('auth/forgot-password', $data);
    }

    public function resetPassword() {
        $data = [
            "title" => 'Reset Password',
            "validation" => \Config\Services::validation()
        ];
        return view('auth/reset-password', $data);
    }

    public function attemptLogin() {
        $validator = [
            'email' => 'required',
            'password' => 'required',
        ];
        if (!$this->validate($validator)) {
            return redirect()->to('/login')->withInput();
        }
        $data = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];
        $user = $this->userModel->where($data)->first();
        if (!$user) {
            session()->setFlashdata('error', 'Email and password doesnt match any user!');
            return redirect()->to('/login')->withInput();
        }
        $this->session->set('user_id', $user['user_id']);
        return redirect()->to('/profile');
    }

    public function attemptRegister() {
        $validator = [
            'name' => 'required',
            'email' => 'required|is_unique[user.email]',
            'phone_number' => 'required|is_unique[user.phone_number]',
            'password' => 'required',
            'password_confirmation' => 'required'
        ];
        if (!$this->validate($validator)) {
            return redirect()->to('/register')->withInput();
        }
        $data = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'name' => $this->request->getVar('name'),
            'phone_number' => $this->request->getVar('phone_number')
        ];
        $this->userModel->save($data);
        session()->setFlashdata('message', 'Successfully created a new user. Please login!');
        return redirect()->to('/register');
    }

    public function attemptForgotPassword() {
        $validator = [
            'email' => 'required'
        ];
        if (!$this->validate($validator)) {
            return redirect()->to('/forgot-password')->withInput();
        }
        $data = [
            'email' => $this->request->getVar('email')
        ];


        $email = \Config\Services::email();
        $email->setFrom('helpdesk.futsal@gmail.com', 'Futsal Admin');
        $email->setTo($data['email']);
        $email->setSubject('Reset Password');
        $email->setMessage('Testing the email class.');

        if (!$email->send()) {
            session()->setFlashdata('message', 'Error');
            echo 'err';
            $email->printDebugger();

        } else {
            session()->setFlashdata('message', 'Successfully. Please check your email!');
            return redirect()->to('/login');
        }
    }

    public function attemptResetPassword() {
        $validator = [
            'password' => 'required'
        ];
        if (!$this->validate($validator)) {
            return redirect()->to('/reset-password')->withInput();
        }

        $userId = $this->request->getVar('user_id');
        $password = $this->request->getVar('password');
        $this->userModel->changePassword($userId, $password);
        $this->redirect()->to('/login');
    }

    public function logout() {
        $this->session->destroy();
        return redirect()->to('/login');
    }

    public function forgotPasswordMail() {

    }
}
