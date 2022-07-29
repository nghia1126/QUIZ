<?php

namespace App\Controllers;

session_start();

use App\Models\Answer;
use App\Models\Question;
use App\Models\quiz;
use App\Models\Subject;
use App\Models\StudentQuiz;

class QuizController
{
    public function index()
    {
        $quizs = Quiz::all();
        $subjects = Subject::all();
        return view('quiz.index', ['quizs' => $quizs, 'subjects' => $subjects]);
    }

    public function addForm()
    {
        $subjects = Subject::all();
        return view('quiz.add-Form', ['subjects' => $subjects]);
    }

    public function saveAdd()
    {
        $model = new Quiz();
        $model->name = $_POST['name'];
        $model->start_time = $_POST['start_time'];
        $model->end_time = $_POST['end_time'];
        $model->duration_minutes =  $_POST['duration_minutes'];
        $model->status = isset($_POST['status']) ? 1 : 0;
        $model->is_shuffle = isset($_POST['is_shuffle']) ? 1 : 0;
        $model->subject_id = $_POST['id_subject'];

        $model->save();
        header('location: ' . BASE_URL . 'quiz');
        die;
    }

    public function remove($id = null)
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
        // $questions = Question::where('quiz_id', $id)->get();
        // var_dump($questions);die;
        if (!$model) {
            header('Location: ' . BASE_URL . 'quiz');
            die;
        }
        return view('quiz.edit-Form', ['model' => $model, 'subjects' => $subjects]);
    }

    public function saveEdit($id = null)
    {
        $id = $_GET['id'];
        $model = Quiz::where('id', $id)->first();

        if (!$model) {
            header('Location: ' . BASE_URL . 'quiz');
            die;
        }
        $model->name = $_POST['name'];
        // var_dump($_POST['subject_id']);die;
        $model->subject_id = $_POST['subject_id'];
        $model->duration_minutes = $_POST['duration_minutes'];
        $model->start_time = $_POST['start_time'];
        $model->end_time = $_POST['end_time'];
        $model->status = $_POST['status'];
        $model->save();
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

        foreach ($questions as $question) {
            $answers[$question->id] = Answer::where('question_id', $question->id)->get();
            // echo "<pre>";
            // var_dump($answers);die;
        }

        // $_SESSION['quiz_id'] = $quiz_id;
        include_once "./app/views/user-dashboard/start.php";
    }

    public function submitQuiz($quiz_id = null)
    {
        $quiz_id = $_GET['quiz_id'];
        // var_dump($quiz_id);die;
        $questions = Question::where('quiz_id', $quiz_id)->get();
        $count_ques = Question::where('quiz_id', $quiz_id)->count();
        // var_dump($count_ques);die;
        $arrAnswer = array();
        foreach ($questions as $question) {
            $arrAnswer[] = $_POST['question-' . $question->id];
        }
        $temp = array_count_values($arrAnswer);
        if (isset($temp['1'])) {
            $result = 10 / $count_ques * $temp['1'];
        } else {
            $result = 0;
        }

        // var_dump($result);die;
        $student_quizs = new StudentQuiz();

        $student_quizs->student_id = $_SESSION['auth']['id'];
        $student_quizs->quiz_id = $quiz_id;
        $student_quizs->start_time = $_SESSION['start_time'];
        $student_quizs->end_time = date('Y-m-d H:i:s');
        $student_quizs->score = $result;
        $student_quizs->save();
        include_once "./app/views/user-dashboard/result.php";
    }

    public function info($id = null)
    {
        $quiz_id = $_GET['id'];
        $student_quizs_show = StudentQuiz::where('student_id', $_SESSION['auth']['id'])->where('quiz_id', $quiz_id)->get();
        include_once "./app/views/user-dashboard/score.php";
    }
}
