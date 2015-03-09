<?php $settings = $this->requestAction('settings/get_settings'); ?>
<?php $sidebar = $this->requestAction("settings/get_side/" . $this->Session->read('Profile.id')); ?>

    <h3 class="page-title">
        Edit
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
                <a href="">Edit</a>
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
        <?php if ($canedit) {
            echo '<a href="training?action=delete&quizid=' . $quiz->ID . '" onclick="return confirm(' . "'Are you sure you want to delete this quiz?'" . ');" class="floatright btn btn-danger btnspc">Delete</a>';
        }?>
    </div>

<?php //if (isset($quiz)){ debug($quiz);} ?>

<div class="col-md-6">
    <div class="form-group">
        <label class="control-label">Quiz Name :</label>
            <input name="name" id="name" class="form-control required" value=" <?php if (isset($quiz)) { echo $quiz->Name; } ?>" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="control-label">Image :</label>
        <input name="name" id="name" class="form-control required" value=" <?php if (isset($quiz)) { echo $quiz->image; } ?>" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="control-label">Attachments :</label><BR>
        <small>Separate your attachments with a comma then a space</small>
        <textarea class="form-control" rows="9">
        <?php if (isset($quiz)) { echo $quiz->Attachments; } ?>
        </textarea>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="control-label">Description :</label>
        <textarea class="form-control" rows="10">
        <?php if (isset($quiz)) { echo $quiz->Description; } ?>
        </textarea>
    </div>
</div>