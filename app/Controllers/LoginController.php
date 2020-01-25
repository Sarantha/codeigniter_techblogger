<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\userModel;

class Login extends Controller
{
        public function index()
        {
            return view('pages/login');
        }
        
        public function login_user()
        {
            echo "this route is working";
            /*
            helper('form','session');
            $session = \Config\Services::session($config);
            $userModel = new userModel();

            if (! $this->validate([
                'username' => 'required|valid_email',
                'password'  => 'required'
            ]))
            {
                return view('posts/create');
            }
            else
            {
                $data = [
                    'username' => $_POST['username'],
                    'password'    => $_POST['password']
                ];

                $user = $userModel->where('username', $data['username'])
                    ->where('password', $data['password'])
                    ->first();

                if($user > 0){
                    if($user['userRole']=== 'admin'){

                        $newdata = [
                            'id'        => $user['id'],
                            'email'     => $data['email'],
                            'userRole'  => 'admin',
                            'logged_in' => TRUE
                        ];

                    }
                    
                    $session->set($newdata);
                    return redirect()->route('dashboard');
                }
                else{
                    $_SESSION['error'] = 'Email and password do not match';
                    $session->markAsFlashdata('error');
                    return view('/');
                }
            }*/
        }

        public function dash(){
            return view('dashboard');
        }
        public function logout(){
            $session = \Config\Services::session($config);
            session_destroy();
            return redirect('login');
        }
}