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

function answers($QuizID, $QuestionID, $text, $answers){
    $QuestionID = $QuizID . ':' . $QuestionID . '_';
    echo '<input type="hidden" name="' . $QuestionID . ':sequencecheck" value="1" />';
    echo '<div class="qtext"><p>' . $text . '</p></div>';
    echo '<div class="ablock"><div class="prompt">Select one:</div><div class="answer">';
    for ($temp=0; $temp<count($answers); $temp+=1){
        echo '<div class="r' . $temp . '">';
        echo '<input type="radio" name="' . $QuestionID . '_answer" value="' . $temp . '" id="' . $QuestionID . 'answer' . $temp . '" />';
        echo '<label for="' . $QuestionID . '_answer' . $temp . '">' . chr($temp+ ord("a")) . ". " . $answers[$temp] . '</label></div>';
    }
    echo '</DIV></DIV>';
}

function questionheader($QuizID, $QuestionID, $markedOutOf){
    $QuestionID = $QuizID . ':' . $QuestionID . '_';
    echo '<div class="state">Not yet answered</div><div class="grade">Marked out of ' . $markedOutOf  . '</div>';
    echo '<div class="questionflag editable" aria-atomic="true" aria-relevant="text" aria-live="assertive">';
    echo '<input type="hidden" name="' . $QuestionID . ':flagged" value="0" />';
    echo '<input type="checkbox" id="' . $QuestionID . ':flaggedcheckbox" name="' . $QuestionID . ':flagged" value="1" />';
        //*<input type="hidden" value="qaid=16821&amp;qubaid=873&amp;qid=55&amp;slot=1&amp;checksum=6e752fddd87489abd0ec093720443089&amp;sesskey=JiVfZNWBDK&amp;newstate=" class="questionflagpostdata" /> I DONT KNOW WHAT THIS IS FOR
    echo '<label id="' . $QuestionID . ':flaggedlabel" for="' . $QuestionID . ':flaggedcheckbox">';
    echo '<img src="http://asap-training.com/theme/image.php?theme=aardvark&amp;component=core&amp;rev=1415027139&amp;image=i%2Funflagged" alt="Not flagged" id="' . $QuestionID . ':flaggedimg" /></label></div>';
}

function FullQuestion($text, $answers, $markedOutOf = "1.00"){
    global $QuizID, $question;
    $question+=1;
    question(0);
    questionheader($QuizID, $question, $markedOutOf);
    question(1);
    answers($QuizID, $question, $text, $answers);
    question(2);
}
?>

<form action="http://asap-training.com/mod/quiz/processattempt.php" method="post" enctype="multipart/form-data" accept-charset="utf-8" id="responseform">



<?php
switch ( $QuizID ) {
    case 1:
        FullQuestion("What does WHMIS stand for?", array("Workplace Health Materials Information System", "Workplace Hazardous Materials Information System", "Workplace Hazardous Materials Information Sheet", "Workplace Hazardous MSDS Information Sheet"));
        FullQuestion("WHMIS is a law", array("True", "False"));
        FullQuestion("Under WHMIS Law who has duties in regards to hazardous materials?", array("Workers", "Employers", "Suppliers", "All of the above"));
        FullQuestion("How many categories of controlled substances are identified under WHMIS?", array("Three", "Five", "Four", "Six"));
        FullQuestion("What class of controlled substances does this symbol represent?", array("Compressed Gas", "Corrosive Material", "Oxidizing Material", "Flammable and Combustible Material"));
        FullQuestion("What class of controlled substances does this symbol represent?", array("Biohazardous Infectious Material", "Materials Causing Other Toxic Effects", "Oxidizing Material", "Materials Causing Immediate and Severe Toxic Effects"));
        FullQuestion("What class of controlled substances does this symbol represent?", array("Poisonous and Infectious Material", "Dangerously Reactive Material", "Flammable and Combustible Material", "Compressed Gas"));
        FullQuestion("What two types of labels are required by WHMIS law?", array("Supplier and Employer", "Workplace and Manufacturer", "Employer and Worker", "Supplier and Workplace"));
        FullQuestion("When is a Workplace Label required?", array("When a substance in transferred to a different container", "As soon as a substance is brought on site", "None of the above", "When the supplier label is damaged"));
        FullQuestion("What is required on a Workplace Label?", array("Reference to MSDS", "Hazard information", "Product name", "All of the above"));
        FullQuestion("What is required on a Supplier Label by law?", array("Product and Supplier Identifier", "Hatched Border", "First Aid Measures", "Hazard Symbols", "All of the above"));
        FullQuestion("What does MSDS stand for?", array("Material Safety Data System", "Major Safety Direction System", "Material Safety Direction Sheet", "Material Safety Data Sheet"));
        FullQuestion("What controlled substances need an MSDS?", array("Any that are being shipped from site", "Every controlled substance received at the site", "Those that are being used on a daily basis", "The really dangerous ones"));
        FullQuestion("How often does an MSDS need to be updated?", array("Every three (3) years", "Never", "Every two (2) years", "Every years"));
        FullQuestion("An MSDS CANNOT be updated before three (3) years", array("True", "False"));
        break;
    case 2:
        FullQuestion("Test Question?", array("Answer 1", "Answer 2", "Answer 3", "Answer 4"));
        break;
}
?>

   <DIV align="center"><a href="javascript:void(0)" class="btn btn-primary" id="save_client_p1">Save</a></DIV>

</div></div></div></div></div>