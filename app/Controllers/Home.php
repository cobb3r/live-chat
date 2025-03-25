<?php

namespace App\Controllers;

use App\Models\user;
use App\Models\connection;

class Home extends BaseController
{
    public function index()
    {
        echo view('template/header');
        echo view('index');
        echo view('template/footer');
    }

    public function signup()
    {
        helper(['form']);
          
        if ($this->request->getMethod() == 'POST') {
            $rules = [
                'fName' => 'required|min_length[2]|max_length[20]',
                'lName' => 'required|min_length[2]|max_length[30]',
                'eaddress' => 'required|min_length[3]|max_length[50]|valid_email|is_unique[users.email]',
                'pass' => 'required|min_length[3]|max_length[30]',
                'conPass' =>'required|matches[pass]',
            ];

            $messages = [
                'fName' => [
                    'min_length' => 'First Name Must Be 2 Digits or Longer',
                    'max_length' => 'First Name Must Be 20 Digits or Less',
                ],
                'lName' => [
                    'min_length' => 'Last Name Must Be 2 Digits or Longer',
                    'max_length' => 'Last Name Must Be 30 Digits or Less',
                ],
                'eaddress' => [
                    'min_length' => 'Email Must Be 3 Digits or Longer',
                    'max_length' => 'Email Must Be 30 Digits or Less',
                    'valid_email' => 'Invalid Email Address',
                    'is_unique' => 'You Already Have An Account, Please Log In Instead',
                ],
                'pass' => [
                    'min_length' => 'Password Must Be 3 Digits or Longer',
                    'max_length' => 'Password Must Be 30 Digits or Less',
                ],
                'conPass' => [
                    'matches' => 'Passwords Do Not Match',
                    'max_length' => 'First Name Must Be 20 Digits or Less',
                ],
            ];

            if (! $this->validate($rules, $messages)) 
            {
                echo view('template/header');
                return view('signup', ['validation' => $this->validator,]);
                echo view('template/footer'); 
            } else {
                $model = new user();

                $data = [
                    'firstName' => $_POST['fName'],
                    'lastName' => $_POST['lName'],
                    'email' => $_POST['eaddress'],
                    'password' => $_POST['pass'],
                ];


                $model->insert($data);

                return redirect()->to('/');
            }
        }
              
        echo view('template/header');
        echo view('signup');
        echo view('template/footer');
    }

    public function signin()
    {
        helper(['form']);

        if ($this->request->getMethod() == 'POST') {
            $rules = [
                'eaddress' => 'required|min_length[3]|max_length[50]|valid_email|existingAcc[eaddress]',
                'pass' => 'required|min_length[3]|max_length[30]|validateUser[eaddress, pass]',
            ];

            $messages = [
                'eaddress' => [
                    'min_length' => 'Email Must Be 3 Digits or Longer',
                    'max_length' => 'Email Must Be 50 Digits or Less',
                    'valid_email' => 'Invalid Email Address',
                    'existingAcc' => 'You Do Not Have an Account Yet, Please Sign Up'
                ],
                'pass' => [
                    'min_length' => 'Password Must Be 3 Digits or Longer',
                    'max_length' => 'Password Must Be 30 Digits or Less',
                    'validateUser' => 'Password Does not Match'
                ],
            ];

            if (! $this->validate($rules, $messages)) 
            {
                echo view('template/header');
                return view('signin', ['validation' => $this->validator,]);
                echo view('template/footer'); //Footer Wont Reload On Form Submission, Include With Main
            } else {
                $model = new user();
                $user = $model->where('email', $_POST['eaddress'])->first();

                $data = [
                    'id' => $user['id'],
                    'firstName' => $user['firstName'],
                    'lastName' => $user['lastName'],
                    'eaddress' => $_POST['eaddress'],
                    'pass' => $_POST['pass'],
                    'signedIn' => true
                ];

                session()->set($data);

                return redirect()->to('/');
            }
        }
        
        echo view('template/header');
        echo view('signin');
        echo view('template/footer');
    }

    public function signout() 
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function chat()
    {
        echo view('template/header');
        echo view('chat');
        echo view('template/footer');
    }
}