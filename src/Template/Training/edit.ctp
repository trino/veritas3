<?php
$settings = $this->requestAction('settings/get_settings');
$sidebar = $this->requestAction("settings/get_side/" . $this->Session->read('Profile.id'));
if ($_SERVER['SERVER_NAME'] == "localhost") {
    include_once('/subpages/api.php');
} else {
    include_once('subpages/api.php');
}
function trunc($text, $digits, $append = ""){
    if (strlen($text)<$digits) { return $text; }
    return substr($text,0,$digits) . $append;
}
$QuizID="";

function clean($data, $datatype=0){
    if (is_object($data)){
        switch($datatype) {
            case 0:
                $data->Description = clean($data->Description);
                $data->Name = clean($data->Name);
                $data->Attachments = clean($data->Attachments);
                $data->image = clean($data->image);
                return $data;
                break;
            case 1:
                $data->Question = clean($data->Question);
                break;
        }
    }
    if (substr($data,0,1)== '"' && substr($data,-1) == '"'){$data = substr($data,1, strlen($data)-2);}
    $data = str_replace("\\r\\n", "\r\n", (trim($data))) ;
    return $data;
}
if (isset($quiz)){
    $quiz=clean($quiz);
}
?>

    <h3 class="page-title">
        Edit Quiz
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
                <a href="">Edit Quiz</a>
            </li>
        </ul>
        <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
        <?php if ($canedit && isset($quiz)) {
            echo '<a href="' . $this->request->webroot . 'training?action=delete&quizid=' . $quiz->ID . '" onclick="return confirm(' . "'Are you sure you want to delete this quiz?'" . ');" class="floatright btn btn-danger btnspc">Delete</a>';
            $QuizID="&quizid=" . $_GET['quizid'];
        }?>
    </div>

<form action="<?= $this->request->webroot; ?>training/edit?action=save<?= $QuizID ?>" method="post">

<div class="col-md-6">
    <div class="form-group">
        <label class="control-label">Quiz Name :</label>
            <?php if (isset($_GET["quizid"])){ echo '<input name="ID" type="hidden" value="' . $_GET["quizid"] . '">'; } ?>
            <input name="Name" class="form-control required" value="<?php if (isset($quiz)) { echo $quiz->Name; } ?>" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="control-label">Image :</label>
        <input name="image" id="image" class="form-control required" value="<?php if (isset($quiz)) { echo $quiz->image; } else {echo "training.png";} ?>" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="control-label">Attachments :</label><BR>
        <small>Separate your attachments with a comma</small>
        <textarea name="Attachments" class="form-control" rows="9"><?php if (isset($quiz)) { echo $quiz->Attachments; } ?></textarea>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="control-label">Description :</label>
        <textarea name="Description" class="form-control" rows="10"><?php if (isset($quiz)) { echo $quiz->Description; } ?></textarea>
    </div>
</div>

    <div class="col-md-2">
    <div class="form-group">
        <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save Changes</button>
    </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <A href="<?= $this->request->webroot ?>training/users?quizid=<?= $_GET["quizid"] ?>" class="btn btn-info">Users who have taken the test</A>
        </div>
    </div>
</form>
<?php if (isset($questions)) { ?>
<div class="col-md-12">
    <div class="form-group">
        <label class="control-label">Save before editing any questions</label>
    </DIV>
</DIV>


        <div class="table-scrollable">
            <table class="table table-condensed  table-striped table-bordered table-hover dataTable no-footer">
                <thead>
                <tr>
                    <th>QID</th>
                    <th>Index</th>
                    <th>Question</th>
                    <TH>Actions</TH>
                    <!--TH>Answer 1</TH>
                    <TH>Answer 2</TH>
                    <TH>Answer 3</TH>
                    <TH>Answer 4</TH-->
                </tr>
                </thead>
                <tbody>
                    <?php
                    function newQuestion($ID){
                        echo '<TR><TD>New</TD><TD>' . $ID . '</TD><TD></TD><TD><a href="editquestion?QuestionID=' . $ID . '&new=true&quizid=' . $_GET["quizid"] . '" class="' . btnclass("EDIT") . '">Create</a></TD></TR>';
                    }
                    function answer($correctanswer, $id, $answer){
                        echo '<TD>';
                        if ($correctanswer==$id){ echo '<B>';}
                        echo trunc($answer, 25, "...");
                        if ($correctanswer==$id){ echo '</B>';}
                        echo '</TD>';
                    }

                    $index=-1;
                    foreach($questions as $question) {
                        clean($question, 1);
                        if ($question->QuizID == $_GET["quizid"]) {
                            for ($temp = $index + 1; $temp < $question->QuestionID; $temp += 1) {
                                newQuestion($temp);
                            }
                            //if ($question->QuestionID > $index+1){ newQuestion($index+1); }

                            echo '<TR><TD>' . $question->ID . '</TD>';
                            echo '<TD>' . $question->QuestionID . '</TD>';
                            echo '<TD>' . trunc($question->Question, 50, "...") . '</TD>';

                            echo '<TD><a href="editquestion?QuestionID=' . $question->QuestionID . '&new=false&quizid=' . $_GET["quizid"] . '" class="' . btnclass("EDIT") . '">Edit</a>';
                            echo '<a href="edit?action=delete&quizid=' . $_GET["quizid"] . '&QuestionID=' . $question->QuestionID . '" class="' . btnclass("DELETE") . '">Delete</a></TD>';
                            //answer($question->Answer, 0, $question->Choice0);
                            //answer($question->Answer, 1, $question->Choice1);
                            //answer($question->Answer, 2, $question->Choice2);
                            //answer($question->Answer, 3, $question->Choice3);

                            echo '</TR>';
                            $index = $question->QuestionID;
                        }
                    }
                    newQuestion($index+1);
                    ?>
                </tbody>
            </table>

        </div>

<?php } ?>