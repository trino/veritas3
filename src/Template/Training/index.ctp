<style>
    @media print {
        .page-header {
            display: none;
        }

        .page-footer, .chat-form, .nav-tabs, .page-title, .page-bar, .theme-panel, .page-sidebar-wrapper, .more {
            display: none !important;
        }

        .portlet-body, .portlet-title {
            border-top: 1px solid #578EBE;
        }

        .tabbable-line {
            border: none !important;
        }

        a:link:after,
        a:visited:after {
            content: "" !important;
        }

        .actions {
            display: none
        }

        .paging_simple_numbers {
            display: none;
        }
    }

</style>

<?php
$profileID = $this->Session->read('Profile.id');
$sidebar = $this->requestAction("settings/all_settings/" . $profileID . "/sidebar");
if ($sidebar->training==0){
    echo '<div class="alert alert-danger"><strong>Error!</strong> You don' . "'t have permission to view training</div>";
    return;
}

$settings = $this->requestAction('settings/get_settings');
$sidebar = $this->requestAction("settings/get_side/" . $this->Session->read('Profile.id'));

$QuizID = -1;
if (isset($_GET["quizid"])) { $QuizID = $_GET["quizid"]; }
function quizheader($QuizID, $id, $name, $image){
if (($id == $QuizID) or ($QuizID == -1)){
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-graduation-cap"></i>
                    <?php echo $name; ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-2" align="center">
                        <img src="img/<?php echo $image; ?>">
                    </div>
                    <div class="col-md-10">

                        <?php
                        return true;
                        }
                        return false;
                        }

                        function quizmiddle($QuizID, $id){
                            echo '</div></div><div class="row"><div class="col-md-2" align="right"></div>';
                            return $id == $QuizID;
                        }

                        function quizend($QuizID, $id){
                            if ($id != $QuizID){
                                echo '<div class="col-md-10" align="right"><a class="btn btn-info" href="training?quizid=' . $id . '">View</a></div>';
                            }
                            echo '</div></div></div></div></div>';
                        }
                        ?>




                        <h3 class="page-title">
                            Training
                        </h3>
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                                <li>
                                    <a href="training">Training</a>
                                </li>
                            </ul>
                            <div class="page-toolbar">

                            </div>
                            <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
                        </div>







<?
foreach($quizes as $quiz){

if (quizheader($QuizID, $quiz->ID, $quiz->Name, "training.png")) {
    echo str_replace("\r\n", "<P>", $quiz->Description);
    if(quizmiddle($QuizID, $quiz->ID)){
        $attachments = explode(", ", $quiz->Attachments);
        echo '<div class="col-md-5" align="left">';
            foreach($attachments as $attachment){

            }
            echo '<input type="checkbox" id="quiz" disabled><a class="btn btn-info" href="training/quiz?quizid=' . $quiz->ID . '" onclick="return checkboxes();">Quiz</a></input>';
        echo '</div>';
        echo '<div class="col-md-5" align="right">';
            echo '<a href="#" class="btn btn-warning"">Enroll</a>';
            echo '<a class="btn btn-info" href="quiz?quizid=' . $quiz->ID . '">View</a>';
            echo '<a href="#" class="btn btn-primary">Edit</a>';
            echo '<a href="#" onclick="return confirm(' . "'Are you sure you want to delete this test?'" . ');" class="btn btn-danger">Delete</a>';
        echo '</div>';
    }
    quizend($QuizID, $quiz->ID);
}


}
return;
?>







                        <?php if (quizheader($QuizID, 1, "WHMIS", "training.png")) { ?>

                            <p>WHMIS is a comprehensive plan for providing information on the safe use of hazardous materials used in Canadian workplaces.</P>
                            <p>WHMIS was created in response to the Canadian workers right to know about the safety and health hazards that may be associated with the materials or chemicals that are used in a workplace. Exposure to hazardous materials can cause or contribute to many serious health effects such as effects on the nervous system, kidney or lung damage, sterility, cancer, burns and rashers. Some hazardous materials are safety hazards and can cause fires or explosions.</P>
                            <p>WHMIS was developed by a committee from representatives from the government, industry and labor to ensure that the best interests of everyone were considered.</P>
                            <p>On October 31, 1998 WHMIS became a federal Canadian Law. The majority of information requirements of WHMIS legislation were incorporated into the Hazardous Products Act and the Hazardous Materials Information Review Act. These apply to all of Canada.</P>

                            <?php if(quizmiddle($QuizID, 1)){ ?>
                                <div class="col-md-5" align="right">
                                    <a href="#" class="btn btn-warning"">Enroll</a>
                                    <a class="btn btn-info" href="quiz?quizid=1">View</a>
                                    <a href="#" class="btn btn-primary">Edit</a>
                                    <a href="#" onclick="return confirm('Are you sure you want to delete this test?');" class="btn btn-danger">Delete</a>
                                </div>
                            <?php } quizend($QuizID, 1); } ?>








                        <?php if (quizheader($QuizID, 2, "Active Shooter Response", "Shooter.png")) { ?>

                            <p>Total chaos typically ensues in an active shooter situation.  This course will give your organization the program planning and training suggestions which will help you minimize that. </P>
                            <p>We begin with what is the most critical element of the plan - effective and timely communication to local public emergency services and simultaneously the communication to all of your facility/property occupants.  We will then outline the general deployment guidelines for on-site security forces and their cooperation with arriving public emergency service personnel.  Establishment of a command post to coordinate the lockdown of the facility and the apprehension of the shooter will be covered.  General emergency response priorities will be discussed. </P>
                            <p> The course will provide suggestions regarding the training for response team members and the general training for all facility occupants.  Finally, incident documentation and post incident reaction evaluation will be addressed.</P>

                            <?php if(quizmiddle($QuizID, 2)){ ?>
                                <div class="col-md-5" align="left">
                                    <input type="checkbox" id="pdf" disabled></input>
                                    <a href="../webroot/assets/global/ActiveShooterHandout.pdf" download="ActiveShooterHandout.pdf" class="btn btn-warning" onclick="check('pdf');">Handout</a>
                                    <input type="checkbox" id="mp4" disabled></input>
                                    <a href="training/video?title=Active Shooter Response&url=http://asapsecured.com/wp-content/uploads/2014/11/ActiveShoot_x264_001.mp4" class="btn btn-warning"" target="_blank" onclick="check('mp4');">Video</a>
                                    <input type="checkbox" id="quiz" disabled></input>
                                    <a class="btn btn-info" href="training/quiz?quizid=2" onclick="return checkboxes('pdf', 'mp4');">Quiz</a>
                                </div>
                                <div class="col-md-5" align="right">
                                    <a href="#" class="btn btn-primary" onclick="return confirm('test ' + checkboxes('pdf', 'mp4'));">Edit</a>
                                    <a href="#" onclick="return confirm('Are you sure you want to delete this test?');" class="btn btn-danger">Delete</a>
                                </div>
                            <?php } quizend($QuizID, 2); } ?>








                        <script language="JavaScript">
                            function check(name){
                                document.getElementById(name).disabled = false;
                                document.getElementById(name).click();
                                document.getElementById(name).disabled = true;
                                return document.getElementById(name).checked;
                            }
                            function checkboxes(name1, name2){
                                return document.getElementById(name1).checked && document.getElementById(name2).checked;
                            }
                        </script>