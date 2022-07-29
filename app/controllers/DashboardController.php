<?php
namespace App\Controllers;

use App\Models\Subject;
use App\Models\Quiz;

session_start();
class DashboardController {
    public function adminIndex(){
        return view('layout.main');
    }
    public function userIndex(){
        $subjects = Subject::all();
        $count_quiz = new Quiz();
        return view('user-dashboard.index', ['subjects' => $subjects, 'count_quiz' => $count_quiz]);
    }
}
?>