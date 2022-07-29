<?php

namespace App\Controllers;

use App\Models\User;

session_start();
class LoginController
{
    // public function index()
    // {
    //     $Users = User::all();

    //     include_once "./app/views/login/index.php";
    // }

    public function signUpForm()
    {
        include_once "./app/views/account/signUpForm.php";
    }

    public function addUser()
    {
        $user = User::where('email', $_POST['email'])->first();
        if (!isset($user)) {
            $target_file = 'public/dist/img/';
            move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file . $_FILES['avatar']['name']);
    
            $model = new User();
            $model->name = $_POST['name'];
            $model->email = $_POST['email'];
            $model->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $model->avatar = $target_file.$_FILES['avatar']['name'];
            $model->role_id = 2;
    
            $model->save();
            header('location: ' . BASE_URL . 'login');
            die;
        } else {
            $_SESSION['error'] = "Email đã được đăng ký !!!";
            header('location: ' . BASE_URL . 'login/signup');
        }
        
    }

    public function remove()
    {
        $id = $_GET['id'];
        User::destroy($id);
        header('location: ' . BASE_URL . 'login');
        die;
    }
    public function editForm()
    {
        $id = $_GET['id'];
        $model = User::where(['id', '=', $id])->first();
        if (!$model) {
            header('Location: ' . BASE_URL . 'login');
        }
        include_once './app/views/login/edit-form.php';
    }

    public function saveEdit()
    {
        $id = $_GET['id'];
        $model = User::where(['id', '=', $id])->first();
        if (!$model) {
            header('Location: ' . BASE_URL . 'login');
        }
        $data = [
            'name' => $_POST['name']
        ];
        $model->update($data);
        header('Location: ' . BASE_URL . 'login');
    }

    public function loginForm()
    {
        require_once './app/views/account/loginForm.php';
    }

    public function checkLogin()
    {
        // var_dump("a");die;
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        $model = User::where('email', $email)->first();
        // var_dump($model);die;
        if (password_verify($password, $model->password)) {
            $_SESSION['auth'] = [
                "id" => $model->id,
                "name" => $model->name,
                "email" => $model->email,
                "role_id" => $model->role_id
            ];
            // var_dump($_SESSION['auth']['id']);die;
            if ($model->role_id == 1) {
                header('Location: ' . BASE_URL . 'admin-dashboard');
                die;
            } else {
                header('Location: ' . BASE_URL . 'user-dashboard');
                die;
            }
        } else {
            $_SESSION['error'] = 'Tài khoản hoặc mật khẩu không chính xác';
            header('Location: ' . BASE_URL . 'login');
            die;
        }
    }
}
