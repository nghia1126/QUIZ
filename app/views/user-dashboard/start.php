<?php

use Illuminate\Support\Facades\Date;
$start_time = date('Y-m-d H:i:s');
$_SESSION['start_time'] = $start_time;
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function timeout() {
            var hours = Math.floor(timeLeft / 3600);
            var minute = Math.floor((timeLeft - (hours * 60 * 60) - 30) / 60);
            var second = timeLeft % 60;
            var hrs = checktime(hours);
            var mint = checktime(minute);
            var sec = checktime(second);
            if (timeLeft <= 0) {
                clearTimeout(tm);
                document.getElementById("form1").submit();
            } else {

                document.getElementById("time").innerHTML = hrs + ":" + mint + ":" + sec;
            }
            timeLeft--;
            var tm = setTimeout(function() {
                timeout()
            }, 1000);
        }

        function checktime(msg) {
            if (msg < 10) {
                msg = "0" + msg;
            }
            return msg;
        }
    </script>

</head>

<body onload="timeout()">

    <div class="container">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h2>Onilne quiz in php
                <script type="text/javascript">
                    var timeLeft = 2 * 60 * 60;
                </script>

                <div id="time" style="float:right">timeout</div>
            </h2>
            <form method="post" id="form1" action="<?= BASE_URL . 'subject/quiz/start?quiz_id=' . $question->quiz_id; ?>">
                <table class="table table-bordered">
                    <tbody>
                        <?php foreach ($questions as $question) { ?>
                            <tr>
                                <a href=""><?= $question->name ?></a> <br>
                                <?php foreach ($answers[$question->id] as $answer) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question-<?= $question->id?>" id="flexRadioDefault1" value="<?= $answer->is_correct ?>">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <?= $answer->content ?>
                                        </label>
                                    </div>
                                <?php endforeach ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input type="submit" name="submit" value="Kết thúc">
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>

</body>

</html>