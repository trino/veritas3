<?php
$settings = $this->requestAction('settings/get_settings');
$sidebar = $this->requestAction("settings/get_side/" . $this->Session->read('Profile.id'));
if ($_SERVER['SERVER_NAME'] == "localhost") {
    include_once('/subpages/api.php');
} else {
    include_once('subpages/api.php');
}

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

$title = "Courses";
if (isset($_GET["quizid"])) { $title = "Course Results";}
?>


<h3 class="page-title">
Users
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
            <?php if (isset($_GET["quizid"])) { ?>
            <li>
                <a href="<?php echo $this->request->webroot; ?>training/edit?quizid=<?= $_GET["quizid"]?>">Edit Quiz</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <?php } ?>
            <li>
                <a href="">Users</a>
            </li>
        </ul>
        <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
</div>

<div class="row"><div class="col-md-12"><div class="portlet box blue-steel"><div class="portlet-title">
<div class="caption"><i class="fa fa-graduation-cap"></i><?= $title?></div></div><div class="portlet-body">
<div class="row"><div class="col-md-12">

<div class="table-scrollable">
    <table class="table table-condensed  table-striped table-bordered table-hover dataTable no-footer">
        <thead>



        <?php if (isset($users)) { ?>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <TH>Username</TH>
            <TH>Score</TH>
            <TH>Actions</TH>
        </tr>
        </thead>
        <tbody>
            <?php
                    $total=0;
                    $usercount=0;
                    foreach ($users as $user) {
                        $usercount+=1;
                        $total+=$user->percent;
                        echo '<TR><TD>' . $user->Profiles['id'] . '</TD><TD>' . ucfirst($user->Profiles['fname']) . '</TD><TD>' . ucfirst($user->Profiles['lname']) . '</TD><TD>' . ucfirst($user->Profiles['username']) . '</TD><TD>';
                        echo  $user->correct . '/' . $user->questions  . ' (' . round($user->percent,2) . '%)</TD><TD>';
                        echo '<A HREF="' . $this->request->webroot . 'training/quiz?quizid=' . $_GET['quizid'] . '&userid=' . $user->UserID . '" class="' . btnclass("primary", "blue") . '">View</A></TD></TR>';
                    }
                    if ($usercount==0) {
                        echo '<TR><TD colspan="6" align="center">No one has taken this course yet</TD></TR>';
                    } else {
                        echo '<TR><TD colspan="4" align="right">Average:</TD><TD>' . round($total/$usercount,2) . "%</TD><TD></TD></TR>";
                    }
                } else {
            ?>
            <TR><TH width="20">ID</TH><TH width="50">Image</TH><TH>Name</TH><TH width="50">Applicants</TH></TR>
            </thead>
            <tbody>
            <?php
                foreach($quizes as $quiz){
                    //debug($quiz); Name image
                    $quiz=clean($quiz);
                    echo "<TR><TD align='center'>" . $quiz->ID . '</TD><TD align="center"><img style="max-height:50px;" src="../img/';
                    if(strlen(trim($quiz->image))==0){ echo "training.png"; } else {echo $quiz->image;}
                    echo '"></TD><TD><A HREF="?quizid=' . $quiz->ID . '">' . $quiz->Name . "</A></TD><TD align='center'>" . $quiz->applicants . "</TD></TR>";
                }
            } ?>
        </tbody>
    </table>
</div>
    </div></div></div></div></div></div>