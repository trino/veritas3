<?php
$settings = $this->requestAction('settings/get_settings');
$sidebar = $this->requestAction("settings/get_side/" . $this->Session->read('Profile.id'));
if ($_SERVER['SERVER_NAME'] == "localhost") {
    include_once('/subpages/api.php');
} else {
    include_once('subpages/api.php');
}
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
            <li>
                <a href="<?php echo $this->request->webroot; ?>training/edit?quizid=<?= $_GET["quizid"]?>">Edit Quiz</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="">Users</a>
            </li>
        </ul>
        <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
</div>



<div class="table-scrollable">
    <table class="table table-condensed  table-striped table-bordered table-hover dataTable no-footer">
        <thead>
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
                if (isset($users)) {
                    $total=0;
                    $usercount=0;
                    foreach ($users as $user) {
                        $usercount+=1;
                        $total+=$user->percent;
                        echo '<TR><TD>' . $user->id . '</TD><TD>' . $user->fname . '</TD><TD>' . $user->lname . '</TD><TD>' . $user->username . '</TD><TD>';
                        echo  $user->correct . '/' . $user->questions  . ' (' . $user->percent . '%)</TD><TD>';
                        echo '<A HREF="' . $this->request->webroot . 'training/quiz?quizid=' . $_GET['quizid'] . '&userid=' . $user->id . '" class="' . btnclass("primary", "blue") . '">View</A></TD></TR>';
                    }
                    if ($usercount==0) {
                        echo '<TR><TD colspan="6" align="center">No one has taken this quiz yet</TD></TR>';
                    } else {
                        echo '<TR><TD colspan="4" align="right">Average:</TD><TD>' . $total/$usercount . "%</TD><TD></TD></TR>";
                    }
                }
            ?>
        </tbody>
    </table>
</div>
