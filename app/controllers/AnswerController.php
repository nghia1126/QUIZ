<?php

namespace App\Controllers;
session_start();
use App\Models\Answer;
use App\Models\Subject;

class AnswerController
{
    public function index()
    {
        $question_id = $_GET['ques_id'];
        $answers = Answer::where(['question_id' , '=' , $question_id])->get();
        include_once "./app/views/answer/index.php";
    }

    public function addForm()
    {
        $subjects = Subject::all();
        include_once "./app/views/answer/add-form.php";
    }

    public function saveAdd()
    {
        $model = new answer();
        $data = [
            'name' => $_POST['name'],
            'subject_id' => $_POST['subject_id'],
            'duration_minutes' => $_POST['duration_minutes'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'status' => "1",
        ];
        $model->insert($data);
        header('location: ' . BASE_URL . 'answer');
        die;
    }

    public function remove()
    {
        $id = $_GET['id'];
        answer::destroy($id);
        header('location: ' . BASE_URL . 'answer');
        die;
    }
    public function editForm()
    {
        $id = $_GET['id'];
        $model = answer::where(['id', '=', $id])->first();
        $subjects = Subject::all();
        if (!$model) {
            header('Location: ' . BASE_URL . 'answer');
            die;
        }
        include_once './app/views/answer/edit-form.php';
    }

    public function saveEdit()
    {
        $id = $_GET['id'];
        $model = answer::where(['id', '=', $id])->first();
        if (!$model) {
            header('Location: ' . BASE_URL . 'answer');
            die;
            // var_dump($id);
        }
        $data = [
            'name' => $_POST['name'],
            'subject_id' => $_POST['subject_id'],
            'duration_minutes' => $_POST['duration_minutes'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'status' => $_POST['status'],
        ];
        $model->update($data);
        // var_dump($id);
        header('Location: ' . BASE_URL . 'answer');
        die;
    }

    public function showQues(){
        
    }
}
