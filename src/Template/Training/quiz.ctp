<?php $settings = $this->requestAction('settings/get_settings'); ?>
<?php $sidebar = $this->requestAction("settings/get_side/" . $this->Session->read('Profile.id')); ?>
<h3 class="page-title">
    Quiz
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
            <a href="">Quiz</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <!--div id="dashboard-report-range" style="padding-bottom: 6px;" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase visible-lg-inline-block">&nbsp;</span>&nbsp;
            <i class="fa fa-angle-down"></i>
        </div-->
    </div>
    <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
</div>

<?php
$question = 0;
$QuizID = $_GET["quizid"];
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
                $data->Picture = clean($data->Picture);
                $data->Choice0 = clean($data->Choice0);
                $data->Choice1 = clean($data->Choice1);
                $data->Choice2 = clean($data->Choice2);
                $data->Choice3 = clean($data->Choice3);
                $data->Choice4 = clean($data->Choice4);
                $data->Choice5 = clean($data->Choice5);
                return $data;
                break;
        }
    }
    if (substr($data,0,1)== '"' && substr($data,-1) == '"'){$data = substr($data,1, strlen($data)-2);}
    $data = str_replace("\\r\\n", "\r\n", trim($data)) ;
    return $data;
}

function question($section){
    global $question;
    switch ($section){
        case "0":
            echo '<div class="row"><div class="col-md-12"><div class="portlet box blue-steel"><div class="portlet-title">';
            echo '<div class="caption"><i class="fa fa-graduation-cap"></i>Question ' . $question . '</div></div><div class="portlet-body">';
            echo '<div class="row"><div class="col-md-2">';
        break;
        case "1":
            echo '</div><div class="col-md-10">';
        break;
        case "2":
            echo '</div></div></div></div></div></div>';
        break;
    }
}

function answers($QuizID, $QuestionID, $text, $answers, $Index = 0, $usersanswer, $correctanswer){
    $disabled="";
    $selected=-1;
    if (is_object($usersanswer)){
        $disabled=" disabled";
        $selected=$usersanswer->Answer;
    }
    $Qold = $QuestionID;
    $QuestionID = $QuizID . ':' . $Index;
    echo '<input type="hidden" name="' . $QuestionID . ':sequencecheck" value="' . $Qold . '" />';
    echo '<div class="qtext"><p>' . $text . '</p></div>';
    echo '<div class="ablock"><div class="prompt">Select one:</div><div class="answer">';
    for ($temp=0; $temp<count($answers); $temp+=1){
        if (strlen(trim($answers[$temp]))>0) {
            echo '<div class="r' . $temp . '">';
            echo '<input type="radio" name="' . $QuestionID . '_answer" value="' . $temp . '" id="' . $QuestionID . ":" . $temp . '" required' . $disabled;
            if($selected == $temp){ echo " checked"; }
            echo '/><label for="' . $QuestionID . ":" . $temp . '">' . chr($temp + ord("a")) . ". " . $answers[$temp];
            if (is_object($usersanswer) && $selected == $temp){
                if ($correctanswer == $temp) {
                    echo " <B>Correct!</B>";
                } else {
                    echo " <B>Incorrect</B>";
                }
            }
            echo '</label></div>';
        }
    }
    echo '</DIV></DIV>';
}

function questionheader($QuizID, $QuestionID, $markedOutOf, $Index = 0, $usersanswer){
    $flagged="";
    $answered="Not yet answered";
    if (is_object($usersanswer)){
        if ($usersanswer->flagged){ $flagged = " checked";}
        $flagged.=" disabled";
        $answered="Answered";
    }
    $QuestionID = $QuizID . ':' . $Index;
    echo '<div class="state">' . $answered . '</div><div class="grade">Marked out of ' . $markedOutOf  . '</div>';
    //echo '<div class="questionflag editable" aria-atomic="true" aria-relevant="text" aria-live="assertive">';
    //echo '<input type="hidden" name="' . $QuestionID . '_flagged" value="0" />';
    //echo '<input type="checkbox" id="' . $QuestionID . '_flaggedcheckbox" name="' . $QuestionID . '_flaggedcheckbox" value="1" ' . $flagged . '/>';
        //*<input type="hidden" value="qaid=16821&amp;qubaid=873&amp;qid=55&amp;slot=1&amp;checksum=6e752fddd87489abd0ec093720443089&amp;sesskey=JiVfZNWBDK&amp;newstate=" class="questionflagpostdata" /> I DONT KNOW WHAT THIS IS FOR
    //echo '<label id="' . $QuestionID . '_flaggedlabel" for="' . $QuestionID . '_flaggedcheckbox">';
    //echo '<img alt=' . $Index . ' src="http://asap-training.com/theme/image.php?theme=aardvark&amp;component=core&amp;rev=1415027139&amp;image=i%2Funflagged" alt="Not flagged" id="' . $Index . ':flaggedimg" /></label></div>';
}

function FullQuestion($QuizID, $text, $answers, $index = 0, $markedOutOf = "1.00", $usersanswer, $correctanswer){
    global $question;
    $question+=1;
    question(0);
    questionheader($QuizID, $question, $markedOutOf, $index, $usersanswer);
    question(1);
    answers($QuizID, $question, $text, $answers, $index, $usersanswer,$correctanswer);
    question(2);
}
?>





<?php

if (count($_POST)>0) {
    print_r($_POST);
} else {
    echo '<form action="quiz?quizid=' . $_GET["quizid"] . '" method="post" enctype="multipart/form-data" accept-charset="utf-8" id="responseform">';
    foreach ($questions as $question) {
        $question=clean($question,1);
        $answer="";
        if (isset($useranswers)){
            foreach($useranswers as $answers){
                if ($answers->QuestionID == $question->QuestionID) {
                    $answer = $answers;
                    continue;
                }
            }
        }
        FullQuestion($QuizID, $question->Question, array($question->Choice0, $question->Choice1, $question->Choice2, $question->Choice3,  $question->Choice4,  $question->Choice5), $question->QuestionID, "1.00", $answer, $question->Answer);
    }
    if (!is_object($answer)) {
        echo '<DIV align="center"><button type="submit" class="btn blue" onclick="return confirm(' . "'Are you sure you are done?'" . ');"><i class="fa fa-check"></i> Save</button></DIV>';
    }
    echo "</form>";
}
?>

</div></div></div></div></div>