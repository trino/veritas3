<script type="text/javascript" src="<?= $this->request->webroot;?>js/datetime.js"></script>
<body onLoad="ajaxpage('timezone');">

<?php
function offsettime2($date, $minutes){
    if ($minutes == 0){ return $date;}
    $newdate= date_create($date);
    if ($minutes > 0) {$newdate->modify("+" . $minutes . " minutes"); }
    return $newdate->format('d F Y - H:i');
}

function offsettime($date, $offset){
    if ($offset == 0){ return $date;}
    $newdate= date_create($date);
    $hours = floor($offset);
    $minutes = ($offset-$hours)*60;
    $interval = 'PT' . abs($hours) . "H";
    if ($minutes > 0) {$interval .= $minutes . "M";}
    if ($hours>0) {
        $newdate->add(new DateInterval($interval));
    } else {
        $newdate->sub(new DateInterval($interval));
    }
    return $newdate->format('Y-m-d H:i:s');
}

$offset=0;
if (isset($_SESSION['timediff']) && isset($event)) {
    $offset=$_SESSION['timediff'];
    $event->date = offsettime($event->date, $offset);
}

if(isset($isdisabled))
{
   $disabled = "disabled='disabled'"; 
}
else
    $disabled = "";
?>
<h3 class="page-title">
			Schedules (Reminders)</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo $this->request->webroot;?>tasks/calender">Tasks</a>
                        <i class="fa fa-angle-right"></i>
					</li>
                    <li>
						<?php if(isset($isdisabled))echo "View"; elseif(isset($event)){echo "Edit";}else{echo "Add";}?>
					</li>
				</ul>
                <?php
                if (isset($event)) {
                    echo '<a href="javascript:window.print();" class="floatright btn btn-info">Print</a>';
                }?>

			</div>

<div class="row">
<div class="col-md-10">
<div data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
	<form action="" class="form-horizontal" method="post">
		<!-- TASK HEAD -->
		<div class="form">
            <div class="form-group">
				<div class="col-md-12">
					<div class="input-icon">
						<i class="fa fa-calendar"></i>
                        <input type="hidden" name="offset" value="<?= $offset ?>">
						<input type="text" name="date" <?php echo $disabled;?> class="form-control todo-taskbody-due date form_datetime" placeholder="Due Date..." value="<?php
                        if(isset($event)) {
                            echo date('d F Y - H:i',strtotime($event->date));
                        } else if (isset($_GET["date"])) {
                            $minutes = ceil(date("i") / 5) * 5 - date("i");
                            if ($minutes==0){$minutes=5;}
                            echo offsettime2(date('Y-m-d ', strtotime($_GET["date"])) . date("H:i"), $minutes);
                            //echo date('d F Y - ', strtotime($_GET["date"])) . date("H:i", time() + $minutes * 60000) . " " . $minutes;
                        }?>"/>
					</div>
				</div>
			</div>
			<!-- TASK TITLE -->
			<div class="form-group">
				<div class="col-md-12">
					<input type="text" <?php echo $disabled;?> name="title" class="form-control todo-taskbody-tasktitle" placeholder="Task Title..." value="<?php if(isset($event))echo $event->title;?>" />
				</div>
			</div>
			<!-- TASK DESC -->
			<div class="form-group">
				<div class="col-md-12">
					<textarea class="form-control todo-taskbody-taskdesc" <?php echo $disabled;?> name="description" rows="8" placeholder="Task Description..."><?php if(isset($event))echo $event->description;?></textarea>
				</div>
			</div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="checkbox" id="email_self" name="email_self" value="1" <?php if(isset($event) && $event->email_self=='1')echo "checked='checked'";?> <?php echo $disabled;?> /><label for="email_self">Send an email notification to yourself</label>
                </div>
				<div class="col-md-12">
					<textarea class="form-control todo-taskbody-taskdesc" <?php echo $disabled;?> name="others_email" rows="2" placeholder="Send notification to other email addresses (separated with commas)"><?php if(isset($event))echo $event->others_email;?></textarea>
                    <input type="hidden" name="timezoneoffset" value="<?= $_SESSION['time']; ?>">
				</div>
			</div>
			<!-- END TASK DESC -->
			<!-- TASK DUE DATE -->
			
			<?php if(!isset($isdisabled)){?>
			<div class="form-actions right todo-form-actions">
				<button class="btn btn-sm green-haze" type="submit" name="submit">Save Changes</button>
			</div>
            <?php }?>
		</div>
		</div>
	</form>
</div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/date.css"/>
<style>
.table-condensed td:hover{cursor:pointer; }


</style>