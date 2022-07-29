<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        .table-score {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <table class="table table-striped table-score">
        <tr>
            <td>
                <h3>Điểm của bạn là: </h3>
            </td>
            <td>
                <h3><?= $result ?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h5>Số câu sai: </h5>
            </td>
            <td>
                <h5><?php if (isset($temp['0'])) {
                        echo $temp['0'];
                    } else {
                        echo "0";
                    } ?></h5>
            </td>
        </tr>
        <tr>
            <td>
                <h5>Số câu đúng: </h5>
            </td>
            <td>
                <h5><?php if (isset($temp['1'])) {
                        echo $temp['1'];
                    } else {
                        echo "0";
                    } ?></h5>
            </td>
        </tr>
        <tr>
            <td>
                <h6><a href="<?= BASE_URL . "subject/quiz?subject_id=3" ?>">back</a></h6>
            </td>
        </tr>
    </table>

</body>

</html>