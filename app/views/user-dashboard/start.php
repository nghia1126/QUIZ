
<?php 
// echo "<pre>";
// var_dump($answers[21]); die();
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
            <?php
            $i = 1;
            foreach ($questions as $question) { ?>
                <form method="post" id="form1" action="<?=BASE_URL .'subject/quiz/start?quiz_id='.$question->quiz_id; ?>">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="danger">
                                <th><?php echo $i; ?> <?php echo $question->name; ?> </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (isset($answers[$question->id][0])) { ?>
                                <tr class="info">
                                    <td>&nbsp;1&emsp;<input type="radio" value="0" name="<?php echo $question->id; ?>">&nbsp;<?php echo $answers[$question->id][0]->content; ?> </td>
                                </tr>
                            <?php } ?>
                            <?php if (isset($answers[$question->id][1])) { ?>
                                <tr class="info">
                                    <td>&nbsp;2&emsp;<input type="radio" value="1" name="<?php echo $question->id; ?>" />&nbsp;<?php  echo $answers[$question->id][1]->content; ?></td>
                                </tr>
                            <?php } ?>
                            <?php if (isset($answers[$question->id][2])) { ?>
                                <tr class="info">
                                    <td>&nbsp;3&emsp;<input type="radio" value="2" name="<?php echo $question->id; ?>" />&nbsp;<?php  echo $answers[$question->id][2]->content; ?></td>
                                </tr>
                            <?php } ?>
                            <?php if (isset($answers[$question->id][3])) { ?>
                                <tr class="info">
                                    <td>&nbsp;4&emsp;<input type="radio" value="3" name="<?php $question->id; ?>" />&nbsp;<?php  echo $answers[$question->id][3]->content; ?></td>
                                </tr>
                            <?php } ?>
                            <tr class="info">
                                <td><input type="radio" checked="checked" style="display:none" value="no_attempt" name="<?php echo $question->id; ?>"></td>
                            </tr>
                        </tbody>

                    </table>
                <?php $i++;
            } ?>
                <center><input type="submit" value="submit Quiz" class="btn btn-success" /></center>
                </form>
        </div>
        <div class="col-sm-2"></div>
    </div>

</body>

</html>