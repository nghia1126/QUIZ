<?php
namespace App\Controllers;
session_start();

use App\Models\Subject;
use App\Models\User;

class SubjectController{
    public function index(){
        $subjects = Subject::all();
        $author = User::all();
        include_once "./app/views/mon-hoc/index.php";
    }

    public function addForm(){
        include_once "./app/views/mon-hoc/add-form.php";
    }

    public function saveAdd(){
        $model = new Subject();
        $data = [
            'name' => $_POST['name']
        ];
        $model->insert($data);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function remove($id = null) {
        $id = $_GET['id'];
        Subject::destroy($id);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }
    public function editForm($id = null){
		$id = $_GET['id'];
		$model = Subject::where('id', $id)->first();
		if(!$model){
			header('Location: ' . BASE_URL . 'mon-hoc');
		}
		include_once './app/views/mon-hoc/edit-form.php';
	}

	public function saveEdit($id = null) {
		$id = $_GET['id'];
		$model = Subject::where('id', $id)->first();
        $model->name = $_POST['name'];
        $model->save();

		header('Location: ' . BASE_URL . 'mon-hoc');
	}
}
?>