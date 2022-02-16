<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\quiz;
use App\Models\Subject;

class QuizController
{
    public function index()
    {
        $quizs = Quiz::all();
        $subjects = Subject::all();
        include_once "./app/views/quiz/index.php";
    }

    public function addForm()
    {
        $subjects = Subject::all();
        include_once "./app/views/quiz/add-form.php";
    }

    public function saveAdd()
    {
        $data = [
            'name' => $_POST['name'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'duration_minutes' => $_POST['duration_minutes'],
            'status' => isset($_POST['status']) ? 1 : 0,
            'is_shuffle' => isset($_POST['is_shuffle']) ? 1 : 0,
            'subject_id' => $_POST['id_subject'],
        ];
        $model = new Quiz();
        $quiz = $model->insert($data);
        header('location: ' . BASE_URL . 'quiz');
        die;
    }

    public function remove()
    {
        $id = $_GET['id'];
        Quiz::destroy($id);
        header('location: ' . BASE_URL . 'quiz');
        die;
    }
    public function editForm($id = null)
    {
        $id = $_GET['id'];
        $model = Quiz::where('id', $id)->first();
        $subjects = Subject::all();
        $questions = Question::where('quiz_id', $model->id)->get();

        if (!$model) {
            header('Location: ' . BASE_URL . 'quiz');
            die;
        }
        include_once './app/views/quiz/edit-form.php';
    }

    public function saveEdit($id = null)
    {
        $id = $_GET['id'];
        $model = Quiz::where('id', $id)->first();
        if (!$model) {
            header('Location: ' . BASE_URL . 'quiz');
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
        header('Location: ' . BASE_URL . 'quiz');
        die;
    }
    public function showQuiz()
    {
        $subject_id = $_GET['subject_id'];
        $quizs = Quiz::where('subject_id',  $subject_id)->get();

        include_once "./app/views/user-dashboard/showQuiz.php";
    }

    public function start($quiz_id = null)
    {
        $quiz_id = $_GET['id'];
        $questions = Question::where('quiz_id', $quiz_id)->get();

        foreach ($questions as $question){
            $answers[$question->id] = Answer::where('question_id' , $question->id)->get();
            // echo "<pre>";
            // var_dump($answers);die;
        }

        // $_SESSION['quiz_id'] = $quiz_id;
        include_once "./app/views/user-dashboard/start.php";
    }

    public function submitQuiz(){
        
    }
}
