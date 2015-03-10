<?php
$settings = $this->requestAction('settings/get_settings');
$sidebar = $this->requestAction("settings/get_side/" . $this->Session->read('Profile.id'));
if ($_SERVER['SERVER_NAME'] == "localhost") {
    include_once('/subpages/api.php');
} else {
    include_once('subpages/api.php');
}
debug($question);
print_r($_POST);
?>

    <h3 class="page-title">
        Edit Question <?= $_GET["QID"] ?>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo $this->request->webroot; ?>training">Training</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo $this->request->webroot; ?>training/edit?quizid=<?= $_GET["quizid"]; ?>">Edit Quiz</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="">Edit Question</a>
            </li>
        </ul>
        <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
        <?php if ($canedit && isset($question)) {
            echo '<a href="' . $this->request->webroot . 'training/editquestion?action=delete&QID=' . $_GET["QID"] . '&quizid=' . $question->ID . '" onclick="return confirm(' . "'Are you sure you want to delete this question?'" . ');" class="floatright btn btn-danger btnspc">Delete</a>';
            $QuizID="&quizid=" . isset($quiz);
        }?>
    </div>

    <form action="<?= $this->request->webroot; ?>training/editquestion?action=save&quizid=<?= $_GET["quizid"] ?>&new=false&QID=<?= $_GET["QID"] ?>" method="post">

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Question :</label>
                <?= '<input name="QuizID" type="hidden" value="' . $_GET["quizid"] . '"><input name="QID" type="hidden" value="' . $_GET["QID"] . '">'; ?>
                <?= '<input name="new" type="hidden" value="' . $_GET["new"] . '">'; ?>
                <input name="Question" class="form-control required" value="<?php if (isset($question)) { echo $question->Question; } ?>" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Image :</label>
                <input name="Picture" class="form-control required" value="<?php if (isset($question)) { echo $question->Picture; } ?>" />
            </div>
        </div>

        <?php function printanswer($index, $value = "", $correctanswer=0){
            echo '<div class="col-md-6">';
            echo '<div class="form-group">';
                echo '<label class="control-label">Answer ' . ($index+1) . ' :</label><BR>';
                echo '<label class="uniform-inline"><span>';
                    if ($correctanswer == $index){ $checked = " checked";} else {$checked= " ANSWER="  . $correctanswer ;}
                    echo '<input type="radio" name="answer" value="' . $index . '"' . $checked . '>';
                    echo '<input type="text" name="Choice' . $index . '" value="' . $value;
                     //if (isset($question)) { echo $question->$answer; }
                echo '"></span></label></div></div>';
            }

        if (isset($question)) {
            printanswer(0, $question->Choice0, $question->Answer);
            printanswer(1, $question->Choice1, $question->Answer);
            printanswer(2, $question->Choice2, $question->Answer);
            printanswer(3, $question->Choice3, $question->Answer);
        } else {
            for ($temp=0; $temp<4; $temp+=1) {
                printanswer($temp);
            }
        }

?>

        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save Changes</button>
            </div>
        </div>
    </form>