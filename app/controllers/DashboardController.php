<?php
namespace App\Controllers;

use App\Models\Subject;

session_start();
class DashboardController {
    public function adminIndex(){
        include_once "./app/views/admin-dashboard/index.php";
    }
    public function userIndex(){
        $subjects = Subject::all();
        include_once "./app/views/user-dashboard/index.php";
    }
}
?>