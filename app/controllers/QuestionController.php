<?php
namespace App\Controllers;
session_start();
use App\Models\Question;
use App\Models\Answer;
use App\Models\Subject;

class QuestionController{
    public function index(){
        $quiz_id = $_GET['quiz_id'];
        $questions = Question::where(['quiz_id', '=', $quiz_id])->get();
        // var_dump($model); die;
        include_once "./app/views/question/index.php";
    }

    public function saveAdd(){
        $quiz_id = $_GET['quiz_id'];
        $ques_data = [
            'name' => $_POST['name'],
            'img' => null,
            'quiz_id' => $quiz_id
        ];
        $question = new Question();
        $question->insert($ques_data);

        for($i = 3; $i < 4; $i++){
            $answer_data[$i] = [
                'content' => $_POST["answer[".$i."]"],
                'question_id' => $question->id,
                'is_correct' => $_POST['status['.$i.']']
            ];

            $answers = new Answer();
            $answers->insert($answer_data);
        }
        // var_dump($ques_data); die;
        
        header('Location: ' . BASE_URL . 'quiz/cap-nhat?quiz_id=' . $quiz_id);
    }
    

    public function remove(){
        $quiz_id = $_GET['quiz_id'];
        $id = $_GET['id'];
        Question::destroy($id);
        header('location: ' . BASE_URL . 'question?quiz_id=' . $quiz_id);
        die;
    }
    public function editForm(){
		$id = $_GET['id'];
		$model = Question::where(['id', '=', $id])->first();
		if(!$model){
			header('Location: ' . BASE_URL . 'question');
		}
		include_once './app/views/question/edit-form.php';
	}

	public function saveEdit(){
        $quiz_id = $_GET['quiz_id'];
		$id = $_GET['id'];
		$model = Question::where(['id', '=', $id])->first();
		if(!$model){
			header('Location: ' . BASE_URL . 'question?quiz_id' . $quiz_id);
		}
		$data = [
			'name' => $_POST['name'],
            'img' => null,
		];
		$model->update($data);
		header('Location: ' . BASE_URL . 'question?quiz_id=' . $quiz_id);
	}
}
?>