<?php

namespace App\Controllers;

use App\Models\User;

session_start();
class LoginController
{
    public function index()
    {
        $Users = User::all();

        include_once "./app/views/login/index.php";
    }

    public function addForm()
    {
        include_once "./app/views/login/add-form.php";
    }

    public function saveAdd()
    {
        $model = new User();
        $data = [
            'name' => $_POST['name']
        ];
        $model->insert($data);
        header('location: ' . BASE_URL . 'login');
        die;
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

    public function logout()
    {
        unset($_SESSION['account']);
        header('Location: ' . BASE_URL . 'login');
        die();
    }
}
