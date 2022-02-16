
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .container {
            margin-top: 10px;
        }

    </style>
</head>

<body>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="" alt=""> </div>
        </header>
        <div class="container">
            <ul class="nav nav-pills d-flex justify-content-center">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="<?= BASE_URL . 'admin-dashboard' ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= BASE_URL . 'mon-hoc' ?>">Subject</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= BASE_URL . 'quiz' ?>">Quiz</a>
                </li>
            </ul>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <div class="container mt-2 px-0">
                <div class="mb-2 d-flex justify-content-between align-items-center">
                    <div class="position-relative"> <span class="position-absolute search"><i class="fa fa-search"></i></span> <input class="form-control w-100" placeholder="Search by order#, name..."> </div>
                    <div class="px-0"><button class="btn btn-warning"><a class="nav-link link-light" href="<?= BASE_URL . 'mon-hoc/tao-moi' ?>">Add Subject</a></button></div>
                </div>
                <div class="table-responsive">
                    <table class="table table-responsive table-borderless">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Author</th>
                                <th colspan="2"></th>
                            </thead>
                            <tbody>
                                <?php foreach ($subjects as $sub) : ?>
                                    <tr>
                                        <td><?php echo $sub->id ?></td>
                                        <td><?php echo $sub->name ?></td>
                                        <?php foreach ($author as $aut) {
                                            if ($sub->author_id == $aut->id) { ?>
                                                <td><?php echo $aut->name ?></td>
                                        <?php }
                                        } ?>
                                        <td><button class="btn btn-success"><a class="nav-link link-light" href="<?= BASE_URL . 'mon-hoc/cap-nhat?id=' . $sub->id ?>">Update</a></button></td>
                                        <td><button class="btn btn-danger"><a class="nav-link link-light" href="<?= BASE_URL . 'mon-hoc/xoa?id=' . $sub->id ?>">Delete</a></button></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </table>
                </div>
            </div>
        </div>
        <!--Container Main end-->
    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</html>