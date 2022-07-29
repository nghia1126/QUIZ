<?php

use App\Controllers\LoginController;
use App\Controllers\SubjectController;
use App\Controllers\DashboardController;
use App\Controllers\QuizController;

use Phroute\Phroute\RouteCollector;

function applyRoute($url)
{
    $router = new RouteCollector();

    // filter check login
    $router->filter('auth', function () {
        if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
            header('location: ' . BASE_URL . 'login');
            die;
        }
    });

    $router->get('test-layout', function () {
        return view('layout.main');
    });

    // định nghĩa ra url mới
    $router->group(['prefix' => 'mon-hoc'], function ($router) {
        $router->get('/', [SubjectController::class, 'index']);
        $router->get('/tao-moi', [SubjectController::class, 'addForm']);
        $router->post('/tao-moi', [SubjectController::class, 'saveAdd']);
        $router->get('/cap-nhat{id}?', [SubjectController::class, 'editForm']);
        $router->post('/cap-nhat{id}?', [SubjectController::class, 'saveEdit']);
        $router->get('/xoa{id}?', [SubjectController::class, 'remove']);

        $router->get(['/{id}?', 'subject.index'], [SubjectController::class, 'index']);
    });

    $router->group(['prefix' => 'login'], function ($router) {
        $router->get('/', [LoginController::class, 'loginForm']);
        $router->post('/', [LoginController::class, 'checkLogin']);
        $router->get('/signup', [LoginController::class, 'signUpForm']);
        $router->post('/signup', [LoginController::class, 'addUser']);
    });
    $router->get('admin-dashboard', [DashboardController::class, 'adminIndex']);
    $router->get('user-dashboard', [DashboardController::class, 'userIndex']);
    $router->get('sign-out', function () {
        unset($_SESSION['auth']);
        // var_dump($_SESSION['auth']); die();
        // return "done";
        header("Location: ". BASE_URL . 'user-dashboard');
        // var_dump(isset($_SESSION['auth']));
        die;
    });
    $router->get('subject/quiz{id}?', [QuizController::class, 'showQuiz']);
    $router->get('quiz/start{id}?', [QuizController::class, 'start']);
    $router->post('subject/quiz/start{id}?', [QuizController::class, 'submitQuiz']);
    // định nghĩa ra url mới
    $router->group(['prefix' => 'quiz'], function ($router) {
        $router->get('/', [QuizController::class, 'index']);
        $router->get('/tao-moi', [QuizController::class, 'addForm']);
        $router->post('/luu-tao-moi', [QuizController::class, 'saveAdd']);
        $router->get('/cap-nhat{id}?', [QuizController::class, 'editForm']);
        $router->post('/luu-cap-nhat{id}?', [QuizController::class, 'saveEdit']);
        $router->get('/xoa{id}?', [QuizController::class, 'remove']);
        $router->get('/info{id}?', [QuizController::class, 'info']);
        // $router->get(['/{id}?', 'subject.index'], [SubjectController::class, 'index']);
    });



    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    // Print out the value returned from the dispatched function
    echo $response;
}
