<?php

use App\Models\Answer;
// var_dump($_SESSION[12][]); die; 
foreach ($question as $ques) {
    $answer = Answer::where(['question_id', '=', $ques->id])->get(); ?>
    <p>Câu hỏi :<?php echo $ques->name; ?></p>
    <?php foreach ($answer as $ans) { ?>
        <p><?php echo $ans->content; ?></p>
<?php }
} ?>