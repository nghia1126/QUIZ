<?php

namespace App\Controllers;

session_start();

use App\Models\Subject;
use App\Models\User;

class SubjectController
{
    public function index()
    {
        $order = isset($_GET['order']) ? $_GET['order'] : 1;
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

        $query = Subject::where('name', 'like', "%$keyword%");

        if ($keyword == ''){
            $subjects = Subject::all();
        } else {
            $subjects = $query->get();
        }
        // echo "<pre>";
        // var_dump($subjects);die;
        $author = User::all();
        return view('mon-hoc.index', ['subjects' => $subjects, 'author' => $author]);
    }

    public function addForm()
    {
        return view('mon-hoc.add-form');
    }

    public function saveAdd()
    {
        $target_file = 'public/dist/img/';
        move_uploaded_file($_FILES['img']['tmp_name'], $target_file . $_FILES['img']['name  ']);

        $model = new Subject();
        $model->name = $_POST['name'];
        $model->img = $target_file . $_FILES['img']['name'];
        $model->author_id = $_SESSION['auth']['id'];
        $model->save();
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function remove($id = null)
    {
        $id = $_GET['id'];
        Subject::destroy($id);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }
    public function editForm($id = null)
    {
        $id = $_GET['id'];
        $model = Subject::where('id', $id)->first();
        if (!$model) {
            header('Location: ' . BASE_URL . 'mon-hoc');
        }
        return view('mon-hoc.edit-form', ['model' => $model, 'id' => $id]);
    }

    public function saveEdit($id = null)
    {
        $id = $_GET['id'];
        $target_file = 'public/dist/img/';
        // var_dump($_FILES['img']);die;
        move_uploaded_file($_FILES['img']['tmp_name'], $target_file . $_FILES['img']['name']);

        $model = Subject::find($id);
        $model->name = $_POST['name'];
        $model->img = $target_file . $_FILES['img']['name'];
        $model->author_id = $_SESSION['auth']['id'];
        $model->save();

        header('Location: ' . BASE_URL . 'mon-hoc');
    }
}
