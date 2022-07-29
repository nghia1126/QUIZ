<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .container {
            margin-top: 10px
        }
    </style>
</head>

<body>

    <body id="body-pd">

        <div class="table-responsive">
            <table class="table table-responsive table-borderless">
                <thead>
                    <tr class="bg-light">
                        <th scope="col" width="5%">ID</th>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="20%">Duration Minutes</th>
                        <th scope="col" width="20%">Start Time</th>
                        <th scope="col" width="20%"><span>End Time</span></th>
                        <th colspan="4" scope="col" width="20%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($quizs as $quiz) { ?>
                        <tr>
                            <td><?php echo $quiz->id ?></td>
                            <td><?php echo $quiz->name ?></td>
                            <td><?php echo $quiz->duration_minutes ?> minutes</td>
                            <td><?php echo $quiz->start_time ?></td>
                            <td><?php echo $quiz->end_time ?></td>
                            <td><button class="btn btn-success"><a class="nav-link link-light" href="<?= BASE_URL . 'quiz/start?id=' . $quiz->id ?>">Start</a></button></td>
                            <td><button class="btn btn-info"><a class="nav-link link-light" href="<?= BASE_URL . 'quiz/info?id=' . $quiz->id .'&subject_id=' . $quiz->subject_id ?>">Info</a></button></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!--Container Main end-->
    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</html>