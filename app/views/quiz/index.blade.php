@extends('layout.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
            .container{
                margin-top: 10px
            }
    </style>
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Quiz Manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL . 'admin-dashboard'?>">Home</a></li>
                    <li class="breadcrumb-item active">Quiz Manager</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <div class="container mt-2 px-0">
                <div class="mb-2 d-flex justify-content-between align-items-center">
                    <div class="px-0"><button class="btn btn-warning"><a class="nav-link link-light" href="<?= BASE_URL . 'quiz/tao-moi' ?>">Add quiz</a></button></div>
                </div>
                <div class="table-responsive">
                    <table class="table table-responsive table-borderless">
                        <thead>
                            <tr class="bg-light">
                                <th scope="col" width="5%">ID</th>
                                <th scope="col" width="20%">Name</th>
                                <th scope="col" width="20%">Subject</th>
                                <th scope="col" width="20%">Duration Minutes</th>
                                <th scope="col" width="20%">Start Time</th>
                                <th scope="col" width="20%"><span>End Time</span></th>
                                <th scope="col" width="10%">Status</th>
                                <th scope="col" width="10%" class="text-end">Shuffle</th>
                                <th colspan="4" scope="col" width="20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($quizs as $quiz) { ?>
                                <tr>
                                    <td><?php echo $quiz->id ?></td>
                                    <td><?php echo $quiz->name ?></td>
                                    <td><?php foreach ($subjects as $subject) {
                                            if ($subject->id == $quiz->subject_id) {
                                                echo $subject->name;
                                            }
                                        } ?></td>
                                    <td><?php echo $quiz->duration_minutes ?> minutes</td>
                                    <td><?php echo $quiz->start_time ?></td>
                                    <td><?php echo $quiz->end_time ?></td>
                                    <td><?php if ($quiz->status == 0) {
                                            echo "Ẩn";
                                        } else {
                                            echo "Hiện";
                                        } ?></td>
                                    <td><?php echo $quiz->is_shuffle ?></td>
                                    <td><button class="btn btn-success"><a class="nav-link link-light" href="<?= BASE_URL . 'quiz/cap-nhat?id=' . $quiz->id ?>">Update</a></button></td>
                                    <td><button class="btn btn-danger"><a class="nav-link link-light" href="<?= BASE_URL . 'quiz/xoa?id=' . $quiz->id ?>">Delete</a></button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endsection
