<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Quiz ID</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Score</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($student_quizs_show as $student_quiz):?>
            <tr>
                <th scope="row"><?= $student_quiz->id; ?></th>
                <td><?= $student_quiz->quiz_id?></td>
                <td><?= $student_quiz->start_time?></td>
                <td><?= $student_quiz->end_time?></td>
                <td><?=  $student_quiz->score?></td>
                <td></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>